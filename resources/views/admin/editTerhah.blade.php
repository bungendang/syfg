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
<div class="col-md-offset-3 col-md-6 editWord">
    <form action="/edit/th/{{$data['id']}}" method="POST">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="word">Word</label>
            <input type="text" class="form-control" name="word" id="word" value="{{$data['terhah']['word']}}">
        </div>
        <div class="form-group">
            <label for="spelling">Spelling</label>
            <input type="text" class="form-control" name="spelling" id="spelling" value="{{$data['terhah']['spelling']}}">
        </div>
        <hr>
        <div class="form-group">
            <label for="indonesian">Indonesian</label><a id="indoAdd" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus"></span></a>
            @foreach ($data['indonesian'] as $indo)
            <div class="input-group">
                <input type="text" class="form-control multiple" name="indonesian[{{$indo['id']}}]" id="indonesian" value="{{$indo['word']}}">
                <span class="input-group-btn">
                    <a class="btn btn-default multiple" data-href="/delete/id/{{$indo['id']}}/{{$data['id']}}" data-toggle="modal" data-target="#confirm-delete">
        <span class="glyphicon glyphicon-remove"></span>
    </a>
                </span>                
            </div>

            @endforeach
            <div class="controls"> 
                <div class="entryIndo hide">
                    <div class="entry input-group">
                        <input class="form-control multiple" name="indoFields[]" type="text" placeholder="Type something" id="indoNew" />
                        <span class="input-group-btn ">
                            <a class="btn btn-success btn-add multiple" type="button" id="btnIndo">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="english">English</label><a id="englishAdd" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus"></span></a>
            @foreach ($data['english'] as $english)
            <div class="input-group">
                <input type="text" class="form-control multiple" name="english[{{$english['id']}}]" id="indonesian" value="{{$english['word']}}">
                <span class="input-group-btn">
                    <a class="btn btn-default multiple" data-href="/delete/en/{{$english['id']}}/{{$data['id']}}" data-toggle="modal" data-target="#confirm-delete">
        <span class="glyphicon glyphicon-remove"></span>
    </a>
                </span>
            </div>

            @endforeach
             <div class="engcontrols"> 
                <div class="entryEng hide">
                    <div class="entry input-group">
                        <input class="form-control multiple" name="engFields[]" type="text" placeholder="Type something" id="indoNew" />
                        <span class="input-group-btn ">
                            <a class="btn btn-success btn-add-eng multiple" type="button" id="btnAddIndo">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Save</button>
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
                    <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection