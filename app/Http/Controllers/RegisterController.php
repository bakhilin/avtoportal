<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect()->to(route('user.private'));
        }


        $validateFields = $request->validate([
            'email' => 'required|email|min:4|max:100',
            'phone' => 'required|min:7|max:13',
            'name' => 'required|min:10|max:100',
            'password' => 'required|min:8|max:100'
        ]);


        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }

        $user = User::create($validateFields);
        if ($user) {
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->password = $request->input('password');

            Auth::login($user);

            return redirect()->to(route('user.private'));
        }
    }
}
