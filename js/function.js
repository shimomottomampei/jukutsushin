//$(window).load(function(){
// jQuery(function($){
// 	var id = $(".audio-options").data("id");
// 	var tag = $(".bCtn_detail.content .audio audio").attr("id");

// 	console.log(id);

// 	$(tag).attr("id","audio"+id);
// });

jQuery(document).click(function(event) {
	if(!jQuery(event.target).closest('.header__icon._menu, .header__menulist, .header__close').length ||
		jQuery(event.target).closest('.header__close').length) {
		jQuery(".header__menulist").css("display","none");
	} else {
		jQuery(".header__menulist").css("display","block");
		// jQuery(".header__menulist").css("right","0");
	}
});

//$(function() {
jQuery(function($){
	$(".header__icon._menu").on("click", function() {
		// $(".header__menulist").css("right","0");
		$(".header__menulist").css("display","block");
	});
});

jQuery(function($){
	$(".header__close").on("click", function() {
		// $(".header__menulist").css("right","-100%");
		$(".header__menulist").css("display","none");
	});
});


