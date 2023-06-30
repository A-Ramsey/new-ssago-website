@extends('layouts.master')

@section('title', 'Create Event Booking Stage')

@section('content')
    <x-back-button title="Event" link="{{ route('events.show', $event->id) }}" />
    <x-forms.form name="create-event-booking-stage" title="Create Booking Stage for {{ $event->name }}" action="create">
        <x-forms.input name="name" title="Name" is-required="true" />
        <x-forms.select name="type" title="Type" :items="$types" is-required="true" />
        <x-forms.hidden key="event_id" value="{{ $event->id }}" />
        <x-forms.button name="create" title="Create" />
    </x-forms.form>
@endsection