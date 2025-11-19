<?php

namespace App\Observers;

use App\Models\Goal;

class GoalObserver
{
    public function creating(Goal $goal)
    {
        // recuperar valor y que coincida con el que tengo
        $goal->position = Goal::where('course_id', $goal->course_id)->max('position')+1;
    }
}
