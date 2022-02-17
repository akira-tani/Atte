<?php	
	
	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\RegisteredUserController;
	use App\Http\Controllers\LoginUserController;
	use App\Http\Controllers\AttendanceController;
	use App\Models\Attendance;
	use Illuminate\Http\Request;
	
	//アカウント登録機能//
	Route::get('/register',[RegisteredUserController::class,'create']);
	Route::post('/completion',[RegisteredUserController::class,'store']);
	//ログインフォーム//
	Route::group(['middleware' => ['guest']], function () {
	Route::get('/login',[LoginUserController::class,'login'])->name('login');
	Route::post('/home',[LoginUserController::class,'execution']);
	});
	//ログイン・ログアウト機能//
	Route::group(['middleware' => ['auth']], function () {
	Route::get('/home',[LoginUserController::class,'top']);
	Route::post('logout', [LoginUserController::class, 'logout'])->name('logout');
	//勤務開始//
	Route::post('/attendance/start', [AttendanceController::class, 'attendanceWork'])->name('/attendance/start');
	//勤務終了//
	Route::post('/attendance/end', [AttendanceController::class, 'leavingWork'])->name('/attendance/end');
	//休憩開始//
	Route::post('/attendance/reststart', [AttendanceController::class, 'restStartWork'])->name('/attendance/reststart');
	//休憩終了//
	Route::post('/attendance/restend', [AttendanceController::class, 'restEndWork'])->name('/attendance/restend');
	
	//ページネーション//
	Route::post('/attendance/attendance', [AttendanceController::class, 'NextDay'])->name('/attendance/attendance');
	//勤怠一覧表示画面//
	Route::get('/list',[AttendanceController::class, 'AttendanceList']);
	Route::get('/', [AttendanceController::class, 'AttendanceList']);
	});
