<?php

$db ['servername'] = "192.168.10.10";
$db ['username'] = "homestead";
$db ['password'] = "secret";
$db ['dbname'] = "cms";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

// Create connection
$conn = mysqli_connect(SERVERNAME, USERNAME,PASSWORD, "cms");
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>

