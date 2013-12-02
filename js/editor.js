$(function () {

    $('button[type="submit"]').mousedown(function () {
	$('textarea[name="code"]').text(editor.getValue());
    });
	
});