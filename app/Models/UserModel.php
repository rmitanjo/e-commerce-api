<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserModel extends Authenticatable
{
	use HasApiTokens, Notifiable;
	
	protected $table = 'users';
	
	protected $guarded = ['id'];
	
	protected $primaryKey = 'id';
	
	protected $hidden = ['password', 'remember_token', 'email_verified_at'];
	
	/*
	public $timestamps = false;
	*/
}
