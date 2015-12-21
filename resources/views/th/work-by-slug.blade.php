@extends('layouts.th-layout',['title' => $data->title])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
    	<!--h2>{{$data->title}}</h2-->
    	<div class="post-content">
     <?php echo $data->content ?>		    		
    	</div>	
	</div>
@endsection