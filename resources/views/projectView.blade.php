@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Detail Project {{ $project['code'] }}</h1>
            <p><b>Nama project: </b>{{ $project['project'] }}</p>
            <p><b>Semester: </b>{{ $project['semester'] }}</p>
            <p><b>Mata kuliah: </b>{{ $project->course->course_name }}</p>
            <p><b>Description: </b>{{ $project['description'] }}</p>
        </div>

        <div class="row">
            <b>List Member</b>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1 @endphp
                    @foreach ($project->students as $student)
                        <tr>
                            <th scope="row">{{ $index }}</th>
                            @php $index++ @endphp
                            <td>{{ $student->nim }}</td>
                            <td>{{ $student->nama }}</td>
                            <td>{{ $student->jurusan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
