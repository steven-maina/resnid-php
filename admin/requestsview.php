<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auth_role']))
{
	header("location: ../auth/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Ventura - Data Tables</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Datatables CSS -->
		<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">
		
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
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Requests</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Requests</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					
					
					
					<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mt-0 mb-4">Requests View</h4>
										<?php 
											if(isset($_GET['msg']))	
											echo $_GET['msg'];	
										?>
                                        <?php
                                        $uid = $_SESSION['auth_id'];

                                        // Fetch the agent_id from the agent table using the user_id
                                        $agentQuery = mysqli_query($con, "SELECT agent_id FROM agent WHERE user_id='$uid'");
                                        $agentRow = mysqli_fetch_assoc($agentQuery);

                                        if ($agentRow) {
                                            $agent_id = $agentRow['agent_id'];

                                            // Fetch purchase requests for properties associated with the agent
                                            $query = mysqli_query($con, "SELECT pr.*, p.title FROM `purchase_requests` pr
                            JOIN `property` p ON pr.property_id = p.pid
                            JOIN `agent_properties` ap ON ap.property_id = p.pid
                            WHERE ap.agent_id='$agent_id'");

                                            if (mysqli_num_rows($query) > 0) {
                                                ?>
                                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap">
                                                    <thead class="bg-primary text-white">
                                                    <tr>
                                                        <th>Properties</th>
                                                        <th>Request Type</th>
                                                        <th>Reason</th>
                                                        <th>Added Date</th>
                                                        <th>Status</th>
                                                        <th>Docs</th>
                                                        <th>Update</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                                        <tr>
                                                            <!-- Display purchase request details -->
                                                            <td><?php echo $row['title']; ?></td>
                                                            <td><?php echo $row['request_type']; ?></td>
                                                            <td><?php echo $row['additional_info']; ?></td>
                                                            <td><?php echo $row['submission_date']; ?></td>
                                                            <td><?php echo $row['status']; ?></td>
                                                            <td>
                                                                <?php
                                                                // Display a link to view documents if available
                                                                if (!empty($row['quotation'])) {
                                                                    echo '<a href="' . $row['quotation'] . '" target="_blank">View Documents</a>';
                                                                } else {
                                                                    echo 'No Documents';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><a class="btn btn-primary" href="requestupdate.php?id=<?php echo $row['request_id']; ?>">Update Status</a></td>
                                                            <!--<td><a class="btn btn-danger" href="submitrequestdelete.php?id=--><?php //echo $row['request_id']; ?><!--">Delete</a></td>-->
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                                <?php
                                            } else {
                                                ?>
                                                <p>No Purchase Requests Found for the properties under your management.</p>
                                                <?php
                                            }
                                        } else {
                                            // Handle case where the user is not associated with an agent
                                            echo "Error: User is not associated with an agent.";
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>


				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Datatables JS -->
		<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.select.min.js"></script>
		
		<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
		<script src="assets/plugins/datatables/buttons.flash.min.js"></script>
		<script src="assets/plugins/datatables/buttons.print.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>
</html>
