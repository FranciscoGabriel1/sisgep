<?php
    session_start();
    require_once 'login/init.php';
    require 'login/check.php';
?>
<?php include_once("conexao_mysqli.php");
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    if (!isset($_GET['filtrar'])) {
    //
    ?>
    <?php
    header("Location: home.php");
} else {
    $selecionado = $_GET['filtrar'];
}

$result_curso = "SELECT * FROM publicacao";

$result_arquivo = "SELECT setor.nomeSetor, administrador.nome,publicacao.idPublicacao, publicacao.numeroProcesso,
publicacao.descricao,publicacao.administrador_idAdministrador,arquivo.idArquivo,arquivo.documento,tipo.tipoDocumento,arquivo.horaPublicacao
FROM setor INNER JOIN administrador ON setor.idSetor = administrador.setor_idSetor INNER JOIN publicacao ON administrador.idAdministrador = publicacao.administrador_idAdministrador
 INNER JOIN arquivo ON publicacao.idPublicacao = arquivo.publicacao_idPublicacao INNER JOIN tipo ON arquivo.tipo_idTipo = tipo.idTipo WHERE setor_idSetor = $selecionado";

$resultado_curso = mysqli_query($conn, $result_curso);
$resultado_arquivo = mysqli_query($conn, $result_arquivo);

//Contar o total de cursos
$total_cursos = mysqli_num_rows($resultado_curso);
//$total_arquivo = mysqli_num_rows($resultado_arquivo);
//Seta a quantidade de cursos por pagina
$quantidade_pg = 40;
//calcular o número de pagina necessárias para apresentar os processos
$num_pagina = ceil($total_cursos / $quantidade_pg);
//Calcular o inicio da visualizacao
$incio = ($quantidade_pg * $pagina) - $quantidade_pg;
//Selecionar os cursos a serem apresentado na página

$result_curso = "SELECT * FROM publicacao limit $incio, $quantidade_pg";
$result_arquivo = "SELECT setor.nomeSetor, administrador.nome,publicacao.idPublicacao, publicacao.numeroProcesso,
publicacao.descricao,publicacao.administrador_idAdministrador,arquivo.idArquivo,arquivo.documento,tipo.tipoDocumento,arquivo.horaPublicacao
FROM setor INNER JOIN administrador ON setor.idSetor = administrador.setor_idSetor INNER JOIN publicacao ON administrador.idAdministrador = publicacao.administrador_idAdministrador
 INNER JOIN arquivo ON publicacao.idPublicacao = arquivo.publicacao_idPublicacao INNER JOIN tipo ON arquivo.tipo_idTipo = tipo.idTipo WHERE setor_idSetor = $selecionado limit $incio, $quantidade_pg";

$resultado_cursos = mysqli_query($conn, $result_curso);
$resultado_arquivo = mysqli_query($conn, $result_arquivo);
$total_cursos = mysqli_num_rows($resultado_cursos);
//$total_arquivo = mysqli_num_rows($resultado_arquivo);

//Verificar a pagina anterior e posterior
$pagina_anterior = $pagina - 1;
$pagina_posterior = $pagina + 1;
?>

