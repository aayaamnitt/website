<?php
////////// Database Connection ///////////

// MySQL information MODIFY IT HERE.
 $db_name = "aayaam";  // Database Name
 $host = "localhost"; // Database host (probably won't change)
 $db_user = "root2"; // Database username
 $db_password = "root2"; // Database password
 $dbconnect = mysql_connect("$host", "$db_user", "$db_password");  
  
// Database Connection DON'T MODIFY
  if (!$dbconnect) { 
   	echo( "<p>Unable to connect to the database server at this time.</p>");    
    exit();  
  } 
 
  if (! mysql_select_db("$db_name") ) {    
  	echo( "<p>Unable to locate the database at this time.</p>");    
    exit();  
  }
?>