@extends('layouts.master')

@section('title', 'Edit Event Booking Stage')

@section('content')
    <x-back-button title="Booking Stage" link="{{ route('event-booking-stages.show', [$event->id, $eventBookingStage->id]) }}" />
    <x-forms.form name="edit-event-booking-stage" title="Edit Booking Stage for {{ $event->name }}" action="edit">
        <x-forms.input name="name" title="Name" is-required="true" value="{{ $eventBookingStage->name }}" />
        <x-forms.hidden key="event_id" value="{{ $event->id }}" />
        <x-forms.button name="edit" title="Edit" />
    </x-forms.form>
@endsection