<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeArticleModel extends Model
{
    protected $table = 'r_commande_article';
	
	protected $primaryKey = 'id';
	
	//public $incrementing = true;
	
	public $timestamps = false;
	
	protected $guarded = ['id'];
}
