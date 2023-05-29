@extends('layouts.master')

@section('title', 'Create Event Booking Phase')

@section('content')
    <x-back-button title="Event" link="{{ route('events.show', $event->id) }}" />
    <x-forms.form name="create-event-booking-phase" title="Create Booking Phase for {{ $event->name }}" action="create" >
        <x-forms.input name="title" title="Booking Phase Title" is-required="true" />
        <x-forms.date-time name="start" title="Start Date" is-required="true" />
        <x-forms.date-time name="end" title="End Date" is-required="true" />
        <x-forms.currency name="cost" title="Cost" is-required="true" />
        <x-forms.hidden key="event_id" value="{{ $event->id }}" />
        <x-forms.button name="submit" title="Create" />
    </x-forms.form>
@endsection