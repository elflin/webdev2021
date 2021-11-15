@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Update new Students</h1>

            <!-- Content Row -->
            <div class="">
            <form action="{{ route('students.update', $student->nim )}}" method="post">
                    {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Nama : </label>
                        <input type="text" class="form-control" name="nama" value="{{ $student->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label>NIM : </label>
                        <input type="text" class="form-control" name="nim" value="{{ $student->nim }}" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat : </label>
                        <input type="text" class="form-control" name="alamat" value="{{ $student->alamat }}" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon : </label>
                        <input type="text" class="form-control" name="no_telp" value="{{ $student->no_telp }}" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir : </label>
                        <input type="date" class="form-control" name="tgl_lahir" value="{{ $student->tgl_lahir }}" required>
                    </div>
                    <div class="form-group">
                        <label>Jurusan : </label>
                        <input type="text" class="form-control" name="jurusan" value="{{ $student->jurusan }}" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update Student</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
