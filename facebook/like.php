<?php
	session_start();
	$u_id = $_SESSION['user_id'];
	include("config.php");
	$i=1;
	 $post_id = $_POST['lik_button'];
	$nolike = mysqli_query($a,"SELECT * FROM `like` where post_id ='$post_id'")or die(mysqli_error($a));
			$current_like = mysqli_fetch_array($nolike);
	  $row = mysqli_num_rows($nolike);
	if($row == 0)
	{	
		$first = 1;
		mysqli_query($a,"INSERT INTO `like` (`post_id`,`likes`)values('$post_id','$first')")or die(mysqli_error($a));
		header("location:home.php");
	}
	else
	{
		  $all_like=$current_like['likes'];
		 	$like = $all_like+1;
		mysqli_query($a,"UPDATE `like` SET `likes`='$like' where  `post_id` ='$post_id'")or die(mysqli_error($a));
		header("location:home.php");	
	}
	?>