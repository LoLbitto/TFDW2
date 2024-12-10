<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "../../models/header.css" >
	<link rel = "stylesheet" href = "style.css">
</head>
<body>

<?php
	include "../../models/header.php";
?>

<?php
    if (isset($_POST)) {
        $conn = new mysqli("localhost", "root", "", "dbDesvWeb");

        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];


        $numeracao = 0;
        $tabela = $conn->query("select id from tbRelatos order by id desc limit 1");

        if (!isset($tabela)) {
            $numeracao = 1;
        } else {
            $ultimoId = $tabela->fetch_assoc();
            $numeracao = $ultimoId["id"] + 1;
        }

        $nomeImagem = "imagem" . $numeracao . ".jpg";

        move_uploaded_file($_FILES['imagem']['tmp_name'], "C:/xampp/htdocs/relatos/fotosRelatos/" . $nomeImagem);

        $sql = "insert into tbRelatos(titulo, descricao, localimagem) values ('$titulo', '$descricao', 'fotosRelatos/$nomeImagem')";

        $conn -> query($sql);
    }
?>

    <div class = "formulario">
        <form method = "POST" enctype="multipart/form-data">
            <label>Título </label>
            <input type = "text" name = "titulo">
            <br>
            <br>
            <label>Descrição </label>
            <textarea maxlength = "200" rows = "5" cols = "35" name = "descricao"> </textarea>
            <br>
            <br>
            <input type = "file" name = "imagem" id = "imagem">
            <br>
            <br>
            <input type = "submit">
        </form>
    </div>
</body>
</html>