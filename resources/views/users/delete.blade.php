@extends('layouts.master')

@section('title', 'Delete Account')

@section('content')
    <x-back-button title="Dashboard" link="{{ route('dashboard') }}" />
    <x-forms.form name="delete-account" title="Delete Account" action="delete">
        <p>Confirm you want to delete your account. This cannot be undone.</p>
        <x-forms.button name="delete-button" title="Delete Account" is-danger="true" is-submit="true" />
    </x-forms.form>
@endsection