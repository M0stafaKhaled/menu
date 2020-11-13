<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegiesterRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials =$request->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message'  =>  'invalid credentials '
            ], 402);
        }
        $user = $this->hasAccount($request);
        $tokenResult = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'status_code' => Response::HTTP_OK,
            'access_token' => $tokenResult,
            'date' => new UserResource(User::find($user->id)),
            'token_type' => 'Bearer',
        ]);
    }

    public function register(RegiesterRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::create(['name' => $name, 'email' => $email,  'password' => Hash::make($password)]);
     //   $tokenResult = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'status_code' => 200,
           // 'access_token' => $tokenResult,
            'date' => new UserResource(User::find($user->id)),
            'token_type' => 'Bearer',
        ]);
    }
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'status' =>'success' ,
            'status_code' => Response::HTTP_ACCEPTED ,
        ]);
    }
    public  function  hasAccount($request){
        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password, [])) {
            throw new \Exception('invalid email or password');
        }
        return $user;
    }
}




