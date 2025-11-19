<div>

<div>

    @if (count($requirements))

    <ul class="space-y-2 mb-4" id="requirements">
        @foreach ($requirements as $id => $requirement)

        <li wire:key="requirement-{{ $id }}" data-id="{{ $id }}">

            <div class="flex">

                <!-- CAMBIO MÁS IMPORTANTE: ahora se usa el ID como índice -->
                <x-input wire:model="requirements.{{ $id }}.name" class="flex-1 rounded-r-none"/>

                <div class="flex border border-l-0 border-gray-300 divide-x divide-gray-300 rounded-r">

                    <button onclick="destroyRequirement({{ $id }})" class="px-2 hover:text-red-300">
                        <i class="far fa-trash-alt"></i>
                    </button>

                    <div class="flex items-center px-2 cursor-move">
                        <i class="fas fa-bars"></i>
                    </div>

                </div>
            </div>

        </li>

        @endforeach
    </ul>

    <div class="flex justify-end mb-8">
        <x-button wire:click="update">
            Actualizar
        </x-button>
    </div>

    @endif


    <!-- FORM NUEVO REQUERIMIENTO -->
    <form wire:submit.prevent="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">

            <x-label>
                Nuevo requerimiento
            </x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese el nombre del requerimiento"/>

            <x-input-error for="name" />

            <div class="flex justify-end mt-4">
                <x-button>
                    Agregar requerimiento
                </x-button>
            </div>
        </div>
    </form>


    @push('js')

    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>

    <script>
        const requirements = document.getElementById('requirements');

        new Sortable(requirements, {
            animation: 150,
            ghostClass: 'blue-background-class',
            store: {
                set: (sortable) => {
                    @this.call('sortRequirements', sortable.toArray());
                }
            }
        });
    </script>

    <!-- SWEETALERT -->
    <script>
        function destroyRequirement(id){
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {

                    @this.call('destroy', id);

                    Swal.fire({
                        title: "Eliminado",
                        text: "El requerimiento ha sido eliminado",
                        icon: "success"
                    });
                }
            });
        }
    </script>

    <!-- LIMPIAR INPUT -->
    <script>
        Livewire.on('clear-input', () => {
            document.querySelector('input[wire\\:model="name"]').value = "";
        });
    </script>

    @endpush

</div>


</div>
