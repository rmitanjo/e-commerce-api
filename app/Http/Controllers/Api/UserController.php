<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserModel::all();
		
		return response()->json($data);
    }
	
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $data = UserModel::find($id);
		
		return response()->json($data);
    }
	
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // La validation de données
		$this->validate($request, [
			'login' => 'required|max:50',
			'pwd' => 'required|min:8',
			'last_name' => 'required',
			'mail' => 'required',
		]);

		// On crée un nouvel utilisateur
		$user = UserModel::create([
			'login' => $request->login,
			'pwd' => bcrypt($request->pwd),
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'mail' => $request->mail,
		]);

		$res = [
			'message' => 'Save user',
		];
		
		return response()->json($res, 201);
    }
	
	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserModel  $userModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserModel $userModel)
    {
        // La validation de données
		$this->validate($request, [
			'login' => 'required|max:50',
			'pwd' => 'required|min:8',
			'last_name' => 'required',
			'mail' => 'required',
		]);

		// On met a jour l'utilisateur
		$user = UserModel::find($request->id);
		$user->update([
			'login' => $request->login,
			'pwd' => bcrypt($request->pwd),
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'mail' => $request->mail,
		]);

		$res = [
			'message' => 'Update user',
		];
		
		return response()->json($res, 200);
    }
	
	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserModel::find($id);
		$user->delete();
		
		$res = [
			'message' => 'Delete user #' . $id,
		];
		
        return response()->json($res);
    }
}
