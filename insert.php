<?php
    $first = $_POST['first'];
    $second = $_POST['second'];
    $third = $_POST['third'];
    $comment = $_POST['comment'];
    $favorite = $_POST['favorite'];
    $url = $_POST['url'];
    $post = $_POST['post'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $tel = $_POST['tel'];
    $name = $_POST['name'];
    $age = $_POST['age'];



//DB接続
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//データ登録SQL作成

// SQL文を用意
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, first, second, third, comment, favorite, 
url, post, address1, address2, tel, name, age, indate)VALUES(NULL, :first, :second, :third, :comment, 
:favorite, :url, :post, :address1, :address2, :tel, :name, :age, sysdate())");
// :nameと一旦置くことでハッキングリスクを低減
// ↓
// :nameの中にはこれを入れますよと指定。バインド変数で
//  2. バインド変数を用意
$stmt->bindValue(':first', $first, PDO::PARAM_STR);
$stmt->bindValue(':second', $second, PDO::PARAM_STR);
$stmt->bindValue(':third', $third, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':favorite', $favorite, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':post', $post, PDO::PARAM_STR);
$stmt->bindValue(':address1', $address1, PDO::PARAM_STR);
$stmt->bindValue(':address2', $address2, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);

//  実行
$status = $stmt->execute();

//データ登録処理後
if($status == false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  
  //index.phpで送信ボタンを押したらresult.phpに飛ぶように設定する
  header('Location: result.php');
}
?>
