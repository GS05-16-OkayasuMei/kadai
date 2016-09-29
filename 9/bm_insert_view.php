<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>My Library</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style>
	  div{
		  padding: 10px;
		  font-size:16px;
	  }
  </style>
</head>
<body>
<!--
<header class="header">
  <p class= "site-title-sub">bookmark application</p>
  <h1 class="site-title">My Library...<h1>
  <p class="site-discription">あなたのお気に入りの本を登録しよう</p>
  <div class="buttons">
	  <a class="button button-showy" href="#save">ブックマーク登録</a>
	  <a class="button" href="bm_list_view.php">ブックマーク一覧</a>
  </div>
</header>
-->
<form method="post" action="bm_insert.php" id="save" class="form">
  <div class="jumbotron">
  <div>ようこそ　<?php echo $_SESSION["name"] ?>さん</div>
   <fieldset>
    <legend class="heading">ブックマーク登録</legend>
     <label>書籍名<input type="text" name="book_name" placeholder="BOOK NAME"></label><br>
     <label>書籍URL<input type="text" name="book_url" placeholder="BOOK URL"></label><br>
     <label>コメント<textArea name="book_cmt" rows="4" cols="40" placeholder="COMMENT"></textArea></label><br>
     <input type="submit" value="送信" class="button submit_btn">
    </fieldset>
    <div><a href="bm_list_view.php">＞＞ブックマーク一覧はこちらから</a></div>
  </div>
</form>
</body>
</html>
