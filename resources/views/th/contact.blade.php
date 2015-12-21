@extends('layouts.th-layout',['title' => 'Contact'])

@section('sidebar')
    @parent

@endsection

@section('content')
     <div class="inner-content">
          <div class="post-content">
               <?php echo $content ?>
          </div>
     </div>
@endsection