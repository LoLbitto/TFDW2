<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar relato</title>
    <link rel = "stylesheet" href = "../../models/header.css" >
	<link rel = "stylesheet" href = "style.css">
</head>
<body>

<?php
	include "../../models/header.php";
?>

<?php
    if (isset($_POST['titulo'])) {
        $conn = new mysqli("localhost", "root", "", "bdDesvWeb");

        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];


        $numeracao = 0;
        $query = $conn->query("select id from tbRelatos order by id desc limit 1");
	$tabela = $query->fetch_assoc();

        if (!isset($tabela["id"])) {
            $numeracao = 1;
        } else {
            $numeracao = $tabela["id"] + 1;
        }

        $nomeImagem = "imagem" . $numeracao . ".jpg";

        move_uploaded_file($_FILES['imagem']['tmp_name'], "C:/xampp/htdocs/TFDW2/relatos/fotosRelatos/" . $nomeImagem);

        $sql = "insert into tbRelatos(titulo, descricao, localimagem) values ('$titulo', '$descricao', 'fotosRelatos/$nomeImagem')";

        $conn -> query($sql);
    }
?>

    <div class = "formulario">
        <form method = "POST" enctype="multipart/form-data">
            <label>Título </label>
            <input type = "text" name = "titulo" required>
            <br>
            <br>
            <label>Descrição </label>
            <textarea maxlength = "200" rows = "5" cols = "35" name = "descricao" required> </textarea>
            <br>
            <br>
            <input type = "file" name = "imagem" id = "imagem" required>
            <br>
            <br>
            <input type = "submit">
        </form>
    </div>
</body>
</html>
