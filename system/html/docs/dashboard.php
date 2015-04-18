<!DOCTYPE html>
<?php $daoMenu = new CMenuData($db); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title><?= APP_TITLE ?></title>

        <!-- Bootstrap core CSS -->
        <link href="system/html/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="system/html/dist/css/dashboard.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="index.php?mod=signout">Cerrar Sesion</a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <?php $criterion = "menu_menu_id IS NULL"; ?>
                    <?php $headers = $daoMenu->getMenu($criterion); ?>
                    <?php foreach ($headers as $header) { ?>
                    <ul class="nav nav-sidebar">
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <?= $header['menu_nombre'] ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php $criterion = "menu_menu_id = " . $header['menu_id']; ?>
                                <?php $options = $daoMenu->getMenu($criterion); ?>
                                <?php foreach ($options as $option) { ?>
                                    <li><a href="index.php?mod=<?= $option['menu_variable'] ?>"><?= $option['menu_nombre'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Dashboard</h1>

                    <div class="row placeholders">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Label</h4>
                            <span class="text-muted">Something else</span>
                        </div>
                    </div>
                    <?php
                    if(isset($_REQUEST['mod'])){
                        $mod = $_REQUEST['mod'];
                        $criterion = "menu_variable = '$mod'";
                        $menu = $daoMenu->getMenu($criterion)[0];
                        $file = $menu['menu_file'];
                        include "$file";
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="system/html/dist/js/bootstrap.min.js"></script>
    </body>
</html>


