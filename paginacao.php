<?php include_once("conexao_mysqli.php");
	//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
	//QUERYS do meu sistema
	$var = $_SESSION['user_id'];
    $result_publicacao = "SELECT * FROM publicacao WHERE administrador_idAdministrador=$var";

	$result_arquivo = "SELECT administrador.nome,publicacao.idPublicacao, publicacao.numeroProcesso,
	publicacao.descricao,arquivo.idArquivo,arquivo.documento,tipo.tipoDocumento,arquivo.horaPublicacao
	FROM administrador INNER JOIN publicacao ON administrador.idAdministrador = publicacao.administrador_idAdministrador
	INNER JOIN arquivo ON publicacao.idPublicacao = arquivo.publicacao_idPublicacao INNER JOIN tipo ON arquivo.tipo_idTipo = tipo.idTipo 
	WHERE administrador_idAdministrador=$var";

    $resultado_publicacao = mysqli_query($conn, $result_publicacao);
    $resultado_arquivo = mysqli_query($conn, $result_arquivo);

	//Contar o total de PUBLICACOES
    $total_publicacoes= mysqli_num_rows($resultado_publicacao);
	//$total_arquivo = mysqli_num_rows($resultado_arquivo);

	//Seta a quantidade de PUBLICACOES por pagina
    $quantidade_pg = 12;
	//calcular o número de pagina necessárias para apresentar as publicacoes
    $num_pagina = ceil($total_publicacoes / $quantidade_pg);
	//Calcular o inicio da visualizacao
    $incio = ($quantidade_pg * $pagina) - $quantidade_pg;
	//Selecionar as publicacoes a serem apresentado na página
    $result_publicacao = "SELECT * FROM publicacao WHERE administrador_idAdministrador=$var limit $incio, $quantidade_pg";
    $result_arquivo= "SELECT administrador.nome,publicacao.idPublicacao, publicacao.numeroProcesso,
	publicacao.descricao,arquivo.idArquivo,arquivo.documento,tipo.tipoDocumento,arquivo.horaPublicacao
	FROM administrador INNER JOIN publicacao ON administrador.idAdministrador = publicacao.administrador_idAdministrador
	INNER JOIN arquivo ON publicacao.idPublicacao = arquivo.publicacao_idPublicacao INNER JOIN tipo ON arquivo.tipo_idTipo = tipo.idTipo 
	WHERE administrador_idAdministrador=$var limit $incio, $quantidade_pg";

    $resultado_publicacoes = mysqli_query($conn, $result_publicacao);
    $resultado_arquivo = mysqli_query($conn, $result_arquivo);

    $total_publicacoes = mysqli_num_rows($resultado_publicacoes);
    //$total_arquivo = mysqli_num_rows($resultado_arquivo);

	//Verificar a pagina anterior e posterior
	$pagina_anterior = $pagina - 1;
	$pagina_posterior = $pagina + 1;
