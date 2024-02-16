<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<div class="slider-section">
<?php include('components/nav.php'); ?>
	<!-- head-Section -->
	<div class="page-title-section">
		<div class="container">
			<div class="pull-left page-title">
				<a href="#">
				<h2>About Us</h2>
				</a>
			</div>
			<div class="pull-right breadcrumb">
				<a href="index.php">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">About Us</a>
			</div>
		</div>
	</div>
</div>
<!-- Search-Section -->
<?php include('components/search.php') ?>
<!-- content-Section -->
<div class="content-section">
	<div class="container">
        <div class="full-row">
            <div class="container">


                <?php
            include 'auth/database.php';
                $query=mysqli_query($link,"SELECT * FROM about");
                while($row=mysqli_fetch_array($query))
                {
                    ?>
                    <div class="row" style="font-weight: bold; font-size: large">
                        <div class="col-md-12 col-lg-12">
                            <h3 class="double-down-line-left text-secondary position-relative pb-4 mb-4"><?php echo $row['1'];?></h3>
                        </div>
                    </div>
                    <div class="row about-company">
                        <div class="col-md-12 col-lg-7">
                            <div class="about-content">
                                <?php echo $row['2'];?>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-5 mt-5">
                            <div class="about-img"> <img src="admin/upload/<?php echo $row['3'];?>" alt="about image"> </div>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
        <!-- End Scroll To top -->
    </div>
</div>
	</div>
</div>
<!-- footer-section -->
<?php include('components/footer.php'); ?>
</body>
</html>