<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<div class="slider-section">
    <?php include('components/nav.php'); ?>
    <div class="page-title-section">
        <div class="container">
            <div class="pull-left page-title">
                <a href="#">
                    <h2>My Purchase Requests</h2>
                </a>
            </div>
            <div class="pull-right breadcrumb">
                <a href="#">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">My Purchase Requests</a>
            </div>
        </div>
    </div>
</div>

<?php
include('auth/database.php');

?>
<style>
    .table th, .table td {
        font-size: larger;
    }
</style>

<div class="full-row bg-gray">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <h2 class="text-secondary double-down-line text-center">My Purchase Requests</h2>
                <?php
                if (isset($_GET['msg']))
                    echo $_GET['msg'];
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
        $uid = $_SESSION['auth_id'];
        $query = mysqli_query($link, "SELECT pr.*, p.title FROM `purchase_requests` pr
                                        JOIN `property` p ON pr.property_id = p.pid
                                        WHERE pr.user_id='$uid'");
        if (mysqli_num_rows($query) > 0) {
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
                    <td><a class="btn btn-primary" href="requestupdate.php?id=<?php echo $row['request_id']; ?>">Update</a></td>
                    <!--<td><a class="btn btn-danger" href="submitrequestdelete.php?id=--><?php //echo $row['request_id']; ?><!--">Delete</a></td>-->
                </tr>
                <?php }
                } else {
                ?>
                <tr>
                    <td colspan="7">No Purchase Requests Found for you...</td>
                </tr>
                <?php } ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('components/footer.php'); ?>
</body>
