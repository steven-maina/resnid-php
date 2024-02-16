<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<!-- /Header -->
<div class="slider-section">
    <?php include('components/nav.php'); ?>
    <!-- head-Section -->
    <div class="page-title-section">
        <div class="container">
            <div class="pull-left page-title">
                <a href="#">
                    <h2>property listings</h2>
                </a>
            </div>
            <div class="pull-right breadcrumb">
                <a href="#">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">property listings</a>
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
                <h2 class="text-secondary double-down-line text-center">User Listed Property</h2>
                <?php
                if(isset($_GET['msg']))
                    echo $_GET['msg'];
                ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="bg-primary text-white">
                <tr>
                    <th>Properties</th>
                    <th>BHK</th>
                    <th>Reason</th>
                    <th>Added Date</th>
                    <th>Status</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $uid = $_SESSION['auth_id'];
                $query = mysqli_query($link, "SELECT * FROM `property` WHERE uid='$uid'");

                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td>
                                <img src="admin/property/<?php echo $row['18']; ?>" alt="pimage" class="img-fluid">
                                <div class="property-info">
                                    <h5 class="text-secondary text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0']; ?>"><?php echo $row['1']; ?></a></h5>
                                    <span class="font-14 text-capitalize"><i class="fas fa-map-marker-alt text-primary font-13"></i>&nbsp;<?php echo $row['14']; ?></span>
                                    <div class="price mt-3">
                                        <span class="text-primary">$&nbsp;<?php echo $row['13']; ?></span>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $row['4']; ?></td>
                            <td class="text-capitalize">For <?php echo $row['5']; ?></td>
                            <td><?php echo $row['29']; ?></td>
                            <td class="text-capitalize"><?php echo $row['24']; ?></td>
                            <td><a class="btn btn-primary" href="submitpropertyupdate.php?id=<?php echo $row['0']; ?>">Update</a></td>
                            <!-- <td><a class="btn btn-primary" href="submitpropertydelete.php?id=<?php echo $row['0']; ?>">Delete</a></td> -->
                        </tr>
                    <?php }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">No Property Found for you...</td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>



<?php include('components/footer.php'); ?>
</body>
