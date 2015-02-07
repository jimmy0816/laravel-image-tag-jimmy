@extends('layout')

@section('content')

<h1>Show List</h1>

@foreach($uploads as $index => $item)

<img src="{{str_replace('/public','',$item->path)}}{{$item->filename}}">
@endforeach

@stop