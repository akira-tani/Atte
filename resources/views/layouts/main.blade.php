<!DOCTYPE html>	
	<html lang="ja">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>atte</title>
	<style>

	body{
	font-family:"游ゴシック";
	width:1440px;
	margin:0 auto;
	}

	.header-main{
	width:1220px;
	margin:0 auto;
	text-align:left;
	}

	.contents-main{
	width:100%;
	height:300px;
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
	}

	</style>
	</head>
	<body>
	<header>@yield('header')
	<div class="header-main">
	<h1>Atte</h1>
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