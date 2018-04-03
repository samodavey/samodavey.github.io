$('.homelink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#logo').offset().top}, '500');
})

$('.aboutlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#aboutUs').offset().top}, '500');
})

$('.projectlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#projects').offset().top}, '500');
})

$('.contactlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#contactUs').offset().top}, '500');
})
