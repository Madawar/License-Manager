<div class="form-control">
    @if ($label)
        <label class="label">
            <span class="label-text block text-xs font-semibold text-gray-600 uppercase">{{ $label }}</span>
        </label>
    @endif
    <input type="password" placeholder="{{ $placeholder }}" name="{{ $name }}"
        class="input input-bordered @error($name) input-error  @enderror" {{ $attributes }}>
    @error($name)
        <label class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </label>
    @enderror
</div>
