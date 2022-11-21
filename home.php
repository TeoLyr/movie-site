<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Βιβλιοθήκη Ταινιών</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container">
		<header>
					<a href="home.php"><img class="banner" src="photos/imdb-banner3.jpg"></a>
			</header>
			<nav><br><form method="post" action="">
				<ul>
					<li><button class="buttons" type="submit" name="movies" value="Ταινίες">Ταινίες</button></li>
					<li><button class="buttons" type="submit" name="actors" value="Ηθοποιοί">Ηθοποιοί</button></li>
					<li><button class="buttons" type="submit" name="directors" value="Σκηνοθέτες">Σκηνοθέτες</button></li>
				</ul>
			</form></nav><br><br>
			<main>
			<?php
				if(isset($_POST["movies"])){

					include "config.php";

					echo "<div class='kartela'><p><h2> Ταινίες</h2></p></div>";
					echo "<div class='movies'>Ταινίες ανά κατηγορία:";
					echo "<form method='post' action=''>";
					echo "<label><select name='genre'>";
					echo "<option value='Κωμωδία'>Κωμωδία</option>";
					echo "<option value='Περιπέτεια'>Περιπέτεια</option>";
					echo "<option value='Θρίλερ'>Θρίλερ</option>";
					echo "<option value='Δράμα'>Δράμα</option></select></label>";
					echo "<input type='submit' name='submit2' value='Επιλογή'></form></div>";
					echo "<div class='movies'><p><a href='movie.php'>Πρόσθεσε μια ταινία.</a></p></div>";

					$sql="SELECT * FROM movie ORDER BY mtitle";
					
					$result=mysqli_query($conn,$sql);

					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
							echo "<div class='img_wrap'>";
							echo "<img class='info' src='photos/movies/".$row["mimg"]."'><br>";
							echo "<div class='overlay'><div class='text'><h3>".$row["mtitle"]."</h3>";
							echo "Είδος: ".$row["mgenre"]."<br>";
							echo "Διάρκεια: ".$row["mduration"]."'<br>";
							echo "Κυκλοφορία: ".$row["mrelease"]."<br>";
							echo "Βαθμολογία: ".$row["mrating"]."</div></div>";
							echo "</div>";
						}
					}
					else 
						echo "Δεν βρέθηκαν αποτελέσματα.";
				}

				if(isset($_POST["submit2"])){
					include "config.php";

					$genre=$_POST["genre"];
					$sql1="SELECT * FROM movie WHERE mgenre='$genre'";
					$result1=mysqli_query($conn,$sql1);

					echo "<div class='kartela'><p><h2>Ταινίες: ".$genre."</h2></p></div>";
					echo "<div class='movies'>Ταινίες ανά κατηγορία:";
					echo "<form method='post' action=''>";
					echo "<label><select name='genre'>";
					echo "<option value='Κωμωδία'>Κωμωδία</option>";
					echo "<option value='Περιπέτεια'>Περιπέτεια</option>";
					echo "<option value='Θρίλερ'>Θρίλερ</option>";
					echo "<option value='Δράμα'>Δράμα</option></select></label>";
					echo "<input type='submit' name='submit2' value='Επιλογή'></form></div>";
					echo "<div class='movies'><p><a href='movie.php'>Πρόσθεσε μια ταινία.</a></p></div>";

					if(mysqli_num_rows($result1)>0){
						while($row1=mysqli_fetch_assoc($result1)){
							echo "<div class='img_wrap'>";
							echo "<img class='info' src='photos/movies/".$row1["mimg"]."'><br>";
							echo "<div class='overlay'><div class='text'><h3>".$row1["mtitle"]."</h3>";
							echo "Διάρκεια: ".$row1["mduration"]."'<br>";
							echo "Kυκλοφορία: ".$row1["mrelease"]."<br>";
							echo "Βαθμολογία: ".$row1["mrating"]."<br>";
							$sql_actors="SELECT aname,asurname FROM actor WHERE amovie IN (SELECT mtitle FROM movie WHERE mtitle='".$row1['mtitle']."') OR amovie2 IN (SELECT mtitle FROM movie WHERE mtitle='".$row1['mtitle']."') OR amovie3 IN (SELECT mtitle FROM movie WHERE mtitle='".$row1['mtitle']."')";
							$res_actors=mysqli_query($conn,$sql_actors);
							if(mysqli_num_rows($res_actors)>0){
								echo "<br><h4>Ηθοποιοί:</h4>";
								while($row2=mysqli_fetch_assoc($res_actors)){
									echo $row2["aname"]." ".$row2["asurname"]."<br>";
								}
							}
							echo "</div></div></div>";
						}
					}
					else 
						echo "Δεν βρέθηκαν αποτελέσματα.";


				}
				if(isset($_POST["actors"])){
					
					include "config.php";
					echo "<div class='kartela'><h2>Ηθοποιοί</h2></div>";
					echo "<div class='humans'><p><a href='actor.php'>Πρόσθεσε έναν ηθοποιό.</a></p></div>";				
					$sql="SELECT * FROM actor ORDER BY asurname";
					
					$result=mysqli_query($conn,$sql);

					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
								echo "<div class='img_wrap'>";
								echo "<h3>".$row["aname"]." ".$row["asurname"]."</h3>";									
								echo "<img class='info2' src='photos/actors/".$row["aimg"]."'>";
								echo "<div class='overlay2'><div class='text'>Ημερομηνία Γεννησης:<br>".$row["abirthday"];
								echo "<br><br><h4>Ταινίες</h4>-".$row["amovie"]."<br>";
								if ($row["amovie2"]!=NULL){
									echo "-".$row["amovie2"]."<br>";								
								}
								if ($row["amovie3"]!=NULL){
									echo "-".$row["amovie3"];								
								}
								echo "</div></div></div>";
						}
					}
					else 
						echo "Δεν βρέθηκαν αποτελέσματα.";					
				}
				if(isset($_POST["directors"])){
					
					include "config.php";

					echo "<div class='kartela'><p><h2>Σκηνοθέτες</h2></p></div>";
					echo "<div class='humans'><p><a href='director.php'>Πρόσθεσε έναν σκηνοθέτη.</a></p></div>";					
					$sql="SELECT * FROM director ORDER BY dsurname";
					
					$result=mysqli_query($conn,$sql);

					if(mysqli_num_rows($result)>0){
						while($row=mysqli_fetch_assoc($result)){
							echo "<div class='img_wrap'>";
							echo "<h3>".$row["dname"]." ".$row["dsurname"]."</h3>";
							echo "<img class='info2' src='photos/directors/".$row["dimg"]."'>";
							echo "<div class='overlay2'><div class='text'>Ημερομηνία Γεννησης:<br>".$row["dbirthday"];
							echo "<br><br><h4>Ταινίες</h4>-".$row["dmovie"]."<br>";
							if ($row["dmovie2"]!=NULL){
								echo "-".$row["dmovie2"]."<br>";								
							}
							if ($row["dmovie3"]!=NULL){
								echo "-".$row["dmovie3"];								
							}
							echo "</div></div></div>";
						}
					}
					else 
						echo "Δεν βρέθηκαν αποτελέσματα.";					
				}

			?>
			</main>
			<footer>
			</footer>
		</div>
		
	</body>
</html>