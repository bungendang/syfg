@extends('layouts.admin-layout',['title' => 'Dashboard'])

@section('sidebar')

    <div class="form-insert">
      <form method="POST" enctype="multipart/form-data" action="" id="fileUploadForm" >
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
        <input type="submit" value="Upload" class="btn btn-default" id="uploadBtn" onclick="uploadFile()">
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
        <th>Note</th>
        <th>Url</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($files as $file)
      <tr>
        <td></td>
        <td><a href="{{$file->url}}">{{$file->title}}</a></td>
        <td>{{$file->comment}}</td>
        <td><button class="btn btn-default btn-sm" data-clipboard-text="{{$file->url}}">
    Copy to clipboard
</button></td>
        <td><a href="/drive/edit/{{$file->id}}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></a><button class="btn btn-default btn-xs" data-href="/drive/delete/{{$file->id}}" data-toggle="modal" data-target="#confirm-delete">
        <span class="glyphicon glyphicon-trash"></span>
    </button></td>
      </tr>
    @endforeach
    </tbody>
  </table>
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
            
                <div class="modal-body">
                    <p>You are about to delete one track, this procedure is irreversible.</p>
                    <p>Do you want to proceed?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection