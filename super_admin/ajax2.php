<?php 
include('../config.php');
extract($_POST);
$user_id=$id;
$status=$status;
$sql=mysql_query("UPDATE post_email SET status='$status' WHERE id='$id'");
echo 1;
?>
