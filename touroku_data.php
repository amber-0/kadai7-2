<?php
// 入力チェック(値が空なら処理を終了)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["eval"]) || $_POST["eval"]=="" ||
  !isset($_POST["container"]) || $_POST["container"]=="" ||
  !isset($_POST["seller"]) || $_POST["seller"]=="" ||
  !isset($_POST["quantity"]) || $_POST["quantity"]=="" ||
  !isset($_POST["review"]) || $_POST["review"]==""  
){
  exit('ParamError');
}

// 1.POSTデータを取得
$name = $_POST["name"];
$eval = $_POST["eval"];
$container = $_POST["container"];
$seller = $_POST["seller"];
$quantity = $_POST["quantity"];
$review = $_POST["review"];

// 2.DB接続(ここはコピペでよい)
// PDOを使用
try{
  $pdo=new PDO('mysql:dbname=ichimi_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// 3.データ登録SQL作成
$sql = "INSERT INTO ichimi_data_table(id, name, eval, container, seller, quantity, review)
VALUES(NULL, :a1, :a2, :a3, :a4, :a5, :a6)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $eval, PDO::PARAM_INT);
$stmt->bindValue(':a3', $container, PDO::PARAM_STR);
$stmt->bindValue(':a4', $seller, PDO::PARAM_STR);
$stmt->bindValue(':a5', $quantity, PDO::PARAM_STR);
$stmt->bindValue(':a6', $review, PDO::PARAM_STR);
$status = $stmt->execute();

// 4.データ登録処理後
if($status==false){
  // SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  // 5.touroku.htmlへリダイレクト(Location:とファイル名の間は必ず半角空ける)
  header("Location: ichimi.php");
  exit;
}
?>
