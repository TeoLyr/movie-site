<html>
<head>
<meta charset="utf-8">
<title>config</title>

</head>
<body>

<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="lyritsis";
$charset="utf8bm4";

//Create connection
$conn=new mysqli($hostname,$username,$password,$dbname);

$conn -> set_charset("utf8");

/*Check connection

if ($conn -> connect_error) {
	die("connection failed" .$conn -> connect_error);
}
else {
	echo ("connection successfull");
}*/
?>

</body>
</html>