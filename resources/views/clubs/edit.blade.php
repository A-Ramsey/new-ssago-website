@extends('layouts.master')

@section('title', 'Update Club')

@section('content')
    <x-back-button title="Club" link="{{ route('clubs.show', ['id' => $club->id]) }}" />
    <x-forms.form name="update-club" title="Update Club" action="edit">
        <x-forms.input name="name" title="Club Name" is-required="true" value="{{ $club->name }}" />
        <x-forms.input name="short_name" title="Short Name" is-required="true" value="{{ $club->short_name }}" />
        <x-forms.input name="location" title="Location" is-required="true" value="{{ $club->location }}" />
        <x-forms.text-area name="description" title="Description" is-required="true" value="{{ $club->description }}" />
        <x-forms.input name="email" title="Email" is-required="true" value="{{ $club->email }}" />
        <x-forms.input name="website" title="Website" is-required="true" value="{{ $club->website }}" />
        <x-forms.input name="facebook" title="Facebook" is-required="true" value="{{ $club->facebook }}" />
        <x-forms.button name="create" title="Update Club" />
    </x-forms.form>
@endsection