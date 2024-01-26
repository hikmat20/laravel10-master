<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function register()
    {
        return view('login.register');
    }

    public function register_process(Request $request)
    {
        /*  User::create($request->all())map([
            'full_name' =>$request->post('full-name')
         ]); */
        return redirect()->route('signin')->with('success', 'Product created successfully.');
    }
}
