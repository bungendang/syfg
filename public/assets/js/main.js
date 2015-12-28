$(document).ready(function(){$("ul#sidebarMenu li").click(function(e){$("ul#sidebarMenu li").removeClass("active"),$(e.currentTarget).addClass("active"),$("li > ul").not($(this).children("ul").toggle()).hide()}),$("#toggleMenu").click(function(e){$("#mainMenu").toggleClass("show","addOrRemove")})});
//# sourceMappingURL=main.js.map
