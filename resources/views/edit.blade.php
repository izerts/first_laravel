@extends('layouts.app')
@section('title', 'แก้ไขบทความ')
@section('content')
    <h2 class=" text text-center py-2">แก้ไขบทความ</h2>
    <form method="POST" action="{{ route('update', $blog->id) }}">
        @csrf
        <div class=" form-group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
        </div>
        @error('title')
            <div class="my-2">
                <span class="text text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class=" form-group">
            <label for="content">เนื้อหาบทความ</label>
            <textarea name="content" id="" cols="30" rows="5" class="form-control">{{ $blog->content }}</textarea>
        </div>
        @error('content')
            <div class="my-2">
                <span class="text text-danger">{{ $message }}</span>
            </div>
        @enderror
        <input type="submit" value="อัปเดต" class=" btn btn-primary mt-2">
        <a href="/author/blog" class="btn btn-success mt-2">บทความทั้งหมด</a>



    </form>
@endsection
