<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login • SisGeP </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../font/roboto/Roboto-Light.eot" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/solid.css" integrity="sha384-VGP9aw4WtGH/uPAOseYxZ+Vz/vaTb1ehm1bwx92Fm8dTrE+3boLfF1SpAtB1z7HW" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/regular.css" integrity="sha384-ZlNfXjxAqKFWCwMwQFGhmMh3i89dWDnaFU2/VZg9CvsMGA7hXHQsPIqS+JIAmgEq" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/brands.css" integrity="sha384-rf1bqOAj3+pw6NqYrtaE1/4Se2NBwkIfeYbsFdtiR6TQz0acWiwJbv1IM/Nt/ite" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/fontawesome.css" integrity="sha384-1rquJLNOM3ijoueaaeS5m+McXPJCGdr5HcA03/VHXxcp2kX2sUrQDmFc3jR5i/C7" crossorigin="anonymous">
</head>


<body>
<div class="bg">
    <div class="row">
        <div class=" col-md-4 offset-4 py-md-5 ">
            <div class="card">
                <div class="tab-content">
                    <!--Body-->
                    <div class="modal-body mb-1">

                        <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                            <div class="panel text-center">
                                <img src="../lo.png" width="200" height="160" class="d-inline-block" alt="">
                                <p class="py-3">Sistema Gerenciador de Processos</p>
                            </div>
                            <!--Dropdown primary-->

                            <form action="../../../login/login.php" method="post">
                                <!--/Dropdown primary-->
                                <div class="md-form form-sm pink-textarea active-pink-textarea ">
                                    <i class="fa fa-envelope prefix "></i>
                                    <input type="text" id="form22" name="email" class="form-control" required>
                                    <label for="form22">Digite seu e-mail</label>
                                </div>

                                <div class="md-form form-sm mb-4 pink-textarea active-pink-textarea">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="form23" name="password" class="form-control" required>
                                    <label for="form23">Digite sua senha </label>
                                </div>
                                <div class="text-center mt-2 py-4">
                                    <button class="btn success-color"> Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal: Login / Register Form-->

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="../../js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="../../js/mdb.min.js"></script>

</body>

</html>