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
            @if ($eventBookingStageField->type == 0)
                <x-forms.input name="{{ $eventBookingStageField->name }}" title="{{ $eventBookingStageField->name }}" is-disabled="true" />
            @elseif ($eventBookingStageField->type == 1)
                <x-forms.number name="{{ $eventBookingStageField->name }}" title="{{ $eventBookingStageField->name }}" is-disabled="true" />
            @elseif ($eventBookingStageField->type == 2)
                @php
                    $options = json_decode($eventBookingStageField->field_info);
                    $options = $options->options;
                    $form_options = [];
                    foreach ($options as $option) {
                        $form_options[$option] = $option;
                    }
                @endphp
                <x-forms.select name="{{ $eventBookingStageField->name }}" title="{{ $eventBookingStageField->name }}" is-disabled="true" :items="$form_options" />
            @elseif ($eventBookingStageField->type == 3)
                <x-forms.checkbox heading="{{ json_decode($eventBookingStageField->field_info)->heading }}" name="{{ $eventBookingStageField->name }}" title="{{ $eventBookingStageField->name }}" is-disabled="true" />
            @elseif ($eventBookingStageField->type == 4)
                <x-forms.currency name="{{ $eventBookingStageField->name }}" title="{{ $eventBookingStageField->name }}" is-disabled="true" />
            @elseif ($eventBookingStageField->type == 5)
                <x-forms.date-time name="{{ $eventBookingStageField->name }}" title="{{ $eventBookingStageField->name }}" is-disabled="true" />
            @elseif ($eventBookingStageField->type == 6)
                <x-forms.text-area name="{{ $eventBookingStageField->name }}" title="{{ $eventBookingStageField->name }}" is-disabled="true" />
            @endif
        @endforeach
        <x-forms.button title="Next" name="Next" />
    </x-forms.form>
@endsection