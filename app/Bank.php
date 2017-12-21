<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Bank extends Authenticatable
{
    protected $table = 'tb_bank';
	public $timestamps = false;
	public $incrementing = false;
	protected $fillable = [
		'id', 'bank_name'
	];
}
