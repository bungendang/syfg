@extends('layouts.en-layout',['title' => $data->title->rendered])

@section('sidebar')
    @parent

@endsection

@section('content')
     {{$data->title->rendered}}
@endsection