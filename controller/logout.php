<?php
$_SESSION = [];

// セッションクリア
@session_destroy();

// TOP画面へ遷移
header("Location: /");