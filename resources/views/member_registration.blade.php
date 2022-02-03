@extends('layouts.main')	
	
	<style>
	/*登録フォームのメイン部分*/
	
	.contents-main{
	text-align:center;
	display:table;
	padding-top:30px;
	padding-bottom:30px;
	}
	
	.contents-main-box{
	display:table-cell;
	vertical-align:middle;
	}
	
	/*フォーム内部*/
	.registration-title-main{
	font-weight:bold;
	font-size:18px;
	}
	
	.rayouts-form{
	width:360px;
	padding:10px;
	margin:15px;
	border:solid 3px #c0c0c0;
	border-radius:4px;
	color:#c0c0c0;
	}
	
	.rayouts-button{
	width:360px;
	padding:10px;
	color:#fff;
	background-color:#0d33ff;
	border-radius:4px;
	border:solid 3px #0d33ff;
	}
	
	</style>
	
	@section('header')
	@endsection
	
	@section('contents')
	<main>
	<div class="contents-main">
	<div class="contents-main-box">
	<div class="registration-title">
	<p class="registration-title-main">会員登録</p>
	</div>
	<form action="{{ url('/completion')}}" method="post">
	@csrf
	<div class="registration-rayouts">
	<input type="text" class="rayouts-form" placeholder="名前"  name="name" value="{{ old('name') }}">
	</div>
	@error('name')
	<tr>
	{{$message}}
	</tr>
	@enderror
	<div class="registration-rayouts">
	<input type="email" class="rayouts-form" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
	</div>
	@error('email')
	<tr>
	{{$message}}
	</tr>
	@enderror
	<div class="registration-rayouts">
	<input type="password" class="rayouts-form" placeholder="パスワード" name="password">
	</div>
	@error('password')
	<tr>
	{{$message}}
	</tr>
	@enderror
	<div class="registration-rayouts">
	<input type="password" class="rayouts-form" placeholder="確認用パスワード" name="password_confirmation">
	</div>
	@error('password_confirmation')
	<tr>
	{{$message}}
	</tr>
	@enderror
	<div class="registration-button">
	<input type="submit" value="会員登録" class="rayouts-button">
	</div>
	</form>
	<p>アカウントをお持ちの方はこちらから</p>
	<a href='/login'>ログイン</a>
	</div>
	</div>
	</main>
	@endsection
	
	@section('footer')
	@endsection