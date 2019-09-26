<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Data Tables | Oracle </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}

</head>
<body>
<div class="container pt-3">
    <h3> Employees Data Table </h3>
    <table class="table table-bordered" id="data-table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Head</th>
            <th>Hire</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
</div>
<div class="footer" style="height: 75px; width: 100%"></div>
<script>
$(document).ready(function () {
    $('#data-table')
        .DataTable({
            processing: true,
            ServerSide: true,
            ajax: "{{ route('table.index') }}",
            columns: [
                {
                    data: 'image',
                    name: 'image',
                    render: function (data, type, full, meta) {
                        if(data === null) data = '/img/staff/avatar.jpg';
                        return '<img src="' + data + '" width="74px" />';
                    },
                    orderable: false
                },
                {data: 'name', name: 'name'},
                {data: 'phone', name: 'phone'},
                {data: 'email', name: 'email'},
                {data: 'position', name: 'position'},
                {data: 'salary', name: 'salary'},
                {data: 'head', name: 'head'},
                {data: 'hire_date', name: 'hire_date'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
});
</script>
</body>
</html>
















