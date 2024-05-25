@extends('layout')
@section('content')
<form method="POST" action="{{ route('crud.update',['crud' => $crud->id]) }}" enctype="multipart/form-data" class="form-horizontal" role="form">
    @csrf
    @method('PUT')
    <h2>Edit User Details</h2>
    <div class="form-group">
        <label for="firstName" class="col-sm-3 control-label">First Name</label>
        <div class="col-sm-9">
            <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control" value="{{ $crud->first_name }}" autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="lastName" class="col-sm-3 control-label">Last Name</label>
        <div class="col-sm-9">
            <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control" value="{{ $crud->last_name }}" autofocus>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{ $crud->email }}">
        </div>
    </div>
    <div class="form-group">
        <label for="contact" class="col-sm-3 control-label">Contact No</label>
        <div class="col-sm-9">
            <input type="number" id="contact" name="contact" placeholder="Contact No" class="form-control" value="{{ $crud->contact}}">
        </div>
    </div>
    <div class="form-group">
        <label for="address" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-9">
            <textarea name="address" id="address" cols="49" rows="3" class="form-control">{{ $crud->address }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="country" class="col-sm-3 control-label">Country</label>
        <div class="col-sm-9">
            <select id="country" name="country" class="form-control">
                <option selected >Select</option>
                @foreach ($countries as $country)
                <option value="{{ $country->id }}" @if ($crud->country == $country->id) selected @endif>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- /.form-group -->
    <div class="form-group">
        <label class="control-label col-sm-3">Gender</label>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-4">
                    <label class="radio-inline">
                        <input type="radio" id="femaleRadio" name="gender" value="Female" @if ($crud->gender == 'Female') checked @endif>Female
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="radio-inline">
                        <input type="radio" id="maleRadio" name="gender" value="Male" @if ($crud->gender == 'Male') checked @endif>Male
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- /.form-group -->
    <div class="form-group">
        <label class="control-label col-sm-3">Hobbies</label>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-4">
                    <label class="form-check-inline">
                        <input type="checkbox" id="travelling" name="hobbies[]" value="travelling" @if (in_array('travelling',$crud->hobbies_arr)) checked @endif>Travelling
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="form-check-inline">
                        <input type="checkbox" id="coding" name="hobbies[]" value="coding" @if (in_array('coding',$crud->hobbies_arr)) checked @endif>Coding
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="form-check-inline">
                        <input type="checkbox" id="reading" name="hobbies[]" value="reading" @if (in_array('reading',$crud->hobbies_arr)) checked @endif>Reading
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- /.form-group -->
    <div class="form-group">
        <label for="profile" class="col-sm-3 control-label">Profile</label>
        <div class="col-sm-9">
            <img style="width: 160px;height:210px;" src="{{ url('profiles') . '/' .$crud->profile }}" alt="Profile Image">
        </div>
    </div>
    <div class="form-group">
        <label for="profile" class="col-sm-3 control-label">New Select Profile</label>
        <div class="col-sm-9">
            <input type="file" name="profile" id="profile">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('crud.index') }}" class="btn btn-primary">Cancel</a>
        </div>
    </div>
</form>
<!-- /form -->
@endsection
