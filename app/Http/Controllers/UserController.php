<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
{
    $token = session('token');
    if ($token) {
        if (!$this->is_token_expired($token)) {
            $user_details = Auth::user(); // Get authenticated user
            $blogs_count = DB::table('blogs')->count();
            $donations_count = DB::table('dontations')->where('status', 'completed')->count();
            $amt_donated = DB::table('dontations')->where('status', 'completed')->sum('amount');

            return view('admin.index', [
                'user_details' => $user_details,
                'blog_count' => $blogs_count,
                'amt_donated' => $amt_donated,
                'donations_count' => $donations_count,
            ]);
        }
    }

    Auth::logout();
    return redirect()->route('login')->with('message', 'Session has expired. Please log in again.');
}



    public function show(){
        return view('admin.login');
    }

    public function login(Request $request){
        $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:8'
        ]);

        

        if(!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return back()->with('message','Invaild Credentials'); 
          }

          $user=Auth::user();
          $token = $this->create_token($user);
          if($token){
            // session(['token'=>$token]);
            session()->put('token',$token);
              return redirect()->route('admin.dashboard');
          }else{
              return back()->with('message','Invaild Credentials');
          }
        

    }

    public function create_token($user){
        return JWTAuth::fromUser($user);
      }

      public function decode_token($token)
      {
          try {
              return JWTAuth::setToken($token)->getPayload();
          } catch (JWTException $e) {
              return null;
          }
      }
      
    
    public function logout()
    {
        Auth::logout();
        $token = session('token');
        session()->forget('token');
        return redirect()->route('login')->with('message', 'Logged out successfully');
    }
    

    private function is_token_expired($token)
    {
        try {
            $decoded_token = JWTAuth::setToken($token)->getPayload();
            if ($decoded_token->get('exp')) {
                return $decoded_token->get('exp') < time();
            }
        } catch (JWTException $e) {
            return true;
        }
        return true;
    }

    public function admin_profile(){
        $token=session('token');
       if($token){
        $user_details = Auth::user(); 
       }
        return  view('admin.profile',['user_details'=>$user_details]);
    }
}
