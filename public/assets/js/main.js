$(document).ready(function(){$("ul#sidebarMenu li").click(function(e){$("ul#sidebarMenu li").removeClass("active"),$(e.currentTarget).addClass("active"),$("li > ul").not($(this).children("ul").toggle()).hide()})});
//# sourceMappingURL=main.js.map
