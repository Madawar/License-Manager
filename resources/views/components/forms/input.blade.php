<div class="form-control">
    @if ($label)
        <label class="label">
            <span class="label-text block text-xs font-semibold text-gray-600 uppercase">{{ $label }}</span>
        </label>
    @endif
    <input type="text" placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}"
         {{ $attributes->class(['input input-bordered','input-error'=>$errors->has($name)])->merge(['class' => '']) }}>
    @error($name)
        <label class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </label>
    @enderror
</div>
