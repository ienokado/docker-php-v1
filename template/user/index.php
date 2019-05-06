<!DOCTYPE html>
<html lang="ja">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>チャットアプリ</title>
    <meta name="description" content="チャットアプリのサンプル">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

    <?php require_once('./template/header.php'); ?>

    <div class="container">

        <?php if (isset($_GET['message_flg']) && $_GET['message_flg'] == ENABLED) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php if (isset($_SESSION['USERID']) && isset($_SESSION['SESSIONID']) && $_SESSION['SESSIONID'] === session_id()) { ?>
                    編集しました。
                <?php } else { ?>
                    登録しました。
                <?php } ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <? } ?>

        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $error_message ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <? } ?>

        <form id="form1" name="form1" method="post" action="/user">
            <?php if (isset($user['id']) && !is_null($user['id'])) { ?>
                <input type="hidden" name="id" id="form-id" value="<?= $user['id'] ?>">
            <?php } ?>
            <div class="form-group row">
                <label for="form-name" class="col-sm-2 col-form-label">名前</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="form-name" class="form-control" value="<?= $user['name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="form-user_name" class="col-sm-2 col-form-label">ニックネーム</label>
                <div class="col-sm-10">
                    <input type="text" name="user_name" id="form-user_name" class="form-control" value="<?= $user['user_name'] ?>" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="form-email" class="col-sm-2 col-form-label">Eメールアドレス</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="form-email" class="form-control" value="<?= $user['email'] ?>" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="form-password" class="col-sm-2 col-form-label">パスワード</label>
                <div class="col-sm-10">
                    <input type="password" name="password" id="form-password" class="form-control" value="<?= $user['password'] ?>" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="form-password_confirm" class="col-sm-2 col-form-label">パスワード（確認）</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirm" id="form-password_confirm" class="form-control" value="<?= $password_confirm ?>" required="required">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">登録</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>