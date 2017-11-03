@extends('layouts.layout')
@section('content')
    @foreach($catList as $category)
        {{$category}}
        @endforeach

    @foreach($posts as $post)
    {{$post}}
    @endforeach

@endsection