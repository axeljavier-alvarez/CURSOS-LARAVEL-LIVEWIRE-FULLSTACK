<?php

namespace App\Observers;
use App\Models\Section;

class SectionObserver
{
    public function creating(Section $section)
    {
        // solo si no tenemos alguna posicion se ejecuta esto
        if(!$section->position){
   // recuperar valor y que coincida con el que tengo
        $section->position = Section::where('course_id', $section->course_id)->max('position')+1;
        }

     
    }
}
