@extends('layouts.master')

@section('title', 'Register User')

@section('content')
    <x-forms.form name="registration-form" title="Register User" action="register">
        <x-forms.input name="name" title="Name" is-required="true" />
        <x-forms.input name="email" title="Email" is-required="true" />
        <x-forms.select name="club" title="Club" :items='$clubs' is-required="true" />
        <x-forms.input name="password" title="Password" is-password="true" is-required="true" />
        <x-forms.input name="repeat-password" title="Re-enter Password" is-password="true" is-required="true" />
        <x-forms.button name="create-account" title="Create Account" />
    </x-forms.form>
@endsection