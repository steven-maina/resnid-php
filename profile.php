
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<?php
include_once("components/header.php")
?>
</head>
<body>
<?php 
// ini_set('session.cache_limiter','public');
// session_cache_limiter(false);
// session_start();
include("auth\database.php");
if(!isset($_SESSION['auth_id']))
{
	header("location: auth/login.php");
}

////// code
$error='';
$msg='';
if(isset($_POST['insert']))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];

	$content=$_POST['content'];
	
	$uid=$_SESSION['auth_id'];
	
	if(!empty($name) && !empty($phone) && !empty($content))
	{
		
		$sql="INSERT INTO feedback (uid,fdescription,status) VALUES ('$uid','$content','0')";
		   $result=mysqli_query($con, $sql);
		   if($result){
			   $msg = "<p class='alert alert-success'>Feedback Send Successfully</p> ";
		   }
		   else{
			   $error = "<p class='alert alert-warning'>Feedback Not Send Successfully</p> ";
		   }
	}else{
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}								
?>
<div id="page-wrapper">
    <div class="row">
		 
		<!--	Submit property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Profile</h2>
                        </div>
					</div>
                <div class="dashboard-personal-info p-5 bg-white">
                    <form action="#" method="post">
                        <h5 class="text-secondary border-bottom-on-white pb-3 mb-4">Feedback Form</h5>
						<?php echo $msg; ?><?php echo $error; ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="user-id">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                </div>                
                                
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone"  class="form-control" placeholder="Enter Phone" maxlength="10">
                                </div>

                                <div class="form-group">
                                    <label for="about-me">Description</label>
                                    <textarea class="form-control" name="content" rows="7" placeholder="Enter Description"></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary mb-4" name="insert" value="Send">
                            </div>
							</form>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-5 col-md-12">
                                            <?php 
                                                $auth_id = $_SESSION['auth_id'];
                                                $auth_email = $_SESSION['auth_email'];
                                                $userManager = new UserManager($link); 
                                                $userInfo = $userManager->getUserInfo($auth_id);
                                            
                                                if ($userInfo) {
                                                    $userName = $userInfo['name'];
                                            ?>
                                            <div class="card mt-md-50">
                                            <img src="img/agents/sm.jpeg" alt="userimage" class="card-img-top user-profile-image rounded-circle" height="30%" width="40%">
                                                
                                                <div class="card-body">
                                                    <h3 class="card-title mb-4"><?php echo $userInfo['name']; ?></h3>
                                                    <p class="card-text">
                                                        <h4>Email:</h4> <h6><?php echo $userInfo['email']; ?></h6><br>
                                                        <h4>Phone:</h4> <h6><?php echo $userInfo['phone']; ?></h6><br>
                                                        <h4>Role:</h4> <h6><?php echo $userInfo['role']; ?></h6><br/>
                                                    </p>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-lg-5 col-md-12">
                                <div class="col-8"></div>
                                <a href="index.php" class="btn btn-secondary" style="color: white; background:gray;"> Back</a>
                                </div>

                        </div>

                </div>            
            </div>
           
        </div>  
        <br/>      
        
        <!--	Footer   start-->
		<?php include("components/footer.php");?>
	
    </div>
</div>
<script src="js/js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/js/greensock.js"></script> 
<script src="js/js/layerslider.transitions.js"></script> 
<script src="js/js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/js/popper.min.js"></script> 
<script src="js/js/bootstrap.min.js"></script> 
<script src="js/js/owl.carousel.min.js"></script> 
<script src="js/js/tmpl.js"></script> 
<script src="js/js/jquery.dependClass-0.1.js"></script> 
<script src="js/js/draggable-0.1.js"></script> 
<script src="js/js/jquery.slider.js"></script> 
<script src="js/js/wow.js"></script> 
<script src="js/js/custom.js"></script>
</body>
</html>