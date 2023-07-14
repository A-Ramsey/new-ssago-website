@extends('layouts.master')

@section('title', "{$eventBookingStage->name} Booking Stage")

@section('content')
    <x-back-button title="Event" link="{{ route('events.show', $event->id) }}" />
    <h1>{{ $eventBookingStage->name }} Booking Stage</h1>
    <h6>Event: {{ $event->name }}</h6>
    <div class="d-flex justify-content-start">
        <x-button title="Edit" link="{{ route('event-booking-stages.edit', [$event->id, $eventBookingStage->id]) }}" />
        <x-button title="Delete" link="{{ route('event-booking-stages.delete', [$event->id, $eventBookingStage->id]) }}" is-danger="true" />
    </div>
    <x-forms.form name="show-event-booking-stage" title="Preview {{ $eventBookingStage->name }} Stage" action="show">
        @foreach ($eventBookingStage->eventBookingStageFields as $eventBookingStageField)
            <div class="input-group">
                <div class="input-group-prepend">
                    <x-bookings.form-item :field="$eventBookingStageField" />
                </div>
                <div class="input-group-append">
            @if ($eventBookingStage->type->key == "Form")
                <x-button title="Delete Field" link="{{ route('event-booking-stage-fields.delete', [$event->id, $eventBookingStage->id, $eventBookingStageField->id]) }}" is-danger="true" />
            @endif
                </div>
            </div>
        @endforeach
        <x-forms.button title="Next" name="Next" />
    </x-forms.form>
    
    @if ($eventBookingStage->type->key == "Form")
        <div>
        <x-forms.form name="add-field" title="Add Field" action="{{ route('event-booking-stage-fields.store', ['eventId' => $event->id, 'eventBookingStageId' => $eventBookingStage->id]) }}">
            <x-forms.input name="name" title="Name" is-required="true" />
            <x-forms.select name="type" title="Type" :items="$fieldTypes" is-required="true" />
            <x-forms.button title="Add Field" name="Add Field" />
        </x-forms.form>
        </div>
    @endif
@endsection