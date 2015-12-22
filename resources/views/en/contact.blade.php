@extends('layouts.en-layout',['title' => 'Contact'])

@section('sidebar')
    @parent

@endsection

@section('content')
	<div class="inner-content">
          <div class="post-contact-content">
               <?php echo $content ?>
          </div>
	</div>
@endsection