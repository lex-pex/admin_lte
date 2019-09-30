@extends('admin.layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $description }}</h3>
            </div>
            <form role="form" method="post" action="{{ route('staff.update', $item->id) }}" enctype="multipart/form-data">
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
                        <div style="width:300px; padding:10px">
                            <img src="{{ $item->image ? $item->image : '/img/staff/avatar.jpg' }}" width="300px" />
                        </div>
                        <button id="image" class="btn btn-default" style="display:block;width:250px" onclick="event.preventDefault();document.getElementById('photo').click();">Browse</button>
                        <input style="display:none" name="image" type="file" id="photo">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="image_del" id="image_del" {{ old('image_del') ? 'checked' : '' }}>
                                <label class="form-check-label" for="image_del">Delete Image</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{ $item->name }}" id="name" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $item->phone }}" placeholder="+38 (___) ___ __ __">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <select class="form-control select" name="position">
                            @foreach($positions as $p)
                                <option {{ $item->position == $p->id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary, $</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="{{ $item->salary }}" placeholder="500,000">
                    </div>
                    <div class="form-group hinted">
                        <label for="head_name">Head</label>
                        <input type="text" class="form-control hint-item" id="head_name" name="head_name" value="{{ old('head_name') ? old('head_name') : $head->name }}" placeholder="Superior's Name" autocomplete="off">
                        <input type="hidden" name="head" value="{{ $item->head }}" />
                        <div class="hint-content"></div>
                    </div>
                    <div class="form-group">
                        <label for="date">Date of Employment</label>
                        <input type="date" value="{{ $item->hire_date }}" class="form-control" id="hire_date" name="hire_date">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a onclick="event.preventDefault();" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Delete</a>
                </div>
                @csrf
                <input type="hidden" name="_method" value="PUT" />
            </form>
        </div>
    </div>
</div>
@include('admin.employees.delete')
@endsection







