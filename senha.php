<?php
session_start();
require_once 'login/init.php';
require 'login/check.php';
?>
<?php
function my_autoload($class)
{
    require_once("domain./" . $class . ".php"); //include
}

spl_autoload_register("my_autoload");
?>
<?php
include_once("conexao_mysqli.php");
$consulta = "SELECT idAdministrador, nome, senha, email, (SELECT nomeSetor FROM setor WHERE administrador.setor_idSetor=setor.idSetor) AS setor_idSetor FROM administrador";
$conexao = mysqli_query($conn, $consulta);
if (!$conexao) {
    echo "Erro ao realizar consulta. Tente outra vez.";
    exit;
}
$usuario = $_SESSION['user_id'];

//<!-- Notificação -->
//Se existe a variável alteração, então
if (isset($_GET['alteracao'])) {
    //Se status for TRUE, os dados foram alterados
    if ($_GET['alteracao'] == 'true') {
        echo "<p>Os dados foram alterados!</p>";
        header("Location:senha.php");
    } else {
        echo "<p>Não possível alterar os dados!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8 ">
    <link rel="icon" href="img/icone-sisgep.png"/>
    <title> SisGeP • Senhas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="dist/css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="dist/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/312.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/solid.css"
          integrity="sha384-VGP9aw4WtGH/uPAOseYxZ+Vz/vaTb1ehm1bwx92Fm8dTrE+3boLfF1SpAtB1z7HW" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/regular.css"
          integrity="sha384-ZlNfXjxAqKFWCwMwQFGhmMh3i89dWDnaFU2/VZg9CvsMGA7hXHQsPIqS+JIAmgEq" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/brands.css"
          integrity="sha384-rf1bqOAj3+pw6NqYrtaE1/4Se2NBwkIfeYbsFdtiR6TQz0acWiwJbv1IM/Nt/ite" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css"
          integrity="sha384-1rquJLNOM3ijoueaaeS5m+McXPJCGdr5HcA03/VHXxcp2kX2sUrQDmFc3jR5i/C7" crossorigin="anonymous">
</head>
<body class="back-body">
<nav class="navbar nav-item navbar-expand-lg green darken-1">
    <a class="nav-link active" title="Página Inicial" href="home.php"><i class="fas fa-home fa-2x"
                                                                         style="color:white"></i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link " data-toggle="modal" title="Ajuda" data-target="#ajuda" href="#" style="color: white;">Ajuda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " data-toggle="modal" title="Sobre o SisGeP" data-target="#sobre" href="#"
               style="color: white;">Sobre</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " title="Encerrar Sessão" href="login/logout.php" style="color: white;"> Sair</a>
        </li>
    </ul>
    <?php include "modal.php" ?>
</nav>
<!-- Editable table -->
<h4 class="card-header text-center font-weight-bold text-success py-4">Gerenciamento de senha dos administradores e seus
    Departamentos/Setores</h4>
<div class="card-body">
    <div id="table" class="table-editable">
        <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Departamento/Setor</th>
                <th class="text-center">Responsável</th>
                <th class="text-center">Senha</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Ações</th>
            </tr>
            </thead>
            <tbody>
            <!-- Sem falha na execução da query, exibe os dados. -->
            <?php
            while ($dados = $conexao->fetch_array()) {
                ?>
                <tr>
                    <td><?php echo $dados["idAdministrador"]; ?></td>
                    <!-- utf8_encode() = usado para mostrar palavras com acento no resultado da consuulta com php-->
                    <td><?php echo utf8_encode($dados["setor_idSetor"]); ?></td>
                    <td><?php echo utf8_encode($dados["nome"]); ?></td>
                    <td><?php echo utf8_encode($dados["senha"]); ?></td>
                    <td><?php echo $dados["email"]; ?></td>
                    <td>
                        <form method="POST" data-toggle="modal" data-target="#msg-alterar-senha" href="#"
                              style="color: white" ;
                        ">
                        <input name="id_paraalterar" type="hidden" value=""/>
                        <span class="table-remove">
                                            <button name="botaoalterar" type="button"
                                                    class="btn btn-success btn-rounded btn-sm my-0" onclick="load_senha('<?php echo $dados["nome"]; ?>','<?php echo $dados["senha"]; ?>','<?php echo $dados["email"]; ?>',<?php echo $dados["idAdministrador"]; ?>);">Alterar</button>
                                        </span>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Editable table -->
<!-- Card -->
<!-- Optional JavaScript -->
<!--Modal: Login / Register Form-->
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="dist/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="dist/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="dist/js/mdb.min.js"></script>

<script>
    function load_senha(nome,senha,email,id){
        $('#text_nome').val(nome);
        $('#text_senha').val(senha);
        $('#text_email').val(email);
        $('#id_admin').val(id);
    }
</script>

</body>