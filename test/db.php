<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>db</title>

</head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "testDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
} 
// create table in existing database
$sql = "create table testDB (
name varchar(20) not null)";
if (mysqli_query($conn, $sql)) {
	echo "table--testDB created successfully";
} else {
    echo "Error creating database: ".mysqli_error($conn);
}
//insert a info. into the table
$sql = "insert into testDB(name) values('Hello World')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: ".$sql."<br>".mysqli_error($conn);
}


mysqli_close($conn);
?>

</body>
</html>
