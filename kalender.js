$(document).ready(function () {
    //including jQuery Datepicker
    $(".date").datepicker();
    $(".date").datepicker('option', 'dateFormat', 'yy-mm-dd');


    $("#bookNow").click(function () {
        var people = Number($("#people").val());
        var room = $("#room").val();
        var checkin = $("#checkin").val();
        var checkout = $("#checkout").val();
        var name = $("#customerName").val();
        var address = $("#address").val();
        var zip = $("#zip").val();
        var city = $("#city").val();
        var mail = $("#mail").val();
        var mobil = $("#mobil").val();


        //Posta alla värden till PsHP
        var bookingData = '&people=' + people + '&room=' + room + '&checkin=' + checkin + '&checkout=' + checkout + '&name=' + name + '&address=' + address + '&zip=' + zip + '&city=' + city + '&mail=' + mail + '&mobil=' + mobil;

        if (checkin.length > 3 && checkout.length > 3 && name.length > 3 && address.length > 4 && zip.length > 4 && city.length > 2 && mail.length > 3 && mobil.length > 6) {
            $.ajax({
                url: "kalender.php",//ändrade från kalender.php
                type: "POST",
                timeout: 45000, //45 sekunder
                data: bookingData,
                error: function () { alert("Kunde inte komma åt databasen"); },
                success: function (phpResponse) {
                    $(".persInfo,.date").val("");
                    alert(phpResponse);
                }
            });
        }
        else {
            alert("Fält ej ifyllda");
        }

    });

    // kör funktionen när användaren gått ur checkin eller checkout-rutan
    $("#checkin, #room").blur(function (e) {
        checkAvaliability();
    });

    $("#checkout").blur(function (e) {
        $("#roomsAvaliable").text("Söker efter lediga rum...").css("color", "#000");
        checkAvaliability();
    });

});

function checkAvaliability() {

    //vänta 0.7 sekunder så datepicker hinner fylla i datumet
    setTimeout(function () {
        var checkin = $("#checkin").val();
        var checkout = $("#checkout").val();
        var roomType = $("#room").val();

        if (checkin < checkout) {
            checkNrOfFreeRooms(checkin, checkout, roomType);

   //$("#roomsAvaliable").html("Det finns <strong>1</strong> ledigt <u>"+$("#room").val()+"rum</u> mellan den " + checkin + " och " + checkout + ".").css("color","green");
        } else if (checkin >= checkout && checkout.length > 0) {
            $("#roomsAvaliable").text("Ooops! Checkin-datumet måste vara före checkout-datumet.").css("color", "red");
        }
    }, 700);
}

function checkNrOfFreeRooms(checkinDate, checkoutDate, roomType) {
    var checkInOutData = '&checkin=' + checkinDate + '&checkout=' + checkoutDate + '&roomType=' + roomType;
    var messageColor = "green";

    if (checkinDate.length > 3 && checkoutDate.length > 3) {
        $.ajax({
            url: "getNrOfFreeRooms.php",
            type: "POST",
            timeout: 45000, //45 secs
            data: checkInOutData,
            error: function () { alert("Kunde inte komma åt databasen"); },
            success: function (phpResponse) {
                var successResponse = "<strong>" + phpResponse + "</strong> ledigt <u>";
                if (phpResponse < 1) { messageColor = "red"; successResponse = "<strong>Tyvärr!</strong> Inget ledigt <u>"; }
                $("#roomsAvaliable").html(successResponse + $("#room").val() + "rum</u> kvar mellan den " + checkinDate + " och " + checkoutDate + "!").css("color", messageColor);
            }
        });
    }
    else {
        alert("Fält ej ifyllda vid avaliabilityCheck");
    }

}
