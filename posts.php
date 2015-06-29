<?php
include 'authenticate.php';
include_once "database.php";


$heading = $_POST['heading'];
$text = $_POST['text'];
//$image=$_POST['image'];


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
						$tempname=date('Y-m-d');
						$tempname="img_".$tempname."_".time();
					
						// If result matched $username 
						if($count==1){
							echo $tempname;


								if ((($_FILES["file"]["type"] == "image/gif")
								|| ($_FILES["file"]["type"] == "image/jpeg")
								|| ($_FILES["file"]["type"] == "image/png")
								|| ($_FILES["file"]["type"] == "image/pjpeg"))
								&& ($_FILES["file"]["size"] < 5000000))//5mb
  								{
  									if ($_FILES["file"]["error"] > 0)
  									  echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
   								 
  							else
								    {
								    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
								    echo "Type: " . $_FILES["file"]["type"] . "<br />";
								    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
								    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

								    while (file_exists("upload/" . $tempname))
								      {
								      $tempname=$tempname."1";
								      }
								    

								      move_uploaded_file($_FILES["file"]["tmp_name"],
								      "upload/" . $tempname);
								      $tempname="upload/".$tempname;

								      echo "Stored in: " .$tempname;
								      
								    }
								  }
								else
								  {$tempname=null;
								  echo "Invalid file";
								  }



								//echo $result;
								$row = mysql_fetch_array($result);
								$name=$row['name'];
								$sql="INSERT INTO $tablepost (`name`, `username`, `posthead`, `posttext`,`imageurl`) VALUES
									('$name', '$username', '$heading', '$text','$tempname')";
								$result=mysql_query($sql);

								//echo $result;
								//echo $sql;
								
										print "<script type='text/javascript'>window.location='index.php?msg=Posted successfully';</script>";
													

								
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