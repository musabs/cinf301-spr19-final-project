<?php
include("header.php");
if(!isset($_SESSION['user_id']))
{

echo "<script>window.location.href='index.php'</script>";

}

include("config.php");
 $u_id = $_SESSION['user_id'];
 $result =  mysqli_query($a,"SELECT * FROM `register` WHERE  reg_id = '$u_id'")or die(mysqli_error($a));
 $row = mysqli_fetch_array($result);
 if(isset($_POST['submit']))
 {
 		$temp_image = $_FILES['image']['tmp_name'];
		if($temp_image == ""){
			$save_primary_image = "No";
		}
		else{
			
		
		$Image = $_FILES['image']['name'];
		$save_primary_image = rand(999,9999).$Image;
		move_uploaded_file($temp_image, "post_images/".$save_primary_image);
		}
		$target_dir = "post_video/";
		$target_file = $target_dir . basename($_FILES["video"]["name"]);
		
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
		{
    		
		} 
 
		else
		{
 
		@$video_path=$_FILES['video']['name'];
		
		move_uploaded_file($_FILES["video"]["tmp_name"],$target_file);
		}
		$post_text = $_POST['description'];
		if($post_text == "")
		{
			$post_text =  "No";
		}
		if(@$video_path == "")
		{
			$video_path = "No";
		}
		
			mysqli_query($a,"insert into post(`upload_id`,`video`, `image`, `post_text`, `post_time`)values('$u_id','$video_path','$save_primary_image','$post_text',SYSDATE())")or die(mysqli_error($a));
	 	
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
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>


<body>
	

	<div class="wrapper">
		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3 col-md-4 pd-left-none no-pd">
								<div class="main-left-sidebar no-margin">
									<div class="user-data full-width">
										<div class="user-profile">
											<div class="username-dt">
												<div class="usr-pic">
													<img height="100" width="100" src="uploads/<?php echo $row['image']; ?>" alt="">
												</div>
											</div><!--username-dt end-->
											<div class="user-specs">
												<h3 style="margin-top: 15px;"><?php echo $row['f_name']; ?></h3>
												<span><?php echo $row['email']; ?></span>
											</div>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li>
												<h4>Following</h4>
												<span>34</span>
											</li>
											<li>
												<h4>Followers</h4>
												<span>155</span>
											</li>
											<li>
												<a href="#" title="">View Profile</a>
											</li>
										</ul>
									</div><!--user-data end-->
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>Suggestions</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>Jessica William</h4>
													<span>Graphic Designer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>John Doe</h4>
													<span>PHP Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>Poonam</h4>
													<span>Wordpress Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>Bill Gates</h4>
													<span>C & C++ Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>Jessica William</h4>
													<span>Graphic Designer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>John Doe</h4>
													<span>PHP Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="view-more">
												<a href="#" title="">View More</a>
											</div>
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									<div class="tags-sec full-width">
										<ul>
											<li><a href="#" title="">Help Center</a></li>
											<li><a href="#" title="">About</a></li>
											<li><a href="#" title="">Privacy Policy</a></li>
											<li><a href="#" title="">Community Guidelines</a></li>
											<li><a href="#" title="">Cookies Policy</a></li>
											<li><a href="#" title="">Career</a></li>
											<li><a href="#" title="">Language</a></li>
											<li><a href="#" title="">Copyright Policy</a></li>
										</ul>
										<div class="cp-sec">
											<img src="images/logo2.png" alt="">
											<p><img src="images/cp.png" alt="">Copyright 2018</p>
										</div>
									</div><!--tags-sec end-->
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-6 col-md-8 no-pd">
								<div class="main-ws-sec">
									<div class="post-topbar">
										<div class="usy-dt">
											<img style="width: 60px;height: 60px;margin-bottom: 5px;" src="uploads/<?php echo $row['image']; ?>" alt="">
										</div>
										<div class="post-st">
											<ul>
												<li><a class="post-jb active" href="#" title="">Please share your post</a></li>
											</ul>
										</div><!--post-st end-->
									</div><!--post-topbar end-->
									<div class="posts-section">
									<?php
										$post = mysqli_query($a,"select * from post ORDER BY post_id DESC LIMIT 2")or die(mysqli_error($a));
									while($post_data = mysqli_fetch_array($post))
									{
											$id = $post_data['upload_id']; 
											$user=mysqli_query($a,"select * from register where reg_id = '$id'");
											$user_data = mysqli_fetch_array($user);
									 ?>
										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
													<img style="width: 60px;height: 60px;margin-bottom: 5px;" src="uploads/<?php echo $user_data['image']; ?>" alt="">
													<div class="usy-name" style="margin-top: 10px;">
														<h3><?php 
														echo $user_data['f_name'];
														?></h3>
														<span><img src="images/clock.png" alt=""><?php echo $post_data['post_time']; ?></span>
													</div>
												</div>
												<?php $postimage=$post_data['image'];
												if($postimage =="No")
												{
													
												}
												else{ ?>
												<img height="200px" width="400px"
												style="margin-bottom: 20px;" src="post_images/<?php echo $post_data['image']; ?>"/>
												<?php } ?>
												<div class="ed-opts">
													<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													<ul class="ed-options">
														<li><a href="#" title="">Edit Post</a></li>
														<li><a href="#" title="">Unsaved</a></li>
														<li><a href="#" title="">Unbid</a></li>
														<li><a href="#" title="">Close</a></li>
														<li><a href="#" title="">Hide</a></li>
													</ul>
												</div>
												<?php 
												$video=$post_data['video'];
												if($video =="No")
												{
													
												}
												else {	?>
												<video width="400" height="200" controls="" autoplay>
												<source src="post_video/<?php echo $post_data['video'];?>.mp4" type="video/mp4"></source>
												</video> 
												<?php 
												} ?>
											</div>
											<div class="job_descp">
												<?php $posttext=$post_data['post_text']; 
												if($posttext == "No")
												{ 
												}
												else
												{
													?>
													<p><?php echo $post_data['post_text'];?> </p>
											<?php } ?>
											</div>
											<div class="job-status-bar">
												<ul class="like-com">
													<li>
														<input type="hidden" class="ju"  value="<?php echo $post_data['post_id']; ?>"/>
														<button  class="cc" title="<?php  $p_id=$post_data['post_id']; ?>" style="margin-top: 5px; cursor: pointer;border: none;color: #e14f1e;font-size:20px;"><i class="la la-heart"></i>like</button>
														<img src="images/liked-img.png" alt="">
														
														<?php
														$sql =mysqli_query($a,"SELECT * FROM `like` where `post_id` = '$p_id'");
														$like = mysqli_fetch_array($sql);
														 ?>
														<span><?php
														 $like['likes'];
														 $li=0;
														if($like == "")
														{
															echo $li;
														}
														else
														{
															$li = $like['likes'];
															echo $li; 
														} ?>	
														</span>
													</li> 
													<li>
													<a href="#" title="" class="com"><img src="images/com.png" alt="">Comment 15</a></li>
													<div >
														<!--<input type="text" placeholder="type your comment..." style="border-color: #65c986;border-radius:5px;"  name="comment" class="comment" required=""/>-->
														<div class="comment_box">
															<input type="text" placeholder="Post a comment"name="comment" class="comment" required="">
															<input type="hidden" name="po_id" class="po_id" value="<?php echo $p_id;?>"/>
															<button type="submit" class="b" name="comment_sub" style="border: 12px;color: white;background-color: #e14f1e; cursor: pointer;  height: 30px;width: 75px;padding-top: 5px;padding-bottom: 5px;margin-top: 5px;padding-left: 5px;padding-right: 10px;" />Comment</button>
														
													</div>
														
														
													</div>
													<?php 
													$allcomment = mysqli_query($a,"SELECT * FROM `comment` WHERE `post_id` = '$p_id' ORDER BY comment_id DESC LIMIT 2");
													while($row = mysqli_fetch_array($allcomment)){
														$commenter=$row['user_id'];
													$fullname=mysqli_query($a,"SELECT `f_name`,`image` FROM `register` WHERE `reg_id`='$commenter'");
													$full_name=mysqli_fetch_array($fullname); ?>
												<div class="suggestion-usd">
												<img src="uploads/<?php echo $full_name['image'];?>" height="50" width="50" alt="">
												<div class="sgt-text">
													<h4><?php 
													echo $full_name['f_name'];
													 ?></h4>
													<span><?php echo $row['comment']; ?></span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>	
											<?php } ?>
												</ul>
											</div>
										</div>
										<?php  } ?>
										
										
									</div><!--posts-section end-->
								</div><!--main-ws-sec end-->
							</div>
							<div class="col-lg-3 pd-right-none no-pd" style="position: fixed-bottum">
								<div class="right-sidebar">
									<div class="widget widget-about">
										<img src="images/wd-logo.png" alt="">
										<h3>Track Time on Workwise</h3>
										<span>Pay only for the Hours worked</span>
										<div class="sign_link">
											<h3><a href="#" title="">Sign up</a></h3>
											<a href="#" title="">Learn More</a>
										</div>
									</div><!--widget-about end-->
									<div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Top Jobs</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="jobs-list">
											<div class="job-info">
												<div class="job-details">
													<h3>Senior Product Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Senior UI / UX Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Junior Seo Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Senior PHP Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Senior Developer Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
										</div><!--jobs-list end-->
									</div><!--widget-jobs end-->
									<div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Most Viewed This Week</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="jobs-list">
											<div class="job-info">
												<div class="job-details">
													<h3>Senior Product Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Senior UI / UX Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Junior Seo Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
										</div><!--jobs-list end-->
									</div><!--widget-jobs end-->
									<div class="widget suggestions full-width">
										<div class="sd-title">
											<h3>Most Viewed People</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>Jessica William</h4>
													<span>Graphic Designer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>John Doe</h4>
													<span>PHP Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>Poonam</h4>
													<span>Wordpress Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>Bill Gates</h4>
													<span>C &amp; C++ Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>Jessica William</h4>
													<span>Graphic Designer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="suggestion-usd">
												<img src="http://via.placeholder.com/35x35" alt="">
												<div class="sgt-text">
													<h4>John Doe</h4>
													<span>PHP Developer</span>
												</div>
												<span><i class="la la-plus"></i></span>
											</div>
											<div class="view-more">
												<a href="#" title="">View More</a>
											</div>
										</div><!--suggestions-list end-->
									</div>
								</div><!--right-sidebar end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>

		<div class="post-popup job_post">
			<div class="post-project">
				<h3>Please share your post</h3>
				<div class="post-project-fields">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="row">
						<small style="margin-bottom: 10px;margin-left: 25px;">Please chose image</small>
							<div class="col-lg-12">
								<input type="file" name="image" placeholder="">
							</div>
						<small style="margin-bottom: 10px;margin-left: 25px;">Please chose video</small>
							<div class="col-lg-12">
								<input type="file" name="video" placeholder="">
							</div>
							
							<div class="col-lg-12">
								<textarea name="description" placeholder="Description" required=""></textarea>
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" name="submit">Post</button></li>
									<!--<li><a href="#" title="">Cancel</a></li>-->
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
	</div><!--theme-layout end-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(".b").click(function () 
{
	var comment=$(this).prevAll(".comment").val();
	var po_id=$(this).prevAll(".po_id").val();
	if(comment == "")
	{
		alert("Sorry ! Something went wrong.Please try again.");
		return;
	}
	else
	{
	    var URL = 'add_comment.php' 
	   //Start AJax Call
	    $.ajax({
	        type: "POST",
	        url : URL ,
			data: {comment:comment,po_id:po_id},  
	        dataType : "html",
	        success : function(response)
			{  
	             //alert("Data Sended Successfully...");
				 location.reload();
				 //$('#responsecontainer').show();
	        },
	        error: function()
			{
	            alert("An Error occured Please try again");
	        } 
	    });
	}
});



$(".cc").click(function () 
{
	var lik_button=$(this).prevAll(".ju").val();
	//var like_id = $(this).prevAll(".like_button").val();
	//alert(lik_button);
	    var URL = 'like.php' 
	   //Start AJax Call
	    $.ajax({
	        type: "POST",
	        url : URL ,
			data: {lik_button:lik_button},  
	        dataType : "html",
	        success : function(response)
			{  
	             //alert("Data Sended Successfully...");
				 location.reload();
				 //$('#responsecontainer').show();
	        },
	        error: function()
			{
	            alert("An Error occured Please try again");
	        } 
	    });
});


</script>

</body>
</html>
<?php
include("footer.php");
?>