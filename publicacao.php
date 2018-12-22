<!--**
 * @author Cesar Szpak - Celke e chico-   cesar@celke.com.br - fgtemarinho@gmail.com
 *-->
<?php include_once("conexao.php");
$id_publicacao = $_GET['id_publicacao'];
$result_publicacao = "SELECT * FROM publicacao WHERE idPublicacao ='$id_publicacao'";
$resultado_publicacoes = mysqli_query($conn, $result_publicacao);
$row_publicacoes = mysqli_fetch_assoc($resultado_publicacoes);
?>
<?php
session_start();
require_once 'login/init.php';
require 'login/check.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8 ">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/312.css">

</head>
<body class="back-body">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #43A047;">
    <a class="navbar-brand" href="home.php"><img src="img/home_icone.png" alt="#" class="banner"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
            <li class="nav-item  ">
                <a class="nav-link" data-toggle="modal" data-target="#adicionar" href="#" style="color: white;">Adicionar<span
                            class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#pesquisar" href="#" style="color: white;">Pesquisar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#setores" href="#"
                   style="color: white;">Setores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="modal" data-target="#senha" href="#" style="color: white;">Senha</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="modal" data-target="#ajuda" href="#" style="color: white;">Ajuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-toggle="modal" data-target="#sobre" href="#" style="color: white;">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="login/logout.php" style="color: white;"> Sair</a>
            </li>
        </ul>
        <li class="nav-item" style="margin-left: 35%;list-style-type: none;color: aqua;"><p>Olá, <?php echo $_SESSION['user_name']; ?></p></li>
    </div>
</nav>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h3><a class="navbar-brand" href="home.php"><img src="img/anterior_icone.png" alt="#" class="banner"></a>
            <?php echo $row_publicacoes['numeroProcesso']; ?></h3>
    </div>
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Conteúdo</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Avaliação</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Metodologia</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Restrições</a></li>
            <li role="presentation"><a href="#detalhes" aria-controls="detalhes" role="tab" data-toggle="tab">Normatizações</a></li>
            <li role="presentation"><a href="#tutores" aria-controls="tutores" role="tab" data-toggle="tab">Tutores</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
<!--                --><?php echo $row_publicacoes['numeroProcesso']; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
<!--                --><?php //echo $row_cursos['avaliacao']; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">
<!--                --><?php //echo $row_cursos['metodologia']; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
<!--                --><?php //echo $row_cursos['restricoes']; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="detalhes">
<!--                --><?php //echo $row_cursos['normatizacoes']; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="tutores">
<!--                --><?php //echo $row_cursos['tutores']; ?>
            </div>
        </div>

    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>