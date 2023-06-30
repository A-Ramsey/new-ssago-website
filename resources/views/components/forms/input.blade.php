<x-forms.input-wrapper name="{{ $name }}" title="{{ $title }}">
    <input class="field @error($name) is-invalid @enderror form-control" 
        @if($isPassword) type="password" @else type="text" @endif
        name="{{ $name }}" id="{{ $name }}" 
        value="{{ old($name, $value)}}"
        @if($isRequired) required @endif
        @if($isDisabled) disabled @endif
        placeholder="{{ $title }}" aria-describedby="{{ $name }}-inp">
</x-forms.input-wrapper>