<?php
// 作成したdb_connect.phpを読み込む
$pdo = db_connect();

// 実行したいSQL文を準備
// 今回はusersテーブルにレコードを追加
$sql = "INSERT INTO users (name, password) VALUES ('Taro Yamada', 'taro')"; 

// 関数db_connect()からPDOを取得する
$pdo = db_connect();

try {
    $stmt = $pdo->prepare($sql); 
    $stmt->execute();
    echo 'インサートしました。';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage(); 
    die();
}
?>