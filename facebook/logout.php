<?php
SESSION_START();
//$u_id = $_SESSION['user_id'];
unset($_SESSION['user_id']);
//$_SESSION['user_name']
unset($_SESSION['user_name']);
session_destroy();

echo "<script>window.location.href='index.php'</script>";

?>