@extends('layouts.app')

@section('title')
    {{ $blogs->title }}
@endsection

@section('content')
    <h1>{{ $blogs->title }}</h1>
    <div>{!! $blogs->content !!}</div>
    <hr>
@endsection
