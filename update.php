<?php
// 1.POSTデータを取得
$id = $_POST["id"];
$name = $_POST["name"];
$eval = $_POST["eval"];
$container = $_POST["container"];
$seller = $_POST["seller"];
$quantity = $_POST["quantity"];
$review = $_POST["review"];

// 2.DB接続など
try{
  $pdo = new PDO('mysql:dbname=ichimi_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('データベースに接続できませんでした'.$e->getMessage());
}

// 3.UPDATEで更新
$sql = 'UPDATE ichimi_data_table SET name=:name,eval=:eval,container=:container,seller=:seller,quantity=:quantity,review=:review WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',$name,PDO::PARAM_STR);
$stmt->bindValue(':eval',$eval,PDO::PARAM_INT);
$stmt->bindValue(':container',$container,PDO::PARAM_STR);
$stmt->bindValue(':seller',$seller,PDO::PARAM_STR);
$stmt->bindValue(':quantity',$quantity,PDO::PARAM_STR);
$stmt->bindValue(':review',$review,PDO::PARAM_STR);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if($status==false){
  // SQL実行時にエラーがある場合(エラーオブジェクト取得して表示)
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  // touroku.htmlへリダイレクト(Location:とファイル名の間は必ず半角空ける)
  header("Location: ichimi.php");
  exit;
}
?>

