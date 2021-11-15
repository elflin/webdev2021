@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Add new Students</h1>

            <!-- Content Row -->
            <div class="">
                <form action="{{ route('students.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama : </label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>NIM : </label>
                        <input type="text" class="form-control" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat : </label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon : </label>
                        <input type="text" class="form-control" name="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir : </label>
                        <input type="date" class="form-control" name="tgl_lahir" required>
                    </div>
                    <div class="form-group">
                        <label>Jurusan : </label>
                        <input type="text" class="form-control" name="jurusan" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Add Student</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
