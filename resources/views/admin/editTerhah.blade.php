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
            <label for="indonesian">Indonesian</label>
           
            @foreach ($data['indonesian'] as $indo)
                <input type="text" class="form-control multiple" name="indonesian[{{$indo['id']}}]" id="indonesian" value="{{$indo['word']}}">
            @endforeach
        </div>
        <hr>
        <div class="form-group">
            <label for="english">English</label>
            @foreach ($data['english'] as $english)
                <input type="text" class="form-control multiple" name="english[{{$english['id']}}]" id="indonesian" value="{{$english['word']}}">
            @endforeach
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>	
@endsection