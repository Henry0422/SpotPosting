<?php
include_once("php_includes/check_login_status.php");
// Initialize any variables that the page might echo
$u = "";
$sex = "";
$userlevel = "";
$joindate = "";
$lastsession = "";
// Make sure the _GET username is set, and sanitize it
if(isset($_GET["u"])){
	$u = preg_replace('#[^a-z0-9]#i', '', $_GET['u']);
} 
else {
    header("location: http://www.skchn.ca/index.html");
    exit();	
}
// Select the member from the users table
$sql = "SELECT * FROM users WHERE username='$u' AND activated='1' LIMIT 1";
$user_query = mysqli_query($db_connect, $sql);
// Now make sure that user exists in the table
$numrows = mysqli_num_rows($user_query);
if($numrows < 1){
	echo "That user does not exist or is not yet activated, press back";
    exit();	
}
// Check to see if the viewer is the account owner
//$isOwner = "no";
//if($u == $log_username && $user_ok == true){
//	$isOwner = "yes";
//}
//else{
//    echo "Your are not the account owner";
//    exit();	
//}
while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
    echo $row["id"];
}
// Fetch the user row from the query above
//while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
//	$profile_id = $row["id"];
//	$gender = $row["gender"];
//	$userlevel = $row["userlevel"];
//	$signup = $row["signup"];
//	$lastlogin = $row["lastlogin"];
//	$joindate = strftime("%b %d, %Y", strtotime($signup));
//	$lastsession = strftime("%b %d, %Y", strtotime($lastlogin));
//	if($gender == "f"){
//		$sex = "Female";
//	}
//}
?>