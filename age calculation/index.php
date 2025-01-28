<?php 
// Load environment variables from .env.ini
$env = parse_ini_file(__DIR__ . '/.env.ini');

// Get credentials from the environment file
$serverName = $env['DB_SERVER'];
$userName = $env['DB_USER'];
$password = $env['DB_PASSWORD'];
$dbName = $env['DB_NAME'];

// Create connection
$con = mysqli_connect($serverName, $userName, $password, $dbName);

if (mysqli_connect_errno()) {
    echo "Connection failed: " . mysqli_connect_error();
    exit();
}
echo "Connected Successfully!";
?>