?>
	<!-- Paginação -->
	<nav class="text-center">
		<ul class="pagination badge-pill badge">
			<li>
				<?php if($pagina_anterior != 0){  ?>
					<a href="home.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
						<span aria-hidden="true">
							<img src="dist/img/svg/esquerda-arrow.svg" style=" width: 30px; height: 30px;">
						</span>
					</a>
				<?php }else{ ?>
					<span aria-hidden="true"><img src="dist/img/svg/esquerda-arrow.svg" style=" width: 30px; height: 30px;"></span></span>
				<?php } ?>
			</li>
			<?php 
			//Apresentar a paginacao
			for($i = 1; $i < $num_pagina + 1; $i++){ ?>
			<li>
				<a  href="home.php?pagina=<?php echo $i ; ?>">
					<span aria-hidden="true"> <?php echo $i; ?> </span>
				</a>
			</li>
			<?php } ?>
			<li>
				<?php
					if($pagina_posterior <= $num_pagina){ ?>
						<a href="home.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Previous">
							<span aria-hidden="true"> <img src="dist/img/svg/right-arrow%20(1).svg"  style="width: 30px; height: 30px;"></span>
						</a>
					<?php }else{ ?>
						<span aria-hidden="true" ><img src="dist/img/svg/right-arrow%20(1).svg" style="width: 30px; height: 30px;"> </span>
				<?php }  ?>
			</li>
		</ul>
	</nav>
	
	<div class="container">
		<?php
			$proc = new Publicacao();
			$arquivo = new Arquivo();
			/*
			if (isset($_POST['excluirprocesso'])) {
				$id = $_POST['id_excluirprocesso'];
				$proc->delete($id);    
			}*/
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
			
			if (isset($_POST['excluirprocesso'])) {
				$id = $_POST['id_excluirprocesso'];
				$proc->delete($id);    
				
				$arquivo->delete($id);
				$pasta = 'arquivos/' . $id;//mostro o diretorio
				RemoveDir($pasta);//aplico dentro da funcao de exclusao
			}
			
			//Se status for TRUE, os dados foram alterados
			if (isset($_POST['excluirprocesso'])) {
				if ($_POST['excluirprocesso'] == 'true') {
					echo "<p>O processo foi excluído com sucesso!</p>";
					header("Location:home.php");
				} else {
				echo "<p>Não possível excluir o processo!</p>";
					header("Location:home.php");
				}
			}
		?>
		<h4 class="card-header text-center font-weight-bold text-success py-3" style="background:white;">Abaixo encontra-se todos os processos do seu departamento.</h4>
		<div class="card-body">
			<div id="table" class="table-editable">
				<table class="table table-striped table-responsive-md btn-table table-bordered">
					<thead class="teal white-text">
						<tr bgcolor="#43a047">
							<th style="width:30px;">#</th>
							<th style="width:30px;">Processo</th>
							<th style="width:230px;">Descrição</th>
							<th style="width:80px;">Status</th>
							<th style="width:80px;">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$cont = 0;
							while ($rows_publicacoes = mysqli_fetch_assoc($resultado_publicacoes)) {
								$cont++;//&& $rows_arquivo = mysqli_fetch_assoc($resultado_arquivo)
								
								//contador de quantidade de arquivos anexados ao processo -> Badges notification
								$conta = 0;
								foreach ($arquivo->porPublicacao($rows_publicacoes['idPublicacao']) as $key => $value) {
									$conta++;
								}
						?>
						<tr>
							<td class="align-middle" scope="row"><?php echo $cont ?></td>
							<td class="align-middle"><?php echo $rows_publicacoes['numeroProcesso']; ?>
								<span class="badge badge-warning ml-2" title="Quantidade de arquivos anexados ao processo"><?php echo $conta ?></span>
								<span class="sr-only">unread messages</span>
							</td>
							<td class="text-justify"><?php echo $rows_publicacoes['descricao']; ?></td>
							<td class="align-middle"><?php echo $rows_publicacoes['status']; ?></td>
							<td  class="align-middle">
								<div class="row">
									<div class="col">
										<div class="row d-flex justify-content-center" style="margin-bottom:10px;">
											<a type="button" class="btn btn-info btn-sm" href="page-publicacao.php?id_publicacao=<?php echo $rows_publicacoes['idPublicacao']; ?>&descricao=<?php echo $rows_publicacoes['descricao']; ?>&postador=<?php echo $_SESSION['user_id'] ?>"><i class="fas fa-copy pr-2" aria-hidden="true"></i>Anexos</a>
										</div>
										<div class="row d-flex justify-content-center">
											<form method="post" class="form_excluir text-center">
												<input name="id_excluirprocesso" type="hidden" value="<?php echo $rows_publicacoes['idPublicacao']; ?>"/>
												<button type="submit" title="Excluirá o processo incluindo todos os documentos anexados." name="excluirprocesso" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt pr-2" aria-hidden="true"></i>Excluir </button>
											</form>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<?php }
							if ($cont == 0) {
								echo "<p style='font-weight: bold; color: #4cae4c; margin-left: 40%;'>Você não tem nenhuma publicação</p>";
							}
						?>
					</tbody>			
				</table>
			</div>
		</div>
	</div>
