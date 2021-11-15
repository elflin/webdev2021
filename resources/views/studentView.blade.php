@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Detail Student</h1>
            <p><b>Nama : </b>{{ $student->nama }}</p>
            <p><b>NIM: </b>{{ $student->nim }}</p>
            <p><b>Alamat: </b>{{ $student->alamat }}</p>
            <p><b>No telepon: </b>{{ $student->no_telp }}</p>
            <p><b>Tanggal lahir: </b>{{ $student->tgl_lahir }}</p>
            <p><b>Jurusan: </b>{{ $student->jurusan }}</p>
        </div>

        <div class="text-right">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add project
            </button>
        </div>

        <div class="row">
            <b>List Project</b>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Code</th>
                        <th scope="col">Project Name</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $index = 1 @endphp
                    @foreach ($student->projects as $project)
                        <tr>
                            <th scope="row">{{ $index }}</th>
                            @php $index++ @endphp
                            <td>{{ $project['code'] }}</td>
                            <td>{{ $project['project'] }}</td>
                            <td>{{ $project['semester'] }}</td>
                            <td>{{ $project['description'] }}</td>
                            <td class="text-center">
                                <form action="{{ route('membersDelete', [$student->nim, $project->id] ) }}" method="POST">
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('members.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="nim" value="{{ $student->nim }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Join Project: </label>
                                <select name="project" class="custom-select">
                                    <option value="" selected disabled hidden>Choose here</option>

                                    @foreach ($projects as $project)
                                        @php $check = 1 @endphp
                                        @foreach ($student->projects as $pro)
                                            @if ($pro->id == $project->id)
                                                @php $check = 0 @endphp
                                                @break
                                            @endif
                                        @endforeach
                                        @if ($check == 1)
                                            <option value="{{ $project->id }}">{{ $project->project }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
