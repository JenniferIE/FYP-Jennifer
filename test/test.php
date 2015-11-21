<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Hello</title>
<link href="hello.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
// Initialize variables to null.
$nameError ="";
$emailError ="";
$genderError ="";
$websiteError ="";
// On submitting form below function will execute.
if(isset($_POST['submit'])){
if (empty($_POST["name"])) {
$nameError = "Name is required";
} else {
$name = test_input($_POST["name"]);
// check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
$nameError = "Only letters and white space allowed";
}
}
if (empty($_POST["email"])) {
$emailError = "Email is required";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address syntax is valid or not
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
$emailError = "Invalid email format";
}
}
if (empty($_POST["website"])) {
$website = "";
} else {
$website = test_input($_POST["website"]);
// check address syntax is valid or not(this regular expression also allows dashes in the URL)
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
$websiteError = "Invalid URL";
}
}
if (empty($_POST["comment"])) {
$comment = "";
} else {
$comment = test_input($_POST["comment"]);
}
if (empty($_POST["gender"])) {
$genderError = "Gender is required";
} else {
$gender = test_input($_POST["gender"]);
}
}
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
//php code ends here
?>
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
//select info. from testDB
$sql = "select * from testDB";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["name"];
    }
} 
else {
    echo "Null, please check your connection to the database";
}
mysqli_close($conn);

?>
</body>
</html>
