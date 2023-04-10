@extends('layouts.app')
@section('contents')
<h3>Add new Image</h3>
<hr>
<form class="form-horizontal" action="{{ url('/addImage') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Name:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input" id="email" placeholder="Enter Image Name" name="image_name">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Details:</label>
        <div class="col-sm-10">
            <input type="text" class="edit-input" id="pwd" placeholder="Enter Image Details" 
            name="image_details">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Image:</label>
        <div class="col-sm-10">
            <input type="file" class="edit-input" id="pwd" placeholder="Enter Image"  name="image" style="margin-top: 7px">
        </div>
    </div>




    {{-- last edited --}}
    <div class="form-group">
        <label class="control-label col-sm-2">Author:</label>
        <div class="col-sm-10">
            <select name="author_id" class="edit-input">
                <option value="">--Select a Author---</option>
                @foreach ($author_list as $item)
                <option value="{{ $item->id }}" {{old('author_id') ==$item->id ? 'selected' : ''}}> {{ $item->name }}
                </option>
                @endforeach
            </select>
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
