<?
// Process the login information
include_once "database.php";

$password = $_POST['password'];
$username = $_POST['username'];


// To protect from MySQL injection
$username = addslashes($username);
$password = addslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$table	="userslogin";
// Encrypt password for protection
$password = md5($password);

$sql="SELECT * FROM $table WHERE username='$username' and password='$password'";
echo($sql);
$result=mysql_query($sql);

// Mysql_num_row is counting table row

$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
	// Set cookies. I set my cookies to last 24 hours
	$expires = 1 * 1000 * 60 * 60 * 24;
	$row = mysql_fetch_array($result);
	setcookie("username", $username, time()+$expires);
	setcookie("name",$row['name'],time()+$expires);
	setcookie("password", $password, time()+$expires);
	
	// Re-direct to backend
			print "<script type='text/javascript'>window.location='index.php?msg=logged in';</script>";
} else {

	// Error Login so Re-direct to "index.php"
			print "<script type='text/javascript'>window.location='index.php?msg=wrong credentials';</script>";

}
?>