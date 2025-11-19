<?php

namespace App\Models;
use App\Enums\CourseStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'summary',
        'description', 'status', 'image_path',
        'video_path', 'welcome_message',
        'goodbye_message', 'observation',
        'user_id', 'level_id', 'category_id',
        'price_id', 'published_at'
    ];

    protected $casts = [
        'status' => CourseStatus::class,
        'published_at' => 'datetime'
    ];


    /* recuperar al usuario */
    /* usuarios que crean curso y los que se matriculan */
    /* uno a muchos*/

  protected function image(): Attribute
{
    return new Attribute(
        get: fn() => $this->image_path
            ? asset('storage/' . $this->image_path)
            : 'https://cdn-icons-png.flaticon.com/512/8344/8344917.png'
    );
}








        /* Relaciones */

    public function teacher()
    {
        /* retornar uno a muchos inversa */
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function price()

    {
        return $this->belongsTo(Price::class);
    }

    // generar nueva relacion uno a muchos

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
