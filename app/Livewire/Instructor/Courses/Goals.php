<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Goal;

class Goals extends Component
{
    public $course;
    public $goals = [];

    #[Validate('required|string|max:255')]
    public $name;

    public function mount()
    {
        // cargar metas como array asociativo usando id como clave
        $this->goals = Goal::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get()
            ->keyBy('id')
            ->toArray();
    }

    public function store()
    {
        $this->validate();

        // Crear meta
        $newGoal = $this->course->goals()->create([
            'name' => $this->name
        ]);

        // Recargar metas
        $this->goals = Goal::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get()
            ->keyBy('id')
            ->toArray();

        // Limpiar input
        $this->name = "";

        // Limpiar input EN EL DOM para evitar conflicto con SweetAlert
        $this->dispatch('clear-input');
    }

    public function update()
    {
        foreach ($this->goals as $id => $goal) {
            Goal::find($id)?->update([
                'name' => $goal['name']
            ]);
        }

        $this->dispatch('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'Los objetivos se han actualizado'
        ]);
    }

    public function destroy($goalId)
    {
        Goal::find($goalId)?->delete();

        // Recargar metas
        $this->goals = Goal::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get()
            ->keyBy('id')
            ->toArray();
    }

    public function sortGoals($data)
    {
        foreach ($data as $index => $goalId) {
            Goal::find($goalId)?->update([
                'position' => $index + 1
            ]);
        }

        // Recargar metas
        $this->goals = Goal::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get()
            ->keyBy('id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.instructor.courses.goals');
    }
}
