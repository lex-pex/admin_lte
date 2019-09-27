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
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <table class="table table-bordered" id="data-table">
        <thead>
        <tr>
            <th>Image</th><th>Name</th><th>Phone</th><th>Email</th><th>Position</th><th>Salary</th><th>Head</th><th>Hire</th><th>Action</th>
        </tr>
        </thead>
    </table>
@include('admin.examples.delete')
<script>
    $(document).ready(function () {
        $('#data-table')
            .DataTable({
                processing: true,
                ServerSide: true,
                ajax: "{{ route('staff.index') }}",
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
                    {data: 'post.name', name: 'post.name'},
                    {data: 'salary', name: 'salary'},
                    {data: 'head', name: 'head'},
                    {data: 'hire_date', name: 'hire_date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });

        $('#delete_button').click(function() {
            var item_id = $('#confirm-modal').attr('data-id');
            $.ajax({
                url: 'staff/' + item_id,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    $('#delete_button').text('Deleting...');
                },
                success: function(data) {
                    setTimeout(function(){
                        $('#confirm-modal').modal('hide');
                        $('#data-table').DataTable().ajax.reload();
                    }, 1000);
                }
            });
        });
    });
    function deleteEmployee(id, name) {
        var frame = $('#confirm-modal');
        frame.attr('data-id', id);
        frame.modal('show');
        $('#modal-message').text('Are you sure you want to remove employee: ' + name);
    }
</script>
</body>
</html>
















