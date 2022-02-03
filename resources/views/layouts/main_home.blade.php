<!DOCTYPE html>	
	<html lang="ja">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>COACHTECH</title>
	<style>

	body{
	font-family:"游ゴシック";
	width:1440px;
	margin:0 auto;
	}

	.heder-box{
	display:flex;
	width:1440px;
	}

	.title-logo{
	margin-left:70px;
	}

	.header-main-list{
	margin-left:890px;
	}

	li{
	display:inline-block;
	padding:15px;
	}

	a{
	text-decoration: none;
	color:#000;
	font-weight:bold;
	}

	.logout-title{
	padding-top:30px;
	padding-left:5px;
	}

	.button-logout{
	text-decoration:none;
	}

	.contents-main{
	width:100%;
	height:275px;
	background-color:#e7e7e7;
	margin:0 auto;
	}

	.footer-main{
	display:table;
	text-align:center;
	width:100%;
	}

	small{
	display:table-cell;
	vertical-align:middle;
	padding-left:30px;
	}

	</style>
	</head>
	<body>
	<header>@yield('header')
	<div class="heder-box">
	<h1 class="title-logo">Atte</h1>
	<ul class="header-main-list">
	<li><a href="/home">ホーム</a></li>
	<li><a href="/list">日付一覧</a></li>
	</ul>
	<a href="#" onclick="document.getElementById('logout-form').submit();" class="logout-title">ログアウト</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	@csrf
	</form>
	</div>
	</div>
	</div>
	</header>

	<main>@yield('contents')
	<div class="contents-main">
	</div>
	</main>
	<footer>@yield('footer')
	<div class="footer-main">
	<small>Atte,inc</small>
	</div>
	</footer>
	</body>
	</html>
