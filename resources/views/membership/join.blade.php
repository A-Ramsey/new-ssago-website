@extends('layouts.master')

@section('title', 'Join Club')

@section('content')
    <x-back-button title="Club" link="{{ route('clubs.show', ['id' => $club->id]) }}" />
    <x-forms.form name="join-club" title="Join {{ $club->name }}" action="join">
        <p>Confirm you want to change your club to {{ $club->name }}?</p>
        <x-forms.button name="join-btn" title="Change Club" />
    </x-forms.form>
@endsection