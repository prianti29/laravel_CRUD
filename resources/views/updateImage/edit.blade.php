@extends('layouts.app')
@section('contents')
<h3>Edit Image</h3>
<hr>
<form class="form-horizontal" action="{{ url("/addImage/$img->id") }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @method("put")
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input" id="email" placeholder="Enter Image Name" value="{{$img->name}}"
                name="image_name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Details:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input" id="pwd" placeholder="Enter Image Details" value="{{$img->details}}"
                name="image_details">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Image:</label>
        <div class="col-sm-10">
            <input type="file" class="edit-input" id="pwd" placeholder="Enter Image" value="{{$img->image}}"
                name="image">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2">Author :</label>
        <div class="col-sm-10">
            <select name="author_id" class="edit-input">
                <option value="">--Select a Author--</option>
                @foreach ($author_list as $item)
                <option value="{{ $item->id }}">{{ $item->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>
@endsection
