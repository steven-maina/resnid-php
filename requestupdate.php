<?php
session_start();
include('auth/database.php');

if (!isset($_SESSION['auth_id'])) {
    header("location: ../auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $request_id = $_GET['id'];
    $uid = $_SESSION['auth_id'];
    $query = mysqli_query($link, "SELECT * FROM `purchase_requests` WHERE request_id='$request_id' AND user_id='$uid'");
    $row = mysqli_fetch_assoc($query);

    if (!$row) {
        echo "Error: Purchase request not found or does not belong to the current user.";
        exit();
    }
} else {
    echo "Error: Invalid request.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newStatus = $_POST['new_status'];
    $updateQuery = "UPDATE `purchase_requests` SET `status`='$newStatus' WHERE `request_id`='$request_id'";
    mysqli_query($link, $updateQuery);
    header("Location: myrequests.php");
    exit();
}
?>

<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<!-- Add any additional styling or elements as needed -->

<div class="container mt-5">
    <h2 class="text-secondary double-down-line text-center" style="font-size: 26px;">Update Purchase Request</h2>

    <!-- Display current purchase request details -->
    <div class="row">
        <div class="col-md-6">
            <p style="font-size: 20px;"><strong>Property ID:</strong> <?php echo $row['property_id']; ?></p>
            <p style="font-size: 20px;"><strong>Request Type:</strong> <?php echo $row['request_type']; ?></p>
            <p style="font-size: 20px;"><strong>Additional Info:</strong> <?php echo $row['additional_info']; ?></p>
            <p style="font-size: 20px;"><strong>Submission Date:</strong> <?php echo $row['submission_date']; ?></p>
        </div>
    </div>

    <!-- Form for updating the purchase request status -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $request_id); ?>" method="post">
        <div class="form-group">
            <label for="new_status" style="font-size: 18px;">New Status: <span style="color: #ec5757">You can only cancel</span></label>
            <select class="form-control" id="new_status" name="new_status">
                <option value="cancel">Cancel</option>

                <option value="pending" disabled>Pending</option>
                <option value="pending" disabled>Pending</option>
                <option value="approved" disabled>Approved</option>
                <option value="rejected" disabled>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Request</button>
    </form>
</div>
<br/>
<br/>

<?php include('components/footer.php'); ?>
</body>