@extends('layouts.main')	
	
	<style>
	/*登録フォームのメイン部分*/
	
	.contents-main{
	text-align:center;
	display:table;
	padding-top:71px;
	padding-bottom:71px;
	}
	
	.contents-main-comp-box{
	display:table-cell;
	vertical-align:middle;
	}
	
	/*フォーム内部*/
	.comp-title-main{
	font-weight:bold;
	font-size:18px;
	}
	
	</style>
	
	@section('header')
	@endsection
	
	@section('contents')
	<main>
	<div class="contents-main">
	<div class="contents-main-comp-box">
	<div class="comp-title">
	<p class="comp-title-main">アカウント登録完了しました</p>
	</div>
	<a href="/login">ログインへ</a>
	</div>
	</div>
	</main>
	@endsection
	
	@section('footer')
	@endsection
