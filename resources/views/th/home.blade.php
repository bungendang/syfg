@extends('layouts.th-layout',['title' => 'Home'])

@section('title', 'Home')

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
    @foreach($upcomings as $upcoming)
	{{$upcoming['title']}}
    @endforeach		
	</div>
@endsection