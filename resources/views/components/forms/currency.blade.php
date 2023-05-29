<x-forms.input-wrapper name="{{ $name }}" title="{{ $title }}">
    <span class="input-group-text" id="{{ $name }}-inp">£</span>
    <input type="number" class="field @error($name) is-invalid @enderror form-control" 
        name="{{ $name }}" id="{{ $name }}" 
        value="{{ old($name, $value)}}"
        @if($isRequired) required @endif
        step="0.01"
        placeholder="{{ $title }}" aria-describedby="{{ $name }}-inp">
</x-forms.input-wrapper>