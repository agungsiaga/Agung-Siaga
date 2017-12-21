<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Volunteer;
use App\DonationPosts;
use Yajra\Datatables\Datatables;
use Image;

class VolunteerController extends Controller
{
    public function __construct(){
		$this->middleware('admin');
	}

    public function index(){
    	return view('dashboard/volunteers');
    }

    public function add(){
    	return view('dashboard/add_volunteer');
    }

    public function edit($id){
        if(Volunteer::where('id', $id)->count() > 0){
            $volunteer = Volunteer::where('id', $id)->first();
            return view('dashboard/edit_volunteer', compact('volunteer'));
        }
        return redirect('/panel/administrator/volunteers');
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

    public function addProcess(Request $req){
        $pic = $this->upload($req->file('profile_picture'));
        $data = array(
            'full_name' => $req->input('full_name'),
            'address' => $req->input('address'),
            'age' => $req->input('age'),
            'identity_number' => $req->input('identity_number'),
            'phone_number' => $req->input('phone_number'),
            'email' => $req->input('email'),
            'password' => bcrypt($req->input('password')),
            'description' => $req->input('description'),
            'activate_status' => $req->input('activate_status'),
            'photo' => $pic,
            'thumbnail' => $this->uploadThumb($pic)
        );
        $message = 'Successfully add the volunteer!';
        $alert = 'success';
        Volunteer::insert($data);
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/volunteer')->with($notification);
    }

    public function dataVolunteers(){
        $volunteers = Volunteer::all();
        return Datatables::of($volunteers)
        ->addColumn('action', function ($volunteers) {
            return '<a href="/'.$volunteers->id.'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</a>
            <a href="/panel/administrator/edit_volunteer/'.$volunteers->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="/panel/administrator/delete_volunteer/'.$volunteers->id.'" class="btn btn-xs btn-danger" onclick="if (confirm(\'Delete ?\')) return true; return false"><i class="glyphicon glyphicon-remove"></i> Delete</a>
            ';
        })
        ->make(true);
    }

    public function deleteProcess($id){
        $check_id = Volunteer::where('id', $id)->count() == 0;
        if($check_id){
            $message = 'Sorry, the volunteer is not exists!';
            $alert = 'error';
        }else{
            $message = 'Successfully deleted the volunteer!';
            $alert = 'success';
            Volunteer::where('id', $id)->delete();
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/volunteer')->with($notification);
    }
}
