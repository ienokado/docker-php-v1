<?php

// 設定ファイルの読み込み
require_once('./setting/const.php');
require_once('./setting/db_config.php');
require_once('./setting/routing.php');
require_once('./model/db.php');

session_start();

// 表示する画面の決定
if (isset($routing[$_SERVER["REDIRECT_URL"]])) {
    require_once('./controller/'. $routing[$_SERVER["REDIRECT_URL"]]);
    require_once('./template/'. $routing[$_SERVER["REDIRECT_URL"]]);
} else {
    // TODO:URLの指定が存在しないルーティングの場合
}