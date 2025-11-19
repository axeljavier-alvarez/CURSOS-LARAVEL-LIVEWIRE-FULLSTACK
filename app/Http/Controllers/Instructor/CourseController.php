<?php

namespace App\Http\Controllers\Instructor;
use App\Models\Category;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::where('user_id', auth()->id())->get();

        return view('instructor.courses.index', compact('courses'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $levels = Level::all();
        $prices = Price::all();

        return view('instructor.courses.create',
        compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        /*
        return $request->all(); */

        $data = $request->validate([
            'title' => 'required',
            // que esa unico en la tabla courses
            'slug' => 'required|unique:courses',
            // agregar id que existan
            'category_id'=>'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'price_id' => 'required|exists:prices,id',

        ]);

        /* pasar el id del user autenticado que lo esta haciendo*/
        $data['user_id'] = auth()->id();



        $course = Course::create($data);

        return redirect()->route('instructor.courses.edit', $course);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        $levels = Level::all();
        $prices = Price::all();
        /* return $categories ; */


    return view('instructor.courses.edit', compact('course', 'categories', 'levels', 'prices'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {

        $data = $request->validate([
            'title' => 'required|max:255',
            'slug'=> 'required|max:255|unique:courses,slug, ' .$course->id,
            'summary' => 'nullable|max:1000',
            'description' => 'nullable',
            'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'price_id' => 'required|exists:prices,id',

        ]);

        if($request->hasFile('image')){
            if($course->image_path){
                Storage::delete($course->image_path);
            }

            $data['image_path'] = Storage::put('courses/image', $request->file('image'));

        }

        $course->update($data);

        session()->flash('flash.bannerStyle', 'danger');
        session()->flash('flash.banner', 'El curso se actualizo con éxito');
        return redirect()->route('instructor.courses.edit', $course);
        // return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function video(Course $course)
    {
        return view('instructor.courses.video', compact('course'));
    }


    public function goals(Course $course)
    {
        return view('instructor.courses.goals', compact('course'));
    }

    public function requirements(Course $course)
    {
        return view('instructor.courses.requirements', compact('course'));
    }

    public function curriculum(Course $course)
    
    {
        return view('instructor.courses.curriculum', compact('course'));
    }
}
