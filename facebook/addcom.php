<?php
	<?php
	session_start();
	include("config.php");
	$u_id = $_SESSION['1'];
	 $comment = $_POST['com'];
	$po_id = $_POST['3'];
	mysqli_query($a,"INSERT INTO `comment`(`post_id`, `user_id`, `comment`, `time`) VALUES('$po_id','$u_id','$comment',SYSDATE())")or die(mysqli_error($a));
?>
?>