<?php
include 'authenticate.php';
include_once "database.php";



$text = $_POST['comment'];
//$image=$_POST['image'];


// To protect from MySQL injection

$text = addslashes($text);

$text= mysql_real_escape_string($text);

$table	="userslogin";
$tablecomments='comments';
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
						$tempname=date('Y-m-d');
						$tempname="img_".$tempname."_".time();
					
						// If result matched $username 
						if($count==1){
							



								//echo $result;
								$postid=$_GET['postid'];

								$row = mysql_fetch_array($result);
								$name=$row['name'];
								$sql="INSERT INTO $tablecomments (`name`, `username`, `postid`, `commenttext`) VALUES
									('$name', '$username', '$postid','$text')";
								$result=mysql_query($sql);

								//echo $result;
								//echo $sql;
								
										print "<script type='text/javascript'>window.location='blog.php?postid=".$postid."'</script>";
													

								
						}
					}
				
}


						
	
	// Re-direct to backend
		//	print "<script type='text/javascript'>window.location='index.php';</script>";


function getextension(){
	if($_FILES["file"]["type"] == "image/png")
	return "png";
	else
		if($_FILES["file"]["type"] == "image/gif")
	return "gif";

else return "jpg";
}


?>