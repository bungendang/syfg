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

<div class="col-md-offset-3 col-md-6 editDrive">
	<form action="/drive/edit/{{$data['id']}}" method="POST">
    {{ csrf_field() }}
    	<div class="form-group">
    		<label for="title">Title</label>
    		<input type="text" class="form-control" value="{{$data->title}}" name="title" id="title">
    	</div>
    	<div class="form-group">
    		<label for="note">Note</label>
    		<textarea name="note" id="note" class="form-control" rows="10">{{$data->comment}}</textarea>
    	</div>
    	<button class="btn btn-primary">Update</button>
    </form>
</div>
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

 
@endsection