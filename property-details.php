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
				<h2>property listings</h2>
				</a>
			</div>
			<div class="pull-right breadcrumb">
				<a href="#">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">property listings</a>
			</div>
		</div>
	</div>
</div>

<style>
    .my-button {
        background-color: #808080; /* Set your default background color */
        color: #ffffff; /* Set your default font color */
        transition: background-color 0.3s, color 0.3s; /* Add transition for smooth effect */
    }

    .my-button:hover {
        background-color: #3daf3d; /* Set your hover background color */
        color: #ffffff; /* Set your hover font color */
    }
</style>
<!-- Search-Section -->
<?php //include('components/search.php') ?>
<!-- content-Section -->
<?php
include('auth/database.php');
if(isset($_GET['pid'])) {
    $property_id = mysqli_real_escape_string($link, $_GET['pid']);
    $query = "SELECT * FROM property_features WHERE property_id = '$property_id'";
    $result = mysqli_query($link, $query);
    if (($result && mysqli_num_rows($result) > 0)) {
        $property_features = mysqli_fetch_assoc($result);
    }
    $query2 = "SELECT * FROM property WHERE pid = '$property_id'";
    $result2 = mysqli_query($link, $query2);
    if (($result2 && mysqli_num_rows($result2) > 0)) {
        $property_details = mysqli_fetch_assoc($result2);
        }else {
            echo "Property not found.";
        }
    $query = "SELECT a.* FROM agent_properties ap
          JOIN agent a ON ap.agent_id = a.agent_id
          WHERE ap.property_id = '$property_id'";

    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $agent = mysqli_fetch_assoc($result);
        $properties_query = "SELECT property.* 
                     FROM agent_properties 
                     INNER JOIN property ON agent_properties.property_id = property.pid
                     WHERE agent_properties.agent_id = '{$agent['agent_id']}'";

        $result_properties = mysqli_query($link, $properties_query);
        $properties_list = mysqli_fetch_all($result_properties, MYSQLI_ASSOC);

    }
} else {
        echo "Invalid URL. Property ID not provided.";

}
?>
<div class="content-section">
	<div class="container">
        <?php
        echo '<a href="buy.php?pid=' . $property_details['pid'] . '" class="gray-btn btn-primary my-button"><span class="fa fa-shopping-cart"></span> Buy/Rent</a>';
        ?>
        <br/>
        <br/>
		<div class="row">
            <div class="col-md-8 page-content">
				<div class="inner-wrapper">
					<div class="property-images-slider">
						<div id="details-slider" class="flexslider">
							<a href="#" class='fa fa-home property-type-icon'></a>
                            <a href="#" class="yellow-btn p-1">₦ <?php echo $property_details['price']; ?></a> <?php echo $property_details['title']; ?>
                            <a href="#" class='status'><?php echo $property_details['stype']; ?></a>
							<ul class="slides">
								<li>
								<div class="image-wrapper">
									<img src="admin/property/<?php echo $property_details['pimage']; ?>" alt=<?php echo $property_details['title']; ?>">
								</div>
								</li>

							</ul>
						</div>
						<div id="details-carousel" class="flexslider">
                            <ul class="slides">
                                <?php if (!empty($property_details['pimage'])): ?>
                                    <li><img src="admin/property/<?php echo $property_details['pimage']; ?>" /></li>
                                <?php endif; ?>

                                <?php if (!empty($property_details['pimage1'])): ?>
                                    <li><img src="admin/property/<?php echo $property_details['pimage1']; ?>" /></li>
                                <?php endif; ?>

                                <?php if (!empty($property_details['pimage2'])): ?>
                                    <li><img src="admin/property/<?php echo $property_details['pimage2']; ?>" /></li>
                                <?php endif; ?>

                                <?php if (!empty($property_details['pimage3'])): ?>
                                    <li><img src="admin/property/<?php echo $property_details['pimage3']; ?>" /></li>
                                <?php endif; ?>

                                <?php if (!empty($property_details['pimage4'])): ?>
                                    <li><img src="admin/property/<?php echo $property_details['pimage4']; ?>" /></li>
                                <?php endif; ?>

                                <?php if (!empty($property_details['mapimage'])): ?>
                                    <li><img src="admin/property/<?php echo $property_details['mapimage']; ?>" /></li>
                                <?php endif; ?>

                                <?php if (!empty($property_details['topmapimage'])): ?>
                                    <li><img src="admin/property/<?php echo $property_details['topmapimage']; ?>" /></li>
                                <?php endif; ?>

                                <?php if (!empty($property_details['groundmapimage'])): ?>
                                    <li><img src="admin/property/<?php echo $property_details['groundmapimage']; ?>" /></li>
                                <?php endif; ?>
                            </ul>

                        </div>
					</div>
					<div class="property-desc">
						<h3><?php echo $property_details['title']; ?></h3>
						<ul class="slide-item-features item-features">
							<li><span class="fa fa-arrows-alt"></span><?php echo $property_details['size']; ?></li>
							<li><span class="fa fa-male"></span><?php echo $property_details['bathroom']; ?></li>
							<li><span class="fa fa-inbox"></span><?php echo $property_details['bedroom']; ?></li>
						</ul>
						<p class="first-paragraph">
							 </p>
						<p>
							</p>
                         <div class="additional-features">
                            <h3>Additional Features</h3>
                            <ul class="features">
                                <?php
                                if (isset($property_features)) {
                                    foreach ($property_features as $feature_key => $feature_value) {
                                        if ($feature_key === 'id' || $feature_key === 'property_id') {
                                            continue;
                                        }
                                        $feature_name = ucwords(str_replace('_', ' ', $feature_key));
                                        $checked = $feature_value === 'yes' ? 'checked' : '';
                                        $font_color = $feature_value === 'yes' ? 'color: blue;' : ''; // Added font color based on checkbox state

                                        echo '<li class="single-feature">';
                                        echo '<input style="font-size: 16px; padding-rignt:2" type="checkbox" name="' . $feature_key . '" ' . $checked . ' disabled>'; // added 'disabled' attribute
                                        echo '<span class="text-secondary font-weight-bold" style="font-size: 16px; ' . $font_color . '">' . $feature_name . '</span>'; // added style for bigger font size and font color
                                        echo '</li>';
                                    }
                                } else {
                                    echo "No additional features for this property at the moment";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="property-location">
							<h3>Property Location</h3>
							<div id="property-location-map">
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php if (!empty($agent)){?>
                <?php
                $imagePath = "admin/user/" . $agent['image'];
                $fallbackImage = "admin/user/avatar-3.jpg";
                if (file_exists($imagePath) && is_file($imagePath)) {
                    $imageUrl = $imagePath;
                } else {
                    $imageUrl = $fallbackImage;
                }
                ?>
			<div class="col-md-4 blog-sidebar">
				<div class="sidebar-widget author-profile">
					<h4 class="widget-title">Listed by</h4>
					<div class="image-box">
                        <img src="<?php echo $imageUrl; ?>" alt="<?php echo $agent['agent_name']; ?>">
					</div>
					<div class="desc-box">
						<h4>miller walk</h4>
						<p class="person-number">
							<i class="fa fa-phone"></i> <?php echo $agent['agent_name'];?>
						</p>
						<p class="person-email">
							<i class="fa fa-envelope"></i> <?php echo $agent['agent_email'];?>
						</p>
						<p class="person-fax">
							<i class="fa fa-print"></i> <?php echo $agent['agent_contact'];?>
						</p>
                        <p class="person-fax">
							<i class="fa fa-map-marker"></i> <?php echo $agent['agent_address'];?>
						</p>
						<a href="#" class='gray-btn'>view full profile</a>
					</div>
				</div>

				<div class="sidebar-widget similar-listings-widget">
					<h4 class="widget-title">similar listings</h4>
                    <?php
                    foreach (array_slice($properties_list, 0, 5) as $property) {
                        $imageSource = 'admin/property/' . $property['pimage'];
                        ?>
                        <ul class="similar-listings">
                            <li class="tab-content-item">
                                <div class="pull-left thumb">
                                    <img src="<?php echo $imageSource ?>" width="25%" height="20%" alt="thumbnail">
                                </div>
                                <h5><?php echo $property['title'] ?></h5>
                                <h5>₦ <?php echo $property['price'] ?></h5>
                                <h3><a href="#" style="color: #00a0b0"><i class="fa fa-map-marker"></i> <?php echo $property['state'] ?></a></h3>
                            </li>
                        </ul>
                    <?php } ?>


                </div>
			</div>
        <?php } ?>
		</div>
	</div>
</div>

<!-- footer-section -->
<?php include('components/footer.php'); ?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDapMdqmN4EL6aOWgh1n6TDy3xenT8eM_s&sensor=false"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var map;
        var marker;
        var MyMarker;
        var infoWindow;

        function initialize() {
            var map_canvas = document.getElementById('property-location-map');
            var myLatlng = new google.maps.LatLng(5.806973, 7.481416);
            var mapOptions = {
                center: myLatlng,
                zoom: 10,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(map_canvas, mapOptions);
            infoWindow = new google.maps.InfoWindow();
            TestMarker();
        }

        // Function for adding a marker to the page with dynamic content
        function addMarker(location, title, price) {
            marker = new google.maps.Marker({
                position: location,
                icon: 'img/property/50_property-marker.png',
                map: map
            });
            marker.addListener('mouseover', function() {
                infoWindow.setContent('<strong>Title:</strong> ' + title + '<br><strong>Price:</strong> ' + price);
                infoWindow.open(map, marker);
            });
            marker.addListener('mouseout', function() {
                infoWindow.close();
            });
        }
        function TestMarker() {
            MyMarker = new google.maps.LatLng(5.806973, 7.481416);
            addMarker(MyMarker, '<?php echo $property_details['title']; ?>', '<?php echo $property_details['price']; ?>');
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    });

</script>
</body>
</html>