@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $description }}</h3>
            </div>
            <form role="form" method="post" action="{{ route('storeEmployee') }}" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="image">Photo</label>
                        <button id="image" class="btn btn-default" style="display: block; width: 250px"
                                    onclick="event.preventDefault();
                                        document.getElementById('photo').click();">Browse</button>
                        <input style="display: none" name="image" type="file" id="photo">
                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" placeholder="+38 (___) ___ __ __">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control select">
                            <option>Leading specialist of the Control Department</option>
                            <option>IT Development Departament</option>
                            <option>Sales Management Unit</option>
                            <option>Reception and Facilities Block</option>
                            <option>Design and UI Department</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary, $</label>
                        <input type="text" class="form-control" id="salary" placeholder="500,000">
                    </div>
                    <div class="form-group">
                        <label for="head">Head</label>
                        <input type="text" class="form-control" id="head" placeholder="Superior's Name">
                    </div>
                    <div class="form-group">
                        <label for="date">Date of Employment</label>
                        <input type="date" value="2019-07-01" class="form-control" id="date">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection







