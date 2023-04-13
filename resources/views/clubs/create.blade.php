@extends('layouts.master')

@section('title', 'Create Club')

@section('content')
    <x-back-button title="Clubs" link="{{ route('clubs.index') }}" />
    <x-forms.form name="create-club" title="Create Club" action="create">
        <x-forms.input name="name" title="Club Name" is-required="true" />
        <x-forms.input name="short_name" title="Short Name" is-required="true" />
        <x-forms.input name="location" title="Location" is-required="true" />
        <x-forms.text-area name="description" title="Description" is-required="true" />
        <x-forms.input name="email" title="Email" is-required="true" />
        <x-forms.input name="website" title="Website" is-required="true" />
        <x-forms.input name="facebook" title="Facebook" is-required="true" />
        <x-forms.button name="create" title="Create Club" />
    </x-forms.form>
@endsection