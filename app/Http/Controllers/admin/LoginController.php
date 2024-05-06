<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index (){
        return view('admin.login');
    }


    public function logout(){
        Auth::logout();

        return redirect()->route('admin.login');
    }

}
