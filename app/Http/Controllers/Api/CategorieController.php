<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategorieModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
	public function getCategoriesAction()
	{
		$res = CategorieModel::all()->where('status', '>', 0);
		
		$data = [
			'message' => 'List all categories',
			'data' => $res,
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 200);
	}
	
	public function saveCategorieAction(Request $request)
    {
		// La validation de données
		$validated = $request->validate([
			'libelle' => 'required|string|max:255',
		]);
		
		// On crée un nouvel utilisateur
		$user = CategorieModel::create([
			'libelle' => $request->input('libelle'),
			'description' => $request->input('description', ''),
			'status' => 1,
		]);
		
		$data = [
			'message' => 'Save categorie',
			'data' => [],
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 201);
	}
	
	public function updateCategorieAction(Request $request)
    {
		// La validation de données
		$validated = $request->validate([
			'id' => 'required|integer',
			'libelle' => 'required|string|max:255',
		]);
		
		$rowData = CategorieModel::where('id', $request->input('id'))->where('status', '>', 0);
		
		// On crée un nouvel utilisateur
		$rowData->update([
			'libelle' => $request->input('libelle'),
			'description' => $request->input('description', ''),
			'status' => 1,
		]);
		
		$data = [
			'message' => 'Update categorie',
			'data' => [],
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 201);
	}
	
	public function deleteCategorieAction($id)
    {
		$query = CategorieModel::where('id', $id)->where('status', '>', 0);
		if($query->exists())
		{
			$query->update([
				'status' => 0,
			]);
			
			$data = [
				'message' => 'Categorie deleted',
				'data' => [],
				'errors' => [],
				'success' => TRUE,
			];
			
			return response()->json($data, 200);
		}
		
		$data = [
			'message' => 'Categorie not found',
			'data' => [],
			'errors' => [],
			'success' => FALSE,
		];
		
		return response()->json($data, 404);
	}
}
