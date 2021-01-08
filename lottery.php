<?php
    // maxのid (つまり、一番最後に追加されたidの値) を取得して、抽選する
    
    // 1. DBに接続
    try {
        //Password:MAMP='root',XAMPP=''
        $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','root');
      } catch (PDOException $e) {
        exit('DBConnectError'.$e->getMessage());
      }
      
    // 2. maxのidを取得する
    $id_max = intval($pdo->query("SELECT max(id) FROM gs_bm_table")->fetchColumn());
    // echo $id_max;
    
    // 3. ランダムなidを選択する
    $rand = rand(1, $id_max);
    // echo $rand;
    
    // 乱数用配列 
    // $rands = [];
    // 乱数の範囲は1～
    // $min = 1;
     
    // for($i = $min; $i <= $id_max; $i++){
    //   while(true){
    //     $tmp = mt_rand($min, $id_max);
    //     if( ! in_array( $tmp, $rands ) ){
    //       array_push( $rands, $tmp );
    //       break;
    //     } 
    //   }
    // }
    // echo implode( ',', $rands );