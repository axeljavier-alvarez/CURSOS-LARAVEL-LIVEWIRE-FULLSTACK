<?php

namespace App\Livewire\Instructor\Courses;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Attributes\Validate;

class PromotionalVideo extends Component
{
    use WithFileUploads;

    public $course;

    #[Validate('required|mimetypes:video/*')]
    public $video;

    public function save()
    {
        $this->validate();

        $this->course->video_path = $this->video->store('courses/promotional-videos');

        $this->course->save();

        //return redirect()->route('instructor.courses.video', $this->course);

        return $this->redirectRoute('instructor.courses.video', $this->course, true, true);
        //  $this->emit('saved');
    }

    

    public function render()
    {
        return view('livewire.instructor.courses.promotional-video');
    }
}
