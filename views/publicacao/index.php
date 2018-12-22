<?php
session_start();
require_once '../../login/init.php';
require '../../login/check.php';
?>
<?php 	function __autoload($class){
	 require_once '../../domain/'.$class.'.php';
	} ?>


<?php include_once("../../conexao.php");
$id_publicacao = $_GET['id_publicacao'];
$result_publicacao = "SELECT * FROM publicacao WHERE idPublicacao ='$id_publicacao'";
$resultado_publicacoes = mysqli_query($conn, $result_publicacao);
$row_publicacoes = mysqli_fetch_assoc($resultado_publicacoes);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/312.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

</head>
<body class="back-body">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #43A047;">
    <a class="navbar-brand" href="../../home.php"><img src="../../img/home_icone.png" alt="#" class="banner"></a>
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
                <a class="nav-link " href="../../login/logout.php" style="color: white;"> Sair</a>
            </li>
        </ul>
        <li class="nav-item" style="margin-left: 35%;list-style-type: none;color: aqua;"><p>Olá, <?php echo $_SESSION['user_name']; ?></p></li>
    </div>
</nav>
<div class="container">

       <div class="page-header">
            <h3><a title="Voltar" class="navbar-brand" href="../../home.php"><img src="../../img/anterior_icone.png" alt="#" class="banner"></a>
                <label style="font-size: 15pt; color: #4cae4c;padding-right: 10px;">Processo:</label><?php echo $row_publicacoes['numeroProcesso']; ?></h3>
        </div>
    <!-- Form cadastrar -->
    <div style="margin: 100px 0; text-align: center">
    <div style="margin: 100px 0; text-align: center">

<?php $publicacao = new publicacao();

//cadastro de publicacao

		if (isset($_POST['cadastrar'])):
            $postador = $_SESSION['user_id'];
            $publicacao-> setAdministradorIdAdministrador($postador);
			$numeroProcesso= $_POST['processo'];
			$publicacao-> setNumeroProcesso($numeroProcesso);
			$descricao= $_POST['descricao'];
			$publicacao-> setDescricao($descricao);

		if($publicacao->insert()){
			echo '<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>OK!</strong> Incluido com sucesso!!! </div>';
      } else {
                echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>OK!</strong> Erro ao alterar!!! </div>';
            }
		endif;
//exclusao de publicacao

		if (isset($_POST['excluir_ui'])){
			$id = $_POST['id_ui'];
			$publicacao->delete($id);
		}
//Alterar publicacao

		if (isset($_POST['alterar'])){
			$id = $_POST['id_publicacao'];
    
			$numeroProcesso= $_POST['numeroProcesso'];
			$publicacao-> setNumeroProcesso($numeroProcesso);
			$titulo= $_POST['titulo'];
			$publicacao-> setDescricao($descricao);
			$publicacao->update($id);
		}
		?>

<legend>Formulário Cadastrar <b style="color: #009688">Processo</b></legend>
        <form class="form-inline" method="post">   <br> 
     <div class="form-group">
     <label for="usr">Processo</label>
  <input type="text" class="form-control" name="processo" placeholder='inserir processo' required>
</div><br>
    <br> 
     <div class="form-group">
     <label for="usr">Descricao</label>
  <input type="text" class="form-control" name="descricao" placeholder='inserir descricao' required>
</div><br>
 <br><input name="cadastrar" type="submit" class="btn btn-success" value="Cadastrar"><br>
        </form>
    </div>

    <!-- Fim form cadastrar --><!-- Inicio da tabela -->
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="active"><th>Processo</th><th>Arquivo</th></tr></thead><tbody>
<?php

foreach ($publicacao->findAll() as $key => $value) { ?>
<tr>
<td><?php echo $value->numeroProcesso; ?></td>
<td><?php echo $value->descricao; ?></td>
<td>
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                            onclick="load_modal_publicacao('<?php echo $value->numeroProcesso; ?>','<?php echo $value->descricao; ?>',<?php echo $value->idPublicacao; ?>);">Alterar</button>
<form class="form_excluir" method="post" style="float: left; margin: 0 15px;"><input name="id_ui" type="hidden" value="<?php echo $value->idPublicacao;?>"/><button name="excluir_ui" type="submit" onclick="fn_excluir();" class="btn btn-danger">Excluir</button>
 </form> </td></tr><?php } ?> </tbody></table>
    <!-- Fim da tabela -->



        <!-- Modal para alterar publicacao -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Alterando Publicacao</h4>
                </div>
                <div class="modal-body">
                    <form class="form-inline" method="post">
       <br> 
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-user"></span>
                <input id="text_numeroprocesso" name="numeroprocesso" placeholder="nome" type="text" class="form-control" required value="" >
            </div><br>
    <br> 
            <div class="input-group">
                   <span class="input-group-addon glyphicon glyphicon-user"></span>
                    <input id="text_descricao" name="descricao" placeholder="descricao" type="text" class="form-control" required value="" >
                     </div><br>
 <input id="idPublicacao" name="idPublicacao" type="hidden" value=""/>
                        <br><input name="alterar" type="submit" class="btn btn-warning" value="Alterar"><br>
                    </form>
                </div>
            </div>
       
	 </div>
   
	 </div> <!-- fim Modal --></div> <!-- fim cantainer -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.11.3.min.js" integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g=" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/script.js"></script>
</body>