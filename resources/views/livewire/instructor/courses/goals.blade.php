<div>

    @if (count($goals))
    <ul class="space-y-2 mb-4" id="goals">
        @foreach ($goals as $id => $goal)

        <li wire:key="goal-{{ $id }}" data-id="{{ $id }}">

            <div class="flex">

                <!-- EL CAMBIO IMPORTANTE -->
                <x-input wire:model="goals.{{ $id }}.name" class="flex-1 rounded-r-none"/>

                <div class="flex border border-l-0 border-gray-300 divide-x divide-gray-300 rounded-r">

                    <button onclick="destroyGoal({{ $id }})" class="px-2 hover:text-red-300">
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


    <!-- FORM NUEVA META -->
    <form wire:submit.prevent="store">
        <div class="bg-gray-100 rounded-lg shadow-lg p-6">

            <x-label>Nueva meta</x-label>

            <x-input wire:model="name" class="w-full" placeholder="Ingrese el nombre de la meta"/>

            <x-input-error for="name" />

            <div class="flex justify-end mt-4">
                <x-button>Agregar meta</x-button>
            </div>
        </div>
    </form>


    @push('js')

    <!-- SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>

    <script>
        const goals = document.getElementById('goals');

        new Sortable(goals, {
            animation: 150,
            ghostClass: 'blue-background-class',

            store: {
                set: (sortable) => {
                    @this.call('sortGoals', sortable.toArray());
                }
            }
        });
    </script>

    <!-- SWEETALERT -->
    <script>
        function destroyGoal(id){
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
                        text: "La meta ha sido eliminada",
                        icon: "success"
                    });
                }
            });
        }
    </script>

    <!-- EVENTO PARA LIMPIAR INPUT -->
    <script>
        Livewire.on('clear-input', () => {
            document.querySelector('input[wire\\:model="name"]').value = "";
        });
    </script>

    @endpush
</div>
