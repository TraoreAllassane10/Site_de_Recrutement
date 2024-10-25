<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(UserRequest $request)
    {
        try {

            User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "role" => $request->role
            ]);

            return response()->json([
                "status_code" => 200,
                "msg" => "Utilisateur crée avec sucess",
            ]);
        } catch (Exception $e) {
            return response()->json([
                "status_code" => 401,
                "msg" => "Erreur de validation",
                "erreur" => $e
            ]);
        }
    }

    public function login(LoginRequest $request)
    {

        try {

            if (Auth::attempt($request->only(["email", "password"]))) {
                $user = auth()->user();

                $token = $user->createToken("cle_secrete")->plainTextToken;

                return response()->json([
                    "status_code" => 200,
                    "msg" => "Utilisateur connecté",
                    "user" => $user,
                    "token" => $token
                ]);
            }
            else
            {
                return response()->json([
                    "status_code" => 400,
                    "msg" => "Vous n'avez pas de compte",
                ]);
            }

        } catch (Exception $e) {
            return response()->json($e);
        }


    }
}
