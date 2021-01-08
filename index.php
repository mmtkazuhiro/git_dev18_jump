<?php


// プルダウンを作る方法 その1
// 1_1ここから
$best = [
        '選択してください'=>'選択してください',
        'アンデッドアンラック'=>'アンデッドアンラック',
        'Dr.STONE'=>'Dr.STONE',
        '高校生家族'=>'高校生家族',
        '森林王者モリキング'=>'森林王者モリキング',
        'ぼくらの血盟'=>'ぼくらの血盟',
        'あやかしトライアングル'=>'あやかしトライアングル',
        'ぼくたちは勉強ができない'=>'ぼくたちは勉強ができない',
        '僕とロボコ'=>'僕とロボコ',
        '夜桜さんちの大作戦'=>'夜桜さんちの大作戦',
        '呪術廻戦'=>'呪術廻戦',
        'h僕のヒーローアカデミアero'=>'僕のヒーローアカデミア',
        'AGRAVITY BOYS'=>'AGRAVITY BOYS',
        'ONE PIECE'=>'ONE PIECE',
        'ブラッククローバー'=>'ブラッククローバー',
        '灼熱のニライカナイ'=>'灼熱のニライカナイ',
        'チェンソーマン'=>'チェンソーマン',
        '仄見える少年'=>'仄見える少年',
        '破壊神マグちゃん'=>'破壊神マグちゃん',
        '表紙'=>'表紙'
];

foreach($best as $best_key => $best_val){
  $best .= "<option value='". $best_key;
  $best .= "'>". $best_val. "</option>";
}
// 1_1ここまでを準備する

$errors = array();

if(isset($_POST['submit']) && $_POST['submit'] === "ログイン"){

    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    if($mail === ""){
        $errors['mail'] = "メールアドレスが入力されていません。";
    }
    
    if($password === ""){
        $errors['password'] = "パスワードが入力されていません。";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/index.css" rel="stylesheet">
    <title>週刊少年ジャンプ 読者アンケート</title>
</head>

<body>

<form method="post" action="insert.php" name="jump">
  
    <div class="title">週刊少年ジャンプ 読者アンケート</div>
    <br><br>
    
      <table>
        <tr>
          <th>一番目に面白かった<br>マンガのタイトルは？ </th>
            <td><select name="first" id="fisrt">
                <!-- 1_2 1_1の$bestをここに書く -->
                <?= $best; ?>
            </select></td>
        </tr>

        <!-- プルダウンを作る方法 その2 -->
        <!-- 2_1 普通にoptionタグで作成する -->
         <tr>
          <th>二番目に面白かった<br>マンガのタイトルは？</th>
          <td><select name="second" id="second">
              <option value='選択してください'>選択してください</option>
              <option value='アンデッドアンラック'>アンデッドアンラック</option>
              <option value='Dr.STONE'>Dr.STONE</option>
              <option value='高校生家族'>高校生家族</option>
              <option value='森林王者モリキング'>森林王者モリキング</option>
              <option value='ぼくらの血盟'>ぼくらの血盟</option>
              <option value='あやかしトライアングル'>あやかしトライアングル</option>
              <option value='ぼくたちは勉強ができない'>ぼくたちは勉強ができない</option>
              <option value='僕とロボコ'>僕とロボコ</option>
              <option value='夜桜さんちの大作戦'>夜桜さんちの大作戦</option>
              <option value='呪術廻戦'>呪術廻戦</option>
              <option value='僕のヒーローアカデミア'>僕のヒーローアカデミア</option>
              <option value='AGRAVITY BOYS'>AGRAVITY BOYS</option>
              <option value='ONE PIECE'>ONE PIECE</option>
              <option value='ブラッククローバー'>ブラッククローバー</option>
              <option value='灼熱のニライカナイ'>灼熱のニライカナイ</option>
              <option value='チェンソーマン'>チェンソーマン</option>
              <option value='仄見える少年'>仄見える少年</option>
              <option value='破壊神マグちゃん'>破壊神マグちゃん</option>
              <option value='表紙'>表紙</option>     
            </select></td>
        </tr> 

        <tr>
          <th>三番目に面白かった<br>マンガのタイトルは？</th>
          <td><select name="third" id="third">
                <?php echo $best; ?>
            </select></td>
        </tr>

        <tr>
          <th>今回の感想</th>
          <td><textArea name="comment" id="comment" placeholder="例: 〇〇が面白かった。 / ××が残念だった。"></textArea></td>
        </tr>

        <tr>
          <th>今おすすめのマンガを<br>教えてください</th>
          <td><input type="text" name="favorite" id="favorite" placeholder="例: ONE PIECE"></td>
        </tr>

        <tr>
          <th>そのおすすめのマンガの<br>URLもあれば教えてください</th>
          <td><input type="text" name="url" id="url" placeholder="例: http://www.○○○.html"></td>
        </tr>

        <tr>
          <th>住所</th>
          <!-- 郵便番号を入力すれば住所1に自動的に住所が入力されるようにする -->
          <!-- 手順1  onKeyUp="AjaxZip3.zip2addr('post', '', 'address1', 'address1'); を追加する-->
          <!-- 手順2  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script> を最後に追加する--> 
          <td><p><input type="text" name="post" id="post" placeholder="郵便番号" onKeyUp="AjaxZip3.zip2addr('post', '', 'address1', 'address1');"></p>
          <input type="text" name="address1" id="address1" placeholder="住所1 (自動で入力されます)" style="width:300px; height:50px;font-size:20px;">
          <input type="text" name="address2" id="address2" placeholder="住所2 (住所1の続きを入力してください)" style="width:500px;height:50px;font-size:20px;">
          </td>
        </tr>

        <tr>
          <th>電話番号もしくは携帯電話番号</th>
          <td><input type="text" name="tel" id="tel" placeholder="例: 012-3456-7890"></td>
        </tr>

        <tr>
          <th>氏名</th>
          <td><input type="text" name="name" id="name" placeholder="例: 集英太郎"></td>
        </tr>
        
        <tr>
          <th>年齢</th>
          <td><input type="text" name="age" id="age" placeholder="例: 15"></td>
        </tr>

  </table>
 
  <br>
  <div class="lottery">今週のプレゼントは「Nintendo Switch」を1名様に</div>
  <br>

  <div class="operation">
    <div class="send"><input type="submit" value="送信して抽選に応募する" class="button"></div>
    <br>
    <div class="outbtn">
    <div class="btn"><a href='result.php' class="look">送信せずに結果だけ見る</a></div></div>
  </div>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="js/index.js"></script>

</body>
</html>