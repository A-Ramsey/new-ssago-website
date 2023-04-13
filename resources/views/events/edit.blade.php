@extends('layouts.master')

@section('title', "Edit $event->name")

@section('content')
<x-forms.form name="edit-event" title="Edit {{ $event->name }}" action="{{ route('events.update', ['eventId' => $event->id]) }}" >
    <x-forms.input name="name" title="Name" is-required="true" value="{{ $event->name }}" />
    <x-forms.text-area name="description" title="Description" is-required="true" value="{{ $event->description }}" />
    <x-forms.input name="location" title="Location" is-required="true" value="{{ $event->location }}" />
    <x-forms.input name="post_code" title="Post Code" is-required="true" value="{{ $event->post_code }}" />
    <x-forms.date-time name="start" title="Start" is-required="true" value="{{ $event->start }}" />
    <x-forms.date-time name="end" title="End" is-required="true" value="{{ $event->end }}" />
    <x-forms.number name="attendees_limit" title="Attendees Limit" value="{{ $event->attendees_limit }}" />
    <x-forms.button name="submit" title="Submit" />
</x-forms.form>
@endsection