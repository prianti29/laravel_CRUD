@extends('layouts.app')
@section('contents')
<h3>Add new Image</h3>
<hr>
<form class="form-horizontal" action="{{ url('/author') }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- <div class="form-group">
        <label class="control-label col-sm-2">ID:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input"placeholder="Enter Author ID" name="author_id">
        </div>
    </div> --}}
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input" id="pwd" placeholder="Enter Author Name" 
            name="author_name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Email:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input" id="pwd" placeholder="Enter Author Email"  name="author_email" style="margin-top: 7px">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Create</button>
        </div>
    </div>
</form>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
