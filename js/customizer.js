(function($){wp.customize("blogname",function(value){value.bind(function(to){$(".site-title a").text(to)})});wp.customize("blogdescription",function(value){value.bind(function(to){$(".site-description").text(to)})});wp.customize("header_textcolor",function(value){value.bind(function(to){$(".site-title a, .site-description").css("color",to)})})})(jQuery);