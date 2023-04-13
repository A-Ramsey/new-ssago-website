@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Your Dashboard</h1>
    <div class="d-flex justify-content-left">
        <x-button link="{{ route('users.edit') }}" title="Edit Personal Details" />
        <x-button link="{{ route('users.delete') }}" title="Delete Account" />
    </div>
@endsection