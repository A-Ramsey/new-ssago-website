@extends('layouts.master')

@section('title', "$event->name Committee")

@section('content')
    <x-back-button link="{{ route('events.show', ['eventId' => $event->id ]) }}" title="Event" />
    <h1>{{ $event->name }} Committee</h1>
    <x-committee-table :committee="$event->committee" />
@endsection