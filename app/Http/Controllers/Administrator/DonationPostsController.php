<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Volunteer;
use App\DonationPosts;
use Yajra\Datatables\Datatables;
use DB;


/* 
SELECT address, lat, lng, SQRT( POW(69.1 * (lat - (-8.689422)), 2) + POW(69.1 * ((115.223831) - lng) * COS(lat / 57.3), 2)) AS distance FROM tb_donation_posts HAVING distance < 2 ORDER BY distance 
*/

class DonationPostsController extends Controller
{
    public function __construct(){
		$this->middleware('admin');
	}
    
    public function index(){
    	return view('dashboard/donationposts');
    }

    public function add(){
    	return view('dashboard/add_donation_posts');
    }

    public function indexMap($startLat, $startLng, $destLat, $destLng){
        return view('dashboard/nearest_map', compact('startLat', 'startLng', 'destLat', 'destLng'));
    }

    public function edit($id){
        if(DonationPosts::where('id', $id)->count() > 0){
            $donationposts = DonationPosts::where('id', $id)->first();
            return view('dashboard/edit_donation_posts', compact('donationposts'));
        }
        return redirect('/panel/administrator/donation_posts');
    }

    public function dataDonationPosts(){
        $donationposts = DonationPosts::all();
        return Datatables::of($donationposts)
        ->addColumn('action', function ($donationposts) {
            return '<a href="/map?lat='.$donationposts->lat.'&lng='.$donationposts->lng.'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</a>
            <a href="/panel/administrator/edit_donation_posts/'.$donationposts->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="/panel/administrator/delete_donation_posts/'.$donationposts->id.'" class="btn btn-xs btn-danger" onclick="if (confirm(\'Delete ?\')) return true; return false"><i class="glyphicon glyphicon-remove"></i> Delete</a>
            ';
        })
        ->make(true);
    }

    public function addProcess(Request $req){
        $check_lat = DonationPosts::where('lat', $req->input('lat'))->count() != 0;
        $check_lng = DonationPosts::where('lng', $req->input('lng'))->count() != 0;
        
        if($check_lat && $check_lng){
            $message = 'Sorry, the place already exists!';
            $alert = 'error';
            $notification = array(
                'message' => $message, 
                'alert-type' => $alert
            );
            return redirect('/panel/administrator/add_donation_posts')->with($notification);
        }else{
            $data = array(
                'posts_name' => $req->input('posts_name'),
                'address' => $req->input('address'),
                'lat' => $req->input('lat'),
                'lng' => $req->input('lng')
            );
            $message = 'Successfully add the posts!';
            $alert = 'success';
            DonationPosts::insert($data);
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/donation_posts')->with($notification);  
    }

    public function editProcess(Request $req){
        $id = $req->input('id');
        $check_id = DonationPosts::where('id', $id)->count() == 0;
        if($check_id){
            $message = 'Sorry, the place is not exists!';
            $alert = 'error'; 
        }else{
            $data = array(
                'posts_name' => $req->input('posts_name'),
                'address' => $req->input('address'),
                'lat' => $req->input('lat'),
                'lng' => $req->input('lng')
            );
            $message = 'Successfully edited the place!';
            $alert = 'success';
            DonationPosts::where('id', $id)->update($data);
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/edit_donation_posts/' . $id)->with($notification);
    }

    public function deleteProcess($id){
        $check_id = DonationPosts::where('id', $id)->count() == 0;
        if($check_id){
            $message = 'Sorry, the place is not exists!';
            $alert = 'error';
        }else{
            $message = 'Successfully deleted the place!';
            $alert = 'success';
            DonationPosts::where('id', $id)->delete();
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/donation_posts')->with($notification);
    }


    /* For testing only - find nearest posts */

    public function indexNearest(){
        return view('dashboard/find_nearest_posts');
    }

    public function findNearest(Request $req){
        $lat = $req->input('lat');
        $lng = $req->input('lng');
        $find = DonationPosts::select(DB::raw('
            lat, lng, address, ( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( lat ) ) ) ) AS distance'))
                                     
        ->havingRaw('distance < 25')
        ->orderBy('distance')
        ->get();
        return json_encode($find);
    }
}
