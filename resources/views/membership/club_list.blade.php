@extends('layouts.master')

@section('title', 'Members List')

@section('content')
    <x-back-button title="Club" link="{{ route('clubs.show', ['id' => $club->id]) }}" />
    <h1>Members of {{ $club->name }}</h1>

    <x-tables.table :headers="['Id', 'Name', 'Email', 'Actions']" >
        @forelse($members as $member)
            <tr>
                <th scope="row">{{ $member->id }}</th>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email}}</td>
                <td>
                    @permission('club', $club)
                    
                    @endpermission
                </td>
            </tr>
        @empty
            <tr>
                <th scope="row"></th>
                <td>No members</td>
                <td></td>
                <td></td>
            </tr>
        @endforelse
    </x-tables.table>
@endsection