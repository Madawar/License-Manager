<div>
    <div class=>
        {{-- Close your eyes. Count to one. That is how long forever feels. --}}
        <?php use Illuminate\Support\Str; ?>

        <div class="flex items-center">
            <div class="tabs  ">
                <a href="{{ route('license.show', ['license' => $license->id]) }}"
                    class="tab tab-lifted {{ request()->routeIs('license.show') ? 'tab-active' : '' }}">View
                    Certificate</a>
                <a href="{{ route('license.edit', ['license' => $license->id]) }}"
                    class="tab tab-lifted {{ request()->routeIs('license.edit') ? 'tab-active' : '' }}">Edit
                    Certificate</a>

            </div>
        </div>


        @include('livewire.partials.show_certificate')
        @include('livewire.partials.message')





        <script>
            document.addEventListener('livewire:load', function() {
                flatpickr(".date");
            })
        </script>

    </div>

</div>
