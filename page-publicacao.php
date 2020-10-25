<?php
	session_start();
	require_once 'login/init.php';
	require 'login/check.php';
    function my_autoload($class){
        //require_once "domain/".$class.".php"; 
		require_once ("domain/" . $class . ".php"); //include
    }
	//$path = "domain/Arquivo.php";
	//echo "Path: $path";
	//require "$path";
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
    <link rel="icon" href="img/icone-sisgep.png"/>
    <title>Gerenciar Processo • SiG-Pro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="dist/css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="dist/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/312.css">
	<link rel="stylesheet" href="css/312.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/solid.css" integrity="sha384-VGP9aw4WtGH/uPAOseYxZ+Vz/vaTb1ehm1bwx92Fm8dTrE+3boLfF1SpAtB1z7HW" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/regular.css" integrity="sha384-ZlNfXjxAqKFWCwMwQFGhmMh3i89dWDnaFU2/VZg9CvsMGA7hXHQsPIqS+JIAmgEq" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/brands.css" integrity="sha384-rf1bqOAj3+pw6NqYrtaE1/4Se2NBwkIfeYbsFdtiR6TQz0acWiwJbv1IM/Nt/ite" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css" integrity="sha384-1rquJLNOM3ijoueaaeS5m+McXPJCGdr5HcA03/VHXxcp2kX2sUrQDmFc3jR5i/C7" crossorigin="anonymous">
	<!-- Botão personalizado de envio de arquivo -->
	<!--<link rel="javascript" href="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js">-->
    <!--<style>
        .tim {
            border: 0;
            padding: 0;
            display: inline;
            background: none;
            text-decoration: none;
            color: #0091EA;
        }
        button:hover {
            cursor: pointer;
        }
    </style>-->
	<!-- oncontextmenu='return false' onselect='return false' ondragstart='return false' ||código para bloquear cópia de conteúdo-->
