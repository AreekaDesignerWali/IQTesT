<?php
$host = 'localhost';
$dbname = 'dbtkugxxaunfmx';
$username = 'uc7ggok7oyoza';
$password = 'gqypavorhbbc';

try {
    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    die("Connection error: " . $e->getMessage());
}
?>
