// ------------------------------
// GOOGLE MAP
// ------------------------------
(function () {
    var map;

    function initMap() {
        //map choises
        var location = new google.maps.LatLng(65.8427799, 21.6920571);
        var mapCanvas = document.getElementById('map-contact');
        var mapOptions = {
            center: location,
            zoom: 11,
            panControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false
        };
        //map is created
        map = new google.maps.Map(mapCanvas, mapOptions);
        //goatmarker values
        var icon = {
            url: 'http://prothemeglobal.com/wp-content/uploads/2014/06/Goat.png',
            scaledSize: new google.maps.Size(65, 65),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(48, 48)
        };
        //ctreating the marker
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            animation: google.maps.Animation.DROP,
            title: 'Den glada geten',
            icon: icon

        });

        //getting google maps objects
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var directionsService = new google.maps.DirectionsService();

        directionsDisplay.setPanel(document.getElementById('directionsPanel'));

        $('#showDirections').on('click', function (e) {
            $('#directionsPanel').slideToggle();
            e.preventDefault();
        });


        //setting google directions objects on this map
        directionsDisplay.setMap(map);
        //getting elements to put them in the map
        var start = document.getElementById('contact-start');
        var travelMode = document.getElementById('contact-mode');
        var contactPanel = document.getElementById('contact-panel');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(contactPanel);
        //fixing autocomplete text for 'contact-start'
        var start_autocomplete = new google.maps.places.Autocomplete(start);
        start_autocomplete.bindTo('bounds', map);
        //calling the calculateAndDisplayRoute function
        calculateAndDisplayRoute(directionsService, directionsDisplay);
        travelMode.addEventListener('change', function () {
            calculateAndDisplayRoute(directionsService, directionsDisplay);
            directionsDisplay.setOptions({
                suppressMarkers: true
            });

        });
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        //setting start as input 'contact-start' and end as long and lat
        var start_origin = document.getElementById('contact-start').value;
        var selectedMode = document.getElementById('contact-mode').value;
        directionsService.route({
            origin: start_origin,
            destination: {
                lat: 65.8427799,
                lng: 21.6920571
            },
            travelMode: google.maps.TravelMode[selectedMode]
        }, function (response, status) {

            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            }
        });
    }

})();


