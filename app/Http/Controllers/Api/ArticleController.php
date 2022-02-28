<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategorieModel;
use App\Models\ArticleModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
	public function getArticleByIdAction($id) {
		$res = ArticleModel::find($id);
		
		$data = [
			'message' => 'Find article by id',
			'data' => $res,
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 200);
	}
	
	public function getLastestArticlesAction()
	{
		$count = 5;
		
		//$idCategorie = intval($idCategorie);
		$res = ArticleModel::where([
			['status', '>', 0],
		])->take($count)
		->orderBy('created_at', 'DESC')->get();
		
		$data = [
			'message' => 'List of ' . $count . ' lastest articles',
			'data' => $res,
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 200);
	}
	
	public function getArticlesByCategorieAction($idCategorie)
	{
		$cat = CategorieModel::find($idCategorie);
		
		//$idCategorie = intval($idCategorie);
		$res = ArticleModel::where([
			['id_categorie', '=', $idCategorie],
			['status', '>', 0],
		])->get();
		
		$data = [
			'message' => 'List articles by categorie',
			'data' => [
				'articles' => $res,
				'categorie' => $cat['libelle'],
			],
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 200);
	}
	
	public function saveArticleAction(Request $request)
    {
		// La validation de données
		$validated = $request->validate([
			'id_categorie' => 'required|integer',
			'libelle' => 'required|string|max:255',
			'pu' => 'required|min:0',
			'stock' => 'required|min:0',
		]);
		
		//Check if categorie exists
		$idCategorie = $request->input('id_categorie');
		$categorieExists = CategorieModel::where([
			['id', '=', $idCategorie],
			['status', '>', 0],
		])->exists();
		
		if(!$categorieExists)
			{
				$data = [
				'message' => 'Article cannot be saved: categorie not found',
				'data' => [],
				'errors' => ['Categorie #' . $idCategorie . ' not found'],
				'success' => FALSE,
			];
			
			return response()->json($data, 400);
		}
		
		// On crée un nouvel utilisateur
		ArticleModel::create([
			'id_categorie' => $request->input('id_categorie'),
			'ref' => $request->input('ref', ''),
			'libelle' => $request->input('libelle'),
			'pu' => $request->input('pu'),
			'ancien_pu' => $request->input('ancien_pu', 0),
			'stock' => $request->input('stock'),
			'description' => $request->input('description', ''),
			'image1' => $request->input('image1', ''),
			'image2' => $request->input('image2', ''),
			'image3' => $request->input('image3', ''),
			'image4' => $request->input('image4', ''),
			'status' => $request->input('status', 1),
		]);
		
		$data = [
			'message' => 'Save article',
			'data' => [],
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 201);
	}
	
	public function updateArticleAction(Request $request)
    {
		// La validation de données
		$validated = $request->validate([
			'id_categorie' => 'required|integer',
			'libelle' => 'required|string|max:255',
			'pu' => 'required|min:0',
			'stock' => 'required|min:0',
		]);
		
		//Check if categorie exists
		$idCategorie = $request->input('id_categorie');
		$categorieExists = CategorieModel::where([
			['id', '=', $idCategorie],
			['status', '>', 0],
		])->exists();
		
		if(!$categorieExists)
			{
				$data = [
				'message' => 'Article cannot be updated: categorie not found',
				'data' => [],
				'errors' => ['Categorie #' . $idCategorie . ' not found'],
				'success' => FALSE,
			];
			
			return response()->json($data, 400);
		}
		
		// On update l'article
		$rowExists = ArticleModel::where([
			['id', '=', $request->input('id')],
			['status', '>', 0],
		])->exists();
		
		if(!$rowExists)
		{
			$data = [
				'message' => 'Article not found',
				'data' => [],
				'errors' => [],
				'success' => FALSE,
			];
			
			return response()->json($data, 404);
		}
		
		$rowData = ArticleModel::where([
			['id', '=', $request->input('id')],
			['status', '>', 0],
		]);
		
		$rowData->update([
			'id_categorie' => $request->input('id_categorie'),
			'ref' => $request->input('ref', ''),
			'libelle' => $request->input('libelle'),
			'pu' => $request->input('pu'),
			'ancien_pu' => $request->input('ancien_pu', 0),
			'stock' => $request->input('stock'),
			'description' => $request->input('description', ''),
			'image1' => $request->input('image1', ''),
			'image2' => $request->input('image2', ''),
			'image3' => $request->input('image3', ''),
			'image4' => $request->input('image4', ''),
			'status' => $request->input('status', 1),
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
		$query = ArticleModel::where([
			['id', '=', $id],
			['status', '>', 0],
		]);
		
		if($query->exists())
		{
			$query->update([
				'status' => 0,
			]);
			
			$data = [
				'message' => 'Article deleted',
				'data' => [],
				'errors' => [],
				'success' => TRUE,
			];
			
			return response()->json($data, 200);
		}
		
		$data = [
			'message' => 'Article not found',
			'data' => [],
			'errors' => [],
			'success' => FALSE,
		];
		
		return response()->json($data, 404);
	}
}
