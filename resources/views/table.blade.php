<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Boostrap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    {{-- DataTables --}}
    <link type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body>
    <h1>Table</h1>

    <table id="table" class="table">
        <thead>
            <th>No</th>
            <th>Nama</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>ABC</td>
            </tr>
            <tr>
                <td>2</td>
                <td>BCD</td>
            </tr>
            <tr>
                <td>3</td>
                <td>CDE</td>
            </tr>
        </tbody>
    </table>

    {{-- Boostrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            var thetable = $('#table').DataTable({});
        });
    </script>
</body>
</html>