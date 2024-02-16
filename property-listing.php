<?php include('components/head.php'); ?>
<body id='top'>
<?php include('components/header.php'); ?>
<!-- /Header -->
<div>
    <style>
        .gray-btn {
            background-color: gray;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .gray-btn:hover {
            background-color: #459b45;
        }
    </style>

    <div class="slider-section">
<?php include('components/nav.php'); ?>
	<!-- head-Section -->
	<div class="page-title-section">
		<div class="container">
			<div class="pull-left page-title">
				<a href="#">
				<h2>property listing</h2>
				</a>
			</div>
			<div class="pull-right breadcrumb">
				<a href="#">home</a><span class="fa fa-arrow-circle-right sep"></span><a href="#">property listing</a>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Search-Section -->
<?php include('components/search.php') ?>
<?php
include('auth/database.php');
$propertyQuery = "SELECT * FROM property";
$propertyResult = mysqli_query($link, $propertyQuery);

if (!$propertyResult) {
    die("Error fetching properties: " . mysqli_error($link));
}

$totalProperties = mysqli_num_rows($propertyResult); // Total number of properties

// Calculate the total number of pages
$propertiesPerPage = 6; // Number of properties to display per page
$totalPages = ceil($totalProperties / $propertiesPerPage);

// Get the current page number, default to 1 if not set
$currentpage = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : 1;

// Ensure the current page is within the valid range
if ($currentpage < 1) {
    $currentpage = 1;
} elseif ($currentpage > $totalPages) {
    $currentpage = $totalPages;
}

// Calculate the offset for the query
$offset = ($currentpage - 1) * $propertiesPerPage;

// Fetch properties for the current page
$propertyQuery = "SELECT * FROM property LIMIT $offset, $propertiesPerPage";
$propertyResult = mysqli_query($link, $propertyQuery);

if (!$propertyResult) {
    die("Error fetching properties for the current page: " . mysqli_error($link));
}
try {
?>
<div>
<div class="content-section">
    <div class="container">
        <div class="row listings-items-wrapper">
            <?php
            while ($property = mysqli_fetch_assoc($propertyResult)) {
                ?>
                <div class="col-md-4 listing-single-item">
                    <div class="item-inner">
                        <div class="image-wrapper">
                            <img src="img/listings/02_img-1.png" alt="gallery">
                            <a href="#" class='fa fa-home property-type-icon'></a>
                            <a href="#" class="yellow-btn">₦ <?php echo number_format($property['price'], 2); ?></a>
                        </div>
                        <div class="desc-box">
                            <h4><a href="#"><?php echo $property['title']; ?></a></h4>
                            <ul class="slide-item-features item-features">
                                <li><span class="fa fa-arrows-alt"></span><?php echo $property['size']; ?> Sq Ft</li>
                                <li><span class="fa fa-male"></span><?php echo $property['bathroom']; ?> bathrooms</li>
                                <li><span class="fa fa-inbox"></span><?php echo $property['bedroom']; ?> bedrooms</li>
                            </ul>
                            <div class="buttons-wrapper">
                                <?php if(isset($property['pid'])): ?>
                                    <a href="property-details.php?pid=<?php echo $property['pid']; ?>" class="gray-btn"><span class="fa fa-file-text-o"></span>Details</a>
                                    <a href="buy.php?pid=<?php echo $property['pid']; ?>" class="gray-btn"><span class="fa fa-cart-plus"></span>Buy/Rent</a>
                                <?php endif; ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="pagination-wrapper">
            <ul class="pagination">
                <?php
                // Render pagination links
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li ' . (($currentpage == $i) ? 'class="active"' : '') . '><a href="?page=' . $i . '">' . $i . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>
    <?php
} finally {
    mysqli_close($link);
}
?>
<div class="row">
    <?php include('components/footer.php'); ?>
</div>

</body>