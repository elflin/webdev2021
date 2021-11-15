@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Students</h1>

            <div class="text-right">
                <a class="btn btn-success pull-right" href="{{ route('students.create') }}">
                    <i class="fas fa-arrow-alt-circle-right"></i> Add student</a>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jurusan</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1 @endphp
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $index }}</th>
                            @php $index++ @endphp
                            <td>{{ $student->nim }}</td>
                            <td>{{ $student->nama }}</td>
                            <td>{{ $student->tgl_lahir }}</td>
                            <td>{{ $student->jurusan }}</td>
                            <td class="text-center">
                                <form action="{{ route('students.destroy', $student->nim) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('students.show', $student->nim) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('students.edit', $student->nim) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
