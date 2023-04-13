@extends('layouts.master')

@section('title', 'Events')

@section('content')
    <div class="d-flex justify-content-left">
        @auth
        <x-button link="{{ route('events.create') }}" title="Create Event" />
        @endauth
    </div>
    <x-cards.card-list>
        @foreach($events as $event)
            <x-cards.event-card :event='$event' />
        @endforeach
    </x-cards.card-list>
@endsection