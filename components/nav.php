<div id="premium-bar">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php" style="color: white;"><img src="img/logo1.png" alt="logo"> <Strong>ORESND Real Estate</Strong></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="color: #A9A9A9;">
					<ul class="nav navbar-nav navbar-right" style="color: #A9A9A9;">
						<li><a href="index.php">Home</a></li>
						<li><a href="property-listing.php">Listings</a></li>
<!--						<li><a href="property-details.php">Property Details</a></li>-->
						<li><a href="agents.php">agents</a></li>
<!--						<li><a href="blog.php">News</a></li>-->
						 <li><a href="about.php">About Us</a></li>
						<li><a href="contact.php">contact</a></li>
						<?php  if(isset($_SESSION['auth_id']))
										{ ?>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
											<ul class="dropdown-menu">
												<li class="nav-item"> <a class="nav-link" href="profile.php">Profile</a> </li>
												<li class="nav-item"> <a class="nav-link" href="myrequests.php">Property Request</a> </li>
												<li class="nav-item"> <a class="nav-link" href="myproperty.php">Your Property</a> </li>
												<li class="nav-item"> <a class="nav-link" href="#" onclick='confirmLogout()'>Logout</a> </li>
                                            </ul>

                                        </li>
										<?php }?>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
			</nav>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
    <link rel="stylesheet" href="styles.css">
	<style>
    .navbar-nav .active {
        color: #fff;
        background-color: #0095E6;
    }
</style>

<script>
$(document).ready(function() {
    // Get the current URL path
    var path = window.location.pathname;

    // Extract the page name from the URL
    var page = path.split("/").pop();

    // Loop through each navigation link
    $(".navbar-nav a").each(function() {
        // Get the href attribute of the link
        var href = $(this).attr("href");

        // Check if the link's href matches the current page
        if (page === href) {
            // Add the 'active' class to the matching link
            $(this).addClass("active");
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmLogout() {
    Swal.fire({
        title: 'Logout Confirmation',
        text: 'Are you sure you want to logout?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to logout page if user confirms
            window.location.href = 'auth/logoff.php';
        }
    });
}
</script>

