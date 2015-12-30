<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Terhah Dictionary {{$tanggal}}</title>
	<link rel="stylesheet" type="text/css"  href="{{ asset('css/pdf.css') }}" media="all">
</head>
<body>
	<h1 class="title">Terhah Dictionary</h1>
	<div class="dict-table">
		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$row = 0;
			$alfabet = 'poa';
			?>
				@foreach ($data as $index => $d)
				<?php 
					$kata = $d->word;
					//$alfabet = $kata[0];
					if ($alfabet != $kata[0]) {
					?>
					<tr class="alfa">
						<td colspan="2">{{ucfirst($kata[0])}} / <span class="terhah">{{ucfirst($kata[0])}}</span></td>
						<td colspan="2"></td>
					</tr>
						 
					<?php
					$index = 0;
					$kolom = $index; 
					}else{
						$kolom++;
					}
					$alfabet = $kata[0];

					 ?>
				@if($kolom % 4 == 0)
				<?php  ?>
				<tr>
					
				@else
				@endif
					
					<td>
					<span class="terhah">{{$d->word}}</span> <br>
					{{$d->word}} <br>
					{{implode('; ',$d->indonesian)}} <br>
					{{implode('; ',$d->english)}}
					</td>

				@if($kolom < 4)
				<?php $row = $row + 1 ?>
				
				@elseif($kolom % 4 == $row)
					</tr>
				@else
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>