@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $description }}</h3>
            </div>
            <form role="form" method="post" action="{{ route('staff.store') }}" enctype="multipart/form-data">
                <div class="box-body">
                    @if(count($errors) > 0)
                        <div style="color:firebrick">
                            The fields are filled incorrectly:
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="image">Photo</label>
                        <button id="image" class="btn btn-default" style="display: block; width: 250px"
                                    onclick="event.preventDefault();
                                        document.getElementById('photo').click();">Browse</button>
                        <input style="display:none" name="image" type="file" id="photo">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+38 (___) ___ __ __">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control select" name="position">
                            @foreach($positions as $p)
                            <option {{ old('position') == $p->id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary, $</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary') }}" placeholder="500,000">
                    </div>
                    <div class="form-group hinted">
                        <label for="head_name">Head</label>
                        <input type="text" class="form-control" id="head_name" name="head_name" value="{{ old('head_name') }}" placeholder="Superior's Name" autocomplete="off">
                        <input type="hidden" class="form-control" name="head" value="0" />
                        <div class="hint-content"></div>
                    </div>
                    <div class="form-group">
                        <label for="date">Date of Employment</label>
                        <input type="date" class="form-control" id="date" value="{{ old('date') ? old('date') : '2019-09-01' }}" name="hire_date">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection







