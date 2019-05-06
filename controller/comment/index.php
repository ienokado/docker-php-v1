<?php
    if (!is_null($_POST['message'])) {
        $pdo = connect();

        $table = 'comment';
        $message = $_POST['message'];

        $values = [
            'user_id' => $_SESSION['USERID'],
            'message' => "'$message'",
            'active' => ENABLED,
            'created_at' => "CURRENT_TIMESTAMP",
            'updated_at' => "CURRENT_TIMESTAMP"
        ];

        upsert($pdo, 'comment', $values);

        header('Location: /?message_flg=1', true, 301);
    } else {
        // TODO:メッセージ入力なしでPOSTされた場合
    }