$('.homelink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#logo').offset().top}, '500');
})

$('.aboutlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#about').offset().top}, '500');
})

$('.skillslink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#skills').offset().top}, '500');
})

$('.projectlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#projects').offset().top}, '500');
})

$('.cvlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#cv').offset().top}, '500');
})

$('.contactlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#contact').offset().top}, '500');
})
