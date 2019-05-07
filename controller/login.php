<?php
// ログインボタンが押された場合
if (isset($_POST["login"])) {

    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        // 入力したユーザIDを格納
        $email = $_POST["email"];

        $pdo = connect();

        $where = 'email = :email AND active = :active';

        $params = [
            'email' => $email,
            'active' => ENABLED,
        ];
        
        // メールアドレスからデータを取得
        $user = selectOne($pdo, '*', 'user', $where, $params);

        $password = $_POST["password"];

        if ($user) {
            // 入力されたパスワードが正しいかチェックする
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
            // 
            $error_message = 'Eメールアドレスあるいはパスワードに誤りがあります。';
        }
    }
}
