<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens;
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::whereEmail($email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) {
//                if (!request()->user()->currentAccessToken()->token)
//                {
                    $token = $user->createToken('auth_token')->plainTextToken;
//                }
                return ['token'=>$token];
            } else {
                return ['message' => 'Invalid Password'];
            }
        } else {
            return ['message' => 'Invalid Email'];
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ['message'=>'Logout Successfully'];
    }
}
