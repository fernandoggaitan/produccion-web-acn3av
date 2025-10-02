<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$courses = Course::paginate(10);
        $courses = Course::select( ['id', 'title', 'price'] )
            ->where('is_visible', true)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        $title = 'Acá van todos los cursos';
        return view('courses.index', [
            'title' => $title,
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'price' => 'numeric|max:1000000'
        ], [
            'title.required' => 'Che, te faltó el título del curso'
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se ha agregado correctamente.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return $course;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se ha modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //$course->delete();

        $course->update([
            'is_visible' => false
        ]);

        return redirect()
            ->route('courses.index')
            ->with('status', 'El curso se ha eliminado correctamente.');
    }
}
