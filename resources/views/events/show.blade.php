@extends('layouts.master')

@section('title', $event->name)

@section('content')
    <x-back-button title="Events" link="{{ route('events.index') }}" />
    <h1>{{ $event->name }}</h1>
    <h4>{{ $event->location }} - {{ $event->post_code }}</h4>
    @permission('event', $event)<h5>You are on the committee for this event</h5>@endpermission
    <p>{{ $event->description }}</p>
    @auth
    <div class="d-flex justify-content-left">
        @auth
            <x-button link="{{ route('events.committee', ['id' => $event->id])}}" title="Committee" />
            @permission('event', $event)
                <x-button link="{{ route('event-pages.index', ['eventId' => $event->id]) }}" title="Pages" />
                <x-button link="{{ route('events.edit', ['eventId' => $event->id]) }}" title="Edit" />
                <x-button link="{{ route('events.delete', ['eventId' => $event->id]) }}" title="Delete" is-danger="true" />
            @endpermission
        @endauth
    </div>
    @endauth
    <x-event-page-menu :event="$event" />
    &nbsp;
    <x-event-booking-phase-display :event="$event" />
    &nbsp;
    <x-event-booking-stages-display :event="$event" />
    &nbsp;
@endsection