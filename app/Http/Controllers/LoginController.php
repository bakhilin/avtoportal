<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\IFTTTHandler;
use const http\Client\Curl\AUTH_ANY;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->email != 'bahilinvit@mail.ru')
                return redirect()->to(route('user.private'));

            return redirect()->to(route('admin'));
        }

        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)) {
            if (Auth::user()->email != 'bahilinvit@mail.ru')
                return redirect()->intended('private');
            return redirect()->intended('admin');
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизоваться'
        ]);
    }
}
