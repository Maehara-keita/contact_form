<?php
//●スーパーグローバル変数
	//PHPが元々用意している変数


    //function.phpを読み込んで、
    //定義した関数を使えるようにする。
    require_once('function.php');


    //送信されてきた値を取得
    //VSS(クロスサイトスクリプティング)の対策もする。
    //エスケープ処理: htmlspecialchars(対象の文字 ,   オプション,   文字コード；)

$username = h ($_POST['username']);
  $email = h ($_POST['email']);
 $content =h ($_POST['content']);

//ユーザー名が空かチェック
if ($username == ''){
    $usernameResult = 'ユーザー名が入力されていません';

}else{
    $usernameResult = $username;
}

if ($email == ''){
    $emailResult = 'メールアドレスが入力されていません';

}else{
    $emailResult = $email;
}

if ($content == ''){
    $contentResult = '内容が入力されていません';

}else{
    $contentResult = $content;
}



//このページがURLなどからきてしまった場合に、最初のページに帰ってもらう処理
//１。送信方法の確認（POST　or GET）
//2.GET送信の場合、入力画面に戻す。　　POSTの値が無い為
//


if($_SERVER['REQUEST_METHOD'] == 'GET'){
//このページを表示する際の送信がGETの場合、
//index.htmlに偏移する
header('Location: index.html');

}






?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>入力内容確認</title>
</head>


<body>
<div id = 'head'>
<h1>入力内容確認</h1>

<p>名前 : <?php echo $usernameResult; ?> </p>
<p>メールアドレス : <?php echo $emailResult; ?> </p>
<p>内容 : <?php echo $contentResult; ?> </p>


<form action = 'thanks.php' method = 'POST'>
    <input type = 'hidden' name ='username' value = '<?php echo $usernameResult ?>'>
    <input type = 'hidden' name ='email' value = '<?php echo $emailResult ?>'>
    <input type = 'hidden' name ='content' value = '<?php echo $contentResult?>'>




    <button type='button' onclick= "history.back();">戻る</button>
    <input type = 'submit' value = 'OK'>
</form>
</div>
    
<script src="index.js"></script>
</body>
</html>

