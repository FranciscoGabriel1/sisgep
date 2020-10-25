<?php
    session_start();
    require_once 'login/init.php';
    require 'login/check.php';
	
	function my_autoload($class){
            require_once 'domain/'.$class.'.php';
        }
    spl_autoload_register("my_autoload");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8 ">
    <link rel="icon" href="img/icone-sisgep.png"/>
    <title>Home • SiG-Pro</title>
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
	<!--<link href="css/sb-admin-2.css" rel="stylesheet">-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">	
	<style type="text/css" media="all">
        #box-toggle {
            margin:0;
            font:12px Arial, Helvetica, sans-serif;
        }
        #box-toggle span {
            display:block;
            cursor:pointer;
            font-weight:bold;
            font-size:16px;
            color:#0099CC;
            margin-top:15px;
        }
    </style>
</head>
<body class="back-body">
    <nav class="navbar nav-item navbar-expand-lg green darken-1">
        <a class="nav-link" title="Página Inicial" href="home.php"><i class="fas fa-home fa-2x" style="color: white"></i></a>
        <?php include "menu.php" ?>
    </nav>
		<?php include "modal.php" ?>
        <?php include "paginacao.php" ?>
        <?php //include "pesquisar.php" ?>
    <footer class="bg-color-green">
		<div class="container">
			<div class="row">
            <hr>
				<div class="col-md-12 text-center">
					<p>
						<a href="#" title="Pesquisar processo por nº, descrição ou tipo" data-toggle="modal" data-target="#pesquisar">
							<img src="assets/imagens/pesquisa_icone.png" style="height: 60px;padding-right: 10px;">
						</a>
						<a href="#" title="Filtrar processos por departamento"  data-toggle="modal" data-target="#setores">
							<img src="assets/imagens/setores_icone.png" style="height: 60px;">
						</a>
					</p>
				</div>
			</div>
		</div>
    </footer>
	<!-- Optional JavaScript -->
	<!--Modal: Login / Register Form-->
	<script type="text/javascript" src="dist/js/jquery-3.3.1.min.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="dist/js/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="dist/js/mdb.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>