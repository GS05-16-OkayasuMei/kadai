<?php
//1. POSTデータ取得
$book_name = $_POST["book_name"];
$book_url = $_POST["book_url"];
$book_cmt = $_POST["book_cmt"];
$id = $_POST["id"];

//2. DB接続します
$pdo = db_con();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET book_name= :name, book_url= :url, book_cmt= :cmt ,indate= sysdate() WHERE id= :id");
$stmt->bindValue(':name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $book_url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cmt', $book_cmt, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
 　　queryError($stmt);
}else{
  //５．index.phpへリダイレクト
  header("Location: bm_save_comp.php");
  exit;
}

?>
