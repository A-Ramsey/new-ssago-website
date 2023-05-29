@extends('layouts.master')

@section('title', 'Edit Event Booking Phase')

@section('content')
    <x-back-button title="Event" link="{{ route('events.show', $event->id) }}" />
    <x-forms.form name="Edit-event-booking-phase" title="Edit Booking Phase for {{ $event->name }}" action="edit" >
        <x-forms.input name="title" title="Booking Phase Title" is-required="true" value="{{ $eventBookingPhase->title }}" />
        <x-forms.date-time name="start" title="Start Date" is-required="true" value="{{ $eventBookingPhase->start }}" />
        <x-forms.date-time name="end" title="End Date" is-required="true" value="{{ $eventBookingPhase->end }}" />
        <x-forms.currency name="cost" title="Cost" is-required="true" value="{{ $eventBookingPhase->cost }}" />
        <x-forms.hidden key="event_id" value="{{ $event->id }}" />
        <x-forms.button name="submit" title="Edit" />
    </x-forms.form>
@endsection