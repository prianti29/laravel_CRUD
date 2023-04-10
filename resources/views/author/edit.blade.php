@extends('layouts.app')
@section('contents')
<h3>Edit Author</h3>
<hr>
<form class="form-horizontal" action="{{ url("/author/$author->id") }}" method="POST" enctype="multipart/form-data" class="edit-form">
    @method("put")
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input" id="email" placeholder="Enter Author Name" value="{{$author->name}}"
                name="author_name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Email:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input" id="pwd" placeholder="Enter Author Email" value="{{$author->email}}"
                name="author_email">
        </div>
    </div>
  
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>
@endsection
