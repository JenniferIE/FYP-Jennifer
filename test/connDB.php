<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>database</title>
<link href="hello.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
} 
//create new database
$sql = "create database testDB";//DB: database
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: ".mysqli_error($conn);
}
mysqli_close($conn);
?>

</body>
</html>
