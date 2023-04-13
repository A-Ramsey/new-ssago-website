@extends('layouts.master')

@section('title', 'Clubs')

@section('content')
    <div class="d-flex justify-content-left">
        @permission('team_pink')
        <x-button link="{{ route('clubs.create') }}" title="Create Club" />
        @endpermission
    </div>
    <x-cards.card-list>
        @foreach($clubs as $club)
            <x-cards.club-card :club='$club' />
        @endforeach
    </x-cards.card-list>
@endsection