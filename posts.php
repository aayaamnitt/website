<?php
include 'authenticate.php';
include_once "database.php";


$heading = $_POST['heading'];
$text = $_POST['text'];


// To protect from MySQL injection
$heading= addslashes($heading);
$text = addslashes($text);
$heading = mysql_real_escape_string($heading);
$text= mysql_real_escape_string($text);

$table	="userslogin";
$tablepost='posts';
// Encrypt password for protection

 if(isset($_COOKIE['username'])&&isset($_COOKIE['password'])){
                     if(authenticate($_COOKIE['username'],$_COOKIE['password']))
	                {  
	                	$username=$_COOKIE['username'];	

						$sql="SELECT name FROM $table WHERE username='$username'";
						echo($sql);
						$result=mysql_query($sql);

						// Mysql_num_row is counting table row

						$count=mysql_num_rows($result);

						// If result matched $username 
						if($count==1){
								echo $result;
								$name=$result;
								$sql="INSERT INTO $tablepost (`name`, `username`, `posthead`, `posttext`) VALUES
									('$name', '$username', '$heading', '$text')";
								$result=mysql_query($sql);

								echo $result;
								echo $sql;
								if($result){
									print "<script type='text/javascript'>window.location='index.php?msg=Posted successfully ;</script>";
								}
						}
					}
				}



						
	
	// Re-direct to backend
		//	print "<script type='text/javascript'>window.location='index.php';</script>";





?>