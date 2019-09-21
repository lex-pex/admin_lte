@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $description }}</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="image">Photo</label>
                        <div style="width:300px; padding: 10px">
                            <img src="/img/staff/avatar.jpg" width="300px" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <p id="name">John Doe</p>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <p id="phone">+38 (012) 456 78 90</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <p id="email">john.doe@mail.com</p>
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <p id="position">IT Development Department</p>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary, $</label>
                        <p id="salary">500,000</p>
                    </div>
                    <div class="form-group">
                        <label for="head">Head</label>
                        <p id="head">Superior's Name</p>
                    </div>
                    <div class="form-group">
                        <label for="date">Date of Employment</label>
                        <p id="date">2019-07-01</p>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('editEmployee', 1) }}" type="submit" class="btn btn-primary">Edit</a>
                    <a onclick="event.preventDefault();" href="" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Delete</a>
                </div>
            </div>
        </div>
    </div>
@include('admin.employees.delete')
@endsection







