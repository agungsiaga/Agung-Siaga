<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Donation;
use Yajra\Datatables\Datatables;

class DonationController extends Controller
{
	public function index(){
    	return view('dashboard/list_donation');
    }

    public function dataDonation(){
        $donations = Donation::where('verified_status', '!=', '0');
        return Datatables::of($donations)
        ->addColumn('action', function ($donations) {
            return '<a href="/panel/administrator/delete_donation/'.$donations->id.'" class="btn btn-xs btn-danger" onclick="if (confirm(\'Delete ?\')) return true; return false"><i class="glyphicon glyphicon-remove"></i> Delete</a>
            ';
        })
        ->make(true);
    }

    public function dataDonationRequested(){
        $donations = Donation::where('verified_status', '!=', '1');
        return Datatables::of($donations)
        ->addColumn('action', function ($donations) {
            return '<a href="/panel/administrator/delete_donation/'.$donations->id.'" class="btn btn-xs btn-danger" onclick="if (confirm(\'Delete ?\')) return true; return false"><i class="glyphicon glyphicon-remove"></i> Delete</a>
            ';
        })
        ->make(true);
    }

    public function indexRequested(){
        return view('dashboard/list_donation_requested');
    }
}
