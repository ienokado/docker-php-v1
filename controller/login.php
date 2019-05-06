<?php
// ログインボタンが押された場合
if (isset($_POST["login"])) {

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        // 入力したユーザIDを格納
        $email = $_POST["email"];

        // 2. ユーザIDとパスワードが入力されていたら認証する

        // 3. エラー処理
        $pdo = connect();

        $where = 'email = :email AND active = :active';

        $params = [
            'email' => $email,
            'active' => ENABLED,
        ];

        $user = selectOne($pdo, '*', 'user', $where, $params);

        $password = $_POST["password"];

        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_regenerate_id(true);

                // 入力したIDをセッションに保存
                $_SESSION['SESSIONID'] = session_id();
                $_SESSION['USERID'] = $user['id'];

                // TOP画面へ遷移
                header("Location: /");
            } else {
                // 認証失敗
                $error_message = 'Eメールアドレスあるいはパスワードに誤りがあります。';
            }
        } else {
            // 該当データなし
            $error_message = 'Eメールアドレスあるいはパスワードに誤りがあります。';
        }
    }
}