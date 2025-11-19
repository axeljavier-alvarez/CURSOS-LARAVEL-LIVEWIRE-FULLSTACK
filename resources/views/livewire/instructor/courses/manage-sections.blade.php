<div class="space-y-6">

    {{-- LISTA DE SECCIONES --}}
    @if ($sections->count())
        <ul class="mb-6 space-y-6"
            x-ref="sections"
            x-init="
                new Sortable($refs.sections, {
                    animation: 150,
                    ghostClass: 'blue-background-class',
                    handle: '.handle',
                    onEnd: () => {
                        const sortedIds = [...$refs.sections.children].map(el => el.dataset.id);
                        @this.call('sortSections', sortedIds);
                    }
                });
            "
        >

            @foreach ($sections as $section)

            <li data-id="{{ $section->id }}" wire:key="section-{{ $section->id }}">

                <!-- CONTENEDOR PRINCIPAL -->
                <div class="bg-gray-100 rounded-lg shadow-lg px-6 py-4">

                    <!-- Sección editable -->
                    @if ($sectionEdit['id'] == $section->id)

                        <form wire:submit.prevent="update">
                            <div class="flex items-center space-x-2">
                                <x-label>
                                    Sección {{ $section->position }}:
                                </x-label>

                                <x-input wire:model="sectionEdit.name"
                                         class="flex-1" />
                            </div>

                            <div class="flex justify-end mt-4 space-x-2">
                                <x-danger-button wire:click="$set('sectionEdit.id', null)">
                                    Cancelar
                                </x-danger-button>

                                <x-button>Actualizar</x-button>
                            </div>
                        </form>

                    @else

                        <!-- Vista normal -->
                        <div class="flex items-start space-x-4">

                            <!-- HANDLE PARA ARRASTRAR -->
                            <div class="handle cursor-move text-gray-500 hover:text-gray-800">
                                <i class="fas fa-bars"></i>
                            </div>

                            <!-- TEXTO DE LA SECCIÓN -->
                            <div class="flex-1">
                                <h1 class="truncate handle cursor-move">
                                    Sección {{ $section->position }}:
                                    <span class="font-semibold">{{ $section->name }}</span>
                                </h1>
                            </div>

                            <!-- ACCIONES -->
                            <div class="space-x-3">
                                <button wire:click="edit({{ $section->id }})">
                                    <i class="fas fa-edit hover:text-indigo-600"></i>
                                </button>

                                <button
                                    x-on:click="
                                        Swal.fire({
                                            title: '¿Estás seguro?',
                                            text: 'No podrás revertir esto!',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Sí, eliminar',
                                            cancelButtonText: 'Cancelar'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                @this.call('destroy', {{ $section->id }});
                                            }
                                        });
                                    "
                                >
                                    <i class="far fa-trash-alt hover:text-red-600"></i>
                                </button>

                                <!-- BOTÓN PARA MOSTRAR FORMULARIO DE NUEVA SECCIÓN -->
                                <button x-on:click="open = !open" class="text-indigo-600">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                    @endif

                </div>


                <!-- FORMULARIO PARA AGREGAR SECCIÓN ANTES/DESPUÉS -->
                <div x-data="{ open: false }" x-on:close-section-position-create.window="open = false">

                    <div x-show="open" x-cloak class="mt-4 ml-10">
                        <form wire:submit.prevent="storePosition({{ $section->id }})">

                            <div class="bg-gray-100 rounded-lg shadow-lg p-6">
                                <x-label>Nueva sección</x-label>

                                <x-input
                                    wire:model="sectionPositionCreate.{{ $section->id }}.name"
                                    class="w-full"
                                    placeholder="Ingrese el nombre de la nueva sección"
                                />

                                <x-input-error for="sectionPositionCreate.{{ $section->id }}.name" />

                                <div class="flex justify-end mt-4 space-x-2">
                                    <x-danger-button @click="open = false">
                                        Cancelar
                                    </x-danger-button>

                                    <x-button>Agregar sección</x-button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </li>

            @endforeach

        </ul>
    @endif


    <!-- FORMULARIO FINAL PARA CREAR UNA SECCIÓN NORMAL -->
    <div x-data="{ open: false }" class="mt-6">

        <div
            x-on:click="open = !open"
            class="h-8 w-8 flex items-center justify-center bg-indigo-100 cursor-pointer"
            style="clip-path: polygon(70% 0%, 100% 50%, 70% 100%, 0% 100%, 0% 0%);"
        >
            <i class="fas fa-plus text-indigo-700 transition-transform duration-300"
                :class="{ 'rotate-45': open, 'rotate-0': !open }">
            </i>
        </div>

        <div x-show="open" x-cloak class="mt-6">

            <form wire:submit.prevent="store">
                <div class="bg-gray-100 rounded-lg shadow-lg p-6">

                    <x-label>Nueva sección</x-label>

                    <x-input wire:model="name"
                             class="w-full"
                             placeholder="Ingrese el nombre de la sección" />

                    <x-input-error for="name" />

                    <div class="flex justify-end mt-4">
                        <x-button>Agregar sección</x-button>
                    </div>

                </div>
            </form>

        </div>

    </div>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>

        <script>
            Livewire.on('clear-input-section', () => {
                const input = document.querySelector('input[wire\\:model="name"]');
                if (input) input.value = "";
            });
        </script>
    @endpush

</div>
