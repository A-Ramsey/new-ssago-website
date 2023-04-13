@extends('layouts.master')

@section('title', 'Edit Role')

@section('content')
    <x-forms.form name="edit-role" title="Edit Role" action="{{ route('roles.edit', ['committeeId' => $committee->id, 'roleId' => $role->id]) }}" >
        <x-forms.input name="name" title="Role Name" value="{{ $role->name }}" />
        <x-forms.button name="submit" title="Update Role" />
    </x-forms.form>
@endsection