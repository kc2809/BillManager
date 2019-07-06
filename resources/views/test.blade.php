@extends('dashboard')

@section('title', ' this is page title')

@section('sidebar')
    @parent

    <div>this is appended text</div>
@endsection


@section('content')
nam is :  {{$name}}

    <div>This is content</div>
@endsection