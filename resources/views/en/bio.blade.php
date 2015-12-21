@extends('layouts.en-layout',['title' => 'Bio'])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
        <div class="post-content">
            <?php echo $content ?>
        </div>
    	<div class="list-exhibition">
    		<div class="solo-exhibition">
    			<h2 class="title">Solo Exhibition</h2>
                <?php
                $tahun = 'kosong' ?>
                    <ul class="list-solo">
    				@foreach ($solos as $solo)
                    <?php //var_dump($solo[0]['tempat']);
                     
                     ?>
                     
                      <?php 
                        if ($tahun === $solo[0]['tahun'] ){
                            $tulis = '';
                        }
                        else{
                            $tahun = $solo[0]['tahun'];
                            $tulis = $solo[0]['tahun'];
                        }
                             ?>
                             
                        @foreach ($solo[0]['tempat'] as $t)
                            <?php 
                                $info[$t['key']] = $t['value'];  
                             ?>
                        @endforeach
                        <?php if ($tulis != '') {
                            ?>
                            <li class="year">{{$tulis}}</li>
                        <?php
                        }else{
                            // tidak melakukan apa-apa
                        }
                            ?>
                            <li>{{$solo[0]['judul']}}, {{ isset($info['venue']) ? $info['venue'] : ''}}{{ isset($info['venue']) ? ', ' : ''}}{{ isset($info['kota']) ? $info['kota'] : '' }}{{ isset($info['kota']) ? ', ' : '' }}{{ isset($info['negara']) ? $info['negara'] : '' }}{{ isset($info['negara']) ? '. ' : '' }}</li>
                        
                        
    				@endforeach
                    </ul>
                    <?php 
                            unset($info);
                           unset($tahun);
                         ?>

    		</div>
    		<div class="group-exhibition">
    			<h2 class="title">Group Exhibition</h2>
                                <?php
                $tahun = 'kosong' ?>
                <ul class="list-group">
                    @foreach ($groups as $group)
                    <?php 
                        if ($tahun === $group[0]['tahun'] ){
                            $tulis = '';
                        }
                        else{
                            $tahun = $group[0]['tahun'];
                            $tulis = $group[0]['tahun'];
                        }
                     ?>
                        @foreach ($group[0]['tempat'] as $t)
                            <?php 
                                $info[$t['key']] = $t['value'];  
                             ?>
                        @endforeach
                        <?php if ($tulis != '') {
                            ?>
                            <li class="year">{{$tulis}}</li>
                        <?php
                        }else{
                            // tidak melakukan apa-apa
                        }
                            ?>
                            <li>{{$group[0]['judul']}}, {{ isset($info['venue']) ? $info['venue'] : ''}}{{ isset($info['venue']) ? ', ' : ''}}{{ isset($info['kota']) ? $info['kota'] : '' }}{{ isset($info['kota']) ? ', ' : '' }}{{ isset($info['negara']) ? $info['negara'] : '' }}{{ isset($info['negara']) ? '. ' : '' }}</li>
                        
                        <?php 
                            unset($info);
                         ?>
                    @endforeach
                    </ul>
    		</div>

    	</div>
	</div>
@endsection