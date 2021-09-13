<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\Tenant\CreateDB;
use App\Jobs\Tenant\Migration;
use App\Traits\ConnectionTrait;
use Illuminate\Support\Facades\DB;
use LaravelEnso\Core\Events\Login;
use LaravelEnso\Users\Models\User;
use Illuminate\Support\Facades\App;
use LaravelEnso\Core\Traits\Logout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Artisan;
use Laravel\Socialite\Facades\Socialite;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\Multitenancy\Services\Tenant;
use Illuminate\Validation\ValidationException;
use LaravelEnso\Multitenancy\Enums\Connections;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers, ConnectionTrait, Logout {
        Logout::logout insteadof AuthenticatesUsers;
    }

    // protected $redirectTo = '/';

    private ?User $user;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->maxAttempts = config('enso.auth.maxLoginAttempts');
    }

    /**
     * public function logout(Request $request)
     * {
     * $this->guard()->logout();.
     *
     * $request->session()->invalidate();
     * }
     **/
    protected function attemptLogin(Request $request)
    {
        $this->user = $this->loggableUser($request);

        if (! $this->user) {
            return false;
        }

        if ($request->attributes->get('sanctum')) {
            Auth::guard('web')->login($this->user, $request->input('remember'));
        }

        Login::dispatch($this->user, $request->ip(), $request->header('User-Agent'));

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
            $tanent = false;
            if ($company) {
                $tanent = true;
            }
            // set company id as default
            $main_company = $user->person->company();
            if ($main_company !== null && ! ($user->isAdmin())) {
                $c_id = $main_company->id;
                $db = Connections::Tenant.$c_id;
                $this->setConnection(Connections::Tenant, $db);
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
                $this->setConnection(Connections::Tenant, $db, $user_id);
                $this->getConnection();

                CreateDB::dispatch($company, $user_id);
                Migration::dispatch($company_id, $user_id, $person_name, $user_email);
            }
        }

        return $user;
    }

    public function redirectToProvider($provider)
    {
        $validated = $this->validateProvider($provider);
        if (! is_null($validated)) {
            return $validated;
        }

        return response()->json(
            Socialite::driver($provider)
                ->stateless()
                ->redirect()
                ->getTargetUrl()
        );

        // return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @param $provider
     * @return JsonResponse
     */
    public function handleProviderCallback($provider)
    {
        $validated = $this->validateProvider($provider);
        if (! is_null($validated)) {
            return $validated;
        }
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $exception) {
            $output = ['data' => [], 'message' => 'Invalid credentials provided!', 'success' => false, 'error' => true];

            return view('callback', $output);
            // return response()->json(['error' => 'Invalid credentials provided.'], 422);
        }
        $IfExists = User::where('email', $user->getEmail())->first();
        if ($IfExists) {
            Auth::loginUsingId($IfExists->id, $remember = true);
            $token = $IfExists->createToken('token-name')->plainTextToken;
            $output = ['access_token' => $token, 'data' => json_encode($IfExists), 'message' => 'Login Success!', 'success' => true, 'error' => false];

            return view('callback', $output);
        } else {
            try {
                DB::connection($this->getConnectionName())->beginTransaction();
                $userCreated = User::create(
                    [
                        'first_name' => $user->getName(),
                        'last_name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'email_verified_at' => now(),
                        'trial_ends_at' => now()->addDays(30),
                    ],
                );
                $userCreated->providers()->updateOrCreate(
                    [
                        'provider' => $provider,
                        'provider_id' => $user->getId(),
                    ],
                    [
                        'avatar' => $user->getAvatar(),
                    ]
                );
                $token = $userCreated->createToken('token-name')->plainTextToken;

                $this->updateProviderUser($userCreated);

                Auth::loginUsingId($userCreated->id, $remember = true);

                $output = ['access_token' => $token, 'data' => json_encode($userCreated), 'message' => 'Login Success!', 'success' => true, 'error' => false];

                DB::connection($this->getConnectionName())->commit();

                return view('callback', $output);
            } catch (Exception $e) {
                DB::connection($this->getConnectionName())->rollback();
            }
            return response()->json($userCreated, 200, ['Access-Token' => $token]);
        }
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

    public function updateProviderUser($user)
    {
        event(new Registered($user));
        $user_id = $user->id;
        $user = User::find($user_id);
        $user->assignRole('free');
        $random = $this->unique_random('companies', 'name', 5);
        $company_id = DB::connection($this->getConnectionName())->table('companies')->insertGetId([
            'name' => 'company'.$random,
            'status' => 1,
            'current_tenant' => 1,
        ]);

        DB::connection($this->getConnectionName())->table('user_company')->insert([
            'user_id' => $user_id,
            'company_id' => $company_id,
        ]);

        $tree_id = DB::connection($this->getConnectionName())->table('trees')->insertGetId([
            'company_id' => $company_id,
            'name' => 'tree'.$company_id,
            'description' => '',
            'current_tenant' => 1,
        ]);

        $tenant_id = DB::connection($this->getConnectionName())->table('tenants')->insertGetId([
            'name' => 'tenant'.$tree_id,
            'tree_id' => $tree_id,
            'database' => 'tenant'.$tree_id,
        ]);

        DB::statement('create database tenant'.$tree_id);

        Artisan::call('tenants:artisan "migrate --database=tenant --force"');
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
            $count = DB::connection($this->getConnectionName())->table('companies')->where($col, '=', $random)->count();

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
Bdc50h9b5N4u