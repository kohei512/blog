<?php
// DB名
define('DB_DATABASE', 'PHPBlog');
// MySQLのユーザー名
define('DB_USERNAME', 'root');
// MySQLのログインパスワード
define('DB_PASSWORD', 'root');
// DSN
define('PDO_DSN', 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE); 

/**
* DBの接続設定をしたPDOインスタンスを返却する
* @return object
*/
function db_connect() { 
    try {
        // PDOインスタンスの作成
        $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        // エラー処理方法の設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $pdo;
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage(); 
        die();
    } 
}

?>