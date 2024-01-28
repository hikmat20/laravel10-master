<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator as ValidationValidator;

class LoginController extends Controller
{
    public function login()
    {
        if(!Auth::check()){
        return view('login.login'); 
       } else {
           return redirect()->intended('/');
       }
    }

    public function loginAuth(Request $request)
    {
        $credential = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($credential)) {
            if($request->input('remeber-me')){
                return response()->json(['success' => 'Save susscesfull'])->withCookie(Cookie::make('login', '1', 10));
            } else {
                return response()->json(['success' => 'Save susscesfull']);
            }
        } else {
            return response()->json(['error' => 'Username or Password is invalid, please try again!']);
        }

    }

    // Registration
    //============== 
    public function register()
    {
        return view('login.register');
    }

    public function registerProcess(Request $request)
    {
        $isValidated  = $this->_registerValidation($request);

        if ($isValidated['status'] == false) {
            return response()->json(['error' => $isValidated['data']]);
        } else {
            User::create($isValidated['data']);
            return response()->json(['success' => 'Save susscesfull']);
        }
    }

    private function _registerValidation($request)
    {
        $data = $request->all();
        $rules = [
            'full_name'     => 'required|max:50',
            'username'      => 'required|min:8|unique:users',
            'email'         => 'required|email|unique:users',
            'password'      => 'required',
        ];

        $validator = Validator::make($data, $rules);
        $validator->after(function (ValidationValidator $validator) {
            $data = $validator->getData();
            if ($data['username'] == $data['password']) {
                $validator->errors()->add('password', 'Password tidak boleh sama dengan usernname');
            }
        });

        try {
            $validated = $validator->validate();
            return $result = [
                'status' => true,
                'data'  => $validated
            ];
            Log::info(json_encode($result, JSON_PRETTY_PRINT));
        } catch (ValidationException $exception) {
            $message = $exception->validator->errors();
            Log::error($message->toJson(JSON_PRETTY_PRINT));
            return $result = [
                'status' => false,
                'data'  => $message
            ];
        }
    }

    /* Logout */

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
