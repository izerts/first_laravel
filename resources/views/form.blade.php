@extends('layouts.app')
@section('title', 'บทความทั้งหมด')
@section('content')
    <h2 class=" text text-center py-2">เขียนบทความใหม่</h2>
    <form method="POST" action="/author/insert">
        @csrf
        <div class=" form-group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" name="title" class="form-control">
        </div>
        {{-- @error คือฟังชั่นที่รับข้อมูลการแสดงแจ้ง error ที่เราทำ $request->validate --}}
        @error('title')
            <div class="my-2">
                <span class="text text-danger">{{ $message }}</span>
            </div>
        @enderror
        <div class=" form-group">
            <label for="content">เนื้อหาบทความ</label>
            <textarea name="content" id="" cols="30" rows="5" class="form-control" id="content"></textarea>
        </div>
        @error('content')
            <div class="my-2">
                <span class="text text-danger">{{ $message }}</span>
            </div>
        @enderror
        <input type="submit" value="บันทึก" class=" btn btn-primary mt-2">
        <a href="/author/blog" class="btn btn-success mt-2">บทความทั้งหมด</a>
    </form>


@endsection
