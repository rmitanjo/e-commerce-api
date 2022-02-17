<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	/**
     * Create new user account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signupAction(Request $request)
    {
        // La validation de données
		$validatedData = $this->validate($request, [
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:8',
		]);

		// On crée un nouvel utilisateur
		$user = UserModel::create([
			'name' => $validatedData['name'],
			'email' => $validatedData['email'],
			'password' => Hash::make($validatedData['password']),
		]);

		$token = $user->createToken('auth_token')->plainTextToken;
		
		$res = [
			'access_token' => $token,
			'token_type' => 'Bearer',
		];
		
		return response()->json($res, 201);
    }
	
	/**
     * Authenticate user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function signinAction(Request $request)
	{
		if(!Auth::attempt($request->only('email', 'password'))) {
			return response()->json([
				'message' => 'Invalid login details'
			], 401);
		}

		$user = UsermODEL::where('email', $request['email'])->firstOrFail();

		$token = $user->createToken('auth_token')->plainTextToken;

		return response()->json([
			'access_token' => $token,
			'token_type' => 'Bearer',
		]);
	}
	
	/**
     * Logout
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function signoutAction(Request $request)
	{		
		$request->user()->currentAccessToken()->delete();
		
		return response()->json([
			'message' => 'Logout',
		], 200);
	}
	
	/**
     * Get user profile. Restricted access
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
	public function getProfileAction($id)
	{
		$data = UserModel::find($id);
		
		return response()->json($data, 200);
	}
	
	/**
     * Refresh user token
     *
     * @param  int $userId
     * @return \Illuminate\Http\Response
     */
	public function refreshTokenAction($userId)
	{
		$user = UserModel::find($userId);
		
		$user->tokens()->delete();
		
        return response()->json([
			'token' => $user->createToken($user->name)->plainTextToken
		]);
	}
}
