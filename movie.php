<!Doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Καταχώρηση Ταινίας</title>
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="categories">
			<header>
					<a href="home.php"><img class="banner" src="photos/imdb-banner3.jpg"></a>
			</header>
<form method="post" action="">

<br><b>Τίτλος Ταινίας:</b><br>
<label><input type="text" name="title"></label><br>
<b>Κατηγορία:</b><br>
<label><select name="genre">
		<option value="Κωμωδία">Κωμωδία</option>
		<option value="Περιπέτεια">Περιπέτεια</option>
		<option value="Θρίλερ">Θρίλερ</option>
		<option value="Δράμα">Δράμα</option></select></label><br>
<b>Διάρκεια (σε λεπτά):</b><br>
<label><input type="number" name="duration"></label><br>
<b>Εικόνα:</b><br>
<label><input type="file" name="image" accept="image/png, image/jpeg"></label><br>
<b>Ημερομηνία Κυκλοφορίας:</b><br>
<label><input type="date" name="release"></label><br>
<b>Βαθμολογία:</b><br>
<label><select name="rating">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option></select></label><br>
<br><input type="Submit" name="submit" value="Καταχώρηση"><br><br>
	</form>

<?php 

if(isset($_POST["submit"])){
	
    include "config.php";

$title=$_POST["title"];
$genre=$_POST["genre"];
$duration=$_POST["duration"];
$image=$_POST["image"];
$release=$_POST["release"];
$rating=$_POST["rating"];

$sql1="INSERT INTO 
movie(mtitle,mgenre,mduration,mimg,mrelease,mrating)
VALUES  ('$title','$genre','$duration','$image','$release','$rating')";

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