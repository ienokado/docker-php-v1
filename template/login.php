<!DOCTYPE html>
<html lang="ja">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ログイン</title>
    <meta name="description" content="ログイン画面のサンプル">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="text-center">
    
    <?php require_once('./template/header.php'); ?>

    <form class="form-signin" action="/login" method="post">
        <input type="hidden" name="login" value="login">
        <h1 class="h3 mb-3 font-weight-normal">ログイン</h1>
        
        <label for="login-email" class="sr-only">Eメール</label>
        <input type="email" name="email" id="login-email" class="form-control mt-5 mb-3" placeholder="Eメール" required="required" autofocus="">
        <label for="login-password" class="sr-only">パスワード</label>
        <input type="password" name="password" id="login-password" class="form-control" placeholder="パスワード" required="required">

        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $error_message ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else if (isset($_GET['session_error']) && $_GET['session_error'] == ENABLED) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                システムエラーが発生しました。<br>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <? } ?>

        <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        <p class="mt-5 mb-3 text-muted">© 2019</p>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>