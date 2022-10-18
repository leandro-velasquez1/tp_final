<?php

namespace App\Http\Controllers;

use App\Models\AccessUserTokenPage;
use App\Models\RegisterPeople;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function getAll(Request $request) {
        $data = RegisterPeople::all();
        if($request->hasHeader('X-Auth')) {
            if(AccessUserTokenPage::where('token', $request->header('X-Auth'))->first()) {
                return response($data, 200)->header('Content-Type', 'application/json');
            }
            return response(['error'=>'Token no valido'], 401)->header('Content-Type', 'application/json');
        }
        return response(['error'=>'Falta token de acceso'], 400)->header('Content-Type', 'application/json');
    }

    public function store(Request $request) {
        if($request->hasHeader('X-Auth')) {
            if(AccessUserTokenPage::where('token', $request->header('X-Auth'))->first()) {
                $registerPerson = new RegisterPeople();
                $registerPerson->firstname = $request->input('firstname');
                $registerPerson->lastname = $request->input('lastname');
                $registerPerson->phone_number = $request->input('phone_number');
                $registerPerson->address = $request->input('address');
                $registerPerson->save();
                return response(['id'=>$registerPerson->id], 201)->header('Content-Type', 'application/json');
            }
            return response(['error'=>'Token no valido'], 401)->header('Content-Type', 'application/json');
        }
        return response(['error'=>'Falta token de acceso'], 400)->header('Content-Type', 'application/json');
    }
}
