<!Doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Καταχώρηση Ηθοποιού</title>
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="categories">
			<header>
					<a href="home.php"><img class="banner" src="photos/imdb-banner3.jpg"></a>
			</header>
<form method="post" action="">

<br><b>Όνομα:</b><br>
<label><input type="text" name="name"></label><br>
<b>Επίθετο:</b><br>
<label><input type="text" name="sur"></label><br>
<b>Ημερομηνία Γέννησης:</b><br>
<label><input type="date" name="bday"></label><br>
<b>Εικόνα:</b><br>
<label><input type="file" name="image" accept="image/png, image/jpeg"></label><br>
<b>Ταινία:</b><br>
<label><input type="text" name="movie"></label><br>
<b>Ταινία 2:</b><br>
<label><input type="text" name="movie2"></label><br>
<b>Ταινία 3:</b><br>
<label><input type="text" name="movie3"></label><br>
<br><input type="Submit" name="submit" value="Καταχώρηση"><br><br>
	</form>

<?php 

if(isset($_POST["submit"])){
	
    include "config.php";

$name=$_POST["name"];
$surname=$_POST["sur"];
$bday=$_POST["bday"];
$image=$_POST["image"];
$movie=$_POST["movie"];
$movie2=$_POST["movie2"];
$movie3=$_POST["movie3"];

$sql1="INSERT INTO 
actor(aname,asurname,abirthday,aimg,amovie,amovie2,amovie3)
VALUES  ('$name','$surname','$bday','$image','$movie','$movie2','$movie3')";

$result1=$conn -> query($sql1);

if ($result1===TRUE){
	echo "<p class='success'>Επιτυχής Καταχώρηση!</p><br>";
}
else{
	echo "<p class='fail'>Αποτυχία Καταχώρησης.</p>" .$conn -> error."<br>";
}


$conn -> close();

}
?>
</div>
</body>
</html>