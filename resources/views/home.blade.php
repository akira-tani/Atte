extends('layouts.main_home')	
	
	<style>
	
	
	.user-greeting{
	padding:5px;
	font-weight:bold;
	font-size:20px;
	}
	
	.user-greeting-box{
	text-align:center;
	}
	
	.btn{
	width:530px;
	height:150px;
	cursor:pointer;
	font-weight:bold;
	background-color:#FFFFFF;
	}
	
	.btn:hover{
	background-color:#C0C0C0;
	}
	
	.btn-list{
	text-align:center;
	}
	
	
	</style>
	
	@section('header')
	@endsection
	
	@section('contents')
	<div class="contents-main">
	<div class="user-greeting-box">
	<p class="user-greeting">{{Auth::user()->name}}さんお疲れ様です！</p>
	<p class="user-greeting" id="timer"></p>
	@if(session('error'))
	<p class ="user-error-start">{{session('error')}}</p>
	@endif
	</div>
	<ul class="btn-list">
	<li class="timebtn" id="btn_start">
	<form action="{{route('/attendance/start')}}" method="POST">
	@csrf
	@method('POST')
	<button type="submit" id="btn_start" class="btn" <?php if("btn_display['btn_start_attendance']" == false){ ?> disabled <?php } ?> >勤務開始</button>
	</form>
	</li>
	<li class="timebtn" id="btn_end">
	<form action="{{route('/attendance/end')}}" method="POST">
	@csrf
	@method('POST')
	<button type="submit" id="btn_end" class="btn" <?php if("btn_display['btn_end_attendance']" == false){ ?> disabled <?php } ?>>勤務終了</button>
	</form>
	</li>
	<li class="timebtn" id="btn_rest_start">
	<form action="{{route('/attendance/reststart')}}" method="POST">
	@csrf
	@method('POST')
	<button type="submit" id="btn_rest_start" class="btn" <?php if("btn_display['btn_start_rest']" == false){ ?> disabled <?php } ?>>休憩開始</button>
	</form>
	</li>
	<li class="timebtn" id="btn_rest_end">
	<form action="{{route('/attendance/restend')}}" method="POST">
	@csrf
	@method('POST')
	<button type="submit" id="btn_rest_end" class="btn" <?php if("btn_display['btn_start_rest']" == false){ ?> disabled <?php } ?>>休憩終了</button>
	</form>
	</li>
	</ul>
	</div>
	@endsection
	
	@section('footer')
	@endsection
	
	<script>
	// 1秒毎に実行
	window.setInterval( function() {
	// ID名timerの要素の内容に、現在時刻を出力
	document.getElementById( "timer" ).innerHTML = new Date().toLocaleString();
	}, 1000 );
	
	
	</script>
