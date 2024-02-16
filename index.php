<?php include('components/head.php'); ?>
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">-->

<!--	Css Link
    ========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flaticon@version/css/flaticon.css">
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
<body id='top'>
<?php include('components/header.php'); ?>
<!-- /Header -->
<div class="slider-section">
<?php include('components/nav.php');?>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .testimonial-card {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .quote-icon {
            font-size: 24px;
            color: #fff;
        }

        .testimonial-text {
            font-size: 18px;
            font-style: italic;
            margin-bottom: 20px;
        }

        .testimonial-author {
            font-size: 16px;
            font-weight: bold;
            color: #fff;
        }

        .testimonial-role {
            font-size: 14px;
            color: #fff;
        }
    .text-secondary.double-down-line {
        position: relative;
    }

    .text-secondary.double-down-line .line,
    .text-secondary.double-down-line .short-line {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        height: 2px; /* Adjust the height as needed */
        background-color: #6a9fd3; /* Set the line color */
    }

    .text-secondary.double-down-line .line {

        width: 10%;
    }

    .text-secondary.double-down-line .short-line {
        width: 5%;
        padding-top: 1px;/* Adjust the width to make it shorter or longer */
    }


    .popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        z-index: 1000;
        max-width: 75vw; /* Set the maximum width to 75% of the viewport width */
        max-height: 75vh; /* Set the maximum height to 75% of the viewport height */
        overflow: auto; /* Enable scrolling if the content exceeds the maximum dimensions */
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
        background: none;
        border: none;
        color: #000;
        padding: 0;
    }

        .work-section {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .work-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 36px;
        }

        .work-step {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: relative;
        }

        .work-title {
            font-size: 24px;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .work-description {
            font-size: 16px;
            color: #4d4d29;
        }
        .counter-section {
            padding: 50px 0;
            color: #fff;
        }

</style>

	<div class="main-flexslider">
		<ul class="slides">
            <?php
            include('auth/database.php');
            // Fetch the latest four properties from the 'property' table
            $query = "SELECT * FROM property WHERE status='available' ORDER BY date DESC LIMIT 5";
            $result = mysqli_query($link, $query);
            // Check if the query was successful
            if ($result) {
                // Loop through the results and display them in the slider
                while ($row = mysqli_fetch_assoc($result)) {
                    $propertyIndex = 1;
                    echo '<li class="slides" id="slide-n'.$propertyIndex .'">';
                    $imageSource = null;

                    if (!empty($row['pimage'])) {
                        $imageSource = 'admin/property/'.$row['pimage'];
                    } elseif (!empty($row['pimage1'])) {
                        $imageSource ='admin/property/'.$row['pimage'];
                    } elseif (!empty($row['pimage2'])) {
                        $imageSource ='admin/property/'.$row['pimage2'];
                    }
                    if ($imageSource == null) {
                        $imageSource = 'img/slide-02.jpg';
                    }
//                    echo '<img src="' . $imageSource . '" alt="' . $row['title'] . '" style="max-width: 100%; height: 70%;">';
                    list($width, $height) = getimagesize($imageSource);
                    $aspectRatio = $height / $width;
                    $maxHeight = 700;

                    echo '<div class="slider-image" style="background-image: url(' . $imageSource . '); background-size: cover; background-position: center; height: ' . min($maxHeight, $maxHeight * $aspectRatio) . 'px;"></div>';

                    echo '<div class="slide-box">';
                    echo '<h2>' . $row['title'] .'</h2>';
                    $contentWords = explode(' ', $row['pcontent']);
                    $limitedContent = implode(' ', array_slice($contentWords, 0, 60));
                    echo '<p>' . $limitedContent . ' ...</p>';
                    echo '<ul class="slide-item-features">';
                    echo '<li><span class="fa fa-arrows-alt"></span>' . $row['size'] . ' Sq Ft</li>';
                    echo '<li><span class="fa fa-inbox"></span>' . $row['bedroom'] . ' bedrooms</li>';
                    echo '<li><span class="fa fa-male"></span>' . $row['bathroom'] . ' bathrooms</li>';
                    echo '</ul>';
                    echo '<div class="slider-buttons-wrapper">';
                    echo '<a href="#" class="yellow-btn">₦ ' . $row['price'] . '</a>';
                    echo '<a href="property-details.php?pid=' . $row['pid'] . '" class="gray-btn"><span class="fa fa-file-text-o"></span> Details</a>';
                    echo '<a href="buy.php?pid=' . $row['pid'] . '" class="gray-btn btn-primary my-button"><span class="fa fa-shopping-cart"></span> Buy/Rent</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';$propertyIndex;
                    $propertyIndex++;
                }
                // Free the result set
                mysqli_free_result($result);
            } else {
                // Display an error message if the query fails
                echo 'Error: ' . mysqli_error($link);
            }
            $agentQuery = "SELECT * FROM agent WHERE status='active'";
            $agentResult = mysqli_query($link, $agentQuery);
            // Close the database connection
//            mysqli_close($link);
            ?>
		</ul>
	</div>
</div>

<!-- Search-Section -->
<div class="section margin-top-1">
    <?php include('components/search.php') ?>
</div>

<div class="full-row bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center mb-5">
                             What We Do
                    <span class="line"></span> <!-- Line under the words -->
                    <span class="short-line"></span> <!-- Shorter line under the words -->
                </h2>
            </div>

        </div>
        <div class="text-box-one">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card p-4 text-center hover-shadow rounded mb-4 transation-3s">
                        <i class="flaticon-rent text-primary flat-medium" aria-hidden="true"></i>
                        <h3 class="text-secondary hover-text-primary py-3 m-0 " style="color: #00aced"><a href="#">Seamless Property Sales</a></h3>
                        <h6>Your gateway to selling real estate with ease in Nigeria, tailored for Nigerians in the diaspora.</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card p-4 text-center hover-shadow rounded mb-4 transation-3s">
                        <i class="flaticon-for-rent text-primary flat-medium" aria-hidden="true"></i>
                        <h3 class="text-secondary hover-text-primary py-3 m-0" style="color: #00aced"><a href="#">Effortless Rentals</a></h3>
                        <h6>Explore rental opportunities hassle-free, specifically designed for Nigerians living abroad.</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card p-4 text-center hover-shadow rounded mb-4 transation-3s">
                        <i class="flaticon-list text-primary flat-medium" aria-hidden="true"></i>
                        <h3 class="text-secondary hover-text-primary py-3 m-0" style="color: #00aced"><a href="#">Property Listings</a></h3>
                        <h6>Browse through a curated list of properties, making it simple for Nigerians in the diaspora.</h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card p-4 text-center hover-shadow rounded mb-4 transation-3s">
                        <i class="flaticon-diagram text-primary flat-medium" aria-hidden="true"></i>
                        <h3 class="" style="color: #00aced"><a href="#">Secure Legal Investments</a></h3>
                        <h6>Invest in real estate with confidence, ensuring legal compliance for Nigerians living abroad.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="recent-listings">
    <div class="container">
        <div class="title-box">
            <h3>Recent Listing</h3>
            <div class="bordered"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-sm-12 col-lg-8" id="property-location-map" style="height: 400px;">
                <script type="text/javascript">

                    if (typeof jQuery !== 'undefined') {
                        $(document).ready(function() {
                            var map;
                            var markers = [];
                            var infoWindow;

                            function initialize() {
                                try {
                                    var map_canvas = document.getElementById('property-location-map');

                                    if (!map_canvas) {
                                        console.error('Map container not found.');
                                        return;
                                    }

                                    var myLatlng = new google.maps.LatLng(9.0579, 7.4951);
                                    var mapOptions = {
                                        center: myLatlng,
                                        zoom: 6,
                                        scrollwheel: false,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };

                                    map = new google.maps.Map(map_canvas, mapOptions);
                                    infoWindow = new google.maps.InfoWindow();
                                    loadProperties();
                                } catch (error) {
                                }
                            }
                            function addMarker(location, title, price) {
                                var marker = new google.maps.Marker({
                                    position: location,
                                    icon: 'img/property/50_property-marker.png',
                                    map: map,
                                    title: title
                                });

                                marker.addListener('mouseover', function() {
                                    infoWindow.setContent('<strong>Name:</strong> ' + title + '<br><strong>Price:</strong> ' + price);
                                    infoWindow.open(map, marker);
                                });

                                marker.addListener('mouseout', function() {
                                    infoWindow.close();
                                });

                                markers.push(marker);
                            }

                            function loadProperties() {
                                console.log('Initializing loadProperties...');
                                <?php
                                include('auth/database.php');

                                try {
                                $propertyQuery = "SELECT * FROM property WHERE status='available' AND latitude IS NOT NULL AND longitude IS NOT NULL";
                                $propertyResult = mysqli_query($link, $propertyQuery);

                                if ($propertyResult) {
                                $propertyIndex = 1;
                                while ($row = mysqli_fetch_assoc($propertyResult)) {
                                $title = $row['title'];
                                $price = $row['price'];
                                $latitude = $row['latitude'];
                                $longitude = $row['longitude'];
                                ?>
                                addMarker(new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>), '<?php echo $title; ?>', '<?php echo $price; ?>');
                                <?php
                                $propertyIndex++;
                                }
                                mysqli_free_result($propertyResult);
                                } else {
                                throw new Exception('Error: ' . mysqli_error($link));
                            }
                                } catch (Exception $e) {
                                echo 'Caught exception: ', $e->getMessage(), "\n";
                            } finally {
                                mysqli_close($link);
                            }
                                ?>
                            }

                            if (typeof google !== 'undefined' && typeof google.maps !== 'undefined') {
                                google.maps.event.addDomListener(window, 'load', initialize);
                            } else {
                                console.error('Google Maps API not loaded.');
                            }
                        });
                    } else {
                        console.error('jQuery is not loaded.');
                    }
                </script>

            </div>

            <!-- Property List Details Section -->
            <div class="col-md-2 col-sm-12 col-lg-4" id="property-details" style="max-height: 400px; overflow-y: auto; font-weight: bold;">

                <?php
                include('auth/database.php');
                try {
                    $propertyQuery = "
                                        SELECT 
                                            property.*, 
                                            agent.agent_name 
                                        FROM 
                                            property 
                                        LEFT JOIN 
                                            agent_properties ON property.pid = agent_properties.property_id 
                                        LEFT JOIN 
                                            agent ON agent_properties.agent_id = agent.agent_id
                                        WHERE 
                                            property.status = 'available' AND 
                                            property.latitude IS NOT NULL AND 
                                            property.longitude IS NOT NULL
                                    ";

                    $propertyResult = mysqli_query($link, $propertyQuery);
                    if ($propertyResult) {
                        while ($row = mysqli_fetch_assoc($propertyResult)) {
                            $title = $row['title'];
                            $price = $row['price'];
                            $state = $row['state'];
                            $imagePath = "admin/property/".$row['pimage'];
                            $agentName = $row['agent_name'];
                            ?>
                            <div class="property-item">
<!--                                --><?php //echo '<img src="data:image/jpeg;base64,' . base64_decode($imageData) . '" />'; ?>
<!--                                <img src="--><?php //echo $imagePath; ?><!--" alt="--><?php //echo $title; ?><!--" width="50" height="50">-->
                                <a href="#" class="image-popup" data-image="<?php echo $imagePath; ?>" data-title="<?php echo $title; ?>">
                                    <img src="<?php echo $imagePath; ?>" alt="<?php echo $title; ?>" width="70" height="50">
                                </a>
                                <p><strong>Name:</strong> <?php echo $title; ?></p>
                                <p><strong>Price:</strong> <?php echo $price; ?></p>
                                <p><strong>Location:</strong> <?php echo $state; ?></p>
                                <p><strong>Agent Name:</strong> <?php echo $agentName; ?></p>
                                <p><?php echo '<a href="property-details.php?pid=' . $row['pid'] . '" class="gray-btn btn-sm" style="color: #00a0b0; font-weight: bold; font-size: small">View Details</a>'; ?></p>
                            </div>
                            <hr/>
                            <?php
                        }
                        mysqli_free_result($propertyResult);
                    } else {
                        throw new Exception('Error: ' . mysqli_error($link));
                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ', $e->getMessage(), "\n";
                } finally {
                    mysqli_close($link);
                }
                ?>

            </div>
        </div>
    </div>
</div>
<!-- Agents-Section -->

<div class="agents-section margin-top-2">
    <div class="container">
        <div class="title-box">
            <h3>Our Agents</h3>
            <div class="bordered"></div>
        </div>
        <div class="owl-carousel agents-slider">
            <?php
            while ($agent = mysqli_fetch_assoc($agentResult)) {
                ?>
                <div class="single-agent">
                    <div class="image-box">
                        <?php
                        $imagePath = "admin/user/" . $agent['image'];
                        $fallbackImage = "admin/user/avatar-3.jpg";
                        if (file_exists($imagePath) && is_file($imagePath)) {
                            $imageUrl = $imagePath;
                        } else {
                            $imageUrl = $fallbackImage;
                        }
                        ?>
                        <a href="#" class="image-popup" data-image="<?php echo $imageUrl; ?>" data-title="<?php echo $agent['agent_name']; ?>">
                            <img src="<?php echo $imageUrl; ?>" alt="<?php echo $agent['agent_name']; ?>">
                        </a>
<!--                        <img src="img/agents/istockphoto-862596588-612x612.jpg" alt="--><?php //echo $agent['agent_name']; ?><!--">-->
                        <ul class="social-icons">
                        </ul>
                    </div>
                    <div class="desc-box">
                        <h4><?php echo $agent['agent_name']; ?></h4>
                        <p class="person-number">
                            <i class="fa fa-phone"></i> <?php echo $agent['agent_contact']; ?>
                        </p>
                        <p class="person-email">
                            <i class="fa fa-envelope"></i> <?php echo $agent['agent_email']; ?>
                        </p>
<!--                        <p class="person-fax">-->
<!--                            <i class="fa fa-print"></i> --><?php //echo $agent['agent_contact']; ?>
<!--                        </p>-->
                        <p class="person-map">
                            <i class="fa fa-map-marker"></i> <?php echo $agent['agent_address'];?>
                        </p>
                        <a href="#" class='gray-btn'>view full profile</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>


<div class="work-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center mb-5">How It Works</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="work-step">
                    <div class="work-icon bg-primary text-white rounded-circle"><i class="flaticon-investor flat-medium"></i></div>
                    <h5 class="work-title mt-4 mb-3">Discussion</h5>
                    <p class="work-description">Reach out to one of our agents through "Buy" or "Rent" options available on each property.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="work-step">
                    <div class="work-icon bg-primary text-white rounded-circle"><i class="flaticon-search flat-medium"></i></div>
                    <h5 class="work-title mt-4 mb-3">Files Review</h5>
                    <p class="work-description">View files shared by the agents after reaching out to them.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="work-step">
                    <div class="work-icon bg-primary text-white rounded-circle"><i class="flaticon-handshake flat-medium"></i></div>
                    <h5 class="work-title mt-4 mb-3">Acquire</h5>
                    <p class="work-description">Approve payments and acquire the property.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br/>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-secondary double-down-line text-center mb-5">Testimonials from Happy Clients</h2>
        </div>
        <div class="col-lg-8 offset-lg-2">
            <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <?php
                    include('auth/database.php');
                    $query = mysqli_query($link, "SELECT feedback.*, users.* FROM feedback, users WHERE feedback.uid = users.id AND feedback.status = '1' AND users.role != 'admin'");
                    $firstItem = true;
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="carousel-item <?php echo ($firstItem) ? 'active' : ''; ?>">
                            <div class="card testimonial-card">
                                <div class="testimonial-text">
                                    <i class="fas fa-quote-left quote-icon mr-2"></i>
                                    <?php echo $row['2']; ?>
                                    <i class="fas fa-quote-right quote-icon ml-2"></i>
                                </div>
                                <div class="testimonial-author"><?php echo $row['name']; ?></div>
                                <div class="testimonial-role"><?php echo $row['role']; ?></div>
                            </div>
                        </div>
                        <?php
                        $firstItem = false;
                    }
                    ?>

                </div>

                <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
</br>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- footer-section -->
<?php include('components/footer.php'); ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDapMdqmN4EL6aOWgh1n6TDy3xenT8eM_s&sensor=false"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Include jQuery -->
<script type="text/javascript" src="js/script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var imagePopups = document.querySelectorAll('.image-popup');

        imagePopups.forEach(function(imagePopup) {
            imagePopup.addEventListener('click', function(event) {
                event.preventDefault();
                var imagePath = this.getAttribute('data-image');
                var title = this.getAttribute('data-title');

                var popup = document.createElement('div');
                popup.classList.add('popup');

                var closeButton = document.createElement('button');
                closeButton.classList.add('close-btn');
                closeButton.innerHTML = '&times;';

                var image = document.createElement('img');
                image.src = imagePath;
                image.alt = title;

                popup.appendChild(closeButton);
                popup.appendChild(image);

                document.body.appendChild(popup);

                closeButton.addEventListener('click', function() {
                    document.body.removeChild(popup);
                });
            });
        });
    });
</script>
<script src="js/jquery.min.js"></script>
<!--jQuery Layer Slider -->
<script src="js/greensock.js"></script>
<script src="js/layerslider.transitions.js"></script>
<script src="js/layerslider.kreaturamedia.jquery.js"></script>
<!--jQuery Layer Slider -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/tmpl.js"></script>
<script src="js/jquery.dependClass-0.1.js"></script>
<script src="js/draggable-0.1.js"></script>
<script src="js/jquery.slider.js"></script>
<script src="js/wow.js"></script>
<script src="js/YouTubePopUp.jquery.js"></script>
<script src="js/validate.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/custom.js"></script>
</body>