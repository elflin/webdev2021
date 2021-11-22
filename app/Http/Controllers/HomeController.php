<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        return view('home', compact('role'));
    }


    public function projectView(){
        $active_welcome = "";
        $active_projects = "active";
        $active_courses = "";

        $projects = Project::all();
        $courses = Course::all();

        return view('user.project', compact('active_welcome', 'active_projects', 'active_courses', 'projects', 'courses'));
    }

}
