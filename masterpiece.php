<?php
$db="{data_base_name}";
$dbhost="{host}";
$dbport={port};
$dbuser="{user}";
$dbpasswd="{password}";

$pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
$pdo->exec("SET CHARACTER SET utf8");

$sql = "SELECT * FROM {your_table}";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$pixels = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
  	<head>
      	<meta charset="UTF-8">
      	<title>Pixel Perfect - Chef d'Œuvre</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="./assets/css/app.css" rel="stylesheet">
        <link rel="icon" href="./assets/img/favicon.png">
	</head>

  	<body id="result">
        <?php
        foreach($pixels as $pixel) {
            echo '<div class="cell" style="background-color: '. $pixel["couleur"] .';"></div>';
        }
        ?>
        <script>
            if (document.getElementsByClassName("cell").length < 1296) {
                location.reload(); 
            }
            window.onload = function() {
            setInterval(function() {
                location.reload();
            }, 30000); 
            };
        </script> 
	</body>
</html>


<?php
$pdo = null;
?>
