<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Positions Table | Oracle </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- meta_Hidden name_Hidden="csrf-token" content="{ csrf_token() }" -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<div class="container pt-3">
    <h3>Laravel + Data Tables </h3>
    <table class="table table-bordered" id="data-table">
        <thead>
        <tr>
            <th style="width: 10%;">Name</th>
            <th style="width: 10%;">Action</th>
        </tr>
        </thead>
    </table>
</div>
<script>
$(document).ready(function () {
    $('#data-table')
        .DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('positions.index') }}",
            columns: [
                {data: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
});
</script>
</body>
</html>
















