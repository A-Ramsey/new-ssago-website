<x-tables.table :headers="['Role', 'Member', 'Action']" >
    @forelse ($committee->roles as $role)
        <tr>
            <td scope="row">{{ $role->name }}</td>
            <td>@if($role->user != null){{ $role->user->name }}@else No member @endif</td>
            <td>
                <x-button link="{{ route('roles.edit', ['committeeId' => $committee->id, 'roleId' => $role->id]) }}" title="Edit Role" />
                <x-button link="{{ route('committees.setrole', ['committeeId' => $committee->id, 'roleId' => $role->id]) }}" title="Set Member" />
                <x-button link="{{ route('committees.removerole', ['committeeId' => $committee->id, 'roleId' => $role->id])}}" title="Remove" is-danger="true" />
            </td>
        </tr>
    @empty
        <tr>
            <td scope="row">No roles</td>
            <td></td>
        </tr>
    @endforelse
</x-tables.table>
@permission([$permission, 'exec'], $committee)
    <x-forms.form name="addRole" title="Add Role" action="{{ route('committees.addrole', ['committeeId' => $committee->id]) }}">
        <x-forms.input title="Role Name" name="name" />
        <x-forms.button name="submit-btn" title="Add Role" />
    </x-forms.form>
@endpermission