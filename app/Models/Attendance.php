<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use App\Models\AtteUser;

	class Attendance extends Model
	{
	use HasFactory;
	protected $table = 'attendances';

	protected $fillable = ['atte_user_id', 'start_time', 'end_time'];

	public function atteuser()
	{
	$this->belongsTo(AtteUser::class);
	}
    }
