<?php

namespace App\Http\Controllers;

use App\Models\log_apps;
use App\Models\Project;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active_students = "active";

        $students = student::all();

        return view('student', compact('active_students', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        student::create($request->all());
        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = student::findOrFail($id);
        $projects = Project::all();
        
        log_apps::create([
            "tabel" => "student",
            "userId" => 1,
            "log_path" => "StudentController@show",
            "log_desc" => "Access function show untuk menampilkan data student dari id"+$id,
            "loh_ip" => "192.178.1.1",

        ]);

        log_apps::create([
            "tabel" => "project",
            "userId" => 1,
            "log_path" => "StudentController@show",
            "log_desc" => "Get all project related to id = "+$id,
            "loh_ip" => "192.178.1.1",

        ]);
        
        return view('studentView', compact('student', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = student::where('nim', $id)->first();
        return view('studentEdit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = student::where('nim', $id)->first();
        $student->update($request->all());
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::where('nim', $id)->first();
        $student->delete();
        log_apps::create([
            "tabel" => "student",
            "userId" => 1,
            "log_path" => "StudentController@destroy",
            "log_desc" => "Hapus data dengan id = "+$id,
            "log_ip" => "192.178.1.1",

        ]);

        //
        return redirect(route('students.index'));
    }
}
