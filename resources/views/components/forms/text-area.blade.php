<x-forms.input-wrapper name="{{ $name }}" title="{{ $title }}">
    <textarea class="field @error($name) is-invalid @enderror form-control" 
        name="{{ $name }}" id="{{ $name }}" 
        @if($isRequired) required @endif
        @if($isDisabled) disabled @endif
        placeholder="{{ $title }}" aria-describedby="{{ $name }}-inp">{{ old($name, $value)}}</textarea>
</x-forms.input-wrapper>