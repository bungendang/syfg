@extends('layouts.admin-layout',['title' => 'Dashboard'])

@section('sidebar')
    <div class="form-insert">
      <form action="/api/v1/upload/" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Title</label>
          <input data-validation="required" type="text" class="form-control" name="title" id="title" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="note">Note</label>
          <textarea name="note" id="note" rows="7" class="form-control" placeholder="Note"></textarea>
        </div>
        <hr>
        <div class="fp">
          <label for="file">File</label>
          <input type="file" name="file" id="file">
        </div>
        <div class="text-right">
        <button class="btn btn-default">Upload</button>  
        </div>
        
      </form>
    </div>
@endsection

@section('content')
<div class="drive-nav">
    <button class="btn btn-primary" id="menu-toggle"><span class="glyphicon glyphicon-plus"></span></button>  
</div>

<div class="list-files">
  <table class="files table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Url</th>
      </tr>
    </thead>
    <tbody>
    @foreach($files as $file)
      <tr>
        <td></td>
        <td>{{$file->title}}</td>
        <td>{{$file->url}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>
 
@endsection