//jQuery is required to run this code
$( document ).ready(function() {

    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function() {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });

});

function submitPlayer() {
    //Minor bug regarding unique names, currently being overridden
    var playerName = document.getElementById("playerInput").value;

    localStorage.setItem("playerName", playerName);

}

function getPlayer() {
    var welcomeName = document.getElementById("chosenName");

    var caughtPlayer = localStorage.getItem("playerName");


    if (caughtPlayer) {
        welcomeName.innerHTML = "Welcome " + caughtPlayer;
    }  else {
        welcomeName.innerHTML = "Welcome Unknown Player";
    }


}

function scaleVideoContainer() {

    var height = $(window).height() + 5;
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height',unitHeight);

}

function initBannerVideoSize(element){

    $(element).each(function(){
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element){

    var windowWidth = $(window).width(),
    windowHeight = $(window).height() + 5,
    videoWidth,
    videoHeight;

    // console.log(windowHeight);

    $(element).each(function(){
        var videoAspectRatio = $(this).data('height')/$(this).data('width');

        $(this).width(windowWidth);

        if(windowWidth < 1000){
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top' : 0, 'margin-left' : -(videoWidth - windowWidth) / 2 + 'px'});

            $(this).width(videoWidth).height(videoHeight);
        }

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}

function doAJAX(file) {
    var call;
    var currentPlayerName = document.getElementById("playerInput").value;
    call = new XMLHttpRequest();

    // Do this when the ready state changes
    call.onreadystatechange = function () {
        // 4 means request finished and 200 means everything is correct
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("AJAXCall").innerHTML = call.responseText + currentPlayerName;
        }
    };

    // Request details(get something, from this location, asynchronous?)
    call.open("GET", file, true);
    call.send();
}
