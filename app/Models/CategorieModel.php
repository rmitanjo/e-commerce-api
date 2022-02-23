<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieModel extends Model
{
    protected $table = 't_categorie';
	
	protected $primaryKey = 'id';
	
	//public $incrementing = true;
	
	public $timestamps = false;
	
	protected $guarded = ['id'];
}
