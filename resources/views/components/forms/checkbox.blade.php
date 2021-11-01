<div class="form-control">
    @if ($label)
        <label class="cursor-pointer label">

            <span class="label-text">{{ $label }}</span>
    @endif
    <div>
        <input type="checkbox" checked="{{ $value }}" class="checkbox checkbox-accent" {{ $attributes }}>
        <span class="checkbox-mark"></span>
    </div>
    @if ($label)
        </label>
    @endif

</div>
