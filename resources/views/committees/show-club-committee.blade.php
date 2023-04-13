@extends('layouts.master')

@section('title', "$club->name Committee")

@section('content')
    <x-back-button link="{{ route('clubs.show', ['id' => $club->id ]) }}" title="Club" />
    <h1>{{ $club->name }} Committee</h1>
    <x-committee-table :committee="$club->committee" />
@endsection