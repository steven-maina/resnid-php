<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auth_id']))
{
	header("location: ../auth/login.php");
}

$query = mysqli_query($con, "SELECT role, COUNT(*) AS user_count FROM users GROUP BY role");


if ($query) {
    $adminCount = $agentCount = $clientCount = 0;

    while ($row = mysqli_fetch_assoc($query)) {
        $role = $row['role'];
        $userCount = $row['user_count'];

        // Update counts based on role
        if ($role === 'admin') {
            $adminCount = $userCount;
        } elseif ($role === 'agent') {
            $agentCount = $userCount;
        } elseif ($role === 'client') {
            $clientCount = $userCount;
        }
    }
} else {
    echo "Error executing query: " . mysqli_error($con);
}


if(!isset($_SESSION['auth_role'])=='admin')
{
	$id=$_SESSION['auth_id'];
	
	$query = mysqli_query($con, "SELECT pid, COUNT(*) AS property_count FROM property  where uid='$id'");
}else{
$query = mysqli_query($con, "SELECT pid, COUNT(*) AS property_count FROM property");
}

if ($query) {
    $apartmentCount = $houseCount = $officeCount = 0;

    while ($row = mysqli_fetch_assoc($query)) {
		$propertyCount = $row['property_count'];
	}
}

// Close the connection if needed
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>ORESND - Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->

		
			<!-- Header -->
				<?php include("header.php"); ?>
			<!-- /Header -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome <?php echo $_SESSION['auth_name'];?> ...</h3>
								<p></p>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
					<?php
								if (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] === 'admin')
					     		{?>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-primary">
											<i class="fe fe-users"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php echo $adminCount; ?></h3>
										
										<h6 class="text-muted">System Admins</h6>
										
									</div>
								</div>
							</div>
						</div>
						<?php }?>
						<?php
								if (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] === 'admin')
					     		{?>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-success">
											<i class="fe fe-users"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php echo $agentCount; ?></h3>
										
										<h6 class="text-muted">Agents</h6>
										
									</div>
								</div>
							</div>
						</div>
						<?php }?>
						<?php
						if (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] === 'admin') {
					?>	
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-secondary">
											<i class="fe fe-users"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php echo $clientCount; ?></h3>
										
										<h6 class="text-muted">Clients</h6>
										
									</div>
								</div>
							</div>
						</div>
						<?php }else {?>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-secondary">
											<i class="fe fe-users"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php echo $clientCount; ?></h3>
										
										<h6 class="text-muted">Served Clients</h6>
										
									</div>
								</div>
							</div>
						</div>
								<?php }?>
								<?php
								if (isset($_SESSION['auth_role'])) {
								?>
								<div class="col-xl-3 col-sm-6 col-12">
								<div class="card">
									<div class="card-body">
										<div class="dash-widget-header">
											<span class="dash-widget-icon bg-purple">
												<i class="fe fe-wallet"></i>
											</span>
											
										</div>
										<div class="dash-widget-info">
											
										<h3>0.00</h3>
											
											<h6 class="text-muted">Total Sales</h6>
											<!-- <div class="progress progress-sm">
												<div class="progress-bar bg-purple w-50"></div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-warning">
											<i class="fe fe-building"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php echo $propertyCount; ?></h3>
										
										<h6 class="text-muted">Properties</h6>
										
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-lg-6">
						
							<!-- Sales Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Sales Overview</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
							<!-- /Sales Chart -->
							
						</div>
						<div class="col-md-12 col-lg-6">
						
							<!-- Invoice Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Order Status</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
							<!-- /Invoice Chart -->
							
						</div>	
					</div>
				</div>			
			</div>
			<!-- /Page Wrapper -->
		

		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<script src="assets/plugins/raphael/raphael.min.js"></script>    
		<script src="assets/plugins/morris/morris.min.js"></script>  
		<script src="assets/js/chart.morris.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>
