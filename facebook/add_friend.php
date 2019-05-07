<?php
	session_start();
	include("config.php");
	$u_id = $_SESSION['user_id'];
	$reciever_id = $_GET['rec_id'];
	mysqli_query($a,"insert into friend_request(`sender_id`,`receiver_id`,`status`)values('$u_id','$reciever_id','0')")or die(mysqli_error($a));
	echo "<script>alert('Your friend request has been sent successfully');
		window.location.href='find_friends.php'
		</script>";
?>