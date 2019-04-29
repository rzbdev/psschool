<?php
error_reporting(0);
//$link = mysql_connect('localhost', 'root', '');
$link = mysql_connect('db623642810.db.1and1.com', 'dbo623642810', 'k*hSn73d@d00');
//$link = mysql_connect("localhost","root","","psschool1");;
$db_selected = mysql_select_db('db623642810', $link);
//$db_selected = mysql_select_db('psschool1', $link);

if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}



?>
