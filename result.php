<?php

require_once('lottery.php');

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // 変数$viewの中に追加するのが'.='
    // 追加するのが.=で上書きするのが=というイメージ

    // echo '<pre>';
    // var_dump ($result);
    // echo '</pre>';

/*これを$viewに組み込もうとしても結局置換できない文字列も表示されてしまうので中止→直接valueにタイトルを打った
    $undead1 = str_replace('undead', 'アンデッドアンラック', $result['first']);
    $stone1 = str_replace('stone', 'Dr.STONE', $result['first']);
    $high1 = str_replace('high', '高校生家族', $result['first']);
    $forest1 = str_replace('forest', '森林王者モリキング', $result['first']);
    $our1 = str_replace('our', 'ぼくらの血盟', $result['first']);
    $triangle1 = str_replace('triangle', 'あやかしトライアングル', $result['first']);
    $cannot1 = str_replace('cannot', 'ぼくたちは勉強ができない', $result['first']);
    $robot1 = str_replace('robot', '僕とロボコ', $result['first']);
    $night1 = str_replace('night', '夜桜さんちの大作戦', $result['first']);
    $jujutu1 = str_replace('jujutu', '呪術廻戦', $result['first']);
    $hero1 = str_replace('hero', '僕のヒーローアカデミア', $result['first']);
    $agravity1 = str_replace('agravity', 'AGRAVITY BOYS', $result['first']);
    $one1 = str_replace('one', 'ONE PIECE', $result['first']);
    $black1 = str_replace('black', 'ブラッククローバー', $result['first']);
    $heat1 = str_replace('heat', '灼熱のニライカナイ', $result['first']);
    $man1 = str_replace('man', 'チェンソーマン', $result['first']);
    $boy1 = str_replace('boy', '仄見える少年', $result['first']);
    $magu1 = str_replace('magu', '破壊神マグちゃん', $result['first']);
    $cover1 = str_replace('cover', '表紙', $result['first']);
  */


   
    $view1 .= '<table class="table" border=1>' .'<tr class="tr">'.
    '<th id="id">'. h($result['id']) .' </th> '.
    '<th id="first">'.h($result['first']) .' </th> '.
    '<th id="second">'.h($result['second']) . ' </th> ' . 
    '<th id="third">'.h($result['third']) . ' </th> '. 
    '<th id="comment">'.h($result['comment']) . ' </th> ' . 
    '<th id="favorite">'.h($result['favorite']) . ' </th> ' . 
    '<th id="url">'.h($result['url']) . ' </th> ' . 
    '<th id="post">'.h($result['post']) . ' </th> ' . 
    '<th id="address1">'.h($result['address1']) . ' </th> ' . 
    '<th id="address2">'.h($result['address2']) . ' </th> ' . 
    '<th id="tel">'.h($result['tel']) . ' </th> ' .
    '<th id="name">'.h($result['name']) . ' </th> ' .
    '<th id="age">'.h($result['age']) . ' </th> ' .
    '<th id="indate">'.h($result['indate']) .'</th>'. '</tr>'.
      '</table>';

  }
}

if(!empty($_POST)){  
  if(!$_POST['favorite']){
  $error_message[] = 'おすすめのマンガを入力してください。';
}
}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>週刊少年ジャンプ 読者アンケート結果</title>
<style>



  #first, #second, #third, #comment, #favorite, #url, #post, #address1, #address2, #tel, #name{
    width:200px;
    word-break : break-all;
  }

  table{
    border-collapse: collapse;
    table-layout: fixed;
    width:2500px;
  }

  #id, #age{
    width:130px;
  }

  #indate{
    width:250px;
  }

  .kuji{
    display: flex;
    font-size:25px;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
    width: 170px;
    margin-left: auto;
    margin-right: auto;
    background-color: rgb(54, 238, 159);
  }

  .return{
    background-color: rgb(118, 166, 181);
    color: #fff;
    border-style: none;
    width: 300px;
    height: 50px;
    font-size: 20px;
    text-align: center;
    cursor: pointer;
    cursor: hand;
}

.btn{
    padding-top: 20px;
    text-align: center;
}

.outkuji{
    display: flex;
    justify-content: center;
  align-items: center;
}

.start{
  margin-right: auto;
  margin-left: auto;
  font-size: 25px;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 10px;
  background-color: rgb(54, 238, 159);
  cursor: pointer;
  cursor: hand;
}




</style>
</head>
<body>

<br><br>
      <div class="btn"><button onclick="location.href='index.php'" class="return">アンケート回答画面に戻る</button></div>
      <br><br>
      
    <div class="outkuji">
      <div class="kuji">
        <div class="num">当選番号：</div>
        <div id="lottery"><?= $rand; ?></div>
      </div>
      <br>

      <div class="start">抽選開始</div>
      </div>

    <div id="view1"><?= $view1; ?></div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/result.js"></script>
</body>
</html>
