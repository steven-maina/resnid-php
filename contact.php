<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<!-- /Header -->
<div class="slider-section">
<?php include('components/nav.php'); ?>
	<!-- head-Section -->
	<div class="page-title-section">
		<div class="container">
			<div class="pull-left page-title">
				<a href="#">
				<h2>Contact us</h2>
				</a>
			</div>
			<div class="pull-right breadcrumb">
				<a href="#">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">Contact us</a>
			</div>
		</div>
	</div>
</div>
<?php
include('auth/database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $name = mysqli_real_escape_string($link, $name);
    $email = mysqli_real_escape_string($link, $email);
    $message = mysqli_real_escape_string($link, $message);

    // Insert data into the 'messages' table
    $sql = "INSERT INTO messages (body, email) VALUES ('$message', '$email')";

    if (mysqli_query($link, $sql)) {
        echo "Message submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}
mysqli_close($link);
?>
?>
<!-- Search-Section -->
<?php //include('components/search.php') ?>
<!-- content-Section -->
<div class="content-section">
	<div class="container">
		<div class="col-md-12 map-wrapper">
			<div class="inner-wrapper">
				<div id="map">
				</div>
				<div class="clearfix">
				</div>
			</div>
		</div>
		<div class="col-md-6 contact-info">
			<div class="inner-wrapper">
				<h3 class="box-title">Contact info</h3>
				<p class='first-paragraph' style="color: #242525; font-weight:normal">
                    Embark on Your Journey Home with ORESND – Where Dreams Connect and Miles are Bridged! Your Gateway to Diaspora-Friendly Real Estate Solutions, Uniting Hearts Across Continents. Discover a World of Possibilities, Where Your Home is Closer Than You Think – ORESND, Crafting Dreams into Reality, One Mile at a Time!				</p>
				<p style="color: #262626">
                    Connect with Us on Your Schedule: Reach Out Monday to Friday, from 8:00 AM to 5:00 PM. ORESND – Your Dedicated Partner in Realizing Homeownership Dreams, Available When You Need Us Most. Your Journey Begins with a Call, and We're Here Every Step of the Way!
				</p>
				<div class="info-wrapper">
					<span><i class="fa fa-map-marker" style="color: #00a0b0"></i>Lagos, Nigeria</span>&nbsp;
					<span><i class="fa fa-phone" style="color: #00a0b0"></i>+234 193 456 789</span>&nbsp;
					<span><i class="fa fa-envelope" style="color: #00a0b0"></i>info@oresnd.com</span>
				</div>
				<div class="clearfix">
				</div>
			</div>
		</div>
		<div class="col-md-6 contact-form-wrapper">
			<div class="inner-wrapper">
				<h4 class="box-title">Get in touch</h4>
				<form class='contact-form' method="POST">
					<div class="contact-form-left">
						<span><i class='fa fa-user'></i></span><input type="text" name='name' placeholder='Name' id='name'>
						<span><i class='fa fa-envelope-o'></i></span><input type="text" name='email' placeholder='e-mail' id='email'>
					</div>
					<div class="contact-form-right">
						<textarea id="message" name='message' placeholder='Message'></textarea>
						<input type="submit" value='send message' id='submit-btn'>
					</div>
				</form>
				<div class="clearfix">
				</div>
			</div>
		</div>
	</div>
</div>
<br/>
<br/>
<br/>
<!-- footer-section -->
<?php include('components/footer.php'); ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDapMdqmN4EL6aOWgh1n6TDy3xenT8eM_s&sensor=false"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->
<script type="text/javascript" src="js/script.js"></script>
<script>
    $(document).ready(function() {
        // Google Map
        var map;
        var marker;
        var MyMarker;

        function initialize() {
            var map_canvas = document.getElementById('map');
            var myLatlng = new google.maps.LatLng(6.5244, 3.3792); // Lagos coordinates
            var mapOptions = {
                center: myLatlng,
                zoom: 13,
                scrollwheel: false,
                styles: [{
                    "featureType": "landscape",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 65
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "poi",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 51
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "road.highway",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "road.arterial",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 30
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "road.local",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 40
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "transit",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "administrative.province",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "lightness": -25
                    }, {
                        "saturation": -100
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "hue": "#ffff00"
                    }, {
                        "lightness": -25
                    }, {
                        "saturation": -97
                    }]
                }],
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(map_canvas, mapOptions);
            TestMarker();
        }

        // Function for adding a marker to the page.
        function addMarker(location) {
            marker = new google.maps.Marker({
                position: location,
                icon: 'img/property/50_property-marker.png',
                map: map
            });
        }

        // Testing the addMarker function
        function TestMarker() {
            MyMarker = new google.maps.LatLng(6.5244, 3.3792); // Lagos coordinates
            addMarker(MyMarker);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    });
</script>

</body>
</html>