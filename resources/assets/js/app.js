window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');


$( document ).ready(function() {
    console.log($.fn.tooltip.Constructor.VERSION);
     $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $('#menu-toggle').toggleClass('btn-primary btn-success')
    });
   	 var options = {
    	valueNames: ['terhah','indo','eng']
    };
    var wordList = new List('words',options);

//confirm delete
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });    
//end
//add field indonesian word (edit page)
    var counter = 0;
    var limit = 5;
    function addField(){

    }

     $("#indoAdd").click(function(e) {
        $(".entryIndo").toggleClass("show");
     });
    $("#englishAdd").click(function(e) {
        $(".entryEng").toggleClass("show");
     });

    $(document).on('click', '.btn-add', function(e)
    {
       // console.log('heheh');
        e.preventDefault();

        var controlForm = $('.controls div:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });

     $(document).on('click', '.btn-add-eng', function(e)
    {
       // console.log('heheh');
        e.preventDefault();

        var controlForm = $('.engcontrols div:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add-eng')
            .removeClass('btn-add-eng').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
$("#uploadBtn").click(function(){
$.ajax({
      url:'/drive',
      data:{
        logo:new FormData($("#fileUploadForm")[0]),
        },
      dataType:'json',
      async:false,
      type:'post',
      processData: false,
      contentType: false,
      success:function(response){
        console.log(response);
      },
    });
 });




});


