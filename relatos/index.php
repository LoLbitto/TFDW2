<!DOCTYPE html>
<html lang="en">
<head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" href = "../models/header.css" >
	<link rel = "stylesheet" href = "style.css">
	<title>Relatos</title>
</head>
<body>
<?php
	include "../models/header.php";
?>
	<a href = "novo"><button class = "enviar"> + </button></a>
	
	<div class = "relatos">
		<?php
			$conn = new mysqli("localhost", "root", "", "bdDesvWeb");

			$result = $conn -> query("select * from tbRelatos");

			$linhas = $result->fetch_all();

			foreach ($linhas as $linha) {
				?>
				<div class = "relato">
					<img src = " <?php echo $linha[3]; ?> " class = "imagemRelato">
					<h1><?php echo $linha[1]; ?></h1>
					<p><?php echo $linha[2]; ?></p>
				</div>
				<?php
			}
		?>
	</div>
</body>
</html>

