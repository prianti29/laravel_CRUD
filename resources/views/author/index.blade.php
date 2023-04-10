@extends('layouts.app')
@section('contents')

<a href="{{url('/author/create')}}" class="btn btn-success ">Add new</a>
<hr>
<table class="table table-borderd">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    @foreach ($author_list as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>
            <a href="{{ url("/author/$item->id/edit") }}" class="btn btn-warning ">Update</a>
            <form action="{{ url("/author/$item->id")}}"method="POST" onsubmit="return confirm('Do you really want to delete this category?');">
            @csrf
                @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger dlt-btn">
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection
