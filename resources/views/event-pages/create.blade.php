@extends('layouts.master')

@section('title', 'Create Page for ' . $event->name)

@section('content')
    <x-back-button title="Event" link="{{ route('event-pages.index', $event->id) }}" />
    <x-forms.form name="create-event-page" title="Create Page for {{ $event->name }}" action="create">
        <x-forms.input name="title" title="Page Title" is-required="true" />
        <x-forms.input name="menu_title" title="Menu Title" is-required="true" />
        <x-forms.html name="content" title="Content" is-required="true" />
        <x-forms.number name="order_in_menu" title="Order in Menu" is-required="true" />
        <x-forms.check-box name="display_in_menu" title="Display In Menu" isSwitch="true" />
        <x-forms.hidden key="event_id" value="{{ $event->id }}" />
        <x-forms.button name="create" title="Create Page" />
    </x-forms.form>
@endsection
