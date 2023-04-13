@extends('layouts.master')

@section('title', 'Create Event')

@section('content')
    <x-forms.form name="create-event" title="Create Event" action="{{ route('events.store') }}" >
        <x-forms.input name="name" title="Name" is-required="true" />
        <x-forms.text-area name="description" title="Description" is-required="true" />
        <x-forms.input name="location" title="Location" is-required="true" />
        <x-forms.input name="post_code" title="Post Code" is-required="true" />
        <x-forms.date-time name="start" title="Start" is-required="true" />
        <x-forms.date-time name="end" title="End" is-required="true" />
        <x-forms.number name="attendees_limit" title="Attendees Limit" />
        <x-forms.button name="submit" title="Submit" />
    </x-forms.form>
@endsection