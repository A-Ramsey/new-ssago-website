@extends('layouts.master')

@section('title', 'Edit Personal Details')

@section('content')
    <x-back-button title="Dashboard" link="{{ route('dashboard') }}" />
    <x-forms.form name="update-form" title="Edit Personal Details" action="edit">
        <x-forms.input name="name" title="Name" is-required="true" value="{{ auth()->user()->name }}" />
        <x-forms.input name="email" title="Email" is-required="true" value="{{ auth()->user()->email }}" />
        <x-forms.button name="update-account" title="Update" />
    </x-forms.form>
@endsection