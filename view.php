<?php
//目的：画面にお問い合わせの一覧を出すGOAL　　　ここまで逆算思考を大切にしよう！！
//Process
//1.必要な部品を読み込む（functions.php ,　dbconnect.php ）
//2.画面に出力する物を取得する（SELECT文）
//3.取得したデータを画面に表示。


//1.


require_once('function.php');
require_once('dbconnect.php');


//2.
    //SELECT文を準備　　⇨　準備したものを実行。
$stmt = $dbh -> prepare('SELECT * FROM surveys');
$stmt-> execute();
//取得した一覧を変数に格納
$results = $stmt -> fetchAll();



?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせ一覧</title>
</head>
<body>
<h1>一覧</h1>
    
<?php foreach($results as $result){ ?>
    <p>名前：<?php echo h($result['username']); ?></p>
    <p>メールアドレス：<?php echo h($result['email']); ?></p>
    <p>内容：<?php echo h($result['content']); ?> </p>

    <hr>
 <?php } ?>






</body>
</html>