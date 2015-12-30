@extends('layouts.en-layout')

@section('title', 'Terhah Language')

@section('sidebar')
    @parent

@endsection

@section('content')
    <?php //var_dump($data->results) ?>
    <div class="terhah-dictionary">
        <div class="dict-left">
        <a href="#th/en">Tes</a>
        <a href="#en/th">Tes</a>
        <div class="btn-group btn-source">
            <button class="btn" id="btnThSrc">Terhah</button>
            <button class="btn active " id="btnEnSrc">English</button>
            <button class="btn " id="btnIdSrc">Indonesian</button>            
        </div>

            <div class="source-text">
                <textarea name="" id="" rows="6" class="form-control"></textarea>
            </div>
        </div>
        <div class="dict-right">
            <button>English</button>
            <button>Indonesian</button>
            <button>Terhah</button>
            <span class="result" id="result">
                
            </span>
        </div>
        <div class="bottom-content">
            <a href="http://admin.syfg.dev/api/terhah/dictionary" class="btn">Download Last Revision</a>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="/js/underscore-min.js" ></script>
    <script type="text/javascript" src="/js/backbone-min.js" ></script>

    <script type="text/javascript" src="/js/fe-script.js"></script>
@endsection