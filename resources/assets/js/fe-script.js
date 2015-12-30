$(".btn-source > .btn").click(function(){
    $(".btn-group > .btn").removeClass("active");
    $(this).addClass("active");
});

$(function() {
if ($("#btnThSrc").hasClass("active")) {
	console.log('yang aktif btn th source')
} else if ($("#btnEnSrc").hasClass("active")) {
	console.log('yang aktif btn en source')
} else{};{

};
});



var Router = Backbone.Router.extend({

  routes: {
    "*th/en": "thSourceEnResult",
    "*en/th": "enSourceThResult",
    "id/th": "idSourceThResult"
  },

  thSourceEnResult: function() {
    //console.log('terhah source english result')
    //APP.appView.home();
  }

});

new Router();
Backbone.history.start();

var SourceBtn = Backbone.View.Extend({

});