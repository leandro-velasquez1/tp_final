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

    public function update(Request $request) {
        if($request->hasHeader('X-Auth')) {
            if(AccessUserTokenPage::where('token', $request->header('X-Auth'))->first()) {
                if($person = RegisterPeople::find($request->input('id'))) {
                    foreach($request->all() as $key=>$value) {
                        if($key != 'id') {
                            $person->$key = $value;
                        }
                    }
                    $person->save();
                    return response(['id'=>$person->id], 200)->header('Content-Type', 'application/json');
                }else {
                    return response(['error'=>'No se encontro ninguna persona con ese id'], 404)->header('Content-Type', 'application/json');
                }
            }
            return response(['error'=>'Token no valido'], 401)->header('Content-Type', 'application/json');
        }
        return response(['error'=>'Falta token de acceso'], 400)->header('Content-Type', 'application/json');
    }

    public function delete(Request $request) {
        if($request->hasHeader('X-Auth')) {
            if(AccessUserTokenPage::where('token', $request->header('X-Auth'))->first()) {
                if($person = RegisterPeople::find($request->input('id'))) {
                    $person->delete();
                    return response(['id'=>$person->id], 200)->header('Content-Type', 'application/json');
                }else {
                    return response(['error'=>'No se encontro ninguna persona con ese id'], 404)->header('Content-Type', 'application/json');
                }
            }
            return response(['error'=>'Token no valido'], 401)->header('Content-Type', 'application/json');
        }
        return response(['error'=>'Falta token de acceso'], 400)->header('Content-Type', 'application/json');
    }
}
