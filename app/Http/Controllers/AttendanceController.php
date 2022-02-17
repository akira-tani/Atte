<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\DB;
	use App\Models\AtteUser;
	use App\Models\Attendance;
	use App\Models\Rest;
	use Carbon\Carbon;

	class AttendanceController extends Controller
	{
	public function attendanceWork()
	{
	$user = Auth::user();
	$oldTimeStamp = Attendance::where('atte_user_id', $user->id)->latest()->first();
	if ($oldTimeStamp) {
	$oldTimeStampStart = new Carbon($oldTimeStamp->start_time);
	$oldTimeStampDay = $oldTimeStampStart->startOfDay();
	}
	$newTimeStampDay = Carbon::today();
	if ((isset($oldTimeStampDay) == $newTimeStampDay) && (empty($oldTimeStamp->end_time))) {
	return redirect()->back()->with('error', '出勤打刻がされています。');
	}
	$timeStamp = Attendance::create([
	'atte_user_id' => $user->id,
	'start_time' => Carbon::now(),
	'rest_time' => Carbon::now(),
	]);
	return redirect()->back()->with('my_status', '出勤打刻が完了しました。');
	}
	public function leavingWork()
	{
	$user = Auth::user();
	$timeStamp = Attendance::where('atte_user_id', $user->id)->latest()->first();
	$timeStamp->update([
	'end_time' => Carbon::now()
	]);
	return redirect()->back()->with('my_status', '休憩終了時間打刻が完了しました。');
	}
	public function restStartWork()
	{
	$user_id = Auth::id();
	$attendance =Attendance::where('atte_user_id',$user_id)->latest()->first();
	$timeStamp = Rest::where('attendance_id', $attendance->id)->latest()->first();
	if ($timeStamp) {
	$oldTimeStampStart = new Carbon($timeStamp->start_time);
	$oldTimeStampDay = $oldTimeStampStart->startOfDay();
	}
	$newTimeStampDay = Carbon::today();
	if ((isset($oldTimeStampDay) == $newTimeStampDay) && (empty($timeStamp->end_time))) {
	return redirect()->back()->with('error', '休憩開始が押されています。');
	}
	$items = Rest::create([
	'attendance_id'=>$attendance->id,
	'start_time' => Carbon::now(),
	]);
	return redirect()->back()->with('my_status', '休憩開始が完了しました。');
	}
	public function restEndWork()
	{
	$user_id = Auth::id();
	$attendance =Attendance::where('atte_user_id',$user_id)->latest()->first();
	$timeStamp = Rest::where('attendance_id', $attendance->id)->latest()->first();
	$timeStamp->update([
	'end_time' => Carbon::now()
	]);
	return redirect()->back()->with('my_status', '退勤打刻が完了しました。');
	}
	public function AttendanceList(Request $request)
	{
	$user = Auth::user();
	$user_id = Auth::id();
	$date = Carbon::today()->format("Y-m-d");
	$attendance =Attendance::where('atte_user_id',$user_id)->latest()->first();
	$timeStamp = Rest::where('attendance_id', $attendance->id)->latest()->first();
	$rests = DB::table('atte_rests')->selectRaw('date_format(start_time,"%Y%m%d") as today')
	->selectRaw('sum(end_time-start_time) as rest_time')
	->groupBy('attendance_id','today')
	->get();
	$items = Attendance::whereDate('start_time', $date)->join('atte_users','atte_users.id','=','attendances.atte_user_id')->paginate(5);
	return view('list', ['items' => $items],['today' => $date]);
	$attendances =
    Attendance::get();
    foreach ($attendances as
    $attendances) {
        $rests =$attendances->rests();
        dump($rests);
    };
	}
	public function NextDay(Request $request)
	{
	$nowdate = $request->input('today');
	$dayflg = $request->input('dayflg');
	if ($dayflg == "next") {
	$date = date("Y-m-d", strtotime($nowdate . "+1 day"));
	} else if ($dayflg == "back") {
	$date = date("Y-m-d", strtotime($nowdate . "-1 day"));
	}
	$user = Auth::user();
	$user_id = Auth::id();
	$attendance =Attendance::where('atte_user_id',$user_id)->latest()->first();
	$timeStamp = Rest::where('attendance_id', $attendance->id)->latest()->first();
	$items = Attendance::whereDate('start_time', $date)->join('atte_users','atte_users.id','=','attendances.atte_user_id')->paginate(5);
	return view('list', ['today' => $date],['items' => $items]);
	}
}
