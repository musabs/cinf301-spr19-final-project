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
					<center><h3>Find Friends</h3></center>
				<div class="search-sec">
			<div class="container">
				<div class="search-box">
					<form action="" method="POST">
						<input type="text" name="find" placeholder="Find your friends || name?, surname?" required="">
						<button type="submit" name="search">Search</button>
					</form>
				</div><!--search-box end-->
			</div>
		</div>
					
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
					<?php
					if(isset($_POST['search'])){
				 $search_name = $_POST['find'];
				$result =  mysqli_query($a,"SELECT * FROM `register` WHERE  f_name like '%$search_name%' and reg_id !='$u_id'")or die(mysqli_error($a));
					while($row = mysqli_fetch_array($result))
					{
						$receiver_id = $row['reg_id'];
						$rec = mysqli_query($a,"select * from friend_request where receiver_id = '$receiver_id' and sender_id='$u_id'")or die(mysqli_error($a));
						$arr = mysqli_fetch_array($rec);
						if(!isset($arr['req_id']))
						{
					 ?>
							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="company_profile_info">
									<div class="company-up-info">
										<img src="uploads/<?php echo $row['image']; ?>" alt="">
										<h3><?php echo $row['f_name']; ?></h3>
										<h4><?php echo $row['email']; ?></h4>
										<input type="hidden" name="rec_id" value="<?php echo $row['reg_id']; ?>"/>
										<ul>
											<li><a href="add_friend.php?rec_id=<?php echo $row['reg_id']; ?>" title="" class="follow">Add Friend</a></li>
											
										</ul>
									</div>
									<a href="#" title="" class="view-more-pro">View Profile</a>
								</div><!--company_profile_info end-->
							</div>
						<?php 
						}
					}
				}
				?>						
					</div>
				</div><!--companies-list end-->
				
			</div>
		</section><!--companies-info end-->


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