@php
$options = array_merge(
    [
        'enableTime' => 'false',
        'dateFormat' => 'Y-m-d',
    ],
    $options,
);
@endphp

<div wire:ignore>
    @if ($label)
        <label class="label">
            <span class="label-text block text-xs font-semibold text-gray-600 uppercase">{{ $label }}</span>
        </label>
    @endif
    <input wire:ignore x-data="{value: @entangle($attributes->wire('model')), instance: undefined}" x-init="() => {
                $watch('value', value => instance.setDate(value, true));
                instance = flatpickr($refs.input, {{ json_encode((object) $options) }});
            }" x-ref="input" x-bind:value="value" type="text"
        {{ $attributes->merge(['class' => 'input input-bordered w-full']) }} />
</div>
