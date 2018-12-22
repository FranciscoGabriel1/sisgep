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
        <li class="nav-item" style="margin-left: 35%;list-style-type: none;color: aqua;"><p><?php echo $_SESSION['user_name']; ?><?php echo " • <b style='color: #122'> ".$_SESSION['user_setor']."</b>"; ?></p></li>
    </div>
</nav>