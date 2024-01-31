<?php
include "classes/UserManager.php";
?>
<header>
<div id="top-strip">
	<div class="container">
		<!-- <div id="login-box" class='pull-right'>
			<a href="auth/login.php" class='fa fa-user'><span>Login</span></a>
			<a href="auth/registration.php" class='fa fa-pencil'><span>Register</span></a>
		</div> -->

		<?php	
		session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['auth_id'], $_SESSION['auth_email'])) {
    // User is logged in
    $auth_id = $_SESSION['auth_id'];
    $auth_email = $_SESSION['auth_email'];
	$userManager = new UserManager($link); 
	$userInfo = $userManager->getUserInfo($auth_id);

    if ($userInfo) {
        $userName = $userInfo['name'];
		echo "<div id='login-box' class='pull-right' style='display: flex; align-items: center;'>";
		echo "<h6 style='color:white; margin-right: 10px;'>$userName </h6>";
		echo "<a href='#' onclick='confirmLogout()' class='fa fa-sign-out'><span>Logout</span></a>";
		echo "</div>";
    } else {
      echo "Error while trying to login";
    }
} else {
    // User is not logged in
    echo "<div id='login-box' class='pull-right'>";
    echo "<a href='auth/login.php' class='fa fa-user'><span>Login</span></a>";
    echo "<a href='auth/registration.php' class='fa fa-pencil'><span>Register</span></a>";
    echo "</div>";
}
?>

	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmLogout() {
    Swal.fire({
        title: 'Logout Confirmation',
        text: 'Are you sure you want to logout?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to logout page if user confirms
            window.location.href = 'auth/logoff.php';
        }
    });
}
</script>
</header>