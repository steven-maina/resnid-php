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
    <title>ORESND- Requests</title>

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
                    <h3 class="page-title">Requests View Update</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Requests View Update Status</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                              <?php

                              if (!isset($_GET['id'])) {
                                  echo "Debug: ID is not set in the URL.";
                                  echo "Error: Invalid request. Missing 'id' parameter.";
                                  exit();
                              }
                                        $request_id = $_GET['id'];
                                        $uid = $_SESSION['auth_id'];
                                            $query = mysqli_query($con, "SELECT pr.*, p.title, u.name, u.email FROM `purchase_requests` pr
                                                    JOIN `property` p ON pr.property_id = p.pid
                                                    JOIN `users` u ON pr.user_id = u.id
                                                    WHERE pr.request_id='$request_id'");

                                            $row = mysqli_fetch_assoc($query);
                                            if (!$row) {
                                                echo "Error: Purchase request not found or does not belong to the current user.";
                                                exit();
                                            }

                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $newStatus = $_POST['new_status'];
                                        $newQuotation = '';
                                        if ($_FILES['new_quotation']['error'] === UPLOAD_ERR_OK) {
                                        $uploadDirectory = 'upload/';
                                        $newQuotationName = basename($_FILES['new_quotation']['name']);
                                        $newQuotationPath = $uploadDirectory . $newQuotationName;
                                        move_uploaded_file($_FILES['new_quotation']['tmp_name'], $newQuotationPath);
                                        $newQuotation = $newQuotationPath;
                                        }
                                        $updateQuery = "UPDATE `purchase_requests`
                                        SET `status`='$newStatus', `quotation`='$newQuotation'
                                        WHERE `request_id`='$request_id'";
                                        $set=mysqli_query($con, $updateQuery);
                                        if ($set)
                                        header("Location: requestsview.php");
                                        exit();
                                        }else{
                                            exit();
                                        }
                                        ?>

                                        <div class="container mt-5">
                                            <h2 class="text-secondary double-down-line text-center">Update Purchase Request</h2>

                                            <!-- Display current purchase request details -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><strong>User:</strong> <?php echo $row['name']; ?></p>
                                                    <p><strong>Property Title:</strong> <?php echo $row['title']; ?></p>
                                                    <p><strong>Request Type:</strong> <?php echo $row['request_type']; ?></p>
                                                    <p><strong>Additional Info:</strong> <?php echo $row['additional_info']; ?></p>
                                                    <p><strong>Submission Date:</strong> <?php echo $row['submission_date']; ?></p>
                                                </div>
                                            </div>

                                            <!-- Form for updating the purchase request status and uploading a new quotation -->
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $request_id); ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="new_status">New Status:</label>
                                                    <select class="form-control" id="new_status" name="new_status">
                                                        <!-- Add options for different status values -->
                                                        <option value="pending">Pending</option>
                                                        <option value="approved">Approved</option>
                                                        <option value="rejected">Rejected</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="new_quotation">New Quotation:</label>
                                                    <input type="file" class="form-control-file" id="new_quotation" name="new_quotation">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Update Request</button>
                                            </form>
                                        </div>

                                        <?php
                                        // Close the database connection after use
                                        mysqli_close($con);
                                        ?>
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
