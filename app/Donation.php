<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'tb_donation';
	public $timestamps = false;
	public $incrementing = false;
	protected $fillable = [
		'id', 'bank_id', 'campaign_id', 'amount_transfer', 'email', 'donator_name', 'phone_number', 'verified_status', 'description'
	];
}
