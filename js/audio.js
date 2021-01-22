//$(window).load(function(){
// jQuery(function($){
// 	var id = $(".audio-options").data("id");
// 	var tag = $(".bCtn_detail.content .audio audio").attr("id");

// 	console.log(id);

// 	$(tag).attr("id","audio"+id);
// });


//$(function() {
jQuery(function($){
	$(".audio-options .playing-rate").on("click", function() {
		var rate_list = [1.0, 1.2, 1.5, 2.0];
		var length = rate_list.length;
		var id   = $(this).parent().data("id");
		var rate = $(this).parent().data("rate");
		var media = document.getElementById('audio'+id);
		var idx;
		var new_rate;

		 console.log(media);

		 console.log("click");
		 console.log(rate_list);
		 console.log(id);
		 console.log(rate);
		 console.log(length);

		new_rate = 1;
		for (idx=0; idx<length; idx++) {
			if (rate == rate_list[idx]) {
				if (idx == length-1) {
					new_rate = rate_list[0];
				} else {
					new_rate = rate_list[idx+1];
				}

				break;
			}
		}

		 console.log(new_rate);

		// var id = $('audio#audio'+id+'[data-id="'+id+'"]').data("id");
		// var status = $('audio#audio'+id+'[data-id="'+id+'"]').data("status");
		 // console.log(id);
		 // console.log(status);


		media.playbackRate = new_rate;
		$(this).parent().data("rate", new_rate);
		// $(this).children(".playing-rate").html("倍速再生 x"+new_rate);
		$(this).html("倍速再生 x"+new_rate);
	});
});




//$(window).load(function(){
jQuery(function($){
	var id2 = $(".audio-options").data("id");
	var tag2 = $(".bCtn_detail.content .audio audiosec").attr("id");

	console.log(id2);

	$(tag2).attr("id","audiosec"+id2);
});


//$(function() {
jQuery(function($){
	$(".audio-options-x").on("click", function() {
		var id2   = $(this).data("id");
		var rate = $(this).data("rate");
		var media2 = document.getElementById('audiosec'+id);
		var idx;
		var new_rate;

		 console.log(media);

		 console.log("click");
		 console.log(rate_list);
		 console.log(id2);
		 console.log(rate);
		 console.log(length);

		new_rate = 1;
		for (idx=0; idx<length; idx++) {
			if (rate == rate_list[idx]) {
				if (idx == length-1) {
					new_rate = rate_list[0];
				} else {
					new_rate = rate_list[idx+1];
				}

				break;
			}
		}

		 console.log(new_rate);

		// var id = $('audio#audio'+id+'[data-id="'+id+'"]').data("id");
		// var status = $('audio#audio'+id+'[data-id="'+id+'"]').data("status");
		 console.log(id2);
		 console.log(status);


		media.playbackRate = new_rate;
		$(this).data("rate", new_rate);
		$(this).children(".playing-rate").html("倍速再生 x"+new_rate);
	});
});




