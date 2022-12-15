// 削除ボタンの挙動
$(".all_delete").on("click", function(){
  if (confirm('全削除してもいいですか？')) {
    // 「OK」をクリックした際の処理を記述
    alert('全削除しました');
    localStorage.clear();
    showList();
  } else {
    //キャンセルした場合
    //何も起きない
    return false
  }  
});

// データ格納用配列の定義
let array_name = ['一味'];
localStorage.setItem('key_name', JSON.stringify(array_name));
let array_hyoka = [2];
let array_youki = ['袋'];
let array_hanbai = ['京都'];
let array_ryou = ['13g'];
let array_review = ['テスト'];




// console.log(array_name)

// 登録をクリックした際の処理
$('#touroku').on('click',function(){
  // console.log(array_name)
  // 確認の表示
  // if (confirm('登録してもいいですか？')) {
  //   // 「OK」をクリックした際の処理を記述
  //   alert('登録できました');

  //   // ------------------ここに入れる------------------

  // } else {
  //   //キャンセルした場合
  //   //何も起きない
  //   return false
  // }
  
  // ローカルストレージから値を取得
  let array_name = localStorage.getItem('key_name');
  array_name = JSON.parse(array_name);

  // console.log(array_name);

  // それぞれの値を取得
  let ichimi_name = $('#touroku_name').val();
  
  // データを配列に追加
  array_name.push(ichimi_name);

  // jsonに変換してローカルストレージに保存
  localStorage.setItem('key_name', JSON.stringify(array_name));

});


