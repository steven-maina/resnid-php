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

    $userId = $_SESSION['auth_id'];
if(isset($_SESSION['auth_role'])=='admin'){
        $query2 = "SELECT SUM(amount) AS totalAmount FROM payments";
       } else{
        $agentQuery = "SELECT property_id FROM agent_properties WHERE agent_id = $userId";
        $agentResult = mysqli_query($con, $agentQuery);
        if($agentResult) {
            $row = mysqli_fetch_assoc($agentResult);
            $propertyId = $row['property_id'];
            $query2 = "SELECT SUM(amount) AS totalAmount FROM payments WHERE property_id = $propertyId";
        } else {
            echo "Error retrieving agent's property_id";
        }
    }
    $result2 = mysqli_query($con, $query2);

    if($result2) {
        $row = mysqli_fetch_assoc($result2);
        $paymentsSum = $row['totalAmount'];
    } else {
        echo "Error executing query";
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
											
										<h3><?php echo $paymentsSum; ?></h3>
											
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
                            <div class="card card-chart">
                                <div class="card-header">
                                    <h4 class="card-title">Sales Overview</h4>
                                </div>
                                <div class="card-body">
                                    <div id="morrisLinePayments"></div>
                                </div>
                            </div>

                        </div>
                        <div class="card card-chart" style="width: 50%; float: left;">
                            <div class="card-header">
                                <h4 class="card-title">Buyer Registration</h4>
                            </div>
                            <div class="card-body">
                                <div id="morrisLine"></div>
                            </div>
                        </div>

                        <style>
                            #morrisLine {
                                height: 300px;
                                margin: 0 auto;
                            }

                            .card-body {
                                overflow: hidden;
                            }
                        </style>
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- Include Morris.js -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

        <?php
        require("config.php");

        $query = "SELECT MONTH(created_at) AS month, COUNT(*) AS total_registered
          FROM users
          WHERE role = 'client' AND YEAR(created_at) = YEAR(NOW())
          GROUP BY MONTH(created_at)";

        $result = mysqli_query($con, $query);

        if (!$result) {
            // Handle database query error
            die("Database query failed: " . mysqli_error($con));
        }
        $data = array_fill(1, 12, array("month" => "", "registered" => 0));

        // Fill the array with actual data
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$row['month']] = array(
                "month" => date("F", mktime(0, 0, 0, $row['month'], 1)),
                "registered" => $row['total_registered']
            );
        }

        // Convert the associative array to indexed array
        $data = array_values($data);
        ?>
        <style>
            #morrisLine {
                height: 300px;
                margin: 0 auto;
            }

            .card-body {
                overflow: hidden;
            }
        </style>

        <script>
            new Morris.Line({
                element: 'morrisLine',
                data: <?php echo json_encode($data); ?>,
                xkey: 'month',
                ykeys: ['registered'],
                labels: ['Registered'],
                parseTime: false,
                lineColors: ['#3498db'],
                lineWidth: 2,
                pointSize: 4,
                hideHover: 'auto',
                yLabelFormat: function(y) {
                    return Math.round(y);
                },
                yLabels: 'count'
            });
        </script>


        <?php
        require("config.php");

        $query = "SELECT MONTH(created_at) AS month, SUM(amount) AS total_payments
          FROM payments
          WHERE approved_by_buyer = 'yes' AND approved_by_seller='yes' AND MONTH(created_at) = MONTH(NOW()) AND YEAR(created_at) = YEAR(NOW())
          GROUP BY MONTH(created_at)";

        $result = mysqli_query($con, $query);

        if (!$result) {
            // Handle database query error
            die("Database query failed: " . mysqli_error($con));
        }

        $data_payments = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $data_payments[] = array(
                "month" => date("F", mktime(0, 0, 0, $row['month'], 1)),
                "total_payments" => $row['total_payments']
            );
        }
        ?>
        <script>
            // Dummy data representing all months with zero payments
            var allMonthsData = [
                <?php
                $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

                foreach ($months as $month) {
                    echo "{ month: '$month', total_payments: 0 },";
                }
                ?>
            ];

            // Update the amounts based on actual payment data
            <?php
            foreach ($data_payments as $payment) {
                $monthIndex = array_search($payment['month'], $months);
                $allMonthsData[$monthIndex]['total_payments'] = $payment['total_payments'];
            }
            ?>

            // Morris.js initialization for payments with Line chart
            new Morris.Line({
                element: 'morrisLinePayments',
                data: allMonthsData,
                xkey: 'month',
                ykeys: ['total_payments'],
                labels: ['Total Payments'],
                parseTime: false,
                lineColors: ['#4caf50'],
                lineWidth: 2,
                pointSize: 4,
                hideHover: 'auto',
                yLabelFormat: function(y) {
                    return Math.round(y); // Format y-axis labels as whole numbers
                },
                yLabels: 'count' // Explicitly specify y-axis labels
            });
        </script>


    </body>

</html>
