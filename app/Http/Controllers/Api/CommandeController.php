<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\ArticleModel;
use App\Models\CommandeModel;
use App\Models\CommandeArticleModel;

class CommandeController extends Controller
{
	public function saveCommandeAction(Request $request)
	{
		// La validation de données
		$request->validate([
			'telephone' => 'required|string:max:128',
			'adresse' => 'required|string|max:255',
			'ville' => 'required|string|max:128',
			'articles' => 'required|array|min:1',
		]);
		
		$arrArticles = $request->input('articles');
		$missingArticles = [];
		foreach($arrArticles as $article)
		{
			$articleExists = ArticleModel::where([
				['id', '=', $article['id']],
				['status', '>', 0],
			])->exists();
			
			if(!$articleExists) $missingArticles[] = $article['id'];
		}

		//If there is missing article
		if(sizeof($missingArticles) > 0)
			{
				$data = [
				'message' => 'Save commande: some articles cannot be found',
				'data' => [],
				'errors' => ['Missing articles: ' . implode(' ,', $missingArticles)],
				'success' => FALSE,
			];
			
			return response()->json($data, 400);
		}
		
		
		//Save commande
		  //Generate ref sequence
		$countCmd = CommandeModel::count() + 1;
		$dt = Carbon::now();
		$ref = 'F' . $dt->year . '-' . sprintf("%02d", $dt->month) . '-' . sprintf("%06d", $countCmd);
		
		$cmdRow = CommandeModel::create([
			'ref' => $ref,
			'nom' => $request->input('nom', ''),
			'raison_sociale' => $request->input('raison_sociale', ''),
			'nif' => $request->input('nif', ''),
			'telephone' => $request->input('telephone'),
			'mail' => $request->input('mail', ''),
			'adresse' => $request->input('adresse'),
			'ville' => $request->input('ville'),
			'status' => 1,
			'date_creation' => Carbon::now(),
		]);
		
		  //Save articles
		foreach($arrArticles as $article)
		{
			CommandeArticleModel::create([
				'id_article' => $article['id'],
				'id_commande' => $cmdRow->id,
				'qte' => $article['qte'],
				'pu' => $article['pu'],
			]);
		}
		
		$data = [
			'message' => 'Commande saved',
			'data' => [],
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 201);
	}
	
	/**
	* Update commande status and stock
	*/
	public function validerCommandeAction($id)
	{
		//TO DO Check stock avalaibility
		
		$cmdExists = CommandeModel::where([
			['id', '=', $id],
			['status', '=', 1],
		])->exists();
		
		if(!$cmdExists)
		{
			$data = [
				'message' => 'Commande not found',
				'data' => [],
				'errors' => [],
				'success' => FALSE,
			];
			
			return response()->json($data, 404);
		}
		
		$cmdRow = CommandeModel::where([
			['id', '=', $id],
			['status', '=', 1],
		])->first();
		
		$cmdRow->update([
			'status' => 2,
		]);
		
		//TO DO Update stock
		$arrCmdArticle = CommandeArticleModel::where([
			['id_commande', '=', $id]
		])->get();
		
		foreach($arrCmdArticle as $cmdArticle)
		{
			$articleInStock = ArticleModel::find($cmdArticle['id_article']);
			
			$articleInStock->update([
				'stock' => $articleInStock->stock - $cmdArticle->qte,
			]);
		}

		$data = [
			'message' => 'Update commande status',
			'data' => [],
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 200);
	}
	
	public function listCommandeAction(Request $request)
	{
		$start = $request->input('start', 0);
		$perPage = $request->input('per_page', 10);
		
		$ref = $request->input('ref', '');
		
		$query = CommandeModel::where('status', '>', 0)
			->orWhere('ref', 'like', '%' . $ref . '%');
			// ->orWhere('libelle', 'like', '%' . $libelle . '%');
			
		$arrCommande = $query->skip($start)->take($perPage)->get();
		
		$arr = [1,2,3,4,5];
		
		//Custom res content
		$arrCommande->map(function($commande) use ($arr) {
			$idCommande = $commande['id'];
			
			$arrCmdArticle = CommandeArticleModel::where([
				['id_commande', '=', $idCommande]
			])
			
			$commande['articles'] = $arr;
			
			return $commande;
		});

		$data = [
			'message' => 'Paginated list of commandes',
			'data' => $res,
			'errors' => [],
			'success' => TRUE,
		];
		
		return response()->json($data, 200);
	}
}
