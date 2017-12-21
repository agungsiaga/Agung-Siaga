<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class DonationPosts extends Authenticatable
{
    protected $table = 'tb_donation_posts';
	public $timestamps = false;
	public $incrementing = false;
	protected $fillable = [
		'id', 'posts_name', 'address', 'age', 'lat', 'lng'
	];
}
