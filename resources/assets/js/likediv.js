var likediv = $('.likediv');

$('.twitpanel').delegate(".likediv", "click", function() {
	var id = $(this).attr("id");
	var me = $(this);
	$.ajax({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: "POST",
		url: "/inapi/like/"+id,
		data: {},
		success: function($data) {
			console.log($data);
			if ($data == 0) { //error
				return; 
			}

			var t = me.children().first();
			if($data == 1)  {//created 
				t.html(parseInt(t.html()) + 1);
				me.addClass("likey");
				me.removeClass("liken");
			}
			else if($data == -1) { //deleted
				t.html(parseInt(t.html()) - 1);
				me.addClass("liken");
				me.removeClass("likey");
			}
		},
		error($data) {
			console.log($data);
		}
	});
});