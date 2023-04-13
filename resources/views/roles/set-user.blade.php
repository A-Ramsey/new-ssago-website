@extends('layouts.master')

@section('title', 'Set Role Member')

@section('content')
    <x-forms.form name="set-role" title="Set {{ $role->name}}" action="{{ route('committees.setrolepost', ['committeeId' => $committee->id, 'roleId' => $role->id]) }}">
        <x-forms.select :items="$users" name="user_id" title="Select User" selected=0 />
        <x-forms.button name="submit" title="Set Role" />
    </x-forms.form>
@endsection