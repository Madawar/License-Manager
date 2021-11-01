<div class="form-control">
    @if($label)
    <label class="label">
        <span class="label-text block text-xs font-semibold text-gray-600 uppercase">{{ $label }}</span>
    </label>
    @endif
    <select class="select select-bordered  w-full @error($name) select-error @else select-primary  @enderror"
        name="{{ $name }}" {{ $attributes }}>
        @if ($value == '')
            <option value='' selected>{{ $placeholder}}</option>
        @else
            <option disabled="disabled" value='' >{{ $label }}</option>
        @endif
        @foreach ($options as $key => $option)
            <option {{ $isSelected($key) ? 'selected="selected"' : '' }} value="{{ $key }}">
                {{ ucwords($option) }}</option>
        @endforeach
    </select>
    @error($name)
        <label class="label">
            <span class="label-text-alt">{{ $message }}</span>
        </label>
    @enderror
</div>
