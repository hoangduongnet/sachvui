<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function register(RegisterFormRequest $request)
    {
        $user = new User();
        $user->name = $request->get('username');
        $user->username = $request->get('username');
        $user->password = bcrypt($request->get('password'));
        $user->email = $request->get('email');

        $user->save();

        return view('user.register_success');
    }
}
