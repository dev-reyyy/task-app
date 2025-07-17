@props([
    'type' => 'text',
    'name',
    'label' => '',
    'placeholder' => '',
    'value' => '',
])

<div class="input-group">
    @if ($label)
        <label for="{{ $name }}" class="field-label">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"

        @if ($type !== 'password')
            value="{{ old($name, $value) }}"
        @endif
        
        {{ $attributes->merge(['class' => 'input-field']) }}
    />

    @error($name)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
