<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 't_user';
	
	protected $primaryKey = 'id';
	
	protected $guarded = ['id'];
	
	public $timestamps = false;
}
