div class="p-5">
        <div wire:ignore>
            <form action="{{ route('media.upload') }}" method="POST" class="dropzone" id="my-awesome-dropzone"></form>
        </div>

        <div class="my-8 mansory">
            @foreach ($files as $file)
                <div class="relative hover:scale-110 transition-all ease-in-out cursor-pointer">
                    <input class="absolute top-1.5 left-1.5 rounded border-gray-600" value="{{ $file->id }}" type="checkbox">
                    <img class="w-full h-auto rounded object-cover object-center" src="{{ Storage::url($file->file_path) }}" alt="{{ $file->file_name }}" wire:click="showFileModal({{ $file->id }})">
                </div>
            @endforeach
        </div>

    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
            integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endpush
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
                integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                init: function () {
                    this.on("complete", function (file) {
                        Livewire.emit('mediaUploaded');
                    });
                }
            };
        </script>
    @endpush
</div>
