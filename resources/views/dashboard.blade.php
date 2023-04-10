@extends('layouts.app')
@section('contents')
<h1>Welcome {{Auth::user()->name}} </h1>
@endsection
