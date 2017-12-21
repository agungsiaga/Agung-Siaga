<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Volunteer extends Authenticatable
{
	protected $table = 'tb_volunteer';
	public $timestamps = false;
	public $incrementing = false;
	protected $fillable = [
		'id', 'full_name', 'address', 'age', 'identity_number', 'phone_number', 'email', 'password', 'description', 'activate_status', 'photo', 'thumbnail'
	];
}