</head>
<body class="back-body">
	<nav class="navbar nav-item navbar-expand-lg green darken-1">
		<a class="nav-link active" title="Página Inicial" href="home.php"><i class="fas fa-home fa-2x" style="color:white"></i></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<?php include "menu.php"; ?>
	</nav>
	<?php include "modal.php" ?>
	<div class="container">
		<br>
		<div class="font-up-bold">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="home">Home</a></li>
					<li class="breadcrumb-item active">Anexos</li>
				</ol>
			</nav>
		</div>
		<div class="card-header">
			<div class="row" style="background: white">
				<div class="col-2" style="margin-top:15px;">
					<div class="row d-flex justify-content-center" style="margin-bottom:10px;">
						<a type="button" href="home" class="btn btn-sm btn-success" title="Voltar para Home"><i class="fas fa-arrow-left pr-2" aria-hidden="true"></i>Voltar</a>
					</div>
					<div class="row d-flex justify-content-center">
						<a type="button" href="#" class="btn btn-sm btn-success"><i class="fas fa-edit pr-2" aria-hidden="true"></i>Editar</a>
					</div>
				</div>
				<div class="col">
					<div class="row">
						<div class="col-5">
							<h6 style="font-size:20px; color: #4cae4c;"><strong>Processo:</strong> <span style="color:#404040;"><?php echo $row_publicacoes['numeroProcesso']; ?></span></h6>
						</div>
						<div class="col-5">
							<h6 style="font-size:20px;color: #4cae4c;"><strong>Status:</strong> <span style="color:#404040"><?php echo $row_publicacoes['status']; ?></span></h6>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<h6 style="font-size:18px;color: #4cae4c;"><strong>Descrição:</strong> <span style="color:#404040"><?php echo $row_publicacoes['descricao']; ?></span></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<!-- Botão Adicionar Arquivo -->
		<?php
			if (($_SESSION['user_id'] == $row_arquivos['administrador_idAdministrador']) || $row_arquivos['administrador_idAdministrador'] == "" || $_SESSION['user_id'] == 3) {
        ?>
        <div style="text-align: center;">
			<button type="button" class="btn btn-success" title="Envie um arquivo em formato PDF" data-toggle="modal" data-target="#exampleModal">
				<i class="fas fa-plus-circle pr-2" aria-hidden="true"></i>Adicionar Arquivo
			</button>
        </div>
        <?php } ?>
		<!-- ./fim-botao -->
		<!-- ====================== adicionar arquivo ====================== -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<p class="modal-title text-white heading lead"><i class="fas fa-plus-circle pr-2" aria-hidden="true"></i> Anexar arquivo(s)</p>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" class="white-text">&times;</span>
						</button>
					</div>
					<?php
						if (isset($_SESSION['msg'])) {
							echo $_SESSION['msg'];
							unset($_SESSION['msg']);
						}
					?>
					
					<form method="POST" action="cadastrar-arquivo.php" enctype="multipart/form-data">
						<div class="modal-body">
						<div class="form-group2">
							<!--
							<div class="file-upload-wrapper">
								<input type="file" id="input-file-now" class="file-upload" />
							</div>-->
							<!--<input type="hidden" name="publicacao" value="<?php echo $id_publicacao ?>">
							<input type="file" name="arquivo" required><br><br>-->
							<div class="input-group mb-3 input-file">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupFileAddon01">Arquivo</span>
								</div>
								<div class="custom-file">
									<input type="text" class="form-control" placeholder="Selecione o arquivo..."/>
									<input type="hidden" name="publicacao" value="<?php echo $id_publicacao ?>"/>
									<!--<input type="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/pdf" class="custom-file-input"  id="inputGroupFile01" name="arquivo" aria-describedby="inputGroupFileAddon01" required>-->
									<!--<label class="custom-file-label" for="inputGroupFile01">Selecione o arquivo</label>-->
								</div>
							</div>
							<!--<label class="custom-file-label" for="inputGroupFile01">Selecione o arquivo</label>-->
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">Tipo</label>
								</div>
								<select class="custom-select" id="inputGroupSelect01" name="tipo" required >
									<option value="" disabled selected >Selecione o tipo</option>
									<option value="1">Memorando</option>
									<option value="2">Ofício</option>
									<option value="3">Ata</option>
									<option value="4">Comunicado</option>
									<option value="5">Circular</option>
									<option value="6">Portaria</option>
									<option value="7">Pedido</option>
									<option value="8">Declaração</option>
									<option value="9">Relatório</option>
									<option value="10">Requerimento</option>
									<option value="11">Solicitação</option>
									<option value="12">Requisição</option>
									<option value="13">Autorização</option>
									<option value="14">Carta</option>
									<option value="15">Contrato</option>
									<option value="16">Balancete</option>
									<option value="17">Ficha</option>
									<option value="18">Formulário</option>
									<option value="19">Convênio</option>
									<option value="20">Notificação</option>
									<option value="21">Orçamento</option>
									<option value="22">Parecer</option>
									<option value="23">Proposta</option>
									<option value="24">Recibo</option>
									<option value="25">Tabelas</option>
									<option value="26">Normatização</option>
									<option value="27">Protocolado</option>
									<option value="28">Aviso</option>
									<option value="29">Boletim</option>
									<option value="30">Informativo</option>
								</select>
							</div>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Status</label>
							</div>
							<input type="text" class="form-control" placeholder="Ex: Em análise"/>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
							<input name="SendCadArq" class="btn btn-success" type="submit" value="Cadastrar">
						</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- ====================== adicionar arquivo./ ====================== -->
		<!-- ./fim-modal -->
		<!--
		#
		#
		#
		-->
		<!-- Tabela com Informações das Publicações -->
		<div style="margin: 10px 0; text-align: center">
			<div style="margin: 30px 0; text-align: center">
				<?php 
					$arquivo = new arquivo();
					$publicacao = new publicacao();
					
					if(isset($_POST['verPDF'])){
						$id = $_POST['idarquivo'];
						$documento = $_POST['documento'];
				?>
                <button type="button" data-toggle="modal" data-target="#visualizar-pdf" class="btn btn-outline-primary waves-effect"><i class="far fa-eye"></i> Visualizar o arquivo "<?php echo $documento; ?>"</button>
                <script>
                //    $(window).load(function(){
                //        $('#myModal').modal('show');
                //    });
                </script>
				<!-- Modal: Visualizar Documento dentro do Modal -->
                <div class="modal fade" id="visualizar-pdf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-notify modal-success modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-white" id="myModalLabel">Visualizar Documento <?php echo "\"".$documento."\""; ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div style="text-align: center;">
                                    <iframe src="web/viewer.html?file=../arquivos/<?php echo $id; ?>/<?php echo $documento; ?>" style="width:750px; height:700px;" frameborder="1"></iframe>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success text-center" data-dismiss="modal"> Fechar </i></button>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- ./fim-modal -->
                <?php }
					function RemoveDir($dir){
					//essa função é para remover uma pasta e todos os arquivos que estiverem dentro dela
						if ($x = opendir($dir)) {
							while (false !== ($file = readdir($x))) {
								if ($file != "." && $file != "..") {
									$path = $dir . "/" . $file;
									if (is_dir($path)) {
										RemoveDir($path);
									} else if (is_file($path)) {
										unlink($path);
									}
								}
							}
							closedir($x);
						}
						rmdir($dir);
					}
					//fim
					if (isset($_POST['botaoexcluir'])) {
						$id = $_POST['id_paraexcluir'];
						$arquivo->delete($id);
						
						$pasta = 'arquivos/' . $id;//mostro o diretorio
						RemoveDir($pasta);//aplico dentro da funcao de exclusao
					}
				?>
				<!-- Fim form cadastrar -->
				<!-- Inicio da tabela -->
				<h4 class="card-header text-center font-weight-bold text-success py-3">Abaixo encontra-se todos os documentos anexados deste processo.</h4>
				<div class="card-body">
					<div id="table" class="table-editable">
						<table class="table table-bordered table-responsive-md table-striped text-center">
							<thead>
								<tr class="active" bgcolor="#43a047">
									<th  style="width:150px;" class="text-center" ><font color="white">Autor</font></th>
									<th  style="width:120px;" class="text-center" ><font color="white">Tipo</font></th>
									<th style="width:110px;" class="text-center" ><font color="white">Postado</font></th>
									<th style="width:350px;" class="text-center" ><font color="white">Arquivo</font></th>
									<th style="width:330px;" class="text-center" ><font color="white">Ações</font></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$cont = 0;
									foreach ($arquivo->porPublicacao($id_publicacao) as $key => $value) {
										$cont++; 
								?>
								<tr>
									<td><?php echo $value->nome; ?></td>
									<td><?php echo $value->tipoDocumento; ?></td>
									<td><?php echo date('d/m/Y H:i:s', strtotime($value->horaPublicacao)); ?></td>
									<td><?php echo $value->documento; ?></td>
									<td>
										<form method="post" action="" style="float: left; margin: 0 30px;">
											<input type="hidden" name="idarquivo" value="<?php  echo $value->idArquivo; ?>">
											<input type="hidden" name="documento" value="<?php  echo $value->documento; ?>">
											<button type="submit" title="Carregar o arquivo para visualizar" name="verPDF" class="btn btn-success px-3"><i class="far fa-folder"></i> Carregar</button>
										</form>
										<?php
											if ($_SESSION['user_id'] == $row_arquivos['administrador_idAdministrador'] || $_SESSION['user_id'] == 3) {
										?>
										<form class="form_excluir" method="post" style="float: left; margin: 0 15px;">
											<input name="id_paraexcluir" type="hidden" value="<?php echo $value->idArquivo; ?>"/>
											<button name="botaoexcluir" title="Excluir arquivo" type="submit" onclick="fn_excluir();" class="btn btn-danger px-3"><i class="far fa-trash-alt"></i> Excluir</button>
										</form>
										<?php } ?>
									</td>
								</tr>
								<?php } 
									if ($cont == 0) {
										echo "<p style='font-weight: bold; color: #4cae4c;'>Nenhum anexo para mostrar.</p>";
									}
								?>
							</tbody>
						</table>
					</div> 
				</div> 
				<!-- ./fim-card-tabela -->
			</div> 
		</div> 
    </div>
	<!-- ./container -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery-1.11.3.min.js" integrity="sha256-7LkWEzqTdpEfELxcZZlS6wAx5Ff13zZ83lYO2/ujj7g=" crossorigin="anonymous"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<script>
	function bs_input_file() {
		$(".input-file").before(
			function() {
				if ( ! $(this).prev().hasClass('input-ghost') ) {
					var element = $("<input type='file' style='visibility:hidden; height:0; border-radius:2px;'>");
					element.attr("name",$(this).attr("name"));
					element.change(function(){
						element.next(element).find('input').val((element.val()).split('\\').pop());
					});
					$(this).find("button.btn-choose").click(function(){
						element.click();
					});
					$(this).find("button.btn-reset").click(function(){
						element.val(null);
						$(this).parents(".input-file").find('input').val('');
					});
					$(this).find('input').css("cursor","pointer");
					$(this).find('input').mousedown(function() {
						$(this).parents('.input-file').prev().click();
						return false;
					});
					return element;
				}
			}
		);
	}
	$(function() {
		bs_input_file();
	});
	</script>
</body>
</html>