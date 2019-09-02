
<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //このページを表示する際の送信がGETの場合、
    //index.htmlに偏移する
    header('Location: index.html');
    
}


//１。function.phpを読み込む
require_once('function.php');
require_once('dbconnect.php');


//２。$_POSTから送信された値を取得

$username = h ($_POST['username']);
$email = h ($_POST['email']);
$content =h ($_POST['content']);

//３。（エスケープ処理をする）


//４。値を画面に表示する。


//受け取った値を元にデータベースに登録
$stmt = $dbh->prepare('INSERT INTO surveys (username, email, content, created_at) VALUES(?,?,?, now())');
// //SQLを実行

$stmt -> execute([$username,$email,$content]);




//　？　：　SQLインジェクションの対策

?>












<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>送信完了</title>
</head>
<body>
<div id = 'head'>
    <h1>お問い合わせありがとうございました</h1>
    <p>名前：<?php echo $username ?></p>
    <p>メールアドレス：<?php echo $email ?></p>    
    <p>お問い合わせ内容：<?php echo $content ?></p>    
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　


</div>
<script src = 'index.js'></script>
</body>
</html>