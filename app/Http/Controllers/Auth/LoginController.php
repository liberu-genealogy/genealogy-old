<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\Tenant\CreateDBs;
use App\Jobs\Tenant\Migrations;
use App\Models\Person;
use App\Models\Tenant;
use App\Models\User;
use App\Models\UserSocial;
use App\Traits\Login;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Core\Events\Login as Event;
use LaravelEnso\Core\Traits\Logout;
use LaravelEnso\Roles\Models\Role;
use LaravelEnso\UserGroups\Models\UserGroup;

class LoginController extends Controller
{
    use AuthenticatesUsers, Logout, Login{
        Logout::logout insteadof AuthenticatesUsers;
        Login::login insteadof AuthenticatesUsers;
    }

    // protected $redirectTo = '/';

    private ?User $user;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->maxAttempts = config('enso.auth.maxLoginAttempts');
    }

    public function redirect($service)
    {
        return Socialite::driver($service)->redirect();
    }

    protected function attemptLogin(Request $request)
    {
        $this->user = $this->loggableUser($request);

        if (! $this->user) {
            return false;
        }

        if ($request->attributes->get('sanctum')) {
            Auth::guard('web')->login($this->user, $request->input('remember'));
        }

        Event::dispatch($this->user, $request->ip(), $request->header('User-Agent'));

        return true;
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        if ($request->attributes->get('sanctum')) {
            $request->session()->regenerate();

            return [
                'auth' => Auth::check(),
                'csrfToken' => csrf_token(),
            ];
        }

        $token = $this->user->createToken($request->get('device_name'));

        return response()->json(['token' => $token->plainTextToken])
            ->cookie('webview', true)
            ->cookie('Authorization', $token->plainTextToken);
    }

    protected function authenticated(Request $request, $user)
    {
        return response()->json([
            'auth' => Auth::check(),
            'csrfToken' => csrf_token(),
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $attributes = [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ];

        if (! $request->attributes->get('sanctum')) {
            $attributes['device_name'] = 'required|string';
        }

        $request->validate($attributes);
    }

    private function loggableUser(Request $request)
    {
        $user = User::whereEmail($request->input('email'))->first();

        if (! optional($user)->currentPasswordIs($request->input('password'))) {
            return;
        }

        if (! $user->email) {
            throw ValidationException::withMessages([
                'email' => 'Email does not exist.',
            ]);
        }

        if ($user->passwordExpired()) {
            throw ValidationException::withMessages([
                'email' => 'Password expired. Please set a new one.',
            ]);
        }
        if ($user->isInactive()) {
            throw ValidationException::withMessages([
                'email' => 'Account disabled. Please contact the administrator.',
            ]);
        }

        if (! App::runningUnitTests()) {
            $company = $user->person->company();
//            \Log::debug('Login----------------------'.$company);
            $tenant = false;
            if ($company) {
                $tenant = true;
            }
            // set company id as default
            $main_company = $user->person->company();
            if ($main_company !== null && ! ($user->isAdmin())) {
                $c_id = $main_company->id;
            }
            $tenants = Tenant::find($main_company->id);
            if ($main_company == null && ! $user->isAdmin()) {
//            if (($main_company == null||$tenants=='') && ! $user->isAdmin()) {
//          if ($main_company == null) {
                $company_count = Company::count();

                $company = Company::create([
                    'name' => $user->email.($company_count + 1),
                    'email' => $user->email,
                    // 'is_active' => 1,
                    'is_tenant' => 1,
                    'status' => 1,
                ]);
                $user->person->companies()->attach($company->id, ['person_id' => $user->person->id, 'is_main' => 1, 'is_mandatary' => 1, 'company_id' => $company->id]);

                /**            Tree::create([
                 * 'name' => 'Default Tree',
                 * 'description' => 'Automatically created tree as only tree remaining was deleted.',
                 * 'user_id' => $user->id,
                 * 'company_id' => $company->id,
                 * ]);.
                 */
                $company_id = $company->id;
                $user_id = $user->id;
                $person_name = $user->person->name;
                $user_email = $user->email;

                $db = $company_id;
//                \Log::debug('CreateDBs----------------------'.$company);
                CreateDBs::dispatch($company);
//                \Log::debug('Migration----------------------'.$company);
                Migrations::dispatch($company, $user->name, $user->email, $user->password);
            } else {
                if ($tenants && ! $user->isAdmin()) {
//                    $c = DB::connection('tenantdb',$tenants->tenancy_db_name)->table('users')->count();
                    $company = \App\Models\Company::find($main_company->id);
//                    \Log::debug('Database----------------------'.$main_company->id);

                    tenancy()->initialize($tenants);
                    $tenants->run(function () use ($company, $user) {

//                        $company->save();
                        $c = User::count();
                        if ($c == 0) {

//                            \Log::debug('Run Migration----------------------');
                            return Migrations::dispatch($company, $user->name, $user->email, $user->password);
                        }
//                        \Log::debug($company->id.-'users----------------------'.$c);
                    });
                    tenancy()->end();

                    return $user;
                }
            }
        }

        return $user;
    }

    private function loggableSocialUser($user)
    {
        $company = $user->person->company();
        $tenant = false;

        if ($company) {
            $tenant = true;
        }
        // set company id as default
        $main_company = $user->person->company();
        if ($main_company !== null && ! ($user->isAdmin())) {
            $c_id = $main_company->id.$user->id;
        }

        if ($main_company == null && ! $user->isAdmin()) {
//          if ($main_company == null) {
            $company_count = Company::count();

            $company = Company::create([
                'name' => $user->email.($company_count + 1),
                'email' => $user->email,
                // 'is_active' => 1,
                'is_tenant' => 1,
                'status' => 1,
            ]);
            $user->person->companies()->attach($company->id, ['person_id' => $user->person->id, 'is_main' => 1, 'is_mandatary' => 1, 'company_id' => $company->id]);

            /**            Tree::create([
             * 'name' => 'Default Tree',
             * 'description' => 'Automatically created tree as only tree remaining was deleted.',
             * 'user_id' => $user->id,
             * 'company_id' => $company->id,
             * ]);.
             */
            $company_id = $company->id;
            $user_id = $user->id;
            $person_name = $user->person->name;
            $user_email = $user->email;

            $db = $company_id;

            CreateDBs::dispatch($company);
            Migrations::dispatch($company, $user->name, $user->email, $user->password);
        }

        return true;
    }

    public function redirectToProvider($provider)
    {
        $validated = $this->validateProvider($provider);
        if (! is_null($validated)) {
            return $validated;
        }

        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @param $provider
     * @return JsonResponse
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $exception) {
            return redirect(config('settings.clientBaseUrl').'/social-callback?token=&status=false&message=Invalid credentials provided!');
        }

        $curUser = User::where('email', $user->getEmail())->first();

        if (! $curUser) {
            try {
                // create person
                $person = new Person();
                $name = $user->getName();
                $person->name = $name;
                $person->email = $user->getEmail();
                $person->save();
                // get user_group_id
                $user_group = UserGroup::where('name', 'Administrators')->first();
                if ($user_group == null) {
                    // create user_group
                    $user_group = UserGroup::create(['name'=>'Administrators', 'description'=>'Administrator users group']);
                }

                // get role_id
                $role = Role::where('name', 'free')->first();
                if ($role == null) {
                    $role = Role::create(['menu_id'=>1, 'name'=>'supervisor', 'display_name'=>'Supervisor', 'description'=>'Supervisor role.']);
                }

                $curUser = User::create(
                    [
                        'email' => $user->getEmail(),
                        'person_id' => $person->id,
                        'group_id' => $user_group->id,
                        'role_id' => $role->id,
                        'email_verified_at' => now(),
                        'is_active' => 1,
                    ],
                );

                $random = $this->unique_random('companies', 'name', 5);
                $company = Company::create([
                    'name' => 'company'.$random,
                    'email' => $user->getEmail(),
                    'is_tenant' => 1,
                    'status' => 1,
                ]);

                $person->companies()->attach($company->id, ['person_id' => $person->id, 'is_main' => 1, 'is_mandatary' => 1, 'company_id' => $company->id]);

                // Dispatch Tenancy Jobs
                CreateDBs::dispatch($company);
                Migrations::dispatch($company, $user->name, $user->email, $user->password);
            } catch (Exception $e) {
                return redirect(config('settings.clientBaseUrl').'/social-callback?token=&status=false&message=Something went wrong!');
            }
        }

        try {
            if ($this->needsToCreateSocial($curUser, $provider)) {
                UserSocial::create([
                    'user_id' => $curUser->id,
                    'social_id' => $user->getId(),
                    'service' => $provider,
                ]);
            }
        } catch (Exception $e) {
            return redirect(config('settings.clientBaseUrl').'/social-callback?token=&status=false&message=Something went wrong!');
        }

        if ($this->loggableSocialUser($curUser)) {
            Auth::guard('web')->login($curUser, true);

            return redirect(config('settings.clientBaseUrl').'/social-callback?token='.csrf_token().'&status=success&message=success');
        } else {
            return redirect(config('settings.clientBaseUrl').'/social-callback?token=&status=false&message=Something went wrong while we processing the login. Please try again!');
        }
    }

    public function needsToCreateSocial(User $user, $service)
    {
        return ! $user->hasSocialLinked($service);
    }

    /**
     * @param $provider
     * @return JsonResponse
     */
    protected function validateProvider($provider)
    {
        if (! in_array($provider, ['facebook', 'google', 'github'])) {
            return response()->json(['error' => 'Please login using facebook or google or github'], 422);
        }
    }

    public function unique_random($table, $col, $chars = 16)
    {
        $unique = false;

        // Store tested results in array to not test them again
        $tested = [];

        do {

            // Generate random string of characters
            $random = Str::random($chars);

            // Check if it's already testing
            // If so, don't query the database again
            if (in_array($random, $tested)) {
                continue;
            }

            // Check if it is unique in the database
            $count = Company::where($col, '=', $random)->count();

            // Store the random character in the tested array
            // To keep track which ones are already tested
            $tested[] = $random;

            // String appears to be unique
            if ($count == 0) {
                // Set unique to true to break the loop
                $unique = true;
            }

            // If unique is still false at this point
            // it will just repeat all the steps until
            // it has generated a random string of characters
        } while (! $unique);

        return $random;
    }

    public function providerLogin(Request $request, $provider)
    {
        $data = $request->all();

        return response()->json($data);
    }
}
