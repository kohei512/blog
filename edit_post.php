<?php
// db_connect.phpの読み込み 
require_once('db_connect.php');
// function.phpの読み込み 
require_once('function.php');
// ログインしていなければ、login.phpにリダイレクト 
check_user_logged_in();
// URLの?以降で渡されるIDをキャッチ
$id = $_GET['id'];
// もし、$idが空であったらmain.phpにリダイレクト 
redirect_main_unless_parameter($id);

$row = find_post_by_id($id); 
// 関数から取得した値を格納 
$id = $row['id'];
$title = $row['title'];
$content = $row['content'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>記事編集</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head> 
<body>
    <h1>記事編集</h1>
    <form method="POST" action="edit_done_post.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>" >
        title:<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;" value="<?php echo $title;?>"><br>
        content:<br>
        <input type="text" name="content" id="content" style="width:200px;height:100px;" value="<?php echo $content; ?>"><br>
        <input type="submit" value="submit" id="edit" name="edit"> 
    </form>
</body> 
</html>