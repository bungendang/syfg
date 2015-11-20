@extends('layouts.en-layout',['title' => 'Bio'])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
    <p>Syaiful Garibaldi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, culpa voluptates est deserunt. Vel, libero. Vitae eius autem cum quas, possimus aliquid voluptate ducimus quos fugiat animi, quidem eveniet magnam nostrum, optio a obcaecati tempore! Culpa odit harum corporis eveniet, voluptatibus pariatur commodi praesentium libero, nostrum quibusdam alias dolorum ad? Quae consequuntur ipsum quidem dolorem ipsa neque? Dignissimos eaque illo ea iure, distinctio id dolorum!</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum fuga eaque omnis, deleniti maxime atque aut dolores inventore enim culpa. Optio, aut, eius? Explicabo harum, dignissimos reprehenderit, voluptas cumque repellat commodi voluptatum dolores velit vero minima inventore veritatis sed magni soluta temporibus! Eos ad perspiciatis hic ipsa ea saepe, sequi beatae dicta itaque odit vel quidem doloremque, earum, quibusdam! Culpa aspernatur provident omnis minima ipsam, ex facilis.</p>
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
							<td class="venue">{{ isset($info['venue']) ? $info['venue'] : '-'}}, {{ isset($info['kota']) ? $info['kota'] : ' - ' }}, {{ isset($info['negara']) ? $info['negara'] : ' - ' }}</td>
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
                            <td class="venue">{{ isset($info['venue']) ? $info['venue'] : '-'}}, {{ isset($info['kota']) ? $info['kota'] : '-' }}, {{ isset($info['negara']) ? $info['negara'] : '-' }}</td>
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