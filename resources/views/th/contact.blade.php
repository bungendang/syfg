@extends('layouts.th-layout',['title' => 'Contact'])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
     <table class="contact-table">
     	<tr>
     		<td class="vat addr">Studio</td>
     		<td class="vat colon">:</td>
     		<td>Bukit Raya Bawah no. 298, Ciumbuleuit <br>
     		Bandung</td>
     	</tr>
     	<tr>
     		<td class="addr">E-mail</td>
     		<td class="colon">:</td>
     		<td><a href="mailto:syaifulgaribaldi@gmail.com">syaifulgaribaldi@gmail.com</a></td>
     	</tr>
     	<tr>
     		<td class="addr">Hp</td>
     		<td class="colon">:</td>
     		<td>+62 856 219 2305</td>
     	</tr>
     </table>
	</div>
@endsection