<?php
session_start();
require("config.php");
////code
 
if(!isset($_SESSION['auser']))
{
	header("location: ../auth/login.php");
}
?>  
  <div class="header" style="background: #437dd0 ; color: #1c1c1c">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="dashboard.php" class="logo">
						<img src="../img/logo1.png" alt="Logo">
					</a>
					<a href="dashboard.php" class="logo logo-small">
						<img src="../img/logo1.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					
					<!-- User Menu -->
					<h4 style="color:white;margin-top:13px;text-transform:capitalize;"><?php echo $_SESSION['auser'];?></h4>
					<li class="nav-item dropdown app-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.png" width="31" alt="Ryan Taylor"></span>
						</a>
						
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="assets/img/profiles/avatar-01.png" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php echo $_SESSION['auth_name'];?></h6>
									<p class="text-muted mb-0"><?php echo $_SESSION['auth_role'];?></p>
								</div>
							</div>
							<a class="dropdown-item" href="profile.php">Profile</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>

					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			
			<!-- header --->
			
			
			
						<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li> 
								<a href="dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
								<?php
								if (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] === 'admin') {
									echo $_SESSION['auth_role'] == 'admin'; 
								?>
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Users </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="adminlist.php"> Admin </a></li>
									<li><a href="userlist.php"> Users </a></li>
									<li><a href="useragent.php">Agent </a></li>
                                    <?php
                                    if (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] === 'admin') {
                                        ?>
									 <li><a href="adduser.php"> Add User </a></li>
                                      <?php } ?>
								</ul>
							</li>
							<?php }?>
						
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> Property</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
								<?php
								if (isset($_SESSION['auth_role']))
					     		{?>
						        <li><a href="propertyadd.php"> Add Property</a></li>
						            <?php }?>
									<li><a href="propertyview.php"> View Property </a></li>
									<li><a href="requestsview.php"> View Requests </a></li>

								</ul>
							</li>
										
							<!-- <li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span>State & City</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="stateadd.php"> State </a></li>
									<li><a href="cityadd.php"> City </a></li>
								</ul>
							</li> -->
							<?php
							if (isset($_SESSION['auth_role']) && $_SESSION['auth_role'] === 'admin')
					{?>
							<li class="submenu">
								<a href="#"><i class="fe fe-user"></i> <span> System Settings </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="contactview.php"> Contact </a></li>
									<li><a href="feedbackview.php"> Feedback </a></li>
									<li><a href="aboutadd.php"> About </a></li>
									<li><a href="aboutview.php"> View About </a></li>
								</ul>
							</li>
						<?php }?>
							
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
