$(document).ready(function () {


    var used_cards = new Array();

    function card(name, suit, value) {
        this.name = name;
        this.suit = suit;
        this.value = value;
    }

    var deck = [
        new card('Ace', 'Hearts', 11),
        new card('Two', 'Hearts', 2),
        new card('Three', 'Hearts', 3),
        new card('Four', 'Hearts', 4),
        new card('Five', 'Hearts', 5),
        new card('Six', 'Hearts', 6),
        new card('Seven', 'Hearts', 7),
        new card('Eight', 'Hearts', 8),
        new card('Nine', 'Hearts', 9),
        new card('Ten', 'Hearts', 10),
        new card('Jack', 'Hearts', 10),
        new card('Queen', 'Hearts', 10),
        new card('King', 'Hearts', 10),
        new card('Ace', 'Diamonds', 11),
        new card('Two', 'Diamonds', 2),
        new card('Three', 'Diamonds', 3),
        new card('Four', 'Diamonds', 4),
        new card('Five', 'Diamonds', 5),
        new card('Six', 'Diamonds', 6),
        new card('Seven', 'Diamonds', 7),
        new card('Eight', 'Diamonds', 8),
        new card('Nine', 'Diamonds', 9),
        new card('Ten', 'Diamonds', 10),
        new card('Jack', 'Diamonds', 10),
        new card('Queen', 'Diamonds', 10),
        new card('King', 'Diamonds', 10),
        new card('Ace', 'Clubs', 11),
        new card('Two', 'Clubs', 2),
        new card('Three', 'Clubs', 3),
        new card('Four', 'Clubs', 4),
        new card('Five', 'Clubs', 5),
        new card('Six', 'Clubs', 6),
        new card('Seven', 'Clubs', 7),
        new card('Eight', 'Clubs', 8),
        new card('Nine', 'Clubs', 9),
        new card('Ten', 'Clubs', 10),
        new card('Jack', 'Clubs', 10),
        new card('Queen', 'Clubs', 10),
        new card('King', 'Clubs', 10),
        new card('Ace', 'Spades', 11),
        new card('Two', 'Spades', 2),
        new card('Three', 'Spades', 3),
        new card('Four', 'Spades', 4),
        new card('Five', 'Spades', 5),
        new card('Six', 'Spades', 6),
        new card('Seven', 'Spades', 7),
        new card('Eight', 'Spades', 8),
        new card('Nine', 'Spades', 9),
        new card('Ten', 'Spades', 10),
        new card('Jack', 'Spades', 10),
        new card('Queen', 'Spades', 10),
        new card('King', 'Spades', 10)
    ];

    var playerBalance = 1000;
    var betAmount;

    var playerHand = {
        cards: new Array(),
        current_total: 0,

        sumCardTotal: function () {
            this.current_total = 0;
            for (var i = 0; i < this.cards.length; i++) {
                var c = this.cards[i];
                this.current_total += c.value;
            }
            $("#handTotal").html("Player Total: " + this.current_total);

            if (this.current_total > 21) {
                $("#btnHit").toggle();
                $("#btnStand").toggle();
                $("#btnRestart").toggle();
                $("#handTotal").html("Player Total: " + this.current_total);
                $('#gameResult').html("Player Busts!");

            } else if (this.current_total == 21) {

                $("#btnHit").toggle();
                $("#btnStand").toggle();
                $("#btnRestart").toggle();
                $("#handTotal").html("Player Total: " + this.current_total);

                $('#gameResult').html("Player Blackjack!");

                playerBalance = playerBalance + (betAmount * 2.5);
                $("#playerBalance").html("£" + playerBalance);

            }
        }
    };

    var dealerHand = {
        cards: new Array(),
        current_total: 0,

        sumCardTotal: function () {
            this.current_total = 0;
            for (var i = 0; i < this.cards.length; i++) {
                var c = this.cards[i];
                this.current_total += c.value;
            }
            $("#dealerHandTotal").html("Dealer Total: " + this.current_total);
            if (this.current_total >= 17 && this.current_total <= 21 && this.current_total > playerHand.current_total) {
                $("#dealerHandTotal").html("Dealer Total: " + this.current_total);
                $('#gameResult').html("Dealer Wins!");
            }
            else if (this.current_total >= 17 && this.current_total < 21 && this.current_total < playerHand.current_total) {
                $("#dealerHandTotal").html("Dealer Total: " + this.current_total);
                $('#gameResult').html("Dealer Loses!\n Player Wins!");
                playerBalance = playerBalance + (betAmount * 2);
                $("#playerBalance").html("£" + playerBalance);
            }
            else if (this.current_total > 21) {
                $("#dealerHandTotal").html("Dealer Total: " + this.current_total);
                $('#gameResult').html("Dealer Busts!");
                playerBalance = playerBalance + (betAmount * 2);
                $("#playerBalance").html("£" + playerBalance);

            } else if (this.current_total == 21) {
                $("#dealerHandTotal").html("Dealer Total: " + this.current_total);
                $('#gameResult').html("Dealer Blackjack!");
            }
        }
    };


    function getRandom(num) {
        var my_num = Math.floor(Math.random() * num);
        return my_num;
    }

    function deal() {
        for (var i = 0; i < 2; i++) {
            hit();
        }
    }

    function dealerHit() {
        var good_card = false;
        var firstCardCount = 0;
        if ($("#btnStand:visible") && firstCardCount < 1) {
            firstCardCount++;
            do {
                var index = getRandom(52);
                if (!$.inArray(index, used_cards) > -1) {
                    good_card = true;
                    var c = deck[index];
                    used_cards[used_cards.length] = index;
                    dealerHand.cards[dealerHand.cards.length] = c;


                    var $d = $("<div style=\"float:left; padding-left:5px;\">");
                    $d.appendTo("#dealerHand");

                    $("<img>").attr('alt', c.name + ' of ' + c.suit)
                        .attr('title', c.name + ' of ' + c.suit)
                        .attr('src', 'Media Files/Cards/' + c.suit + '/' + c.name + '.png')
                        .appendTo($d);
                }
            } while (!good_card);
            good_card = false;
            dealerHand.sumCardTotal();

        } else if ($("#btnStand:hidden") && firstCardCount == 1) {
            do {
                var index = getRandom(52);
                if (!$.inArray(index, used_cards) > -1) {
                    good_card = true;
                    var c = deck[index];
                    used_cards[used_cards.length] = index;
                    dealerHand.cards[dealerHand.cards.length] = c;


                    var $d = $("<div style=\"float:left; padding-left:5px;\">");
                    $d.appendTo("#dealerHand");

                    $("<img>").attr('alt', c.name + ' of ' + c.suit)
                        .attr('title', c.name + ' of ' + c.suit)
                        .attr('src', 'Media Files/Cards/' + c.suit + '/' + c.name + '.png')
                        .appendTo($d);
                }
            } while (!good_card);
            good_card = false;
            dealerHand.sumCardTotal();
        }

    }

    function hit() {
        var good_card = false;
        do {
            var index = getRandom(52);
            if (!$.inArray(index, used_cards) > -1) {
                good_card = true;
                var c = deck[index];
                used_cards[used_cards.length] = index;
                playerHand.cards[playerHand.cards.length] = c;


                var $d = $("<div style=\"float:left; padding-left:5px;\">");
                $d.appendTo("#playerHand");

                $("<img>").attr('alt', c.name + ' of ' + c.suit)
                    .attr('title', c.name + ' of ' + c.suit)
                    .attr('src', 'Media Files/Cards/' + c.suit + '/' + c.name + '.png')
                    .appendTo($d);

            }
        } while (!good_card);
        good_card = false;
        playerHand.sumCardTotal();
    }

    $("#btnDeal").click(function () {
        if (betAmount > 0) {
            deal();
            dealerHit();
            $(this).toggle();
            $("#btnHit").toggle();
            $("#btnStand").toggle();
        } else {
            alert("You must place a bet in order to play!");
        }

    });

    $("#btnHit").click(function () {
        hit();
    });

    $("#btnStand").click(function () {
        $("#btnHit").toggle();
        $("#btnStand").toggle();
        $("#btnRestart").toggle();

        while (dealerHand.current_total < 17) {
            dealerHit();
        }

    });

    $("#btnRestart").click(function () {
        $(this).toggle();
        $("#btnDeal").toggle();
        $("#btnBet").toggle();
        $("#playerHand").empty();
        $("#dealerHand").empty();
        $("#dealerHandTotal").html("Dealer Total:");
        $("#handTotal").html("Player Total:");
        $("#gameResult").html("");
        $("#currentBet").html("");

        used_cards.length = 0;
        playerHand.cards.length = 0;
        playerHand.current_total = 0;
        dealerHand.cards.length = 0;
        dealerHand.current_total = 0;

        betAmount = 0;
    });

    $("#btnBet").click(function () {

        betAmount = document.getElementById("bettingAmount").value;
        var betCheck = document.getElementById("currentBet");
        if (betAmount > 0 && playerBalance > 0 && !(betAmount > playerBalance)) {
            $(this).toggle();
            playerBalance = playerBalance - betAmount;
            $("#currentBet").html("Current Bet: £" + betAmount);
            $("#playerBalance").html("£" + playerBalance);
            $('#bettingAmount').val("");
        }
    });

    $("#btnRules").click(function (e) {
        var PORT = 3000;
        //Ajax commented out as the browser doesn't recognise it and skips it

        //$.ajax({
        //url: 'http://35.176.65.144' + PORT , type: 'GET', success: function () {
        //    e.preventDefault();
        //    window.location.href = 'BlackjackRules.txt';
        //}

        //url: 'http://35.176.65.144' + PORT,
        //method: 'GET',
        //xhrFields: {
        //    responseType: 'blob'
        //},
        //success: function (data) {
        var a = document.createElement('a');
        //var url = window.URL.createObjectURL(data);
        var url = 'http://35.176.65.144:' + PORT + '/BlackjackRules.txt';
        a.href = url;
        a.download = 'BlackjackRules.txt';
        a.click();
        window.URL.revokeObjectURL(url);
        //}
        //});
    })

});