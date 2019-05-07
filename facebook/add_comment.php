<?php
	session_start();
	include("config.php");
	$u_id = $_SESSION['user_id'];
	 $comment = $_POST['comment'];
	$po_id = $_POST['po_id'];
	mysqli_query($a,"INSERT INTO `comment`(`post_id`, `user_id`, `comment`, `time`) VALUES('$po_id','$u_id','$comment',SYSDATE())")or die(mysqli_error($a));
?>