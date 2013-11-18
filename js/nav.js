function getSelfFileName() {
    var url = window.location.pathname;
    return url.substring(url.lastIndexOf('/') + 1);
}

$(function () {

    $('.nav a[href="' + getSelfFileName() + '"]').parent().attr('class','active');
	
});