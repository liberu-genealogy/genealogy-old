<?php

namespace App\Http\Controllers\Auth;

use App\Activation;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelEnso\Core\Http\Controllers\Auth\LoginController;
use Symfony\Component\HttpFoundation\Response;

class VerificationController extends Controller
{
    // use VerifiesEmails;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'token' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * verify user token.
     */
    public function verify_user(Request $request)
    {
        $data = $request->all();
        $this->validator($data)->validate();
        try {
            $token = $request->get('token');
            $activation = Activation::where('token', $token)->first();
            if ($activation === null) {
                return response()->json(
                    [
                        'error' => [
                            'code' => 300,
                            'message' => 'Send activation code again.',
                        ],
                    ],
                    Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $user_id = $activation->user_id;
            $user = User::find($user_id);
            if ($user === null) {
                return response()->json(
                    [
                        'error' => [
                            'code' => 301,
                            'message' => 'There is not such user.',
                        ],
                    ],
                    Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $user->is_active = 1;
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->save();
            Activation::where('user_id', $user_id)->delete();

            return response()->json([
                'csrfToken' => csrf_token(),
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
