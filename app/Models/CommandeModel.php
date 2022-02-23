<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeModel extends Model
{
    protected $table = 't_commande';
	
	protected $primaryKey = 'id';
	
	//public $incrementing = true;
	
	public $timestamps = false;
	
	protected $guarded = ['id'];
}
