@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <x-forms.form name="login" title="Login" action="login">
        <p>Dont have an account register <a href="{{ route('register') }}">here</a></p>
        <x-forms.input name="email" title="Email" is-required="true" />
        <x-forms.input name="password" title="Password" is-password="true" is-required="true" />
        <x-forms.button name="login" title="Login" />
    </x-forms.form>
@endsection