<?php

namespace App\Http\Controllers;

use App\RegisterPublic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function index(){
        return view('public.register');
    }
    protected function savePublicInfo($request){
        $public = new RegisterPublic();
        $public->fullname = $request->fullname;
        $public->email = $request->email;
        $public->phone = $request->phone;
        $public->address = $request->address;
        $public->password = bcrypt($request->password);
        $public->save();
        return $public;

    }
    private function savePublicTokenInfo($data){
        $data['token']=uniqid();
        $public = RegisterPublic::find($data['id']);
        $public->token = $data['token'];
        $public->save();
        return $data;
    }
    private function sendPublicMail($data){
        Mail::send('public.mails.confirmMail',$data,function ($message) use ($data){
            $message->to($data['email']);
            $message->subject('Confirmation Mail');
        });
    }
    public function register(Request $request){
        $public = $this->savePublicInfo($request);
        $data = $public->toArray();
        $data = $this->savePublicTokenInfo($data);
        $this->sendPublicMail($data);
        return back()->with('message','please check your mail for the confirmation message');

    }
    public function registerConfirmation($token){
        $public = RegisterPublic::where('token',$token)->first();
        if (!is_null($public)){
            $public->status = 1;
            $public->token = '';
            $public->save();
            return redirect('/public-register')->with('message','your registration is complete, you can login now');

        }
        else{
            return redirect('/public-register')->with('message','you are already confirmed, please login');
        }

    }

    public function login(){
        return view('public.login');
    }
    public function loginCheck(Request $request){
        $public = RegisterPublic::where('email',$request->email)->first();
        if ($public) {
            $passwordCheck = $public->password;
            if(password_verify($request->password,$passwordCheck)){
                if ($public->status == 1){
                    return redirect('/');
                }
                else{
                    return back()->with('message','please confirm  your email to login');
                }

            }else{
                return back()->with('message','password incorrect');
            }

        } else{
            return back()->with('message','please login with a valid email');
        }

    }
}
