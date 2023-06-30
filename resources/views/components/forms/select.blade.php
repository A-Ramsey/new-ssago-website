<x-forms.input-wrapper name="{{ $name }}" title="{{ $title }}">
    <select class="field @error($name) is-invalid @enderror form-select" 
    name="{{ $name }}" id="{{ $name }}" 
    value="{{ old($name)}}"
    @if($isRequired) required @endif
    @if($isDisabled) disabled @endif
    placeholder="{{ $title }}" aria-describedby="{{ $name }}-inp"
    @if($selected != -1) selected="{{ $selected }}" @endif>
        @foreach($items as $key => $id)
            <option value="{{ $id }}" @if($selected != -1) selected @endif>{{ $key }}</option>
        @endforeach
    </select>
</x-forms.input-wrapper>