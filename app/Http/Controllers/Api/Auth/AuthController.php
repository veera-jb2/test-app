<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Services\UserService;


class AuthController extends Controller
{
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
         auth()->setDefaultDriver('api');
         $this->userService = $userService;
    }
     
    /**
     * login user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {   
        $user = User::where('email',$request->email)->first();
        if(!empty($user)){
            if(Hash::check($request->password, $user->password)) {
                $token = auth()->login($user);
               Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);
                return $this->respondWithToken($token);
            }else{
                $data = ['token' => 'The password you have entered is invalid!'];
                return apiResponseMessage("Unauthorized", 400, $data);
            }
        }else{
            $data = ['token' => 'The user is invalid!'];
            return apiResponseMessage("Unauthorized", 400, $data);
        }
    }

    public function register(UserRequest $request){
        $user = $this->userService->store($request,'admin');
        if($user){
            return apiResponseMessage("User Created Successfully", 200, (object)[]);
        }else{
            return apiResponseMessage("Failed to create a User", 400, (object)[]);
        }
    }

    /**
     * Logout user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        Auth::guard('web')->logout();
        return response()->json(['message' => 'User successfully logged out.']);
    }

    /**
     * Refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL(),
            'user' => auth()->user(),
            'role' => auth()->user()->role ? auth()->user()->role->role_name : ''
        ];
        return apiResponseMessage("Successfully logged in", 200, $data);
    }

}
