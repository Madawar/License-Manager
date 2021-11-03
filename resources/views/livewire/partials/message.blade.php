@if ($modalShow)
    <div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 z-50">
        <div class="bg-white rounded-lg w-3/4 divide-y divide-gray-300">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-start px-6 py-5">
                    <h2 class="mr-auto">
                        <span class="block font-sans text-2xl font-semibold text-gray-900 ">{{$message['title']}}</span>
                        <span class="block font-light text-gray-800">     {{$message['subtext']}}<span>
                    </h2>
                </div>
                <hr>
                <div class="w-full">
                   {{$message['information']}}


                </div>
                <hr>
                <div class="
                    ml-auto">
                    <div class="grid justify-items-stretch">
                            <div class="justify-self-center">
                              <button
                                        class="btn btn-warning" wire.loading.class="loading"
                                        wire:click="closeModal"> Close</button>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endif