<!---->
<!---->
<!--//Selecionar todos os cursos da tabela-->
<!--$result_curso = "SELECT * FROM cursos WHERE nome LIKE '%$valor_pesquisar%'";-->
<!--$resultado_curso = mysqli_query($conn, $result_curso);-->
<!---->
<!--//Contar o total de cursos-->
<!--$total_cursos = mysqli_num_rows($resultado_curso);-->
<!---->
<!--//Seta a quantidade de cursos por pagina-->
<!--$quantidade_pg = 6;-->
<!---->
<!--//calcular o número de pagina necessárias para apresentar os cursos-->
<!--$num_pagina = ceil($total_cursos/$quantidade_pg);-->
<!---->
<!--//Calcular o inicio da visualizacao-->
<!--$incio = ($quantidade_pg*$pagina)-$quantidade_pg;-->
<!---->
<!--//Selecionar os cursos a serem apresentado na página-->
<!--$result_cursos = "SELECT * FROM cursos WHERE nome LIKE '%$valor_pesquisar%' limit $incio, $quantidade_pg";-->
<!--$resultado_cursos = mysqli_query($conn, $result_cursos);-->
<!--$total_cursos = mysqli_num_rows($resultado_cursos);?>-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icone-sisgep.png"/>
    <title>SisGeP • Departamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="dist/css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="dist/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/312.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/solid.css" integrity="sha384-VGP9aw4WtGH/uPAOseYxZ+Vz/vaTb1ehm1bwx92Fm8dTrE+3boLfF1SpAtB1z7HW" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/regular.css" integrity="sha384-ZlNfXjxAqKFWCwMwQFGhmMh3i89dWDnaFU2/VZg9CvsMGA7hXHQsPIqS+JIAmgEq" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/brands.css" integrity="sha384-rf1bqOAj3+pw6NqYrtaE1/4Se2NBwkIfeYbsFdtiR6TQz0acWiwJbv1IM/Nt/ite" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css" integrity="sha384-1rquJLNOM3ijoueaaeS5m+McXPJCGdr5HcA03/VHXxcp2kX2sUrQDmFc3jR5i/C7" crossorigin="anonymous">
</head>
<body class="back-body">
<nav class="navbar nav-item navbar-expand-lg green darken-1">
    <a class="nav-link " title="Página Inicial" href="home.php"><i class="fas fa-home fa-2x" style="color:white"></i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php include "menu.php" ?>
</nav>
<?php include "modal.php" ?>
<?php
//Verificar a pagina anterior e posterior
$pagina_anterior = $pagina - 1;
$pagina_posterior = $pagina + 1;
?>
<div class="text-center">
    <?php
    if ($selecionado == 1) {
        echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 1%%;'>Voce está no Departamento Fiscalização Ambiental</p>";
    }
    if ($selecionado == 2) {
        echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 1%%;'>Voce está no Departamento Zoneamento Ambiental</p>";
    }
    if ($selecionado == 3) {
        echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 1%;'>Voce está no Departamento Administrador Master</p>";
    }
    if ($selecionado == 4) {
        echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 1%%;'>Voce está no Departamento Educação Ambiental</p>";
    }
    if ($selecionado == 5) {
        echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 1%%;'>Voce está no Departamento Registro, Monitoramento e Licenciamento</p>";
    }
    if ($selecionado == 6) {
        echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 1%%;'>Voce está no Setor Piscicultura</p>";
    }
    if ($selecionado == 7) {
        echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 1%%;'>Voce está no Setor Jurídico</p>";
    }
    //  echo "Voce está no setor ".$_SESSION['user_setor'];
    ?>
</div>
<div class="container theme-showcase" role="main">
    <div class="row">
        <?php while ($rows_cursos = mysqli_fetch_assoc($resultado_cursos) && $rows_arquivo = mysqli_fetch_assoc($resultado_arquivo)){
        ?>
        <div class="col-lg-4 col-md-11 py-2">
            <div class="card-deck">
                <div class="card">
                    <div class="card-body text-justify py-1 text-justify ">
                        <p class="text-muted py-1">
                           Processo:<a href="page-publicacao.php?id_publicacao=<?php echo $rows_arquivo['idPublicacao']; ?>&postador=<?php echo $rows_arquivo['administrador_idAdministrador']; ?>"><?php echo $rows_arquivo['numeroProcesso']; ?></a><br>
                        </p>
                        <p class=" card-text text-muted ">Descrição:  <?php echo $rows_arquivo['descricao']; ?>
                        </p>
                        <p class=" text-muted   card-text">Arquivo:  <label class="text-dark"> <?php echo $rows_arquivo['documento']; ?> </label>
                        </p>
                        <p class=" text-muted  card-text">Tipo: <label class="text-dark"> <?php echo $rows_arquivo['tipoDocumento']; ?> </label>
                        </p>
                        <hr>
                        <p class="card-text text-muted">Postado por: <?php echo $rows_arquivo['nome']; ?> em <?php echo $rows_arquivo['horaPublicacao']; ?>
                        </p>
                        <!-- <label class="legenda"> autor:</label>--><?php //echo "chci"; ?>
                        <?php //} ?>
                  </div>
                </div>
            </div>
        </div>
    <?php }
    ?>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>