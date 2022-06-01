<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index($name = null){
        return view('auth.login');
    }

    public function login_submit(Request $req){
        $validateData = $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:20'
        ]);
        $email=$req->input('email');
        $password=$req->input('password');

        return 'email id: '. $email .', password is: ' .$password;
    }
}
