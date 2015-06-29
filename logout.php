<?

setcookie("username", "", time()-3600);
setcookie("password", "", time()-3600);

// One Line of Code to authenticate users
//include_once("index.php");
echo "string";
print "<script type='text/javascript'>window.location='index.php?msg=logged out';</script>";

?>