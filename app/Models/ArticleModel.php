<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class ArticleModel extends Model
{
    protected $table = 't_article';
	
	protected $primaryKey = 'id';
	
	//public $incrementing = true;
	
	//public $timestamps = true;
	
	protected $guarded = ['id'];
}
