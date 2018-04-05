require('textarea-autosize/src/jquery.textarea_autosize');

$.fn.enterKey = function (fnc) {
    return this.each(function () {
        $(this).keypress(function (ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        })
    })
}


var push_note = $('#push_note');
var textarea_push = $('textarea#addnote_textarea');
var twits_wrapper = $('#twits_wrapper');
var twits_count = $('#twits_count');

textarea_push.textareaAutoSize();

textarea_push.focusin(function() {
	push_note.css("display","block");
		
});

textarea_push.focusout(function() {
	if(textarea_push.val() == "")
		push_note.css("display","none");
});


push_note.click(function() {
	var twit = textarea_push.val();
	twit = twit.replace(/\n\r?/g, '<br />');

	if(twit == "")
		return;

	$.ajax({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: "POST",
		url: "/inapi/createtwit",
		data: {
			"twit":twit
		},
		success: function($data) {
			//console.log($data);
			textarea_push.val("");
			textarea_push.height(25);
			push_note.css("display","none");
			twits_wrapper.prepend($data);
			twits_wrapper.children().first().hide().show("slow");
			twits_count.html(parseInt(twits_count.html()) + 1);
		},
		error($data) {
			console.log($data);
			alert("Неизвестная ошибка");
		}
	});
});

$('#twits_wrapper').delegate(".delete-twit", "click", function() {
	var id = $(this).closest(".dropdown").attr("id");
	var me = $(this);
	$.ajax({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		type: "DELETE",
		url: "inapi/twit/"+id,
		data: {},
		success: function($data) {
			//console.log($data);
			var block = me.closest(".twitroot");
			block.fadeOut("slow");
			twits_count.html(parseInt(twits_count.html()) - 1);
		},
		error($data) {
			console.log($data);
			alert("Неизвестная ошибка");
		}
	});
	return false;
});