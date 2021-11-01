<div class="flex flex-col w-full">
    <label class="leading-loose">{{$label}}</label>
    <div class=" focus-within:text-gray-600 text-gray-400">
        <input type="text" placeholder="{{$placeholder}}" wire:model="{{$name}}"
            class="pr-4 pl-2 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300   focus:outline-none text-gray-600 @error($name) border-red-500 @enderror ">
        @error($name) <div class="text-red-600">{{ $message }}</div> @enderror
    </div>
</div>
