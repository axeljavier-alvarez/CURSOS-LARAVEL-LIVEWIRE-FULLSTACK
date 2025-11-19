<?php

namespace App\Observers;

use App\Models\Requirement;

class RequirementObserver
{
    
    public function creating(Requirement $requirement)
    {
        // recuperar valor y que coincida con el que tengo
        $requirement->position = Requirement::where('course_id', $requirement->course_id)->max('position')+1;
    }

}
