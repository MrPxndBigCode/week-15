@extends('layouts.app')

@section('title')
    หน้าแรกของเว็บไซต์
@endsection

@section('content')
    <h2>ยินดีต้อนรับเข้าสู่เว็บไซต์ของฉัน</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem eveniet, quis odit architecto illum
        dicta
        earum totam aliquam id, corrupti consectetur delectus corporis sapiente minus. Amet optio inventore ipsa ut!
    </p>
    <a href="{{ route('abouts') }}">About</a>
    <a href="{{ route('blogs') }}">blog</a>
    @foreach ($blogs as $item)
        <h2>{{ $item->title }}</h2>
        <div>{{ Str::limit(strip_tags($item->content), 100) }}</div>
        <a href="/detail/{{ $item->id }}">อ่านเพิ่มเติม</a>
        <hr>
    @endforeach
@endsection
