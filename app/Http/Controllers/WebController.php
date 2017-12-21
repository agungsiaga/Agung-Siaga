<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campaign;
use App\Bank;
use App\DonationPosts;
use App\Donation;
use DB;

class WebController extends Controller
{
	public function __construct(){
		$this->middleware('web');
	}

	public function index(){
		$campaign = Campaign::where('activate_status', '=', '1')->limit(3)->get();
    	return view('web/index', compact('campaign'));
    }

    public function indexAboutUs(){
        return view('web/aboutus');
    }

    public function indexContactUs(){
        return view('web/contact');
    }

    public function indexDetailCampaign($id){
        $campaign = Campaign::where('id', $id)->get();
        return view('web/detail_campaign', compact('campaign'));
    }

    public function indexMap(Request $req){
    	$address = $req->query('address');
    	$lat = $req->query('lat');
    	$lng = $req->query('lng');
    	$nearest = $this->findNearest($lat, $lng);
    	return view('web/map', compact('address', 'lat', 'lng', 'nearest'));
    }

    public function findNearest($lat, $lng){
        $find = DonationPosts::select(DB::raw('
            lat, lng, address, ( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( lat ) ) ) ) AS distance'))             
        ->havingRaw('distance < 25')
        ->orderBy('distance')
        ->get();
        return $find;
    }

    public function indexDonate($id){
        $banks = Bank::all();
        return view('web/donate', compact('id', 'banks'));
    }

    public function processDonate(Request $req){
        $campaign_id = $req->input('campaign_id');
        $firstName = $req->input('first_name');
        $lastName = $req->input('last_name');
        $donator_name = $firstName . " " . $lastName;
        $bank_id = $req->input('bank_id');
        $amount_transfer = explode("Rp. ", $req->input('amount'))[1];
        $amount_transfer = preg_replace('/\./', '', $amount_transfer);
        $email = $req->input('email');
        $phone_number = $req->input('phone_number');
        $description = $req->input('description');
        $invoice_code = str_random(8);
        $unique_number = rand(0, 9) . rand(0, 9) . rand(0, 9);
        $data = array(
            'invoice_code' => $invoice_code,
            'bank_id' => $bank_id,
            'campaign_id' => $campaign_id,
            'amount_transfer' => $amount_transfer,
            'email' => $email,
            'donator_name' => $donator_name,
            'phone_number' => $phone_number,
            'verified_status' => '1',
            'unique_number' => $unique_number,
            'total_transfer' => $amount_transfer + $unique_number,
            'description' => $description
        );
        $check = Donation::insert($data);
        $campaign = Campaign::where('id', $campaign_id)->get();
        $date = array(
            'now' => date("D, d/m/Y"), 
            'tomorrow' => date("D, d/m/Y", strtotime("tomorrow"))
        );
        $amounts = array(
            'amount_transfer' => $amount_transfer,
            'unique_number' => $unique_number,
            'total_transfer' => $amount_transfer + $unique_number
        );
        if($check){
            $collected_update = $campaign[0]->collected_donation + $amount_transfer;
            $collected_data = array(
                'collected_donation' => $collected_update
            );
            Campaign::where('id', $campaign_id)->update($collected_data);
            return view('web/invoice', compact('data', 'campaign', 'date', 'amounts', 'invoice_code'));
        }
    }

    public function indexCampaigns(){
        $campaigns = Campaign::where('activate_status', '=', '1')->get();
        return view('web/campaigns', compact('campaigns'));
    }
}
