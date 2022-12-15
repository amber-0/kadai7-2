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
$sql = "SELECT * FROM ichimi_data_table WHERE id=:id";
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
  // データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();
}

?>



<!------------------- ここからhtml ------------------->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/reset.css">
    <!-- <link rel="stylesheet" href="css/touroku.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>一味くん</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="ichimi.php">
          <img src="img/icon_red_pepper.svg" width="50" height="30" class="d-inline-block align-top" alt="">
          一味くん
        </a>
        <button class="d-flex btn btn-outline-danger all_delete" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >全削除する</button>
        <!-- <button class="d-flex btn btn-outline-danger modal-open" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">登録する</button> -->
      </div>
    </nav>
</header>

    <main>

    <!-- 入力フォーム -->
    <!-- 画像（ドロップするやつ）、名前、種類、容器、容量、辛さ評価（☆5つ）、レビュー -->
    <div>
      <h1 class="mt-5 ms-5 text-danger">どれだけ辛いか教えてくれないか？</h1>
      <div class="container">
        <!-- PHPに飛ばすためのform -->
        <form method="post" action="update.php" class="row mt-5 col-lg-8 form">
          <div class="col-md-4">
            <label for="inputEmail4" class="form-label">名前</label>
            <!-- PHPに飛ばすnameデータ(name) -->
            <input name="name" type="text" class="form-control" id="touroku_name" value="<?=$row["name"]?>">
          </div>
          <div class="col-md-3">
            <label for="inputZip" class="form-label">評価</label>
            <!-- PHPに飛ばすevalデータ(nameとvalue) -->
            <select name="eval" id="inputState" class="form-select" id="touroku_hyoka" value="<?=$row["eval"]?>">
              <option selected>選択...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">容器</label>
            <!-- PHPに飛ばすcontainerデータ(nameとvalue) -->
            <select name="container" id="inputState" class="form-select" id="touroku_youki" value="<?=$row["container"]?>">
              <option selected>選択...</option>
              <option value="瓶">瓶</option>
              <option value="個包装">個包装</option>
              <option value="袋">袋</option>
              <option value="その他">その他</option>
            </select>
          </div>
          <div class="col-md-4 mt-3">
            <label for="inputCity" class="form-label">販売元</label>
            <!-- PHPに飛ばすsellerデータ(name) -->
            <input name="seller" type="text" class="form-control" id="touroku_hanbai" value="<?=$row["seller"]?>">
          </div>
          <div class="col-md-4 mt-3">
            <label for="inputCity" class="form-label">容量</label>
            <!-- PHPに飛ばすquantityデータ(name) -->
            <input name="quantity" type="text" class="form-control" id="touroku_ryou" value="<?=$row["quantity"]?>">
          </div>
          <div class="col-11 mt-3">
            <label for="inputAddress" class="form-label">レビュー</label>
            <!-- PHPに飛ばすreviewデータ(name) -->
            <input name="review" type="text" class="form-control" id="touroku_review" placeholder="辛いかい？感想を教えてくれよ！" value="<?=$row["review"]?>">
          </div>
          <div class="col-11 mt-5">
            <input type="hidden" name="id" value="<?=$row["id"]?>">
            <button type="submit" class="btn btn-outline-danger" id="touroku">
              登録
            </button>
          </div>
        </form>
      </div>
    </div>
    
    </main>
    <footer class="bg-danger text-center text-light p-3 mt-5 fixed-bottom">
      © 2022 Gino Inc All rights reserved.
    </footer>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>