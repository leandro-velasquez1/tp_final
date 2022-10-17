<?php

namespace App\Http\Controllers;

use App\Models\AccessUserTokenPage;
use App\Models\PageUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function index() {
        return view('usersApi.generate_token');
    }

    public function generateToken(Request $request) {
        $validate = $request->validate([
            'username' => 'required|regex:/^[\w-]*$/|max:100|exists:page_users,username',
            'password' => 'required||min:3|max:120',
        ]);
        $register = PageUser::where('username', $request->input('username'))->first();

        if(Hash::check($request->input('password'), $register->password)) {
            if($data = AccessUserTokenPage::where('page_user_id', $register->id)->first()) {
                $data->token = Str::random(32);
                $data->save();
                return redirect('')->with('status', 'Su token es: ' . $data->token . ', puede utilizarlo para consumir la API');
            }
            $userToken = new AccessUserTokenPage();
            $userToken->page_user_id = $register->id;
            $userToken->token = Str::random(32);
            $userToken->save();
            return redirect('')->with('status', 'Su token es: ' . $userToken->token . ', puede utilizarlo para consumir la API');
        }
        return view('usersApi.generate_token', ['error_invalid'=>'El nombre de usuario o la contraseña es incorrecto']);
    }
}
