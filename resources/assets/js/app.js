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
            $('#confirm-delete').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });    
});


