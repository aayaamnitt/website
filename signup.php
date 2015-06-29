<?
// Process the login information
include_once "database.php";

$password = $_POST['password'];
$username = $_POST['username'];
$name	  =$_POST['name'];

// To protect from MySQL injection
$username = addslashes($username);
$password = addslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$table	="userlogin";
// Encrypt password for protection
$password = md5($password);

$sql="INSERT INTO `aayaam`.`userslogin` (`id`, `name`, `username`, `password`, `emailverified`, `verified`) VALUES (NULL, '$name', '$username', '$password', '0', '0');";
$result=mysql_query($sql);
echo $result;
// Mysql_num_row is counting table row
//$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

	
	// Re-direct to backend
	print "<script type='text/javascript'>window.location='index.php?msg=Registered successfully';</script>";

?>