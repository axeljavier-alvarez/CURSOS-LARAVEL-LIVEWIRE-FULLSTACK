<div>

    @push('css')

    <link rel="stylesheet" href="https://cdn.plyr.io/3.8.3/plyr.css" />

    @endpush

    <h1 class="text-2xl font-semibold">Video promocional</h1>

    <hr class="mt-2 mb-6">

    <div class="grid grid-cols-2 gap-6">

        <div class="col-span-1">

            @if($course->video_path)

            <div wire:ignore>
 <div x-data x-init="
            let player = new Plyr($refs.player);
            ">

            <!-- -->
 <video x-ref="player" class="aspect-video" playsinline controls data-poster="{{ $course->image }}">
                    <source src="{{ Storage::url($course->video_path) }}">
                </video>
            </div>




            </div>




            @else
                <div x-data x-init="new Plyr($refs.player)">
                    <video x-ref="player" class="aspect-video" controls playsinline>
                        <source src="{{ asset('storage/courses/promotional-videos/course_video.mp4') }}" type="video/mp4">
                    </video>
                </div>
            @endif

          

        </div>


        <div class="col-span-1">

            <form wire:submit="save">

                <x-validation-errors />

                <p class="mb-4">
                    Lorem ipsum dolor sit amet, consectetur.
                </p>

                <x-progress-indicators wire:model="video"/>

                <div class="flex justify-end mt-4">
                    <x-button>
                        Subir video
                    </x-button>
                </div>

            </form>

        </div>

    </div>

    @push('js')
<script src="https://cdn.plyr.io/3.8.3/plyr.js"></script>
<script>
    const player = new Plyr('#player');

</script>
    @endpush
</div>
