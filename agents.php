<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<!-- /Header -->
<div class="slider-section">
	<style>
		.rounded-image-box {
    border-radius: 10px; 
    overflow: hidden;    
    width: 20%;          
}

.rounded-img-thumbnail {
    border-radius: 10px; 
    width: 100%;
    height: 100%;
}

	</style>
<?php include('components/nav.php'); ?>
	<!-- head-Section -->
	<div class="page-title-section">
		<div class="container">
			<div class="pull-left page-title">
				<a href="#">
				<h2>our agents</h2>
				</a>
			</div>
			<div class="pull-right breadcrumb">
				<a href="#">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">Our Agents</a>
			</div>
		</div>
	</div>
</div>
<!-- Search-Section -->
<?php //include('components/search.php') ?>
<!-- content-Section -->
<div class="content-section">
	<div class="row">
        <?php
        include('auth/database.php');
        $agentQuery = "SELECT * FROM agent WHERE status='active'";
        $agentResult = mysqli_query($link, $agentQuery);
        while ($agent = mysqli_fetch_assoc($agentResult)) {
            ?>
        <div class="col-md-4 mb-4"  style="margin-bottom: 20px">
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
                    <a href="#" class="image-popup img-fluid" data-image="<?php echo $imageUrl; ?>" data-title="<?php echo $agent['agent_name']; ?>">
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
                    <a href="#" class='gray-btn'>profile</a>
                </div>
            </div>
        </div>
            <?php
        }
        mysqli_close($link);
        ?>
	</div>
</div>
<!-- footer-section -->
<?php include('components/footer.php'); ?>
</body>
</html>