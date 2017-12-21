<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Volunteer;
use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function login(){
        return view('login2');
    }

    public function proses_login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        if(auth()->guard('admin')->attempt(['email' => $email, 'password' => $password])){
            $user = auth()->guard('admin')->user();
            return redirect('/panel/administrator')->with('login', $email);
        }else if(auth()->guard('volunteer')->attempt(['email' => $email, 'password' => $password])){
            $user = auth()->guard('volunteer')->user()->activate_status;
            if($user == 1){
                return redirect('/panel/volunteer')->with('login', $email);
            }else{
                return redirect('/login')->with('login', $email);
            }
            
        }else{
            return redirect('/login');
        }
   }

   /*public function proses_daftar(){
        $data = array(
            'full_name' => 'volunteer',
            'address' => 'irawadi',
            'age' => '9',
            'identity_number' => '1231',
            'phone_number' => '1231',
            'email' => 'adminz@admin.com',
            'password' => bcrypt('admin'),
            'description' => '123',
            'activate_status' => 1
        );
        //Volunteer::insert($data);
        $data2 = array(
            'email' => 'admin@admin',
            'password' => bcrypt('admin')
        );
        Admin::insert($data2);
        return response()->json($data);
   }*/

   public function registerProcess(Request $req){
        $full_name = $req->input('first_name') . ' ' . $req->input('last_name');
        $email = $req->input('email');
        $phone_number = $req->input('phone_number');
        $activation_token = md5(rand(11111,99999).rand(11111,99999) . "agungsiaga77");
        $password = str_random(12);
        $data = array(
            'full_name' => $full_name,
            'email' => $email,
            'password' => bcrypt($password),
            'phone_number' => $phone_number,
            'identity_number' => str_random(12),
            'activation_token' => $activation_token
        );
        $insert = Volunteer::insert($data);
        $data['password'] = $password;
        Mail::send('email.message', $data, function ($message) use($email, $full_name){
          $message->sender('verification@agungsiaga.com');
          $message->to($email, $full_name);
          $message->subject('Account confirmation Agung Siaga');
        });
        if($insert){
            return json_encode(array('status' => 'success'));
        }else{
            return json_encode(array('status' => 'failed'));
        }
    }

   public function processVerifyEmail(Request $req){
        $email = $req->query('email');
        $activation_token = $req->query('activate');
        $check = Volunteer::where('email', $email)
        ->where('activation_token', $activation_token)
        ->where('activate_status', '0')->count();
        if($check){
            Volunteer::where('email', $email)->update(array('activate_status' => '1'));
            return redirect('/login');
        }else{
            return redirect('/');
        }
   }

   public function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect('/login');
   }
}
