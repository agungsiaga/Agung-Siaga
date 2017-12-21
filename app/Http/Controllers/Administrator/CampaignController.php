<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Campaign;
use Yajra\Datatables\Datatables;
use Image;

class CampaignController extends Controller
{
    public function __construct(){
		$this->middleware('admin');
	}

    public function index(){
    	return view('dashboard/list_campaign');
    }

    public function add(){
    	return view('dashboard/add_campaign');
    }

    public function edit($id){
        if(Campaign::where('id', $id)->count() > 0){
            $campaign = Campaign::where('id', $id)->first();
            return view('dashboard/edit_campaign', compact('campaign'));
        }
        return redirect('/panel/administrator/list_campaign');
    }

    public function dataCampaign(){
        $campaign = Campaign::select(['tb_campaign.id AS id', 'tb_volunteer.full_name AS full_name', 'tb_campaign.campaign_name AS campaign_name', 'tb_campaign.collected_donation AS collected_donation', 'tb_campaign.target_donation AS target_donation', 'tb_campaign.activate_status AS activate_status'])
        ->join('tb_volunteer', 'tb_campaign.id_volunteer', '=', 'tb_volunteer.id')
        ->where('tb_campaign.activate_status', '!=', '0');
        return Datatables::of($campaign)
        ->addColumn('action', function ($campaign) {
            return '<a href="/detail-campaign/'.$campaign->id.'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</a>
            <a href="/panel/administrator/edit_campaign/'.$campaign->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="/panel/administrator/delete_campaign/'.$campaign->id.'" class="btn btn-xs btn-danger" onclick="if (confirm(\'Delete ?\')) return true; return false"><i class="glyphicon glyphicon-remove"></i> Delete</a>
            ';
        })
        ->addColumn('percentage', function ($campaign) {
        	$total = round(($campaign->collected_donation / $campaign->target_donation) * 100);
        	if($total > 100){
        		$total = 100;
        	}
            return $total . "%";
        })
        ->make(true);
    }

    public function deleteProcess($id){
        $check_id = Campaign::where('id', $id)->count() == 0;
        if($check_id){
            $message = 'Sorry, the campaign is not exists!';
            $alert = 'error';
        }else{
            $message = 'Successfully deleted the campaign!';
            $alert = 'success';
            Campaign::where('id', $id)->delete();
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/list_campaign')->with($notification);
    }

    public function uploadThumb($fileName){
        $thumbName = "thumb_" . $fileName;
        Image::make('/uploads/' . $fileName , array(
            'width' => 160,
            'height' => 160
         ))->save('uploads/' . $thumbName);
        return $thumbName;
    }

    public function upload($photo) {
        // getting all of the post data
        $file = array('image' => $photo);
        // setting up rules
        $rules = array('file'=>'max:100'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        /*$validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            //return Redirect::to('upload')->withInput()->withErrors($validator);
            return response()->json($validator);
        }
        else {*/
            // checking file is valid.
           /*if ($photo[0]->isValid()) {*/
            $destinationPath = 'uploads'; // upload path
            $extension = $photo->getClientOriginalExtension(); // getting image extension
                if($extension === "jpg"||$extension === "jpeg"|| $extension === "png"|| $extension === "bmp") {
                    $fileName = md5(rand(11111,99999).rand(11111,99999)) . '.' .$extension; // renameing image
                    $photo->move($destinationPath, $fileName); // uploading file to given path
                    // sending back with message
                // Session::flash('success', 'Upload successfully'); 
                    //return Redirect::to('upload');
                    //$this->uploadThumb($fileName);
                    return $fileName;
                }

            /*} else {
            // sending back with error message.
            Session::flash('error', 'uploaded file is not valid');
            return Redirect::to('upload');
            }
        }*/
    }

    /*
    public function addCampaign(Request $req){
        $id = $req->input('id');
        $donation = explode("Rp. ", $req->input('target_donation'))[1];
        $donation = preg_replace('/\./', '', $donation);
        $check_id = Campaign::where('id', $id)->count() == 0;
        $pic = $this->upload($req->file('campaign_image'));
        $data = array(
            'campaign_name' => $req->input('campaign_name'),
            'id_volunteer' => $req->input('volunteer'),
            'description' => $req->input('description'),
            'campaign_name' => $req->input('campaign_name'),
            'campaign_image' => $pic,
            'campaign_thumb' => $this->uploadThumb($pic),
            'target_donation' => $donation,
            'activate_status' => $req->input('activate_status'));
        $message = 'Successfully edited the campaign!';
        $alert = 'success';
        Campaign::insert($data);
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/list_campaign/')->with($notification);
    }*/

    public function editProcess(Request $req){
        $id = $req->input('id');
        $donation = explode("Rp. ", $req->input('target_donation'))[1];
        $donation = preg_replace('/\./', '', $donation);
        $check_id = Campaign::where('id', $id)->count() == 0;
        if($check_id){
            $message = 'Sorry, the campaign is not exists!';
            $alert = 'error'; 
        }else{
            $data = array(
                'campaign_name' => $req->input('campaign_name'),
                'description' => $req->input('description'),
                'target_donation' => $donation,
                'activate_status' => $req->input('activate_status')
            );
            $pic = $req->file('campaign_image');
            /*echo $pic;*/
            if(!empty($pic)){
                $pic = $this->upload($pic);
                $data['campaign_image'] = $pic;
                $data['campaign_thumb'] = $this->uploadThumb($pic);
            }
            $message = 'Successfully edited the campaign!';
            $alert = 'success';
            Campaign::where('id', $id)->update($data);
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/edit_campaign/' . $id)->with($notification);
    }

    public function indexRequested(){
        return view('dashboard/list_campaign_requested');
    }

    public function dataCampaignRequested(){
        $campaign = Campaign::select(['tb_campaign.id AS id', 'tb_volunteer.full_name AS full_name', 'tb_campaign.campaign_name AS campaign_name', 'tb_campaign.collected_donation AS collected_donation', 'tb_campaign.target_donation AS target_donation', 'tb_campaign.activate_status AS activate_status'])
        ->join('tb_volunteer', 'tb_campaign.id_volunteer', '=', 'tb_volunteer.id')
        ->where('tb_campaign.activate_status', '==', '0');
        return Datatables::of($campaign)
        ->addColumn('action', function ($campaign) {
            return '<a href="/panel/administrator/view_campaign_requested/'.$campaign->id.'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</a>
            <a href="/panel/administrator/delete_campaign/'.$campaign->id.'" class="btn btn-xs btn-danger" onclick="if (confirm(\'Delete ?\')) return true; return false"><i class="glyphicon glyphicon-remove"></i> Delete</a>
            ';
        })
        ->addColumn('percentage', function ($campaign) {
            $total = round(($campaign->collected_donation / $campaign->target_donation) * 100);
            if($total > 100){
                $total = 100;
            }
            return $total . "%";
        })
        ->make(true);
    }

    
    public function viewCampaignRequested($id){
        $check_id = Campaign::where('id', $id)->where('activate_status', '!=', '1')->count() == 0;
        if($check_id){
            $message = 'Sorry, the requested campaign is not exists!';
            $alert = 'error';
            $notification = array(
            'message' => $message, 
            'alert-type' => $alert
            );
            return redirect('/panel/administrator/list_campaign/')->with($notification);
        }else{
            $campaignRequested = Campaign::select(['tb_campaign.id', 'tb_campaign.target_donation', 'tb_campaign.description', 'tb_campaign.campaign_image', 'tb_volunteer.full_name'])
            ->join('tb_volunteer', 'tb_campaign.id_volunteer', '=', 'tb_volunteer.id')
            ->where('tb_campaign.id', $id)
            ->where('tb_campaign.activate_status', '==', '0')->first();
            return view('dashboard/view_campaign_requested', compact('campaignRequested'));
        }
    }

    public function confirmRequest($id){
        $check_id = Campaign::where('id', $id)->count() == 0;
        if($check_id){
            $message = 'Sorry, the requested campaign is not exists!';
            $alert = 'error';
        }else{
            $data = array('activate_status' => '1');
            $message = 'Successfully confirmed the campaign!';
            $alert = 'success';
            Campaign::where('id', $id)->update($data);
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/list_campaign/')->with($notification);
        
    }

}
