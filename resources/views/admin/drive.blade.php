@extends('layouts.admin-layout',['title' => 'Dashboard'])

@section('sidebar')
    @parent
	<div>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#fileUploadModal">
  Upload File
</button>
</div>
@endsection

@section('content')



<!-- Modal -->
<form action="/drive" action="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload File</h4>
      </div>
      
      <div class="modal-body">
      
        <div class="form-group">
        	<label for="title">Title</label>
        	<input type="text" class="form-control" name="title" id="title">
        </div>
        <input type="file" name="file" id="file">
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upload</button>
      </div>
      
    </div>
  </div>
</div>
</form>
 
@endsection