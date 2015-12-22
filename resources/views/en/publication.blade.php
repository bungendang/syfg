@extends('layouts.en-layout',['title' => 'Publication'])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
			<ul class="publication-list">
    	@foreach ($publications as $index => $pub)
	
			@foreach ($pub['info'] as $in)
				    <?php 
                        $info[$in['key']] = $in['value'];  
                    ?>
				
			@endforeach
			<li><a href="{{$info['publication-link']}}" target="_blank">{{ isset($info['writer']) ? ucfirst($info['writer']) : ''}}{{ isset($info['writer']) ? ', ' : ''}}{{$pub['judul']}}{{ isset($pub['judul']) ? ', ' : ''}}{{ isset($info['media-publisher']) ? $info['media-publisher'] : ''}}{{ isset($info['media-publisher']) ? ', ' : ''}}{{ date('F d, Y', strtotime($pub['tanggal'])) }}</a></li>
    	@endforeach				
			</ul>
	</div>
@endsection