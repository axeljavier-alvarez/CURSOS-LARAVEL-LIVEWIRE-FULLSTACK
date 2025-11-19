<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use App\Models\Section;

class ManageSections extends Component
{
    public $course;
    public $name;
    public $sections;
    public $currentSectionId;

    public $sectionEdit = [
        'id' => null,
        'name' => null
    ];

    public $sectionPositionCreate = [
        '1' => [
            'name' => '45644'
        ],
        '3' => [
            'name' => '45644'
        ]
    ];

    public function mount()
    {
        $this->getSections();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $this->course->sections()->create([
            'name' => $this->name
        ]);

        $this->reset('name');
        $this->getSections();

        // javascript para limpiar el iunput
        $this->dispatch('clear-input-section');
    }

    public function storePosition($sectionId)
        {
            // dd($this->currentSectionId);
            $this->validate([
                "sectionPositionCreate.{$sectionId}.name" => 'required'
            ]);

            $position = Section::find($sectionId)->position;
            Section::where('course_id', $this->course->id)
            ->where('position', '>=', $position)
            ->increment('position');

            $this->course->sections()->create([
                'name' => $this->sectionPositionCreate[$sectionId]['name'],
                'position' => $position
            ]);
        $this->getSections();

        unset($this->sectionPositionCreate[$sectionId]);

        $this->dispatch('close-section-position-create');
        }


    public function edit(Section $section)
    {
        $this->sectionEdit = [
            'id'   => $section->id,
            'name' => $section->name
        ];
    }

    public function update()
    {
        $this->validate([
            'sectionEdit.name' => 'required'
        ]);

        Section::findOrFail($this->sectionEdit['id'])->update([
            'name' => $this->sectionEdit['name'],
        ]);

        $this->reset('sectionEdit');

        $this->getSections();
    }

    public function destroy(Section $section)
    {
        $section->delete();
        $this->getSections();

        $this->dispatch('swal', [
            "icon" => "success",
            "title" => "Eliminado!",
            "text" => "La sección ha sido eliminada",

        ]);
    }


    public function sortSections($sorts)
    {

        // dd($sorts);
        foreach ($sorts as $position => $sectionId) {
            Section::find($sectionId)->update([
                'position' => $position + 1
            ]);
        }

        $this->getSections();
    }


    public function getSections()
    {
        $this->sections = Section::where('course_id', $this->course->id)
            ->orderBy('position', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.instructor.courses.manage-sections');
    }
}
