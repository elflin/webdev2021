@extends('layouts.user.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Projects</h1>


            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Course</th>
                        <th scope="col">Description</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1 @endphp
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $index }}</th>
                            @php $index++ @endphp
                            <td>{{ $project['code'] }}</td>
                            <td>{{ $project['project'] }}</td>
                            <td>{{ $project['semester'] }}</td>
                            {{-- <td>{{ $project->mata_kuliah }}</td> --}}
                            <td>
                                <a href="{{ route('courses.show', $project->course->course_code) }}">
                                    {{ $project->course->course_name }}
                                </a>
                            </td>
                            <td>{{ $project['description'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
