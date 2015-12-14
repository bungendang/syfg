@extends('layouts.th-layout',['title' => 'Bio'])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
    <span>Born in Jakarta, July 16th 1985</span>
    <br>
    <span>Lives and works in Bandung, West Java, Indonesia</span>
    <br>
    <h3>Education</h3>
    <span>MA Japan / UK</span>
    <br>
    <span>BFA Majoring Printmaking, Faculty of Art and Design, Bandung Institute of Technology (ITB), Bandung - Indonesia</span>
    <br>
    <span>Argonomy, Faculty of Agriculture, University of Padjajaran (UNPAD), Bandung - Indonesia</span>
    	<div class="list-exhibition">
    		<div class="solo-exhibition">
    			<h2 class="title">Solo Exhibition</h2>
    			<table class="exhibition">
                <?php
                $tahun = 'kosong' ?>
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

						<tr>
							<td class="year">{{$tulis}}</td>
							<td class="title">{{$solo[0]['judul']}}</td>
							<td class="venue">{{ isset($info['venue']) ? $info['venue'] : ''}}{{ isset($info['venue']) ? ', ' : ''}}{{ isset($info['kota']) ? $info['kota'] : '' }}{{ isset($info['kota']) ? ', ' : '' }}{{ isset($info['negara']) ? $info['negara'] : '' }}{{ isset($info['negara']) ? '. ' : '' }}</td>
						</tr>
                        
    				@endforeach
                    <?php 
                            unset($info);
                           unset($tahun);
                         ?>
    			</table>
    		</div>
    		<div class="group-exhibition">
    			<h2 class="title">Group Exhibition</h2>
                <table class="exhibition">
                                <?php
                $tahun = 'kosong' ?>
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
                        <tr>
                            <td class="year">{{$tulis}}</td>
                            <td class="title">{{$group[0]['judul']}}</td>
                            <td class="venue">{{ isset($info['venue']) ? $info['venue'] : ''}}{{ isset($info['venue']) ? ', ' : ''}}{{ isset($info['kota']) ? $info['kota'] : '' }}{{ isset($info['kota']) ? ', ' : '' }}{{ isset($info['negara']) ? $info['negara'] : '' }}{{ isset($info['negara']) ? '. ' : '' }}</td>
                        </tr>
                        <?php 
                            unset($info);
                         ?>
                    @endforeach
                </table>
    		</div>

    	</div>
	</div>
@endsection