@props([
    'type' => 'text',
    'name',
    'label' => '',
    'placeholder' => '',
    'value' => '',
    'options' => [], // For select
])

<div class="input-group">
    @if ($label)
        <label for="{{ $name }}" class="field-label">
            {{ $label }}
        </label>
    @endif

    @if ($type === 'textarea')
        <textarea
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => 'input-field']) }}
        >{{ old($name, $value) }}</textarea>

    @elseif ($type === 'select')
        <select
            name="{{ $name }}"
            id="{{ $name }}"
            {{ $attributes->merge(['class' => 'input-field']) }}
        >
            @foreach ($options as $key => $option)
                <option value="{{ $key }}" @selected(old($name, $value) == $key)>
                    {{ $option }}
                </option>
            @endforeach
        </select>

    @else
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
    @endif

    @error($name)
        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>