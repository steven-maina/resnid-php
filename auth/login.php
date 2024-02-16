<?php
    include "database.php";

    session_start();


    if(isset($_POST['email'])) {
        $op = $_POST['email'];
    }
    if(isset($_POST['pass'])) {
        $op = $_POST['pass'];
    }
    $failed = 0;
    $error="";
    // $op = $_POST['op'];
    // $email = $_POST['email'];
    // $pass = $_POST['pass'];
    if(isset($_POST['op'])) {
        $op = $_POST['op'];
    
        if ($op == "login") {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
        
            // Use prepared statements to prevent SQL injection
            $stmt = $link->prepare("SELECT id, name, password,role FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($db_id, $db_name, $db_password, $db_role);
            $stmt->fetch();
            $stmt->close();
        
            // Check if user exists and password is correct
            if ($db_id && password_verify($pass, $db_password)) {
                // Login successful
                $_SESSION['auth_id'] = $db_id; // Store user ID in the session
                 $_SESSION['auth_email'] = $email;
                 $_SESSION['auth_name'] = $db_name;
                 $_SESSION['auth_role'] = $db_role;
                 $_SESSION['auser'] = $db_name;
            // echo "Logged in Seccessifully";
            // echo $db_role;
        
                // Redirect to the desired page after successful login
                if ($db_role == 'admin' || $db_role == 'agent') {
                    header("Location: ../admin/dashboard.php");
                    exit;
                } 
                else {               
                header("Location: ../index.php");
                exit;
                }
            } else {
                // Login failed
                $error="Invalid User Name and Password";
                $failed = 1;
            }
        }
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Moon Admin - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../admin/assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="../admin/assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="page-wrappers login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								<p style="color:red;"><?php echo $error; ?></p>
								<!-- Form -->
								<form method="post" action="login.php">
									<div class="form-group">
										<input class="form-control" name="email" type="text" placeholder="User Name" required>
									</div>
									<div class="form-group">
										<input class="form-control" type="password" name="pass" placeholder="Password" required>
									</div>
									<div class="form-group">
										<!-- <button class="btn btn-primary btn-block" name="login" type="submit" value="login">Login</button> -->
                                        <input type="submit" class="btn btn-primary btn-block" value="Login"/>
									</div>
                                    <input type="hidden" name="op" value="login"/>
								</form>
								
								<div class="text-center dont-have">Don't have an account? <a href="registration.php">Register </a> As a Client Or Agent</div>

                                <br/>
                                <a href="../index.php" class="btn-sm btn-secondary">Home Page</a>
								
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../admin/assets/js/jquery-3.2.1.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="../admin/assets/js/popper.min.js"></script>
        <script src="../admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="../admin/assets/js/script.js"></script>
		
    </body>

</html>