<?php










// エスケープ処理をする関数   エスケープ処理機能kinou
// $str: エスケープしたい文字
// return: エスケープした文字
function h($str) 
{
return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>