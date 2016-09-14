<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table order by indate desc");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
	 $view .= '<li class="scroll-item"><a href="#"><img src="img/ebook.png" class="icon"><time class="date">'.$result["indate"].'</time><span class="title">'.$result["book_name"].'</span><input type="hidden" value="'.$result["book_url"].'" class="url"><input type="hidden" value="'.$result["book_cmt"].'" class="cmt"><input type="hidden" value="'.$result["id"].'" class="id"><button class="button btn_detail" href="#">詳細</button></li>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Bookmark List</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<link href="css/style_list_view.css" rel="stylesheet">
</head>
<body>
<script type="text/javascript">
$(document).ready(function(){
    //　詳細へ
	$(".btn_detail").on("click",　function(e){
		var name = $(e.target).closest("li").children("a").children(".title").text();
		var url = $(e.target).closest("li").children("a").children(".url").val();
		var cmt = $(e.target).closest("li").children("a").children(".cmt").val();
		var id = $(e.target).closest("li").children("a").children(".id").val();
		$(".scroll-list").hide(1000);
		$(".detail").show(1000);
		showDetail(name, url, cmt, id);
     });
	
	// 一覧へ
	$("#btn_list").on("click",function(){
        $(".detail").hide(1000);
		$(".scroll-list").show(1000);
     });
	
	// 詳細情報を表示する
	function showDetail(name, url, cmt, id){
		$("#name").val(name);
		$("#url").val(url);
		$("#cmt").val(cmt);		
		$("#id").val(id);
	}
});
</script>
<div class="center">
	<h2 class="heading">BOOKMARK LIST</h2>
</div>
<div>
<ul class="scroll-list">
    <?= $view ?>
</ul>
<div class="detail">
	<div class="back_icon"><img src="img/back.png" id="btn_list"></div>
	<form method="post" action="bm_update.php" id="save" class="form">
		 <label>書籍名<input type="text" id ="name" name="book_name" placeholder="BOOK NAME"></label><br>
		 <label>書籍URL<input type="text" id="url" name="book_url" placeholder="BOOK URL"></label><br>
		 <label>コメント<textArea id="cmt" name="book_cmt" rows="4" cols="40" placeholder="COMMENT"></textArea></label><br>
		 <input type="hidden" value="" id="id" name="id">
		 <input type="submit" value="更新" class="button">
	</form>
</div>
</div>
</div>
<footer class="footer">
	  <a class="button button-showy" href="bm_insert_view.php">ブックマーク登録へ</a>
</footer>
</body>
</html>
