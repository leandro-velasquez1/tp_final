@extends('layouts.template')
@section('title') Generar token @endsection

@section('content')
    <section class="section-register section-generate-token">
        <h2 class="section-register__title">Generar token</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="section-register__list-errors">
                @foreach ($errors->all() as $error)
                    <li class="section-register__item-error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @isset($error_invalid)
            <p class="section-register__error_invalid">{{$error_invalid}}</p>
        @endisset
        <form class="form-register" action="/generar-token" method="POST">
            @csrf
            <div class="form-register__div">
                <label class="form-register__label" for="">Username</label>
                <input class="form-register__input" type="text" name="username">
            </div>
            <div class="form-register__div">
                <label class="form-register__label" for="">Password</label>
                <input class="form-register__input" type="password" name="password">
            </div>
            <button class="form-register__button">Solicitar token</button>
        </form>
    </section>
@endsection