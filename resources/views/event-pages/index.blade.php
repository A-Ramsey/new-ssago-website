@extends('layouts.master')

@section('title', "{$event->name} Pages")

@section('content')
    <div class="d-flex justify-content-left">
        <x-back-button title="Event" link="{{ route('events.show', $event->id) }}" />
        @permission('event', $event)
            <x-button link="{{ route('event-pages.create', ['eventId' => $event->id]) }}" title="Create Page" />
        @endpermission
    </div>
    <h1>{{ $event->name }} Pages</h1>
    <x-tables.table :headers="['Title', 'Actions']">
        @foreach ($event->eventPages as $eventPage)
            <tr>
                <td>
                    <a href="{{ route('event-pages.show', ['eventId' => $event->id, 'eventPageId' => $eventPage->id]) }}">
                        {{ $eventPage->title }}
                    </a>
                </td>
                <td>
                    <x-button link="{{ route('event-pages.show', ['eventId' => $event->id, 'eventPageId' => $eventPage->id]) }}" title="Show" />
                    <x-button link="{{ route('event-pages.edit', ['eventId' => $event->id, 'eventPageId' => $eventPage->id]) }}" title="Edit" />
                    <x-button link="{{ route('event-pages.delete', ['eventId' => $event->id, 'eventPageId' => $eventPage->id]) }}" title="Delete" is-danger="true"/>
                </td>
            </tr>
        @endforeach
    </x-table>
@endsection