@extends('layouts.admin-layout',['title' => 'Dashboard'])

@section('sidebar')
    <div class="form-insert">
    	<form action="/terhah/add" method="POST">
    	{{ csrf_field() }}
    		<div class="form-group">
    			<label for="word">Word</label>
    			<input data-validation="required" type="text" class="form-control" name="word" id="word" placeholder="Word">
    		</div>
    		<div class="form-group">
    			<label for="spelling">Spelling</label>
    			<input type="text" class="form-control" name="spelling" id="spelling" placeholder="Spelling">
    		</div>
    		<hr>
    		<div class="form-group">
    			<label for="idWord">Indonesian (Words)</label>
    			<input data-validation="required"  type="text" class="form-control" name="idWord" id="idWord" placeholder="Words in Indonesian">
    		</div>
    		<div class="form-group">
    			<label for="enWord">English (Words)</label>
    			<input data-validation="required"  type="text" class="form-control" name="enWord" id="enWord" placeholder="Words in English">
    		</div>
    		<button class="btn btn-default">Submit</button>
    	</form>
    </div>

@endsection



@section('content')
<div class="terhah-nav">
    <button class="btn btn-primary" id="menu-toggle"><span class="glyphicon glyphicon-plus"></span></button>  
</div>
<div id="words" class="content">
<input class="search" placeholder="Search" />

    <table class="table">
        <thead>
        	<tr>
        		<th>Terhah</th>
        		<th>Kata<button class="btn btn-default btn-xs sort" data-sort="terhah"><span class="glyphicon glyphicon-chevron-down"></span></button></th>
        		<th>Indonesian<button class="btn btn-default btn-xs sort" data-sort="indo"><span class="glyphicon glyphicon-chevron-down"></span></button></th>
        		<th>English<button class="btn btn-default btn-xs sort" data-sort="eng"><span class="glyphicon glyphicon-chevron-down"></span></button></th>
                <th>Action</th>
        	</tr>
        </thead>
        <tbody class="list">
        	<?php foreach ($terhah as $key => $kata): ?>
        		<tr>
        			<td class="th">{{$kata->word}}</td>
        			<td class="terhah">{{$kata->word}}</td>
        			<td class="indo">{{implode('; ',$kata->indonesian)}}</td>
        			<td class="eng">{{implode('; ',$kata->english)}}</td>
                    <td><a href="/edit/th/{{$kata->id}}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></a><button class="btn btn-default btn-xs" data-href="/delete/th/{{$kata->id}}" data-toggle="modal" data-target="#confirm-delete">
        <span class="glyphicon glyphicon-trash"></span>
    </button></td>
        		</tr>

        	<?php endforeach ?>    	
        </tbody>
    </table>
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


<script>

</script>	
@endsection