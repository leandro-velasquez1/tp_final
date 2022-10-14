<?php

namespace App\Http\Controllers;

use App\Models\PageUser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('usersApi.register');
    }

    public function store(Request $request) {
        $pageUser = new PageUser();
        $pageUser->username = $request->input('username');
        $pageUser->email = $request->input('email');
        $pageUser->password = $request->input('password');
        $pageUser->save();
        return '';
    }
}
