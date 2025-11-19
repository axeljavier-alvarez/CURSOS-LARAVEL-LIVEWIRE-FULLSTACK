<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\SectionObserver;

#[ObservedBy([SectionObserver::class])]
class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_id', 'position'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
