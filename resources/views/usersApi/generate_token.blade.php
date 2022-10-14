@extends('layouts.template')
@section('title') Generar token @endsection

@section('content')
    <h2>Generar token</h2>
    <form action="">
        <div>
            <label for="">Username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name="password">
        </div>
        <button>Solicitar token</button>
    </form>
@endsection