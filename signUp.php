<?php
// db_connect.phpの読み込み
require_once('db_connect.php');

// POSTで送られたデータがあった場合 
if (isset($_POST["signUp"])) {
    // nameとpasswordが空でなければ
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        // 入力したユーザIDとパスワードを格納 
        $name = $_POST["name"];
        $password = $_POST["password"];
        $password_hash = password_hash($password, PASSWORD_DEFAULT); 
        
        // PDOインスタンスを取得 
        $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        try {
            // ユーザー名とパスワードをusersテーブルに保存するSQL文 
            $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
            // プリペアドステートメントを準備
            $stmt = $pdo->prepare($sql);
            // nameをバインド
            $stmt->bindParam(':name', $name);
            // passwordをバインド
            $stmt->bindParam(':password', $password_hash);
            // 実行
            $stmt->execute();
            // 登録完了メッセージ
            echo "登録が完了しました。";
        } catch (PDOException $e) { 
            // エラーメッセージの出力 
            echo "データベースエラー" . $e->getMessage(); 
            // 終了
            die();
        }
    }
}
?>

<!DOCTYPE html> 
<html>
    <head>
    <title>新規登録ページ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <form action="" method="POST">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" name="signUp" id="signUp" value="submit">
    </form>
</body>
</html>