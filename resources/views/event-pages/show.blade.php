@extends('layouts.master')

@section('title', $eventPage->title)

@section('content')
    <div class="d-flex justify-content-between">
        <x-back-button title="Home" link="{{ route('events.show', ['eventId' => $event->id]) }}" />
        @auth
            @permission('event', $event)
                <x-button title="Edit" link="{{ route('event-pages.edit', ['eventId' => $event->id, 'eventPageId' => $eventPage->id]) }}" />
            @endpermission
        @endauth
    </div>
    <h1>{{ $eventPage->title }}</h1>
    <x-event-page-menu :event="$event" />

    <div class="event-page-content">
        {!! $eventPage->content !!}
    </div>
@endsection