<label class="block">
    <span class="text-gray-700">{{$label}}</span>
    <textarea class="form-textarea mt-1 block w-full  @error($name) border-red-500 @enderror" rows="3" placeholder="{{$placeholder}}" wire:model="{{$name}}"></textarea>
    @error($name) <div class="text-red-600">{{ $message }}</div> @enderror
  </label>
