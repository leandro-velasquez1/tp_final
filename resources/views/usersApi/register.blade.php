@extends('layouts.template')
@section('title') Registrar @endsection

@section('content')
    <section class="section-register">
        <h2 class="section-register__title">Registrar</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="section-register__list-errors">
                @foreach ($errors->all() as $error)
                    <li class="section-register__item-error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="form-register" action="/registrar" method="POST">
            @csrf
            <div class="form-register__div">
                <label class="form-register__label" for="">Username</label>
                <input class="form-register__input" type="text" name="username">
            </div>
            <div class="form-register__div">
                <label class="form-register__label" for="">Email</label>
                <input class="form-register__input" type="email" name="email">
            </div>
            <div class="form-register__div">
                <label class="form-register__label" for="">Password</label>
                <input class="form-register__input" type="password" name="password">
            </div>
            <div class="form-register__div">
                <label class="form-register__label" for="">Repeat password</label>
                <input class="form-register__input" type="password" name="password_confirmation">
            </div>
            <button class="form-register__button">Registrar</button>
        </form>
    </section class="section-register">
@endsection