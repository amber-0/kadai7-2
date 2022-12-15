<?php
// 1.GETでid値を取得
$id = $_GET["id"];

// 2.DB接続など
try{
  $pdo = new PDO('mysql:dbname=ichimi_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('データベースに接続できませんでした'.$e->getMessage());
}

// 3.SELECT文
$sql = "DELETE FROM ichimi_data_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

// 4.データ表示
$view="";
if($status==false){
  // execute(SQL実行時にエラーがある場合)
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  // ichimi.phpへリダイレクト(Location:とファイル名の間は必ず半角空ける)
  header("Location: ichimi.php");
  exit;
}







?>