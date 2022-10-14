@extends('layouts.template')
@section('title') Registrar @endsection

@section('content')
    <h2>Registrar</h2>
    <form action="">
        <div>
            <label for="">Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="">Repeat password</label>
            <input type="password" name="repeat_password">
        </div>
        <button>Registrar</button>
    </form>
@endsection