@extends('layouts.en-layout',['title' => 'Publication'])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
    	@foreach ($publications as $index => $pub)
	
			@foreach ($pub['info'] as $in)
				    <?php 
                        $info[$in['key']] = $in['value'];  
                    ?>
				
			@endforeach
			<p>{{ isset($info['writer']) ? $info['writer'] : ''}}{{ isset($info['writer']) ? ', ' : ''}}{{$pub['judul']}}{{ isset($pub['judul']) ? ', ' : ''}}{{ isset($info['media-publisher']) ? $info['media-publisher'] : ''}}{{ isset($info['media-publisher']) ? ', ' : ''}}{{ date('F d, Y', strtotime($pub['tanggal'])) }} <a href="{{$info['publication-link']}}" target="_blank">Link</a> </p>
    	@endforeach
	</div>
@endsection