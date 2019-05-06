<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = connect();

        $table = 'user';

        $where = 'email = :email AND active = :active';

        $params = [
            'email' => $_POST['email'],
            'active' => ENABLED,
        ];

        if (isset($_POST['id']) && !is_null($_POST['id'])) {
            $where .= ' AND id != :id';
            $params['id'] = $_POST['id'];
        }

        $user = selectOne($pdo, '*', $table, $where, $params);

        if ($user) {
            $error_message = '既に登録されているメールアドレスです。';
        } else {
            if (!is_null($_POST['id'])) {
                // 編集
                $where = 'id = :id AND active = :active';

                $params = [
                    'id' => $_POST['id'],
                    'active' => ENABLED,
                ];

                $user = selectOne($pdo, '*', $table, $where, $params);

                if (!isset($user) && !is_array($user)) {
                    $_SESSION = [];
                    // セッションクリア
                    @session_destroy();
                    // TOP画面へ遷移
                    header("Location: /login?session_error=1");
                }

                // パスワードが編集されていない場合
                $name = $_POST['name'];
                $user_name = $_POST['user_name'];
                $email = $_POST['email'];
                $memo = $_POST['memo'];

                $values = [
                    'name' => $name ? "'$name'" : "null",
                    'user_name' => $user_name ? "'$user_name'" : "null",
                    'email' => $email ? "'$email'" : "null",
                    'memo' => $memo ? "'$memo'" : "null",
                    'updated_at' => 'CURRENT_TIMESTAMP'
                ];

                if ($_POST['password'] !== '********') {
                    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $values['password'] = $hash;
                }

                $where = 'id = :id AND active =: active';
                $where_params = [
                    'id' => $_POST['id'],
                    'active' => ENABLED,
                ];

                upsert($pdo, $table, $values, $where, $where_params);

                header('Location: /user?message_flg=1', true, 301);
            // 新規登録
            } else {
                // パスワードをハッシュ化
                $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $name = $_POST['name'];
                $user_name = $_POST['user_name'];
                $email = $_POST['email'];
                $memo = $_POST['memo'];

                $values = [
                    'name' => $name ? "'$name'" : "null",
                    'user_name' => $user_name ? "'$user_name'" : "null",
                    'email' => $email ? "'$email'" : "null",
                    'password' => "'$hash'",
                    'memo' => $memo ? "'$memo'" : "null",
                    'active' => ENABLED,
                    'created_at' => 'CURRENT_TIMESTAMP',
                    'updated_at' => 'CURRENT_TIMESTAMP'
                ];

                upsert($pdo, $table, $values);

                header('Location: /user?message_flg=1', true, 301);
            }
        }
    }

    if ($user) {
        // 既登録パスワード置き換え用
        $user['password'] = '********';
        $password_confirm = '********';
    }