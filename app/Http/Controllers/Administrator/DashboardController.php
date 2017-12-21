<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Volunteer;
use App\Campaign;
use App\Bank;
//use App\Donation;
use App\DonationPosts;

class DashboardController extends Controller
{
    public function __construct(){
		$this->middleware('admin');
	}
    
    public function index(){
    	$volunteer = Volunteer::all()->count();
    	$campaign = Campaign::all()->count();
    	//$donation = Donation::all()->count();
    	$donation_posts = DonationPosts::all()->count();
    	$bank = Bank::all()->count();
    	return view('dashboard/dashboard', compact('volunteer', 'campaign', 'donation', 'donation_posts', 'bank'));
    }
}
