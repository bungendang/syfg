@extends('layouts.admin-layout',['title' => 'Dashboard'])

@section('sidebar')
    @parent

@endsection

@section('content')
    <form action="/drive/upload" method="POST"  enctype="multipart/form-data">
    	{{ csrf_field() }}
    	<div class="form-group">
    		<label for="title">Title</label>
    		<input type="text" class="form-control" name="title" id="title">
    	</div>
    	<div class="form-group">
    		<input type="file" id="file" name="file">
    	</div>
    	<button type="submit" class="btn btn-default">upload</button>
    </form>
@endsection