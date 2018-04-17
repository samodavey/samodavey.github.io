$('.homelink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#nameTitle').offset().top-200}, '500');
})

$('.aboutlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#about').offset().top-100}, '500');
})

$('.skillslink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#skills').offset().top-100}, '500');
})

$('.projectlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#projects').offset().top-100}, '500');
})

$('.cvlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#cv').offset().top-100}, '500');
})

$('.contactlink').on('click', function() {
    var body = $("html, body");
    body.stop().animate({scrollTop:$('#contact').offset().top-100}, '500');
})
