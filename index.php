<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="Sistema Gerenciador de Processos da SEMMA Itacoatiara/AM">
	<meta name="author" content="Maik Elamide [maikelamide@gmail.com]">
	<meta name="keywords" content="SiG-Pro SEMMA, Sistema Gerenciador de Processos da SEMMA"/>
    <link rel="icon" href="_assets/img/icone_sig-pro.png"/>
    <title>SiG-Pro • Login</title>
	<!-- Font Awesome [local] -->
	<script src="_assets/js/ec10646d23.js"></script>
	<!-- Custom stylesheet -->
	<link href="_assets/css/main.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="_assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="_assets/css/mdb.css" rel="stylesheet">
</head>
<body class="bg-login">
	<div class="container">
		<div class="row">
			<div class="col-md-4 margin-auto">
				<div class="card-pag">
					<h5 class="card-header white-color dark-text text-center">
						<img src="_assets/img/logo_sig-pro.png" width="300" height="70" class="d-inline-block" alt="SiG-Pro SEMMA Itacoatiara">
					</h5>
					<div class="modal-body mb-1" style="background-color:#f7fafc;">
						<div class="panel text-center mb-4">
							Acesso ao Sistema
						</div>
						<!--<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>E-mail</strong> ou <strong>senha</strong> incorretos. Tente novamente!
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<form action="login/login.php" method="post">
							<div class="icon-login">
								<i class="fas fa-envelope"></i>
								<input type="email" class="form-control" name="email" placeholder="E-mail" title="Digite o e-mail" style="margin-bottom:10px;" required>
							</div>
							<div class="icon-login">
								<i class="fas fa-lock"></i>
								<input type="password" class="form-control" name="password" placeholder="Senha" title="Digite a senha" required>
							</div>
							<button class="btn btn-success btn-block my-4" type="submit">Entrar</button>
						</form>
						<div class="d-flex justify-content-around">
							<a type="button" class="btn-link" data-toggle="modal" data-target="#modalEsqueceuSenha" style="color:#404040;font-size:12px;" onclick="alerta1();">Esqueceu acesso?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <footer class="footer-login">
        SiG-Pro © 2019-2020. Desenvolvido por <a style="color:yellow" type="button" class="btn-link" data-toggle="modal" data-target="#modalDesenvolvedores">Laboratório de Pesquisa em Computação I (LabComp I)</a>
		<!--<a href="http://www.icet.ufam.edu.br/grupopesq/gptec/lab312/" target="_blank" style="color: yellow">#Lab312</a> -->
		| Instituto de Ciências Exatas e Tecnologia - ICET/UFAM | Contato: lab312@gmail.com
		<center>Programa Jovens Doutores (PJD) - PROPESP/UFAM. Financiado por: MCTIC</center>
    </footer>
	<!--Modal: Desenvolvido -->
	<div class="modal fade" id="modalDesenvolvedores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-notify modal-default" role="document">
			<div class="modal-content text-center">
				<div class="modal-header d-flex justify-content-center">
					<p class="heading"><i class="fas fa-code animated rotateIn"></i> Equipe de Desenvolvedores</p>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body text-left">
					<p><i class="fas fa-user animated rotateIn text-success"></i> Franscico G. T. Marinho <br><i class="fas fa-envelope animated rotateIn text-success"></i> franciscogabriel.am@gmail.com</p>
					<p><i class="fas fa-user animated rotateIn text-success"></i> Maik S. Elamide <br><i class="fas fa-envelope animated rotateIn text-success"></i> maikelamide@gmail.com</p>
					<p><i class="fas fa-user animated rotateIn text-success"></i> Rubber B. Rodriguez <br><i class="fas fa-envelope animated rotateIn text-success"></i> Barbosa rodriguezrubber@gmail.com</p>
					<p><i class="fas fa-user animated rotateIn text-success"></i> Victor Lucio Froes Pinto <br><i class="fas fa-envelope animated rotateIn text-success"></i> victhorlucfr@gmail.com </p>
					<p><i class="fas fa-user animated rotateIn text-success"></i> Odette Mestrinho Passos <br><i class="fas fa-envelope animated rotateIn text-success"></i> lab312@gmail.com </p>
					<p>Visite o site do LabComp I, <a href="http://www.icet.ufam.edu.br/grupopesq/gptec/lab312/" target="_blank">clique aqui</a>.</p>
					<hr>
					<p>Versão do sistema 2.0 • atualizado em 23/05/2020</p>
				</div>
			</div>
		</div>
	</div>
	<!--Modal: Esqueceu a senha? -->
	<div class="modal fade" id="modalEsqueceuSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-notify modal-warning" role="document">
			<div class="modal-content text-center">
				<div class="modal-header d-flex justify-content-center">
					<p class="heading"><i class="fas fa-info-circle animated rotateIn"></i> Esqueceu acesso?</p>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body text-left">
					<p><strong>Atenção!</strong></p>
					<p>Entre em contato com o administrador do sistema para obter as credenciais de acesso.</p>
				</div>
			</div>
		</div>
	</div>
    <!-- JQuery -->
    <script type="text/javascript" src="_assets/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="_assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="_assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="_assets/js/mdb.min.js"></script>	
</body>
</html>