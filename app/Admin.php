<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'tb_admin';
	public $timestamps = false;
	public $incrementing = false;
	protected $fillable = [
		'id', 'email', 'password'
	];
}
