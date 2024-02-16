<?php
//session_start();
require("config.php");
////code
 
//if(!isset($_SESSION['auth_role']))
//{
//	header("location: ../auth/login.php");
//}
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['state'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	$uid=$_POST['uid'];
	$lat=$_POST['latitude'];
	$long=$_POST['longitude'];
//	$feature=$_POST['feature'];
	
	$totalfloor=$_POST['totalfl'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	$aimage4=$_FILES['aimage4']['name'];
	
	$fimage=$_FILES['fimage']['name'];
	$fimage1=$_FILES['fimage1']['name'];
	$fimage2=$_FILES['fimage2']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	$temp_name4 =$_FILES['aimage4']['tmp_name'];
	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"property/$aimage");
	move_uploaded_file($temp_name1,"property/$aimage1");
	move_uploaded_file($temp_name2,"property/$aimage2");
	move_uploaded_file($temp_name3,"property/$aimage3");
	move_uploaded_file($temp_name4,"property/$aimage4");
	
	move_uploaded_file($temp_name5,"property/$fimage");
	move_uploaded_file($temp_name6,"property/$fimage1");
	move_uploaded_file($temp_name7,"property/$fimage2");

    $sql0 = "INSERT INTO property_features (
    property_age, 
    swimming_pool, 
    parking, 
    gym, 
    type, 
    security, 
    dining_capacity, 
    temple, 
    third_party, 
    elevator, 
    cctv, 
    water_supply, 
    ceiling_fan, 
    curtains_drapes, 
    oven_range, 
    chandeliers, 
    freezer, 
    refrigerator, 
    convection_oven, 
    light_fixtures, 
    screens, 
    air_conditioning, 
    hotwater
) VALUES (
    '".(isset($_POST['property_age']) ? $_POST['property_age'] : '')."', 
    '".(isset($_POST['swimming_pool']) ? $_POST['swimming_pool'] : '')."', 
    '".(isset($_POST['parking']) ? $_POST['parking'] : '')."', 
    '".(isset($_POST['gym']) ? $_POST['gym'] : '')."', 
    '".(isset($_POST['type']) ? $_POST['type'] : '')."', 
    '".(isset($_POST['security']) ? $_POST['security'] : '')."', 
    '".(isset($_POST['dining_capacity']) ? $_POST['dining_capacity'] : '')."', 
    '".(isset($_POST['temple']) ? $_POST['temple'] : '')."', 
    '".(isset($_POST['third_party']) ? $_POST['third_party'] : '')."', 
    '".(isset($_POST['elevator']) ? $_POST['elevator'] : '')."', 
    '".(isset($_POST['cctv']) ? $_POST['cctv'] : '')."', 
    '".(isset($_POST['water_supply']) ? $_POST['water_supply'] : '')."', 
    '".(isset($_POST['ceiling_fan']) ? $_POST['ceiling_fan'] : '')."', 
    '".(isset($_POST['curtains_drapes']) ? $_POST['curtains_drapes'] : '')."', 
    '".(isset($_POST['oven_range']) ? $_POST['oven_range'] : '')."', 
    '".(isset($_POST['chandeliers']) ? $_POST['chandeliers'] : '')."', 
    '".(isset($_POST['freezer']) ? $_POST['freezer'] : '')."', 
    '".(isset($_POST['refrigerator']) ? $_POST['refrigerator'] : '')."', 
    '".(isset($_POST['convection_oven']) ? $_POST['convection_oven'] : '')."', 
    '".(isset($_POST['light_fixtures']) ? $_POST['light_fixtures'] : '')."', 
    '".(isset($_POST['screens']) ? $_POST['screens'] : '')."', 
    '".(isset($_POST['air_conditioning']) ? $_POST['air_conditioning'] : '')."', 
    '".(isset($_POST['hotwater']) ? $_POST['hotwater'] : '')."'
)";

    if(mysqli_query($con, $sql0)) {
       $pf=mysqli_insert_id($con);
    } else {
        $error = "Error: " . mysqli_error($con);
    }
	
	$sql="insert into property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,state,latitude, longitude,feature,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,totalfloor)
	values('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$state','$lat','$long','$pf','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor')";
	$result=mysqli_query($con,$sql);
    $pid=mysqli_insert_id($con);
	if($result)
		{
            $sql2="insert into agent_properties (agent_id,property_id) values ('$uid','$pid')";
            $result2=mysqli_query($con, $sql2);
            $updateQuery = "UPDATE property_features SET property_id = '$pid' WHERE id = '$pf'";
            $updateResult = mysqli_query($con, $updateQuery);
            $msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LM HOMES | Property</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		
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
								<h3 class="page-title">Property</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Property</li>

							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Property Details</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
									<h5 class="card-title">Property Detail</h5>
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="Enter Title">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="content" rows="10" cols="30"></textarea>
													</div>
												</div>
												
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Property Type</label>
													<div class="col-lg-9">
														<select class="form-control" required name="ptype">
															<option value="">Select Type</option>
															<option value="appartment">Appartment</option>
															<option value="flat">Flat</option>
															<option value="bunglow">Bunglow</option>
															<option value="house">House</option>
															<option value="villa">Villa</option>
															<option value="office">Office</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Selling Type</label>
													<div class="col-lg-9">
														<select class="form-control" required name="stype">
															<option value="">Select Status</option>
															<option value="rent">Rent</option>
															<option value="sale">Sale</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bath" required placeholder="Enter Bathroom (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitc" required placeholder="Enter Kitchen (only no 1 to 10)">
													</div>
												</div>
												
											</div>   
											<div class="col-xl-6">
												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">BHK</label>
													<div class="col-lg-9">
														<select class="form-control" required name="bhk">
															<option value="">Select BHK</option>
															<option value="1 BHK">1 BHK</option>
															<option value="2 BHK">2 BHK</option>
															<option value="3 BHK">3 BHK</option>
															<option value="4 BHK">4 BHK</option>
															<option value="5 BHK">5 BHK</option>
															<option value="1,2 BHK">1,2 BHK</option>
															<option value="2,3 BHK">2,3 BHK</option>
															<option value="2,3,4 BHK">2,3,4 BHK</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bedroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bed" required placeholder="Enter Bedroom  (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balc" required placeholder="Enter Balcony  (only no 1 to 10)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Hall</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="hall" required placeholder="Enter Hall  (only no 1 to 10)">
													</div>
												</div>
												
											</div>
										</div>
										<h4 class="card-title">Price & Location</h4>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor</label>
													<div class="col-lg-9">
														<select class="form-control" required name="floor">
															<option value="">Select Floor</option>
															<option value="1st Floor">1st Floor</option>
															<option value="2nd Floor">2nd Floor</option>
															<option value="3rd Floor">3rd Floor</option>
															<option value="4th Floor">4th Floor</option>
															<option value="5th Floor">5th Floor</option>
															<option value="6th Floor">6th Floor</option>
															<option value="7th Floor">7th Floor</option>
															<option value="8th Floor">8th Floor</option>
															<option value="9th Floor">9th Floor</option>
															<option value="10th Floor">10th Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Price</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="price" required placeholder="Enter Price">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">State</label>
													<div class="col-lg-9">
                                                        <select class="form-control" name="state"  onchange="updateHiddenInput()" required placeholder="Enter State">
                                                            <option disabled selected>--Select State--</option>
                                                            <option value="Abia">Abia</option>
                                                            <option value="Adamawa">Adamawa</option>
                                                            <option value="Akwa Ibom">Akwa Ibom</option>
                                                            <option value="Anambra">Anambra</option>
                                                            <option value="Bauchi">Bauchi</option>
                                                            <option value="Bayelsa">Bayelsa</option>
                                                            <option value="Benue">Benue</option>
                                                            <option value="Borno">Borno</option>
                                                            <option value="Cross River">Cross River</option>
                                                            <option value="Delta">Delta</option>
                                                            <option value="Ebonyi">Ebonyi</option>
                                                            <option value="Edo">Edo</option>
                                                            <option value="Ekiti">Ekiti</option>
                                                            <option value="Enugu">Enugu</option>
                                                            <option value="FCT">Federal Capital Territory</option>
                                                            <option value="Gombe">Gombe</option>
                                                            <option value="Imo">Imo</option>
                                                            <option value="Jigawa">Jigawa</option>
                                                            <option value="Kaduna">Kaduna</option>
                                                            <option value="Kano">Kano</option>
                                                            <option value="Katsina">Katsina</option>
                                                            <option value="Kebbi">Kebbi</option>
                                                            <option value="Kogi">Kogi</option>
                                                            <option value="Kwara">Kwara</option>
                                                            <option value="Lagos">Lagos</option>
                                                            <option value="Nasarawa">Nasarawa</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Ogun">Ogun</option>
                                                            <option value="Ondo">Ondo</option>
                                                            <option value="Osun">Osun</option>
                                                            <option value="Oyo">Oyo</option>
                                                            <option value="Plateau">Plateau</option>
                                                            <option value="Rivers">Rivers</option>
                                                            <option value="Sokoto">Sokoto</option>
                                                            <option value="Taraba">Taraba</option>
                                                            <option value="Yobe">Yobe</option>
                                                            <option value="Zamfara">Zamfara</option>
                                                        </select>
                                                    </div>
												</div>
                                                <input type="hidden" class="form-control" name="city" id="cityInput" value="">
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Total Floor</label>
													<div class="col-lg-9">
														<select class="form-control" required name="totalfl">
															<option value="">Select Floor</option>
															<option value="1 Floor">1 Floor</option>
															<option value="2 Floor">2 Floor</option>
															<option value="3 Floor">3 Floor</option>
															<option value="4 Floor">4 Floor</option>
															<option value="5 Floor">5 Floor</option>
															<option value="6 Floor">6 Floor</option>
															<option value="7 Floor">7 Floor</option>
															<option value="8 Floor">8 Floor</option>
															<option value="9 Floor">9 Floor</option>
															<option value="10 Floor">10 Floor</option>
															<option value="11 Floor">11 Floor</option>
															<option value="12 Floor">12 Floor</option>
															<option value="13 Floor">13 Floor</option>
															<option value="14 Floor">14 Floor</option>
															<option value="15 Floor">15 Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Area Size</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="Enter Address">
													</div>
												</div>
												
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
                                                <p class="alert alert-info">* Check  <b>Yes</b> Or <b>No</b> or To show the feature exists Details </p>
<!--                                                <textarea class="tinymce form-control" name="feature" rows="10" cols="30">-->
<!--												<--feature area start--->
<!--												<div class="col-md-4">-->
<!--														<ul>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Property Age : </span>10 Years</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Swiming Pool : </span>Yes</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Parking : </span>Yes</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>-->
<!--														</ul>-->
<!--													</div>-->
<!--													<div class="col-md-4">-->
<!--														<ul>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Appartment</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Dining Capacity : </span>10 People</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Temple  : </span>Yes</li>-->
<!---->
<!--														</ul>-->
<!--													</div>-->
<!--													<div class="col-md-4">-->
<!--														<ul>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">3rd Party : </span>No</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Alivator : </span>Yes</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>-->
<!--														<li class="mb-3"><span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank</li>-->
<!--														</ul>-->
<!--													</div>-->
<!--												<--feature area end-->
<!--											</textarea>-->
<!--                                                <div class="row">-->
<!--                                                    <div class="col-md-4">-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="property_age" value="10_years">-->
<!--                                                            <span class="text-secondary font-weight-bold">Property Age : </span>10 Years-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="swimming_pool" value="yes">-->
<!--                                                            <span class="text-secondary font-weight-bold">Swimming Pool : </span>Yes-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="parking" value="yes">-->
<!--                                                            <span class="text-secondary font-weight-bold">Parking : </span>Yes-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-md-4">-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="gym" value="yes">-->
<!--                                                            <span class="text-secondary font-weight-bold">GYM : </span>Yes-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="type" value="apartment">-->
<!--                                                            <span class="text-secondary font-weight-bold">Type : </span>Apartment-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="security" value="yes">-->
<!--                                                            <span class="text-secondary font-weight-bold">Security : </span>Yes-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-md-4">-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="dining_capacity" value="10_people">-->
<!--                                                            <span class="text-secondary font-weight-bold">Dining Capacity : </span>10 People-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="temple" value="yes">-->
<!--                                                            <span class="text-secondary font-weight-bold">Temple : </span>Yes-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="third_party" value="no">-->
<!--                                                            <span class="text-secondary font-weight-bold">3rd Party : </span>No-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-md-4">-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="elevator" value="yes">-->
<!--                                                            <span class="text-secondary font-weight-bold">Elevator : </span>Yes-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="cctv" value="yes">-->
<!--                                                            <span class="text-secondary font-weight-bold">CCTV : </span>Yes-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="water_supply" value="ground_water_tank">-->
<!--                                                            <span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-md-4">-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="ceiling_fan">-->
<!--                                                            <span class="text-secondary font-weight-bold">Ceiling Fan</span>-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="curtains_drapes">-->
<!--                                                            <span class="text-secondary font-weight-bold">Curtains/Drapes</span>-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="oven_range">-->
<!--                                                            <span class="text-secondary font-weight-bold">Oven/Range</span>-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="chandeliers">-->
<!--                                                            <span class="text-secondary font-weight-bold">Chandelier(s)</span>-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="freezer">-->
<!--                                                            <span class="text-secondary font-weight-bold">Freezer</span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-md-4">-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="refrigerator">-->
<!--                                                            <span class="text-secondary font-weight-bold">Refrigerator</span>-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="convection_oven">-->
<!--                                                            <span class="text-secondary font-weight-bold">Convection Oven</span>-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="light_fixtures">-->
<!--                                                            <span class="text-secondary font-weight-bold">Light Fixtures</span>-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="screens">-->
<!--                                                            <span class="text-secondary font-weight-bold">Screens</span>-->
<!--                                                        </div>-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="air_conditioning">-->
<!--                                                            <span class="text-secondary font-weight-bold">Air Conditioning</span>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="col-md-4">-->
<!--                                                        <div class="mb-3">-->
<!--                                                            <input type="checkbox" name="hotwater">-->
<!--                                                            <span class="text-secondary font-weight-bold">Hotwater</span>-->
<!--                                                        </div>-->
<!--                                                </div>-->
<!---->
<!--                                            </div>-->

                                                <div class="row">
                                                    <?php
                                                    $features_data = array(
                                                        'Property Age' => array('name' => 'property_age', 'value' => '10_years'),
                                                        'Swimming Pool' => array('name' => 'swimming_pool', 'value' => 'yes'),
                                                        'Parking' => array('name' => 'parking', 'value' => 'yes'),
                                                        'GYM' => array('name' => 'gym', 'value' => 'yes'),
                                                        'Type' => array('name' => 'type', 'value' => 'apartment'),
                                                        'Security' => array('name' => 'security', 'value' => 'yes'),
                                                        'Dining Capacity' => array('name' => 'dining_capacity', 'value' => '10_people'),
                                                        'Temple' => array('name' => 'temple', 'value' => 'yes'),
                                                        '3rd Party' => array('name' => 'third_party', 'value' => 'no'),
                                                        'Elevator' => array('name' => 'elevator', 'value' => 'yes'),
                                                        'CCTV' => array('name' => 'cctv', 'value' => 'yes'),
                                                        'Water Supply' => array('name' => 'water_supply', 'value' => 'ground_water_tank'),
                                                        'Ceiling Fan' => array('name' => 'ceiling_fan'),
                                                        'Curtains/Drapes' => array('name' => 'curtains_drapes'),
                                                        'Oven/Range' => array('name' => 'oven_range'),
                                                        'Chandelier(s)' => array('name' => 'chandeliers'),
                                                        'Freezer' => array('name' => 'freezer'),
                                                        'Refrigerator' => array('name' => 'refrigerator'),
                                                        'Convection Oven' => array('name' => 'convection_oven'),
                                                        'Light Fixtures' => array('name' => 'light_fixtures'),
                                                        'Screens' => array('name' => 'screens'),
                                                        'Air Conditioning' => array('name' => 'air_conditioning'),
                                                        'Hotwater' => array('name' => 'hotwater'),
                                                    );

                                                    foreach ($features_data as $label => $feature) {
                                                        $checked = isset($property_features[$feature['name']]) && $property_features[$feature['name']] === 'yes' ? 'checked' : '';
                                                        ?>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <input type="checkbox" name="<?php echo $feature['name']; ?>" value="<?php echo $feature['value'] ?? 'yes'; ?>" <?php echo $checked; ?>>
                                                                <span class="text-secondary font-weight-bold"><?php echo $label; ?> : </span><?php echo $feature['value'] ?? ''; ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                            </div>
                                        </div>

                                    <h4 class="card-title">Image & Status</h4>
										<div class="row">

											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 4</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage4" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Status</label>
													<div class="col-lg-9">
														<select class="form-control"  required name="status">
															<option value="">Select Status</option>
															<option value="available">Available</option>
															<option value="sold out">Sold Out</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Basement Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage1" type="file">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage" type="file">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Ground Floor Plan Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="fimage2" type="file">
													</div>
												</div>

                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Property Agent</label>
                                                    <div class="col-lg-9">
                                                        <?php
                                                        $query = mysqli_query($con, "select * from agent where status='active' AND deleted_at IS NULL");
                                                        $cnt = 1;
                                                        ?>
                                                        <select class="form-control" required name="uid" placeholder="Select the Agent User">
                                                            <option value="">Select Agent</option>
                                                            <?php
                                                            while ($row = mysqli_fetch_row($query)) {
                                                                ?>
                                                                <option value="<?php echo $row['0']; ?>"><?php echo $row['2']; ?></option>
                                                                <?php
                                                                $cnt = $cnt + 1;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <H4>Geo Location</H4>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Latitude</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" name="latitude" type="text" id="latitudeInput" placeholder="Enter latitude">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Longitude</label>
                                                    <div class="col-lg-9">
                                                        <input class="form-control" name="longitude" type="text" id="longitudeInput" placeholder="Enter longitude">
                                                    </div>
                                                </div>
                                                <button type="button" onclick="getCurrentLocation()">Use Current Location</button>


                                            </div>

										</div>
                                        </div>
											<input type="submit" value="Submit" class="btn btn-primary" name="add" style="margin-left:200px;">
										
								</div>
								</form>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
            <script>
                function updateHiddenInput() {
                    // Get the selected value from the "state" dropdown
                    var selectedState = document.getElementById("state").value;

                    // Set the value of the hidden input to the selected state
                    document.getElementById("cityInput").value = selectedState;
                }
            </script>
            <script>
                function getCurrentLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            function(position) {
                                // Update the input fields with the obtained coordinates
                                document.getElementById('latitudeInput').value = position.coords.latitude;
                                document.getElementById('longitudeInput').value = position.coords.longitude;
                            },
                            function(error) {
                                console.error("Error getting current location:", error.message);
                                alert("Error getting current location. Please enter manually.");
                            }
                        );
                    } else {
                        alert("Geolocation is not supported by your browser. Please enter manually.");
                    }
                }
            </script>
    </body>

</html>