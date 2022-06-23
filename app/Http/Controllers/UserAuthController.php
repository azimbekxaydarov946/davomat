<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserloginRequest;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function login(UserloginRequest $request)
    {
        $data = $request->validated();
        if (!auth()->attempt($data)){
            return view('auth.login');
        }
        return redirect()->route('/');
    }


}

