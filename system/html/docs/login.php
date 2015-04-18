<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= APP_TITLE ?></title>

    <!-- Bootstrap core CSS -->
    <link href="system/html/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="system/html/dist/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
        <form class="form-signin" action="index.php" method="post">
        <h2 class="form-signin-heading"><?= MSN_LOGIN ?></h2>
        <label for="txt_email" class="sr-only"><?= EMAIL_ADDRESS ?></label>
        <input type="email" id="txt_email" name= "txt_email" class="form-control" maxlength="20" placeholder="<?= EMAIL_ADDRESS ?>" required autofocus>
        <label for="txt_pass" class="sr-only"><?= PASSWORD ?></label>
        <input type="password" id="txt_pass" name="txt_pass" class="form-control" maxlength="20" placeholder="<?= PASSWORD ?>" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> <?= MSN_REMEMBER_ME ?>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><?= SIGN_IN ?></button>
      </form>
    </div>
  </body>
</html>
