
<?Php


///////// Database Details change here  ////
$dbhost_name = "db623642810.db.1and1.com";
$database = "db623642810";
$username = "dbo623642810";
$password = "k*hSn73d@d00";

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=db623642810.db.1and1.com;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?> 
