<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bank;
use App\DonationPosts;
use Yajra\Datatables\Datatables;


class BankController extends Controller
{
	public function __construct(){
		$this->middleware('admin');
	}

	public function index(){
    	return view('dashboard/bank');
    }

    public function add(){
    	return view('dashboard/add_bank');
    }

    public function edit($id){
        if(Bank::where('id', $id)->count() > 0){
            $bank = Bank::where('id', $id)->first();
            return view('dashboard/edit_bank', compact('bank'));
        }
        return redirect('/panel/administrator/bank');
    }

    public function addProcess(Request $req){
        $data = array('bank_name' => $req->input('bank_name'));
        $check = Bank::where('bank_name', $req->input('bank_name'))->count();
        if($check > 0){
            $message = 'The bank already exists!';
            $alert = 'error';
            $notification = array(
                'message' => $message, 
                'alert-type' => $alert
            );
        }else{
            $message = 'Successfully add the bank!';
            $alert = 'success';
            Bank::insert($data);
            $notification = array(
                'message' => $message, 
                'alert-type' => $alert
            );
        }
        
        return redirect('/panel/administrator/bank')->with($notification);
    }

    public function dataBank(){
        $banks = Bank::all();
        return Datatables::of($banks)
        ->addColumn('action', function ($banks) {
            return '<a href="/panel/administrator/edit_bank/'.$banks->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="/panel/administrator/delete_bank/'.$banks->id.'" class="btn btn-xs btn-danger" onclick="if (confirm(\'Delete ?\')) return true; return false"><i class="glyphicon glyphicon-remove"></i> Delete</a>
            ';
        })
        ->make(true);
    }

     public function editProcess(Request $req){
        $id = $req->input('id');
        $check_id = Bank::where('id', $id)->count() == 0;
        if($check_id){
            $message = 'Sorry, the bank is not exists!';
            $alert = 'error'; 
        }else{
            $data = array(
                'bank_name' => $req->input('bank_name'),
            );
            $message = 'Successfully edited the bank!';
            $alert = 'success';
            Bank::where('id', $id)->update($data);
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/edit_bank/' . $id)->with($notification);
    }

    public function deleteProcess($id){
        $check_id = Bank::where('id', $id)->count() == 0;
        if($check_id){
            $message = 'Sorry, the bank is not exists!';
            $alert = 'error';
        }else{
            $message = 'Successfully deleted the bank!';
            $alert = 'success';
            Bank::where('id', $id)->delete();
        }
        $notification = array(
            'message' => $message, 
            'alert-type' => $alert
        );
        return redirect('/panel/administrator/bank')->with($notification);
    }
}
