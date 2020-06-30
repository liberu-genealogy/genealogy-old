<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Person;
use LaravelEnso\Roles\App\Models\Role;
use LaravelEnso\Core\App\Models\UserGroup;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\ActivationTrait;
use LaravelEnso\Multitenancy\App\Jobs\CreateDatabase;
use LaravelEnso\Multitenancy\App\Jobs\Migrate;
use LaravelEnso\Companies\App\Models\Company;
use DB;
use Str;

class RegisterController extends Controller
{
    use RegistersUsers;
    use ActivationTrait;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        try{
            DB::beginTransaction();
            // create person
            $person = new Person();
            $person->email = $data['email'];
            $person->save();

            // get user_group_id
            $user_group = UserGroup::where('name','User')->first();
            if($user_group == null) {
                // create user_group
                $user_group = UserGroup::create(['name'=>'User', 'description'=>'This is user group']);
            }

            // get role_id
            $role = Role::where('name', 'supervisor')->first();
            if($role == null) {
                $role = Role::create(['menu_id'=>1, 'name'=>'supervisor', 'display_name'=>'User', 'description'=>'This is user']);
            }
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'person_id' => $person->id,
                'group_id' => $user_group->id,
                'role_id' => $role->id,
                'is_active' => 0,
                'active_token' => Str::random(64),
            ]);
            $this->initiateEmailActivation($user);
            DB::commit();
            // send verification email;


            $company = Company::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'is_active' => 1,
		'is_tenant' => 1,
		'status' => 'Active'
            ]);

          $company->attachPerson($person->id);

	   // Dispatch Tenancy Jobs

           $tenant = $user->company->id;
           CreateDatabase:dispatch($tenant);
           Migrate:dispatch($tenant);

            return $user;
        }catch(\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }
}
