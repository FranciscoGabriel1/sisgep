<?php
    session_start();
    require_once 'login/init.php';
    require 'login/check.php';
?>
<?php
function my_autoload($class){
    require_once("domain./".$class.".php"); //include
}
spl_autoload_register("my_autoload");
?>
<?php
    include_once("conexao_mysqli.php");
    $id_publicacao = $_GET['id_publicacao'];
    $postador = $_GET['postador'];
    $result_publicacao = "SELECT * FROM publicacao WHERE idPublicacao ='$id_publicacao'";
    $resultado_publicacoes = mysqli_query($conn, $result_publicacao);
    $row_publicacoes = mysqli_fetch_assoc($resultado_publicacoes);
    $usuario = $_SESSION['user_id'];

    $result_arquivo = "SELECT setor.nomeSetor, administrador.nome,publicacao.idPublicacao, publicacao.numeroProcesso, publicacao.descricao,publicacao.administrador_idAdministrador,arquivo.idArquivo,arquivo.documento,tipo.tipoDocumento,arquivo.horaPublicacao
    FROM setor INNER JOIN administrador ON setor.idSetor = administrador.setor_idSetor INNER JOIN publicacao ON administrador.idAdministrador = publicacao.administrador_idAdministrador
    INNER JOIN arquivo ON publicacao.idPublicacao = arquivo.publicacao_idPublicacao INNER JOIN tipo ON arquivo.tipo_idTipo = tipo.idTipo WHERE  publicacao.administrador_idAdministrador=$postador";
    $resultado_arquivos = mysqli_query($conn, $result_arquivo);
    $row_arquivos = mysqli_fetch_assoc($resultado_arquivos);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SisGeP • Gerenciar Processo</title>
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
<!-- oncontextmenu='return false' onselect='return false' ondragstart='return false' ||código para bloquear cópia de conteúdo-->
<body class="back-body">
<nav class="navbar nav-item navbar-expand-lg green darken-1">
    <a class="nav-link active" title="Página Inicial" href="home.php"><i class="fas fa-home fa-2x" style="color:white"></i>
    </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <?php include "menu.php"; ?>
</nav>
    <?php include "modal.php" ?>
<div class="container">
    <div class="page-header">
        <h3><a title="Voltar" class="navbar-brand" href="home.php"><img src="assets/imagens/anterior_icone.png" alt="voltar" class="banner"></a>
            <label style="font-size: 15pt; color: #4cae4c; padding-right: 10px;">Processo:</label><?php echo $row_publicacoes['numeroProcesso']; ?>
        </h3>
        <h5>
            <label style="margin-left:60px;font-size: 15pt; color: #1b6d85;padding-right: 10px;">Descrição:</label><?php echo utf8_encode($row_publicacoes['descricao']); ?>
        </h5>
    </div>
<!-- *************************************************************** BOTÃO ADICIONAR ARQUIVO ***************************************************************************-->
<?php
    if (($_SESSION['user_id'] == $row_arquivos['administrador_idAdministrador'])||$row_arquivos['administrador_idAdministrador']==""||$_SESSION['user_id'] == 3){
?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" title="Envie um arquivo em formato PDF" data-toggle="modal" data-target="#exampleModal" style="margin-left: 42%;">
        Adicionar Arquivo
    </button>
<?php
    }
?>
<!-- *************************************************************** MODAL ADICIONAR ARQUIVO ***************************************************************************-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title text-white heading lead">Adicionar arquivo</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                </div>
<?php
    if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
?>
<!-- ******************************************************* MODAL PARA CADASTRO DE DOCUMENTO *****************************************************************-->
    <form method="POST" action="cadastrar-arquivo.php" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="input-group mb-3">
                <div>
                    <input type="hidden" name="publicacao" value="<?php echo $id_publicacao ?>">
                        <input type="file" name="arquivo" required><br><br>
<!--     <label class="custom-file-label" for="inputGroupFile01">Selecione o arquivo</label>-->
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="tipo" required>
                    <option selected>Selecione o tipo do documento</option>
                    <option value="1">Memorando</option>
                    <option value="2">Ofício</option>
                    <option value="4">Comunicado</option>
                    <option value="3">Ata</option>
                    <option value="5">Outro</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
            <input name="SendCadArq" class="btn btn-success" type="submit" value="Cadastrar">
        </div>
    </form>
            </div>
        </div>
    </div> <!-- FIM DO MODAL DE CADASTRAR ARQUIVO-->
<!-- ******************************************************* TABELA COM INFORMAÇÕES DAS PUBLICAÇÕES*****************************************************************-->
    <div style="margin: 100px 0; text-align: center">
        <div style="margin: 100px 0; text-align: center">
            <?php $arquivo = new arquivo();
            $publicacao = new publicacao();
            //exclusao de soldado
            if (isset($_POST['botaoexcluir'])) {
                $id = $_POST['id_paraexcluir'];
                $arquivo->delete($id);
            }
            ?>
            <!-- Fim form cadastrar --><!-- Inicio da tabela -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="active">
                        <th>Autor</th>
                        <th>Tipo</th>
                        <th>Data e Hora de publicação</th>
                        <th>Arquivo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                    <tbody>
 <?php
    $cont=0;
        foreach ($arquivo->porPublicacao($id_publicacao) as $key => $value) { $cont++; ?>
            <tr>
                <td><?php echo $value->nome; ?></td>
                <td><?php echo $value->tipoDocumento; ?></td>
                <td><?php echo $value->horaPublicacao; ?></td>
                <td><?php echo $value->documento; ?></td>

<!-- ******************************************************* BOTÕES PARA EXCLUIR E VISUALIZAR DOCUMENTO *****************************************************************-->
                <td>



                    <a class="btn btn-primary" data-toggle="modal" title="Visualizar PDF" data-target="#visualizar-pdf" href="#"  style="color: black;">Visualizar <?php echo $value->idArquivo." ".$value->documento; ?></a>


                    <div class="modal fade" id="visualizar-pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-notify modal-success modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-white" id="myModalLabel">Visualizar Documento  <?php echo $value->idArquivo." / ".$value->documento; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="white-text">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="text-align: center;">
                                        <iframe
                                                src="web/viewer.html?file=../arquivos/<?php echo $value->idArquivo; ?>/<?php echo $value->documento; ?>" style="width:750px; height:700px;" frameborder="1">
                                        </iframe>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success text-center" data-dismiss="modal"> Fechar </i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                    if ($_SESSION['user_id'] == $row_arquivos['administrador_idAdministrador'] || $_SESSION['user_id'] == 3) {
                        ?>
                        <form class="form_excluir" method="post" style="float: left; margin: 0 15px;">
                            <input name="id_paraexcluir" type="hidden" value="<?php echo $value->idArquivo; ?>"/>
                            <button name="botaoexcluir" type="submit" onclick="fn_excluir();" class="btn btn-danger">
                                Excluir
                            </button>
                        </form>
                    <?php } ?>
                </td>
            </tr>
            <?php
            ?>
            <?php
        }
 ?>              </tbody>
            </table><!-- Fim da tabela -->
        </div> <!-- fim Modal -->
    </div> <!-- fim container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js" integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g=" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>