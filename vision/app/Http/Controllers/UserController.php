<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Authentification(LoginRequest $request){
    // -- LoginRequest a verifié que les email et password étaient présents
     // -- il faut maintenant vérifier que les identifiants sont corrects
     $credentials = request(['email','password']);if(!Auth::attempt($credentials)) {
        return response()->json([
        'status' => 0,
        'message' => 'Utilisateur inexistant ou identifiants incorreccts'
        ],401);
        }
        // tout est ok, on peut générer le token
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;
        return response()->json([
        'status' => 1,
        'accessToken' =>$token,
        'token_type' => 'Bearer',
        'user_id' => $user->id
        ]);
    }
 public function ListCollaborateur(){
    
 }
 public function CreateCollaborateur(){

 }   
 public function UpdateCollaborateur(){

 }   
 public function DeleteCollaborateur(){

 }   
    
}
