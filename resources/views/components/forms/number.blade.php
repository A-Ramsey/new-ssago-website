<x-forms.input-wrapper name="{{ $name }}" title="{{ $title }}">
    <input type="number" class="field @error($name) is-invalid @enderror form-control" 
        name="{{ $name }}" id="{{ $name }}" 
        value="{{ old($name, $value)}}"
        @if($isRequired) required @endif
        placeholder="{{ $title }}" aria-describedby="{{ $name }}-inp">
</x-forms.input-wrapper>