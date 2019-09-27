@extends('admin.layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row m-2">
        <div class="col-12">
            <a href="/staff/create" class="btn btn-success m-2" style="margin:15px">Add New</a>
        </div>
    </div>
    <div class="row" style="height:1350px">
        <div class="col-12" style="height:100%">
            <iframe src="/staff" style="width:100%;height:100%;border:0"></iframe>
        </div>
    </div>
</div>
@endsection
