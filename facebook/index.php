<?php
session_start();
if(isset($_SESSION['user_id']))
{

echo "<script>window.location.href='home.php'</script>";

} 
include("config.php");
if(isset($_POST['signup'])){
		$name = $_POST['fname'];
		$surname = $_POST['surname'];
		
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gander = $_POST['gander'];
		$db = $_POST['db'];
		$temp_image = $_FILES['image']['tmp_name'];

		$Image = $_FILES['image']['name'];

		$save_primary_image = rand(999,9999).$Image;

		move_uploaded_file($temp_image, "uploads/".$save_primary_image);
		
		$rec = mysqli_query($a,"select * from register where email='$email'") or die(mysqli_error($a));

		$row = mysqli_num_rows($rec);

		if($row > 0){

			echo "<script>alert('This Email already exists');

			window.location.href='index.php'

			</script>";

			die();

		}
mysqli_query($a,"insert into register (`image`,`f_name`,`surname`,`email`,`password`,`db`,`gander`,`status`)values('$save_primary_image','$name','$surname','$email','$password','$db','$gander','0')")or die(mysqli_error($a));
}
if(isset($_POST['login']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$chek_record = mysqli_query($a,"select * from register where email='$email' and password='$password'")or die(mysqli_error($a));
	$count = mysqli_num_rows($chek_record);
	if($count>0)
	{
		$row = mysqli_fetch_array($chek_record);
		 $row['reg_id'];
		  $row['f_name'];
		$_SESSION['user_id'] =  $row['reg_id'];
		$_SESSION['user_name'] =   $row['f_name'];
		echo "<script>window.location.href='home.php'</script>";
	}
	else
	{
		echo "<script>alert('Username or Password do not match');
		window.location.href='index.php'
		</script>";
		die();
	}	
}



 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>WorkWise Html Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>
<body class="sign-in">
	<div class="wrapper">
		<div class="sign-in-page">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						<div class="col-lg-6">
							<div class="cmp-info">
								<div class="cm-logo">
									<img src="images/cm-logo.png" alt="">
									<p>Facebook helps you connect and share with the people in your life.</p>
								</div><!--cm-logo end-->	
								<img src="images/cm-main-img.png" alt="">			
							</div><!--cmp-info end-->
						</div>
						<div class="col-lg-6">
							<div class="login-sec">
								<ul class="sign-control">
									<li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>				
									<li data-tab="tab-2"><a href="#" title="">Sign up</a></li>				
								</ul>			
								<div class="sign_in_sec current" id="tab-1">
									
									<h3>Sign in</h3>
									<form action="" method="POST">
										<div class="row">
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="email" name="email" placeholder="Email">
													<i class="la la-user"></i>
												</div><!--sn-field end-->
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="password" name="password" placeholder="Password">
													<i class="la la-lock"></i>
												</div>
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="checky-sec">
													<div class="fgt-sec">
														<input type="checkbox" name="cc" id="c1">
														<label for="c1">
															<span></span>
														</label>
														<small>Remember me</small>
													</div><!--fgt-sec end-->
													<a href="#" title="">Forgot Password?</a>
												</div>
											</div>
											<div class="col-lg-12 no-pdd">
												<button type="submit" name="login">Sign in</button>
											</div>
										</div>
									</form>
								<!--login-resources end-->
								</div><!--sign_in_sec end-->
								<div class="sign_in_sec" id="tab-2">
								<!--signup-tab end-->	
									<div class="dff-tab current" id="tab-3">
										<form action="" method="POST" enctype="multipart/form-data">
											<div class="row">
											<small style="margin-bottom: 5px;">chose your image</small>
											<div class="col-lg-12 no-pdd">
											
											<input type="file" name="image" required placeholder="">
											</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" name="fname" placeholder="First Name" required="">
														<i class="la la-user"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" name="surname" placeholder="Surname" required="">
														<i class="la la-user"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="email" name="email" autocomplete="off" placeholder="Email address" required="">
														<i class="la la-globe"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="password" name="password" placeholder="New Password" autocomplete="off" required="">
														<i class="la la-lock"></i>
													</div>
												</div>
												<small style="margin-bottom: 5px;">chose your date of birth</small>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
												
														<input type="date" name="db" placeholder="" autocomplete="off" required="">
														<i class="la la-calendar"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													
														<input type="radio" name="gander" value="female" style="height: 15px; width: 20px;margin: 5px;" placeholder="" autocomplete="off" checked=""><small>Female</small>
														
														<input type="radio"  name="gander" placeholder=""style="height: 15px; width: 20px;margin: 5px;" autocomplete="off" value="male"><small>Male</small>
												</div>
												
												<div class="col-lg-12 no-pdd">
													<div class="checky-sec st2">
														<div class="fgt-sec">
															<input type="checkbox" name="cc" id="c2"checked="">
															<label for="c2">
																<span></span>
															</label>
															<small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
														</div><!--fgt-sec end-->
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<button type="submit" name="signup">Get Started</button>
												</div>
											</div>
										</form>
									</div><!--dff-tab end-->
									
								</div>		
							</div><!--login-sec end-->
						</div>
					</div>		
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->
			<div class="footy-sec">
				<div class="container">
					<ul>
						<li><a href="#" title="">Help Center</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="#" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>
					<p><img src="images/copy-icon.png" alt="">Copyright 2018</p>
				</div>
			</div><!--footy-sec end-->
		</div><!--sign-in-page end-->


	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
<?php

?>