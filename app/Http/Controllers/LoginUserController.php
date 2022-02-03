<?php
	namespace App\Http\Controllers;
	use App\Models\AtteUser;
	use Illuminate\Http\Request;
	use App\Http\Requests\LoginRequest;
	use Illuminate\Support\Facades\Auth;
	use App\Models\Attendance;
	use App\Models\Rest;
	use Carbon\Carbon;

	class LoginUserController extends Controller
	{
	public function login(){
	return view('login');
	}

	public function execution(LoginRequest $request){
	$credentials = $request->validate([
	'email' => ['required', 'email'],
	'password' => ['required'],
	]);


	if (Auth::attempt($credentials)) {
	$request->session()->regenerate();
	return redirect()->intended('home');
	}
	return back()->withErrors([
	'email' => 'メールアドレスかパスワードが間違っています。',
	]);
	}

	public function top(){

	$btn_start_attendance = false;
	$btn_end_attendance = false;
	$btn_start_rest = false;
	$btn_end_rest = false;

	$user_id = Auth::id();
	$today = Carbon::today()->format('Y-m-d');
	$now = Carbon::now()->format('H:i:s');
	$attendance = Attendance::where('atte_user_id', $user_id)->where('start_time', $today)->first();

	if($attendance != null){
	if($attendance['end_time'] != null){

	}else{

	$rest = Rest::where('attendance_id', $user_id)->where('start_time', $today)->orderBy('start_time', 'desc')->first();

	if($rest != null){
	if($rest['end_time'] != null){
	$btn_end_attendance = true;
	$btn_start_rest = true;
	}else{
	$btn_end_rest = true;
	}
	}else{
	$btn_end_attendance = true;
	$btn_start_rest = true;
	}
	}
	}else{//データがない場合:「勤務開始」ボタンが押せる
	$btn_start_attendance = true;
	}
	
	$btn_display = [//trueならボタン表示
	'btn_start_attendance' => $btn_start_attendance,
	'btn_end_attendance' => $btn_end_attendance,
	'btn_start_rest' => $btn_start_rest,
	'btn_end_rest' => $btn_end_rest,
	];
	
	
	return view('home');
	}
	
	public function logout(Request $request)
	{
	Auth::logout();
	
	$request->session()->invalidate();
	
	$request->session()->regenerateToken();
	
	return redirect('/login');
	}
}
