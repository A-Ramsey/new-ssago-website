@extends('layouts.master')

@section('title', 'Admin')

@section('content')
    <h1>{{ $exec->name }}</h1>
    <x-committee-table :committee="$exec" />
    <h1>{{ $assistants->name }}</h1>
    <x-committee-table :committee="$assistants" />
@endsection