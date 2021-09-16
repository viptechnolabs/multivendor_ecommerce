<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Validator;

class AuthController extends Controller
{
    use HasApiTokens;
    public function login(Request $request) //TODO Validation
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::whereEmail($email)->first();
        if ($user) {
            if ($user->user_type == 'customer')
            {
                if (Hash::check($password, $user->password)) {
                    $token = $user->createToken('auth_token')->plainTextToken;
                    return (new UserResource($user))->additional(['token' => $token]);
                } else {
                    return ['message' => 'Invalid Password'];
                }
            }
        }
            return ['message' => 'Invalid Email Or Password'];
    }

    public function signup(Request $request): UserResource // TODO validation
    {
        #param
        $email = $request->email;
        $name = $request->name;
        $password = $request->password;

        $user = new User;
        $user->status = 1;
        $user->email = $email;
        $user->name = $name;
        $user->password = $password;
        $user->save();

        $customer = new Customer;
        $customer->user_id = $user->id;
        $customer->save();

        $token = $user->createToken('auth_token')->plainTextToken;
        return (new UserResource($user))->additional(['token' => $token]);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ['message'=>'Logout Successfully'];
    }
}
