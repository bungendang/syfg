@extends('layouts.en-layout',['title' => 'Home'])

@section('sidebar')
    @parent

 
@endsection

@section('content')
    @foreach($upcomings as $upcoming)
	{{$upcoming['title']}}
    @endforeach
@endsection