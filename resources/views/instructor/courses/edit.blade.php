<x-instructor-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Curso: {{ $course->title }}
        </h2>
    </x-slot>


        {{-- 
           <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

        <aside class="col-span-1">

            <h1 class="font-semibold text-xl mb-4">
                Edición del curso
            </h1>
            <nav>
                <ul>
                    <li class="border-l-4 border-indigo-400 pl-3">
                        <a href="{{ route('instructor.courses.edit', $course) }}">
                            Información del curso
                        </a>
                    </li>

                    <li class="border-l-4 border-transparent pl-3">
                        <a href="{{ route('instructor.courses.video', $course) }}">
                            Video promocional
                        </a>
                    </li>

                </ul>
            </nav>
        </aside>

        <div class="col-span-1 lg:col-span-4">
            <div class="card">

                <form action="{{ route('instructor.courses.update', $course) }}"
                method="POST"
                enctype="multipart/form-data">

                <!-- Metodo para pasar token -->
                @csrf
                @method('PUT')

                <p class="text-2xl font-semibold">
                    Información del curso
                </p>
                <hr class="mt-2 mb-6">
                <x-validation-errors />
                <div class="mb-4">
                    <x-label value="Título del curso" class="mb-1"/>

                    <x-input type="text" class="w-full" value="{{ old('title', $course->title) }}" name="title" />
                </div>

                @empty($course ->published_at)
                <div class="mb-4">
                    <x-label value="Slug del curso" class="mb-1"/>
                    <x-input type="text" class="w-full" value="{{ old('slug', $course->slug) }}" name="slug" />
                </div>

                @endempty

                <div class="mb-4">
                    <x-label value="Resumen" class="mb-1"/>
                <x-textarea id="editor" class="w-full" name="summary">{{ old('summary', $course->summary) }}</x-textarea>
                </div>

                <div class="mb-4 ckeditor">
                    <x-label value="Descripción" class="mb-1"/>
                    <x-textarea id="editor" class="w-full" name="description">{{ old('description', $course->description) }}</x-textarea>
                </div>


                <!-- FORMULARIO-->

                 <div class="grid md:grid-cols-3 gap-4 mb-8">
                <div>
                    <x-label class="mb-1">
                        Categorías
                    </x-label>
                    <x-select name="category_id" class="w-full">
                        @foreach ( $categories as $category )
                        <option value="{{ $category->id }}"
                            @selected(old('category_id', $course->category_id) == $category->id
                            )>
                            {{ $category -> name }}
                        </option>
                        @endforeach
                    </x-select>
                </div>


                <div>
                    <x-label class="mb-1">
                        Niveles
                    </x-label>
                    <x-select name="level_id" class="w-full">
                        @foreach ( $levels as $level )
                        <option value="{{ $level->id }}"
                            @selected(old('level_id', $course) == $level->level_id)>
                            {{ $level -> name }}
                        </option>
                        @endforeach
                    </x-select>
                </div>


                 <div>
                    <x-label class="mb-1">
                        Precios
                    </x-label>

                    <x-select name="price_id" class="w-full">
                        @foreach ( $prices as $price )
                        <option value="{{ $price->id }}"
                            @selected(old('price_id', $course->price_id) == $price->id)>

                            @if ($price -> value == 0)
                            Gratis
                            @else
                            {{ $price -> value }} US$ (nivel {{ $loop->index}})

                            @endif

                        </option>
                        @endforeach
                    </x-select>
                </div>

            </div>

            <div>
                <p class="text-2xl font-semibold mb-2">
                    Imagen del curso
                </p>
            </div>


            <div class="grid md:grid-cols-2 gap-4">
                <figure>
                    <img id="imgPreview" class="w-full aspect-video object-cover object-center" src="{{ $course->image }}" alt="">
                </figure>

                <!-- <p>{{ $course->image }}</p> -->
                

                

                <div>
                   <p class="mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad iusto distinctio placeat magni minima error architecto tenetur voluptates accusantium impedit, voluptatum accusamus nisi eos rerum quae dolorem porro modi optio!</p>

                   <label>
                    <span class="btn btn-blue md:hidden cursor-pointer">
                        Seleccionar una imagen
                    </span>
                   <input class="hidden md:block" type="file"
                   accept="image/*" name="image" onChange="preview_image(event, '#imgPreview')">
                   </label>


                   <div class="flex justify-end mt-4">
                           <x-button>
                        Guardar cambios
                    </x-button>
                   </div>
             
                </div>

            </div>
        </div>
            </div>
                </form>


            </div>
        </div>
    </div> --}}

    <x-instructor.course-sidebar :course="$course">


        
                <form action="{{ route('instructor.courses.update', $course) }}"
                method="POST"
                enctype="multipart/form-data">

                <!-- Metodo para pasar token -->
                @csrf
                @method('PUT')

                <p class="text-2xl font-semibold">
                    Información del curso
                </p>
                <hr class="mt-2 mb-6">
                <x-validation-errors />
                <div class="mb-4">
                    <x-label value="Título del curso" class="mb-1"/>

                    <x-input type="text" class="w-full" value="{{ old('title', $course->title) }}" name="title" />
                </div>

                @empty($course ->published_at)
                <div class="mb-4">
                    <x-label value="Slug del curso" class="mb-1"/>
                    <x-input type="text" class="w-full" value="{{ old('slug', $course->slug) }}" name="slug" />
                </div>

                @endempty

                <div class="mb-4">
                    <x-label value="Resumen" class="mb-1"/>
                <x-textarea id="editor" class="w-full" name="summary">{{ old('summary', $course->summary) }}</x-textarea>
                </div>

                <div class="mb-4 ckeditor">
                    <x-label value="Descripción" class="mb-1"/>
                    <x-textarea id="editor" class="w-full" name="description">{{ old('description', $course->description) }}</x-textarea>
                </div>


                <!-- FORMULARIO-->

                 <div class="grid md:grid-cols-3 gap-4 mb-8">
                <div>
                    <x-label class="mb-1">
                        Categorías
                    </x-label>
                    <x-select name="category_id" class="w-full">
                        @foreach ( $categories as $category )
                        <option value="{{ $category->id }}"
                            @selected(old('category_id', $course->category_id) == $category->id
                            )>
                            {{ $category -> name }}
                        </option>
                        @endforeach
                    </x-select>
                </div>


                <div>
                    <x-label class="mb-1">
                        Niveles
                    </x-label>
                    <x-select name="level_id" class="w-full">
                        @foreach ( $levels as $level )
                        <option value="{{ $level->id }}"
                            @selected(old('level_id', $course) == $level->level_id)>
                            {{ $level -> name }}
                        </option>
                        @endforeach
                    </x-select>
                </div>


                 <div>
                    <x-label class="mb-1">
                        Precios
                    </x-label>

                    <x-select name="price_id" class="w-full">
                        @foreach ( $prices as $price )
                        <option value="{{ $price->id }}"
                            @selected(old('price_id', $course->price_id) == $price->id)>

                            @if ($price -> value == 0)
                            Gratis
                            @else
                            {{ $price -> value }} US$ (nivel {{ $loop->index}})

                            @endif

                        </option>
                        @endforeach
                    </x-select>
                </div>

            </div>

            <div>
                <p class="text-2xl font-semibold mb-2">
                    Imagen del curso
                </p>
            </div>


            <div class="grid md:grid-cols-2 gap-4">
                <figure>
                    <img id="imgPreview" class="w-full aspect-video object-cover object-center" src="{{ $course->image }}" alt="">
                </figure>

                <!-- <p>{{ $course->image }}</p> -->
                

                

                <div>
                   <p class="mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad iusto distinctio placeat magni minima error architecto tenetur voluptates accusantium impedit, voluptatum accusamus nisi eos rerum quae dolorem porro modi optio!</p>

                   <label>
                    <span class="btn btn-blue md:hidden cursor-pointer">
                        Seleccionar una imagen
                    </span>
                   <input class="hidden md:block" type="file"
                   accept="image/*" name="image" onChange="preview_image(event, '#imgPreview')">
                   </label>


                   <div class="flex justify-end mt-4">
                           <x-button>
                        Guardar cambios
                    </x-button>
                   </div>
             
                </div>

            </div>
        </div>
            </div>
                </form>


    </x-instructor.course-sidebar>
      

    @push('js')
    <script src="{{ asset('vendor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>


    @endpush

</x-instructor-layout>

