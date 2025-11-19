<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Requirement;

class Requirements extends Component
{
    public $course;
    public $requirements = [];

    #[Validate('required|string|max:255')]
    public $name;

    public function mount()
    {
        // Cargar requisitos como arreglo asociativo usando el ID como clave
        $this->requirements = Requirement::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get()
            ->keyBy('id')
            ->toArray();
    }

    public function store()
    {
        $this->validate();

        $this->course->requirements()->create([
            'name' => $this->name
        ]);

        // Recargar data
        $this->requirements = Requirement::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get()
            ->keyBy('id')
            ->toArray();

        // Limpiar input
        $this->name = "";

        // Limpiar input del DOM
        $this->dispatch('clear-input');
    }

    public function update()
    {
        foreach ($this->requirements as $id => $requirement) {
            Requirement::find($id)?->update([
                'name' => $requirement['name']
            ]);
        }

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text'  => 'Los requerimientos se han actualizado correctamente'
        ]);
    }

    public function destroy($id)
    {
        Requirement::find($id)?->delete();

        $this->requirements = Requirement::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get()
            ->keyBy('id')
            ->toArray();
    }

    public function sortRequirements($data)
    {
        foreach ($data as $index => $requirementId) {
            Requirement::find($requirementId)?->update([
                'position' => $index + 1
            ]);
        }

        $this->requirements = Requirement::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get()
            ->keyBy('id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.instructor.courses.requirements');
    }
}
