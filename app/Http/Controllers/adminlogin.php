<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Hash;
use Session;
use Auth;
use Mail;
use DB;
use Validator;
use App\Mail\Passwordcode;

class adminlogin extends Controller
{
    //
   public function getAdminlogin(){
     	return view('admin.login');
   } 

   public function postAdminlogin(Request $request){
   	$email= $request->get('email');
   	$password= $request->get('password');
   	if(Auth::attempt(['email'=>$email,'password'=>$password])){
    	return redirect('admin');
    }
    else{
        return redirect('admin/login')->with('success_message','Email and Password do not match');
    }

   }

   public function getLogout(){
   	Auth::logout();
   	return redirect('admin/login')->with('success_message','You have been succesfully logged out');
   }

  public function getForgotpassword(){
    return view('admin.forgotpassword');
  }

  public function postCode(Request $request){
    $email=$request->get('email');
    $token=mt_rand(1000,9999);
    $data=DB::table('users')->where('email','=',$email)->first();

    if(!empty($data)){
      DB::select("UPDATE users SET reset_code='$token' WHERE email='$email'");
      $array=array('token'=>$token,'email'=>$email);
      mail::send('mail.resetpasword',$array,function($message) use ($array){
        $message->to($array['email'])->from('imniraj555@gmail.com')->subject('Please click the link and enter the provided code to reset your password');
      });
      return view('admin.changepassword',array('result'=>$email))->with('success_message','Please check your email');
    }
    else{
      return back()->with('success_message','Link has been provided tou your email.Please check your email'); 
    }

  }

  public function postCheckcode(Request $request){
    $code=$request->get('code');
    $email=$request->get('email');

    //dd($email);
    $check=DB::table('users')->where('reset_code','=',$code)->where( 'email','=',$email)->first();

    

     if(!empty($check)){
      return view('admin.password',array('result'=>$email));
     }
  }

  public function postNewpassword(Request $request){
   
    $password=Hash::make($request->get('password'));
    $password2=Hash::make($request->get('confirm_password'));
    $email=$request->get('email');
    DB::select("UPDATE users SET password='$password' WHERE email='$email'");
     DB::select("UPDATE users set reset_code=NULL where email='$email' ");
     return redirect('admin/login')->with('success_message','Your password has been succesfully changed');
  }

}
