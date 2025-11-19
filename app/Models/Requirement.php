<?php

namespace App\Models;

use App\Observers\RequirementObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
#[ObservedBy([RequirementObserver::class])]


class Requirement extends Model
{
 
    use HasFactory;
    protected $fillable = ['name', 'course_id', 'position'];

}
