@extends('layouts.th-layout',['title' => 'Home'])

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
    @foreach($upcomings as $upcoming)
	{{$upcoming['title']}}
    @endforeach
@endsection