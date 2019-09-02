<?php
//設計図をかく⇨　システムエンジニアがメインで設計をして、プログラマーが書き込んで作り上げる。

//この画面での機能：名前が一致するデータの一覧表示
//[プロセス]
//１。必要なファイルの読み込み
//２。入力された名前でデータベース検索
//3.検索結果を画面に表示する




//1.必要なファイルの読み込み
require_once('function.php');
require_once('dbconnect.php');

$username = '';
//名前が入力されているかチェック
if(isset($_GET['username'])){
//送信された名前を取得
    $username = $_GET['username'];
}

//GET送信された名前を取得
// $username = $_GET['username'];

//2. 入力された名前でデータベース検索　　＊　SQL文で検索を書き込む
//SQL文で　SELECT * FROM surveys  WHERE username = "ユーザー名"　を書いて検索
// ●実行するSQLの準備●
$stmt = $dbh->prepare('SELECT * FROM surveys WHERE username = ?');

//3.SQLを実行する
$stmt -> execute([$username]);

//取得した一覧を変数に格納
$results = $stmt-> fetchAll();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>検索画面</title>
</head>
<body>
    <h1>検索画面</h1>
<form action='' method='GET'> <!--action= '' 空欄の場合、自分自身に送信　-->
    <p>検索したい名前を入れてください</p>
    <input type= 'text' name = 'username'>
    <input type="submit" value="検索">
</form>

<h2>検索結果</h2>
<?php foreach ($results as $result) { ?>
  <p>名前：<?php  echo h($result['username'])?></p>
  <p>メールアドレス：<?php  echo h($result['email'])?></p>
  <p>内容：<?= h($result['content'])?></p>
  <hr>
<?php } ?> 

</body>
</html>