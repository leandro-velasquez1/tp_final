<?php

namespace App\Http\Controllers;

use App\Models\PageUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create() {
        return view('usersApi.register');
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'username' => 'required|regex:/^[\w-]*$/|max:100|unique:page_users,username',
            'email' => 'required|email:rfc|max:255|unique:page_users,email',
            'password' => 'required|confirmed|min:3|max:120',
        ]);

        $pageUser = new PageUser();
        $pageUser->username = $request->input('username');
        $pageUser->email = $request->input('email');
        $pageUser->password = Hash::make($request->input('password'));
        $pageUser->save();
        return redirect('')->with('status', 'Se registro con exito, genere un token para poder consumir la API');
    }
}
