@extends('layouts.app')

@section('title', 'เขียนบทความ')

@section('content')

    <h2 class="text-center">เขียนบทความ</h2>
    <form method="post" action="{{ route('insert') }}">
        @csrf
        <div class="form-group">
            <label for="title">ชื่อบทความ</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <div class="form-group">
            <label for="content">เนื้อหา</label>
            <textarea class="form-control" id="content" name="content" cols="30" rows="5"></textarea>
        </div>

        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror

        <input onclick="return confirm('คุณต้องการเพิ่มข้อมูลนี้หรือไม่?')" type="submit" class="btn btn-primary my-3">
        <a href="{{ route('blogs') }}" class="btn btn-secondary">บทความทั้งหมด</a>
    </form>

@endsection
