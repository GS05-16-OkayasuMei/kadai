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
<body class="login">
<header class="header">
  <p class= "site-title-sub">bookmark application</p>
  <h1 class="site-title">My Library...<h1>
  <p class="site-discription">あなたのお気に入りの本を登録しよう</p>
</header>
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" /><br>
<input type="submit" value="ログイン" class="button login_btn"/>
</form>
</body>
</html>
