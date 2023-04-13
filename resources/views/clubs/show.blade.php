@extends('layouts.master')

@section('title', $club->short_name)

@section('content')
    <x-back-button title="Clubs" link="{{ route('clubs.index') }}" />
    <h1>{{ $club->name }}</h1>
    <h4>{{ $club->short_name }} - {{ $club->location }}</h4>
    @isclub($club)<h5>You are a member of this club</h5>@endisclub
    <p>{{ $club->description }}</p>
    @auth
    <div class="d-flex justify-content-left">
        @auth
            @isclub($club, true)
            <x-button link="{{ route('clubs.join', ['id' => $club->id]) }}" title="Join" />
            @endisclub
            <x-button link="{{ route('clubs.committee', ['id' => $club->id])}}" title="Committee" />
            @permission('club', $club)
                <x-button link="{{ route('clubs.members', ['id' => $club->id])}}" title="Members" />
                <x-button link="{{ route('clubs.edit', ['id' => $club->id]) }}" title="Edit" />
                <x-button link="{{ route('clubs.delete', ['id' => $club->id]) }}" title="Delete" is-danger="true" />
            @endpermission
        @endauth
    </div>
    @endauth
    <p><a href="mailto:{{ $club->email }}">{{ $club->email }}</a></p>
    <p><a href="{{ $club->website }}">{{ $club->website }}</a></p>
    <p><a href="{{ $club->facebook }}">{{ $club->facebook }}</a></p>
@endsection