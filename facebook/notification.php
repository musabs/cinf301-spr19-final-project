<?php
include("header.php");
include("config.php");
	$u_id = $_SESSION['user_id'];
					
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
<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<style>
	.custom{
	}
</style>
</head>
<body>
	<div class="wrapper">
		<section class="companies-info" style="margin-bottom: 200px;">
			<div class="container">
				<div class="company-title">
					<center><h3>All Friends Request</h3></center>
					
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
					<?php
					//while($row = mysqli_fetch_array($result)){
					 ?>
						<!--<div class="col-lg-3 col-md-4 col-sm-6 col-12">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="uploads/<?php echo $row['image']; ?>" alt="">
									<h3><?php echo $row['f_name']; ?></h3>
									<h4><?php echo $row['email']; ?></h4>
									<input type="hidden" name="rec_id" value="<?php echo $row['reg_id']; ?>"/>
									<ul>
										<li><a href="#accept_request.php?rec_id=<?php echo $row['reg_id']; ?>" title="" class="follow" style="margin-bottom: 5px;">Accept Request</a></li>
										<li><a href="#reject_request.php?rec_id=<?php echo $row['reg_id']; ?>" title="" class="message-us">Reject Request</a></li>
										
									</ul>
								</div>
								<a href="#" title="" class="view-more-pro">View Profile</a>
							</div>
						</div>-->
						<?php 
						//}
						?>
						
						<?php
						$rec = mysqli_query($a,"select * from friend_request where receiver_id = '$u_id' and status = '0'")or die(mysqli_error($a));
						while($row = mysqli_fetch_array($rec))
					{
							
							$sender_id = $row['sender_id'];
							 $result = mysqli_query($a,"select * from register where reg_id = '$sender_id'")or die(mysqli_error($a));
							$row = mysqli_fetch_array($result);
					 ?>
							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="company_profile_info">
									<div class="company-up-info">
										<img src="uploads/<?php echo $row['image']; ?>" alt="">
										<h3><?php echo $row['f_name']; ?></h3>
										<h4><?php echo $row['email']; ?></h4>
										<input type="hidden" name="rec_id" value="<?php echo $row['reg_id']; ?>"/>
										<ul>
											<li><a href="accept.php?rec_id=<?php echo $row['reg_id']; ?>" title="" class="follow" style="margin-bottom: 5px;">Accept</a></li>
										<li><a href="reject.php?rec_id=<?php echo $row['reg_id']; ?>" title="" class="message-us">Reject</a></li>
											
										</ul>
									</div>
									<a href="#" title="" class="view-more-pro">View Profile</a>
								</div><!--company_profile_info end-->
							</div>
						<?php 
						}
				?>		
					</div>
				</div><!--companies-list end-->
			</div>
		</section>
		<!--companies-info end-->
	</div><!--theme-layout end-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>
<?php
include("footer.php");
?>