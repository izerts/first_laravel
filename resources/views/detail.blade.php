@extends('layouts.app')
@section('title')
    {{ $blog->title }}
@endsection


@section('content')
    <h3> {{ $blog->title }}</h3>
    <hr>
    <p>{{ $blog->content }}</p>
@endsection
