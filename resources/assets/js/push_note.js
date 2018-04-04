require('textarea-autosize/src/jquery.textarea_autosize');

var push_note = $('#push_note ');
var textarea_push = $('textarea#addnote_textarea');
textarea_push.textareaAutoSize();


textarea_push.keyup(function() {
	if ($(this).val() !== "" )
		push_note.css("display","block");
	else 
		push_note.css("display","none");
});