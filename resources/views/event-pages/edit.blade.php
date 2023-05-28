@extends('layouts.master')

@section('title', 'Edit Page for ' . $event->name)

@section('content')
    <x-back-button title="Event" link="{{ route('event-pages.index', $event->id) }}" />
    <x-forms.form name="edit-event-page" title="Edit Page for {{ $event->name }}" action="edit">
        <x-forms.input name="title" title="Page Title" is-required="true" value="{{ $eventPage->title }}" />
        <x-forms.input name="menu_title" title="Menu Title" is-required="true" value="{{ $eventPage->menu_title }}" />
        <x-forms.html name="content" title="Content" is-required="true" value="{{ $eventPage->content }}" />
        <x-forms.number name="order_in_menu" title="Order in Menu" is-required="true" value="{{ $eventPage->order_in_menu }}" />
        <x-forms.check-box name="display_in_menu" title="Display In Menu" isSwitch="true" checked="{{ $eventPage->display_in_menu }}" />
        <x-forms.hidden key="event_id" value="{{ $event->id }}" />
        <x-forms.button name="edit" title="Edit Page" />
    </x-forms.form>
@endsection
