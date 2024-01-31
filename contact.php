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
<!-- Search-Section -->
<div class="search-section">
	<div class="container">
		<form>
			<div class="select-wrapper select-smaill" id='select-rent'>
				<p>
					Rent or Sale
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Rent</option>
					<option value="chips-and-salsa">Sale</option>
				</select>
			</div>
			<div class="select-wrapper select-big" id='select-property'>
				<p>
					Property type
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-big">
				<p>
					locations
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-small">
				<p>
					Beds
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-small">
				<p>
					Baths
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-medium">
				<p>
					Sq ft
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-medium">
				<p>
					min price
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<div class="select-wrapper select-medium">
				<p>
					Max price
				</p>
				<select class='elselect'>
					<option value="any">any</option>
					<option value="potato-chips">Potato chips</option>
					<option value="chips-and-salsa">Chips and salsa</option>
					<option value="cookies">Cookies</option>
					<option value="doritos">Doritos</option>
					<option value="pringles">Pringles</option>
					<option value="hot-pockets">Hot pockets</option>
				</select>
			</div>
			<input type="submit" value="search" class='yellow-btn'>
		</form>
	</div>
</div>
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
				<h4 class="box-title">Contact info</h4>
				<p class='first-paragraph'>
					This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.
				</p>
				<p>
					Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad
				</p>
				<div class="info-wrapper">
					<span><i class="fa fa-home"></i>lorem ipsum street</span>
					<span><i class="fa fa-phone"></i>+399 (500) 321 9548</span>
					<span><i class="fa fa-envelope"></i>info@domain.com</span>
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
						<span><i class='fa fa-link'></i></span><input type="text" name='website' placeholder='website' id='website'>
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
<!-- footer-section -->
<?php include('components/footer.php'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7z3qSfW7_1ArWHGs69jHLbLw-jOOGwuk"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
	$(document).ready(function() {
		//Google Map
		var map;
	    var marker;
	    var MyMarker;
		function initialize() {
		    var map_canvas = document.getElementById('map');
		    var myLatlng = new google.maps.LatLng(-37.815748, 144.972667);
		    var mapOptions = {
		        center: myLatlng,
		        zoom: 17,
		        scrollwheel: false,
		         styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}],
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    };
		    map = new google.maps.Map(map_canvas, mapOptions);
		    TestMarker();    
		}
		// Function for adding a marker to the page.
		function addMarker(location) {
		    marker = new google.maps.Marker({
		        position: location,
		        icon: 'img/28_marker.png',
		        map: map
		    });
		}
		// Testing the addMarker function
		function TestMarker() {
		       MyMarker = new google.maps.LatLng(-37.815748, 144.972667);
		       addMarker(MyMarker);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	});
	</script>
</body>
</html>