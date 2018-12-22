<!--**
 * @author Cesar Szpak - Celke -   cesar@celke.com.br
 * @pagina desenvolvida usando framework bootstrap,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 *-->
<?php include_once("conexao.php");
$id_curso = $_GET['id_curso'];
$result_cursos = "SELECT * FROM cursos WHERE id='$id_curso'";
$resultado_cursos = mysqli_query($conn, $result_cursos);
$row_cursos = mysqli_fetch_assoc($resultado_cursos);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Criar pagina com abas</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1><?php echo $row_cursos['nome']; ?></h1>
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
					<?php echo $row_cursos['conteudo']; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="profile">
					<?php echo $row_cursos['avaliacao']; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="messages">
					<?php echo $row_cursos['metodologia']; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="settings">
					<?php echo $row_cursos['restricoes']; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="detalhes">
					<?php echo $row_cursos['normatizacoes']; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tutores">
					<?php echo $row_cursos['tutores']; ?>
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