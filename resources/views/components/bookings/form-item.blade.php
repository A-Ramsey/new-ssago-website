@if ($field->type == 0)
    <x-forms.input name="{{ $field->name }}" title="{{ $field->name }}" is-disabled="true" />
@elseif ($field->type == 1)
    <x-forms.number name="{{ $field->name }}" title="{{ $field->name }}" is-disabled="true" />
@elseif ($field->type == 2)
    @php
        $options = json_decode($field->field_info);
        $options = $options->options;
        $form_options = [];
        foreach ($options as $option) {
            $form_options[$option] = $option;
        }
    @endphp
    <x-forms.select name="{{ $field->name }}" title="{{ $field->name }}" is-disabled="true" :items="$form_options" />
@elseif ($field->type == 3)
    <x-forms.checkbox heading="{{ json_decode($field->field_info)->heading }}" name="{{ $field->name }}" title="{{ $field->name }}" is-disabled="true" />
@elseif ($field->type == 4)
    <x-forms.currency name="{{ $field->name }}" title="{{ $field->name }}" is-disabled="true" />
@elseif ($field->type == 5)
    <x-forms.date-time name="{{ $field->name }}" title="{{ $field->name }}" is-disabled="true" />
@elseif ($field->type == 6)
    <x-forms.text-area name="{{ $field->name }}" title="{{ $field->name }}" is-disabled="true" />
@endif