//===============================
//FORM CONTACT PAGE
//===============================
(function () {

    function validateText(id) {
        //------------------------
        //Form name
        //-------------------------
        $('#name-contact').on('change', function () {
            var input = $(this);
            var regex = /^[a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF_]+( [a-zA-Z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF_]+){1,4}$/;
            var isName = regex.test(input.val());
            if (!isName) {
                var div = $('#name-contact').closest(".nameInp");
                div.removeClass("has-success");
                $("#glyph" + id).remove();
                div.addClass("has-error has-feedback");
                div.append('<span id="glyph' + id + '" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                $("<span id='help" + id + "' class='text-danger'>Du beh�ver skriva ditt fulla namn med ett mellanslag imellan</span>").insertAfter(".nameInput");
            } else {
                var div = $('#name-contact').closest(".nameInp");
                div.removeClass("has-error");
                div.addClass("has-success has-feedback");
                $("#help" + id).remove();
                $("#glyph" + id).remove();
                div.append('<span id="glyph' + id + '" class="glyphicon glyphicon-ok form-control-feedback"></span>');
            }
        });
        //------------------------
        //Form phone
        //-------------------------
        $('#tfn-contact').on('change', function () {
            var input = $(this);
            var regex = /^(\d[- ]*|\+\d*){8,20}\d$/;
            var isNumber = regex.test(input.val());
            if (!isNumber) {
                var div = $('#tfn-contact').closest(".numbInp");
                div.removeClass("has-success");
                $("#glyph" + id).remove();
                div.addClass("has-error has-feedback");
                div.append('<span id="glyph' + id + '" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                $("<span id='help" + id + "' class='text-danger'>Du kan bara anv�nda siffror d�remot kan nummret b�rja med ett plus</span>").insertAfter(".numberInput");
            } else {
                var div = $('#tfn-contact').closest(".numbInp");
                div.removeClass("has-error");
                div.addClass("has-success has-feedback");
                $("#help" + id).remove();
                $("#glyph" + id).remove();
                div.append('<span id="glyph' + id + '" class="glyphicon glyphicon-ok form-control-feedback"></span>');

            }
        });
        //------------------------
        //Form email
        //-------------------------
        $('#email-contact').on('change', function () {
            var input = $(this);
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var isEmail = regex.test(input.val());
            if (!isEmail) {
                var div = $('#email-contact').closest(".emailInp");
                div.removeClass("has-success");
                $("#glyph" + id).remove();
                div.addClass("has-error has-feedback");
                div.append('<span id="glyph' + id + '" class="glyphicon glyphicon-remove form-control-feedback"></span>');
                $("<span id='help" + id + "' class='text-danger'>Gl�m inte @ och .</span>").insertAfter(".emailInput");

            } else {
                var div = $('#email-contact').closest(".emailInp");
                div.removeClass("has-error");
                div.addClass("has-success has-feedback");
                $("#help" + id).remove();
                $("#glyph" + id).remove();
                div.append('<span id="glyph' + id + '" class="glyphicon glyphicon-ok form-control-feedback"></span>');

            }
        });
    }

    if (!validateText("contacts")) {
        return false;
    }

})();

//------------------------------
//GALLERY
//------------------------------
(function () {
    var Gallery = {
        //------------------------------------------------------------
        // Global variables
        //------------------------------------------------------------
        $wrapper: $("#gallery"),
        $switchImgBtn: $(".switchImgBtn"),
        $prevBtn: $("#prevBtn"),
        $nextBtn: $("#nextBtn"),
        $images: $(".gallery-thumb"),
        currentImg: undefined,

        //------------------------------------------------------------
        // INIT
        //------------------------------------------------------------
        init: function () {
            // this.showDimmer();
            this.bindEvents();
        },

        //------------------------------------------------------------
        // Event binding
        //------------------------------------------------------------
        bindEvents: function () {
            // Cache Gallery object to self
            var self = this;

            // When we click on thumbnail
            $(this.$images).on('click', function () {
                self.showDimmer();
                self.showImg(this);
                self.showNavigation();
                // self.showCloseBtn();
            });

            // When we click on the dimmer (somewhere on the dimmed area)
            $(document).on('click', '#screenDimmer', function () {
                self.hideCloseBtn();
                self.hideImg(function () {
                    self.hideDimmer();
                    self.hideNavigation();
                });
            });

            // When we press a key on the keyboard
            $(document).on('keydown', function (e) {
                // Left: 37, Right: 39, Esc: 27
                if (e.keyCode === 37 || e.keyCode === 39) {
                    var dir = (e.keyCode === 37) ? 'left' : 'right';
                    self.switchImg(dir);
                }
                // Escpape button
                else if (e.keyCode === 27) {
                    self.hideCloseBtn();

                    self.hideNavigation();
                    self.hideImg(function () {
                        self.hideDimmer();
                    });
                }
            });

            // When we click on the navigation buttons
            $('.gallery-nav-btn').on('click', function (e) {
                var dir = ($(this).hasClass('gallery-nav-btn-left')) ? 'left' : 'right';
                self.switchImg(dir);

                e.preventDefault();
            });

            // When we click on the close buttons
            $(document).on('click', '.close-btn', function (e) {
                self.hideNavigation();
                self.hideCloseBtn();
                self.hideImg(function () {
                    self.hideDimmer();
                });

                e.preventDefault();
            });
        },

        //------------------------------------------------------------
        // Show navigation buttons
        //------------------------------------------------------------
        showNavigation: function () {
            $('.gallery-nav-btn').fadeIn();
        },

        //------------------------------------------------------------
        // Hide navigation buttons
        //------------------------------------------------------------
        hideNavigation: function () {
            $('.gallery-nav-btn').fadeOut();
        },

        // -----------------------------------------------------------
        // Show close-button
        // -----------------------------------------------------------
        showCloseBtn: function () {
            $('<a class="close-btn" href="#"><span class="glyphicon glyphicon-remove-sign"></a>').appendTo("#gallery").fadeIn();
        },

        // -----------------------------------------------------------
        // Hide close-button
        // -----------------------------------------------------------
        hideCloseBtn: function () {
            $('.close-btn').fadeOut(function () {
                $(this).remove();
            });
        },

        //------------------------------------------------------------
        // Switch the image
        //------------------------------------------------------------
        switchImg: function (dir) {
            var nextImg = (dir === 'left') ? this.currentImg.parent().parent().prev().find('img') : this.currentImg.parent().parent().next().find('img'),
                marginLeftOrRight = (dir === 'left') ? '200px' : '-200px',
                self = this;

            if (nextImg.length !== 0) {
                $('.gallery-img').animate({
                    'margin-left': marginLeftOrRight,
                    'opacity': 0
                }, function () {
                    this.remove();
                    self.showImg(nextImg);
                });
            } else {
                this.hideCloseBtn();
                this.hideNavigation();
                this.hideImg(this.hideDimmer);
            }

        },

        //------------------------------------------------------------
        // Show the image (gets the event and the clicked element)
        //------------------------------------------------------------
        showImg: function (elem) {
            var $this = $(elem),
                self = Gallery;

            self.currentImg = $this;

            $('<img class="gallery-img">').css({
                'position': 'absolute',
                'top': '50%',
                'left': '50%',
                'transform': 'translate(-50%, -50%)',
                'display': 'none',
                'z-index': '8888',
                'border': '10px solid white'
            }).attr('src', $this.attr('src')).appendTo('body').fadeIn();

            // e.preventDefault();
        },

        //------------------------------------------------------------
        // Hide the image
        //------------------------------------------------------------
        hideImg: function (callback) {
            $('.gallery-img').fadeOut(function () {
                $(this).remove();
                if (callback && typeof (callback) === "function") {
                    callback.call();
                }
            });
        },

        //------------------------------------------------------------
        // Show the dimmer
        //------------------------------------------------------------
        showDimmer: function (callback) {
            $('<div id="screenDimmer">').css({
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'background': 'rgba(0, 0, 0, .8)',
                'width': '100%',
                'height': '100%',
                'display': 'none',
                'z-index': '7777'
            }).appendTo('body').fadeIn(function () {
                if (callback && typeof (callback) === "function") {
                    callback.call();
                }
            });
        },

        //------------------------------------------------------------
        // Hide the dimmer
        //------------------------------------------------------------
        hideDimmer: function () {
            $("#screenDimmer").fadeOut(function () {
                $(this).remove();
            });
        }
    };

    Gallery.init();

})(); /* End of siaf */

// ----------------------------------------
// Equal height
// ----------------------------------------


// ------------------------------
// BOOKING
// ------------------------------
(function () {
    function hide() {
        document.getElementById('booking-example').style.display = 'inline';
        document.getElementById('booking-form').style.display = 'none';
        return false;
    }
    //function show() {
    //document.getElementById('example').style.display = "none";
    //document.getElementById('form').style.display = 'inline';
    //}
})();

function bokning() {
    var customer = {

        inCheck: document.getElementsByTagName("input")[0].value,
        outCheck: document.getElementsByTagName("input")[1].value,
        Name: document.getElementsByTagName("input")[2].value,
        LastName: document.getElementsByTagName("input")[3].value,
        Adress: document.getElementsByTagName("input")[4].value,
        AdressNumber: document.getElementsByTagName("input")[5].value,
        postnumber: document.getElementsByTagName("input")[6].value,
        postadress: document.getElementsByTagName("input")[7].value,
        phone: document.getElementsByTagName("input")[8].value,
        email: document.getElementsByTagName("input")[9].value,
        Other: document.getElementsByTagName("input")[10].value
    }
    localStorage.setItem("Incheck", customer.inCheck);
    localStorage.setItem("Outcheck", customer.outCheck);
    localStorage.setItem("Name", customer.Name);
    localStorage.setItem("Lastname", customer.LastName);
    localStorage.setItem("Adress", customer.Adress);
    localStorage.setItem("Adressnumber", customer.AdressNumber);
    localStorage.setItem("Postnumber", customer.postnumber);
    localStorage.setItem("postadress", customer.postadress);
    localStorage.setItem("phone", customer.phone);
    localStorage.setItem("email", customer.email);
    localStorage.setItem("ovrigt", customer.Other);
    alert(customer.Name);
}