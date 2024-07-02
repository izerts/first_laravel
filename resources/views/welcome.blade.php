@extends('layouts.app')
@section('title', 'หน้าแรกของเว็บ')


@section('content')
    <h3> บทความบ่าสุด</h3>
    <hr>
    @foreach ($blogs as $item)
        <h2>{{ $item->title }}</h2>
        <p>{{ $item->content }}</p>
        <a href="/detail/{{ $item->id }}">บทความเพิ่มเติม</a>
        <hr>
    @endforeach

@endsection
