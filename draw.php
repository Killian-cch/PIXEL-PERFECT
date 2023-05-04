<?php
if (isset($_POST["submit"])) {
	$db="{data_base_name}";
	$dbhost="{host}";
	$dbport={port};
	$dbuser="{user}";
	$dbpasswd="{password}";
	
	$pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
	$pdo->exec("SET CHARACTER SET utf8");

	$sql = 'TRUNCATE TABLE drawing;';
	$exec = [];
	for ($i = 0; $i < 1296; $i++) {
		$sql .= "INSERT INTO drawing(id, couleur) VALUES (0, ?);";
		array_push($exec, $_POST['couleur'.$i]);
	}

	$stmt=$pdo->prepare($sql);
	$stmt->execute($exec);
}
?>

<!DOCTYPE html>
<html lang="fr">
  	<head>
      	<meta charset="UTF-8">
      	<title>Pixel Perfect - Dessiner</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="./assets/css/app.css" rel="stylesheet">
        <link rel="icon" href="./assets/img/favicon.png">
	</head>

  	<body>
	  	<img src="./assets/img/title.svg" alt="PIXEL PERFECT">
		<div class="wrapper">
			<form method="post" action="./draw.php">
				<?php
				for ($i = 0; $i < 1296; $i++) {
					echo '<div id="cell'.$i.'" class="cell" onmouseenter="colorier_onmousedown(this)" onmousedown="colorier_onclick(this)" style="background-color: #ffffff;" data-place="'.$i.'"></div>';
					echo '<input id="couleur'.$i.'" type="hidden" name="couleur'.$i.'" value="#ffffff">';
				}
				?>
				<input class="btn" type="submit" name="submit" value="Envoyer votre Chef d'Œuvre">
			</form>
		</div>
		
		<div class="colorpicker">
			<input id="inputcolor" type="color" value="#ffd700"/>
			<div id="color">#ffd700</div>
		</div>
		

		<script src="./assets/js/script.js"></script>
	</body>
</html>


<?php
$pdo = null;
?>