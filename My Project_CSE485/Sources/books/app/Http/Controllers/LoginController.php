<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function authenticate(LoginFormRequest $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (auth()->attempt($credentials, true)) {
            return redirect()->route('home.index');
        }


        return redirect()->back()
            ->with('login_failed', 'Tên Đăng Nhập Hoặc Mật Khẩu Không Đúng.');
    }
}
