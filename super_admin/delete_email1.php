<?php
session_start();
ob_start();
include_once('../config.php');
 $a_id=$_GET['id'];

 $sql = "DELETE FROM `post_email` where  id='$a_id'";
mysql_query($sql);

?> 