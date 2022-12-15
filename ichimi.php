<!------------ PHPを記述 ------------->
<?php
// 1.DBに接続
try{
  $pdo = new PDO('mysql:dbname=ichimi_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
  exit('データベースに接続できませんでした'.$e->getMessage());
}

// 2.データ登録SQL作成
$stmt = $pdo->prepare("SELECT *FROM ichimi_data_table");
$status = $stmt->execute();

// 3.データ表示
$view="";
if($status==false){
  // execute(SQL実行時にエラーがある場合)
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  // SELECTデータの数だけ自動でループしてくれる
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // $view .= "<p>".$result["name"]."</p>";
    $view .= "<p>";
    $view .= '<a href="u_view.php?id='.$result["id"].'">';
    $view .= $result["name"]." : ".$result["eval"]." : ".
              $result["container"]." : ".$result["seller"]." : ".
              $result["quantity"]." : ".$result["review"];
    $view .= '</a>';
    // 削除ボタンを追加
    $view .= '  ';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= "</p>";    
  }
}
?>


<!--------------------------- ここからhtml --------------------------->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/ichimi.css">
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
        <button class="d-flex btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="location.href='touroku.html'">登録する</button>
      </div>
    </nav>
  </header>

    <main>
      <!-- グリッドレイアウトの表示 -->
      <div class="grid_ichimi container">
        <div class="row">
          <div class="col-md-3 mt-3">
            <div class="card" style="width: 19rem;">
              <img src="img/sample1.jpg" class="card-img-top mt-2" alt="#">
              <div class="card-body">
                <h5 class="card-title">普通の一味唐辛子</h5>
                <p class="card-text">評価　：1</p>
                <p class="card-text">容器　：瓶</p>
                <p class="card-text">販売元：エスビー食品</p>
                <p class="card-text">容量　：28g</p>
                <p class="card-text">レビュー ：ごくありふれた普通の一味唐辛子。辛くもなんともない。</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-3">
            <div class="card" style="width: 19rem;">
              <img src="img/sample2.jpg" class="card-img-top mt-2" alt="#">
              <div class="card-body">
                <h5 class="card-title">普通の七味唐辛子</h5>
                <p class="card-text">評価　：2</p>
                <p class="card-text">容器　：瓶</p>
                <p class="card-text">販売元：エスビー食品</p>
                <p class="card-text">容量　：28g</p>
                <p class="card-text">レビュー ：一味よりは色んな味を感じる。大麻の種子が入っている</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-3">
            <div class="card" style="width: 19rem;">
              <img src="img/sample3.jpg" class="card-img-top mt-2" alt="#">
              <div class="card-body">
                <h5 class="card-title">舞妓さんひいひい</h5>
                <p class="card-text">評価　：5</p>
                <p class="card-text">容器　：袋</p>
                <p class="card-text">販売元：おちゃのこさいさい</p>
                <p class="card-text">容量　：40g</p>
                <p class="card-text">レビュー ：ネーミングセンスがよい。京都土産に是非おすすめしたい。</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-3">
            <div class="card" style="width: 19rem;">
              <img src="img/sample4.jpg" class="card-img-top mt-2" alt="#">
              <div class="card-body">
                <h5 class="card-title">りょう君のジョロキア</h5>
                <p class="card-text">評価　：3</p>
                <p class="card-text">容器　：瓶</p>
                <p class="card-text">販売元：りょう君</p>
                <p class="card-text">容量　：20g</p>
                <p class="card-text">レビュー ：りょう君とは一体何者だろうか…？</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-3 sample5">
            <div class="card" style="width: 19rem;">
              <img src="img/sample5.jpg" class="card-img-top mt-2" alt="#">
              <div class="card-body">
                <h5 class="card-title">激辛スパイス</h5>
                <p class="card-text">評価　：4</p>
                <p class="card-text">容器　：瓶</p>
                <p class="card-text">販売元：ハチ食品</p>
                <p class="card-text">容量　：13g</p>
                <p class="card-text">レビュー ：普通の一味だとたくさんかけてしまうけど、これは辛くて量が抑えられる。</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-3 add_contents">
            <div class="card" style="width: 19rem;">
              <img src="" class="card-img-top mt-2" alt="">
              <div class="card-body">
                <h5 class="card-title name"></h5>
                <p class="card-text hyoka">評価　：</p>
                <p class="card-text youki">容器　：</p>
                <p class="card-text hanbai">販売元：</p>
                <p class="card-text ryou">容量　：</p>
                <p class="card-text review">レビュー ：</p>
                <?= $view; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer class="bg-danger text-center text-light p-3 mt-5">
      © 2022 Gino Inc All rights reserved.
    </footer>
    <script src="js/main.js"></script>
</body>
</html>

