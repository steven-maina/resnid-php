<?php
session_start();
require("auth/database.php");

if(!isset($_SESSION['auth_id'])) {
    header("location: ../auth/login.php");
}
$error="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['auth_id'];
    $property_id = $_POST['pid'];
    $request_type = $_POST['request_type'];
    $additional_info = $_POST['additional_info'];
echo $user_id;
    // Handle document upload
    $uploadDirectory = 'admin/upload/';
    $document_path = '';

    if ($_FILES['document']['error'] === UPLOAD_ERR_OK) {
        $document_name = basename($_FILES['document']['name']);
        $document_path = $uploadDirectory . $document_name;
        move_uploaded_file($_FILES['document']['tmp_name'], $document_path);
    }

    // Check if the user with the given auth_id exists in the users table
    $userCheckQuery = "SELECT * FROM users WHERE id = '$user_id'";
    $userCheckResult = mysqli_query($link, $userCheckQuery);

    if (!$userCheckResult || mysqli_num_rows($userCheckResult) == 0) {
        // The user with the provided auth_id does not exist
        echo "Error: User not found with auth_id: $user_id";
    } else {
        // Insert data into the purchase_requests table with 'pending' status
        $query = "INSERT INTO purchase_requests (user_id, property_id, request_type, additional_info, document_path, status) 
                  VALUES ('$user_id', '$property_id', '$request_type', '$additional_info', '$document_path', 'pending')";

        $result = mysqli_query($link, $query);

        if (!$result) {
            // If the query fails, output the MySQL error
            echo "Error: " . mysqli_error($link);
        } else {
            // Redirect to myrequests.php after successful insertion
            header("Location: myrequests.php");
            exit();
        }
    }
}
?>
<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<!-- /Header -->
<div>
    <div class="slider-section">
        <?php include('components/nav.php'); ?>
        <!-- head-Section -->
        <div class="page-title-section">
            <div class="container">
                <div class="pull-left page-title">
                    <a href="#">
                        <h2 class="font-weight-bold" style="font-size: 28px;">Request a Purchase Quotation From Agent</h2>
                    </a>
                </div>
                <div class="pull-right breadcrumb" style="font-size: 18px;">
                    <a href="#" class="text-dark">home</a><span class="fa fa-arrow-circle-right text-secondary sep mx-2"></span><a href="#" class="text-dark">Purchase Request</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h1 class="font-weight-bold" style="font-size: 32px;">Request to Buy a Property</h1>
            <p style="color:red;"><?php echo $error; ?></p>
            <?php
            // Check if the 'pid' parameter is set in the URL
            if (isset($_GET['pid'])) {
                $pid = $_GET['pid'];
                // Retrieve property details based on the 'pid' parameter
                include('auth/database.php');
                $query = mysqli_query($link, "SELECT * FROM property WHERE pid = $pid");
                $property = mysqli_fetch_assoc($query);

                // Display property details
                if ($property) {
                    ?>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h2 class="font-weight-bold" style="font-size: 24px; color: rgba(77,181,217,0.8)">Property Details:</h2>
                            <p class="font-weight-bold" style="font-size: 16px; color: #3c6e58;font-weight: bold">Property ID: <?php echo $property['pid']; ?></p>
                            <p class="font-weight-bold" style="font-size: 16px; color: #3c6e58; font-weight: bold">Property Name: <?php echo $property['title']; ?></p>
                            <p class="font-weight-bold"style="font-size: 16px; color: #3c6e58; font-weight: bold">Property State: <?php echo $property['state']; ?></p>
                            <div class="image-wrapper">
                                <img src="admin/property/<?php echo $property['pimage']; ?>" alt=<?php echo $property['title']; ?>">
								</div>
                        </div>
                        <div class="col-md-6">
                            <form action="buy.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="pid" value="<?php echo $property['pid']; ?>">

                                <div class="form-group">
                                    <label for="request_type" class="font-weight-bold" style="font-size: 18px;">Select Request Type:</label>
                                    <select name="request_type" id="request_type" class="form-control" style="font-size: 16px;">
                                        <option value="buy">Buy</option>
                                        <option value="rent">Rent</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="additional_info" class="font-weight-bold" style="font-size: 20px;">Additional Information:</label>
                                    <textarea name="additional_info" id="additional_info" rows="4" class="form-control" style="font-size: 16px;"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="document" class="font-weight-bold" style="font-size: 20px;">Upload Document (Optional):</label>
                                    <input type="file" name="document" id="document" style="font-size: 17px;" class="form-control-file">
                                </div>

                                <button type="submit" class="btn btn-primary" style="font-size: 18px;">Submit Request</button>
                            </form>
                        </div>
                    </div>
                    <?php
                } else {
                    echo '<p class="font-weight-bold mt-4" style="font-size: 24px;">Property not found.</p>';
                }
            } else {
                echo '<p class="font-weight-bold mt-4" style="font-size: 24px;">Invalid request. Please provide a valid property ID.</p>';
            }
            ?>
        </div>
    </div>
</div>
</div>
<br/>

<div class="row mt-5">
    <?php include('components/footer.php'); ?>
</div>
</body>