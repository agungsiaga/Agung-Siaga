<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Campaign extends Authenticatable
{
    protected $table = 'tb_campaign';
	public $timestamps = false;
	public $incrementing = false;
	protected $fillable = [
		'id', 'campaign_name', 'id_volunteer', 'description', 'campaign_image', 'campaign_thumb', 'collected_donation', 'target_donation', 'activate_status'
	];
}
