




var express = require('express');
var path = require('path');

var app = express();
var PORT = 3000;

app.use(express.static(path.join(__dirname, 'public')));


app.listen(PORT, function () {
    console.log('Example app listening on port ' + PORT);
});

//$("#btnRules").click(function () {
//    $.ajax({
//        url: 'http://localhost:' + PORT + '/rules', type: 'POST', success: function () {
//            window.location = 'BlackjackRules.txt';
//        }
//    });
//});