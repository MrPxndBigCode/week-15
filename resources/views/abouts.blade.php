@extends('layouts.app')

@section('title', 'เกี่ยวดกับเรา')

@section('content')
    <hr>
    <p>ผู้พัฒนาระบบ : {{ $name }}</p>
    <p>วันที่ก่อตั้ง : {{ $date }}</p>
    <hr>
    <h2>เกี่ยวกับเรา5585</h2>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatem eveniet, quis odit architecto illum dicta
        earum totam aliquam id, corrupti consectetur delectus corporis sapiente minus. Amet optio inventore ipsa ut!</p>
    <a href="/">หน้าแรก</a>
@endsection
