<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(){
        return view('dashboard.users.login');
    }

    public function dologin(Request $request){

        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(!auth()->guard('user')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
            return back();
        }else{
            return redirect(route('dashboard.index'));
        }

    }

    // public function logout(){
    //     auth()->guard('user')->logout();
    //     return redirect(route('login'));
    // }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
