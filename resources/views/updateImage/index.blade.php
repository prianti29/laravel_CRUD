@extends('layouts.app')
@section('contents')

<a href="{{url('/addImage/create')}}" class="btn btn-success ">Add new</a>
<hr>
<table class="table table-borderd">
    <tr>
        <th>Name</th>
        <th>Details</th>
        <th>Image</th>
        <th>Author</th>
        <th>Action</th>
    </tr>
    @foreach ($image_list as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->details}}</td>
        <td><img src="{{url("/$item->image")}}" class= "img1"></td>
        <td>{{ $item->author->name}}</td>
        <td>
            <a href="{{ url("/addImage/$item->id/edit") }}" class="btn btn-warning ">Update</a>
            <form action="{{ url("/addImage/$item->id")}}"method="POST" onsubmit="return confirm('Do you really want to delete this category?');">
            @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger dlt-btn">
            </form>
        </td>
    
     
    </tr>
    @endforeach
</table>
@endsection
