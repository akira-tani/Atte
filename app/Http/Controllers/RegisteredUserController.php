<?php

	namespace App\Http\Controllers;

	use App\Models\AtteUser;
	use App\Http\Requests\RegisterRequest;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;

	class RegisteredUserController extends Controller
	{

	public function create(){
	return view('member_registration');
	}

	public function store(RegisterRequest $request)
	{

	$user = AtteUser::create([
	'name' => $request->name,
	'email' => $request->email,
	'password' => Hash::make($request->password),]);
	return view('registration_comp');
	}
}
