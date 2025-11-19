@props(['course'])

@php

    $links = [

    [
        'name'=>'Información del curso',
        'url'=> route('instructor.courses.edit', $course),
        'active'=> request()->routeIs('instructor.courses.edit')
    ],
     [
        'name'=>'Video promocional',
        'url'=> route('instructor.courses.video', $course),
        'active'=> request()->routeIs('instructor.courses.video')
    ],

     [
        'name'=>'Metas del curso',
        'url'=> route('instructor.courses.goals', $course),
        'active'=> request()->routeIs('instructor.courses.goals')
    ],

    [
        'name' => 'Requisitos del curso', 
        'url'=> route('instructor.courses.requirements', $course),
        'active'=> request()->routeIs('instructor.courses.requirements')

],

 [
        'name' => 'Curriculum', 
        'url'=> route('instructor.courses.curriculum', $course),
        'active'=> request()->routeIs('instructor.courses.curriculum')

],







];
@endphp


 <x-container class="py-8">

 </x-container>

<div class="grid grid-cols-1 lg:grid-cols-5 gap-6">

        <aside class="col-span-1">

            <h1 class="font-semibold text-xl mb-4">
                Edición del curso
            </h1>
            <nav>
                <ul class="space-y-2">
                   @foreach ( $links as $link )
                       <li class="border-l-4 {{ $link['active'] ? 'border-indigo-400' : 'border-transparent' }} border-indigo-400 pl-3">
                        <a href="{{$link['url'] }}">
                            {{ $link['name'] }}
                        </a>
                      </li>

                   @endforeach

                </ul>
            </nav>
        </aside>

        <div class="col-span-1 lg:col-span-4">
            <div class="card">


                {{ $slot }}




            </div>
        </div>
