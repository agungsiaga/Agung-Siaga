<?php

namespace App\Http\Controllers\Volunteer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Volunteer;

class DashboardController extends Controller
{
	public function __construct(){
		$this->middleware('volunteer');
	}
    public function index(){
    	$volunteer = Volunteer::all()->count();
    	return view('');
    }
}