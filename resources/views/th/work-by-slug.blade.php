@extends('layouts.th-layout',['title' => $data->title])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
    	<!--h2>{{$data->title}}</h2-->
     <?php echo $data->content ?>		
	</div>
@endsection