<?php	
	
	namespace App\Http\Requests;
	
	use Illuminate\Foundation\Http\FormRequest;
	
	class RegisterRequest extends FormRequest
	{
	public function authorize()
	{
	if ($this->path() == '/register') {
	return false;
	} else {
	return true;
	}
	}
	
	public function rules()
	{
	return [
	'name' => 'required',
	'email' => 'required|email',
	'password' => 'required|confirmed',
	'password_confirmation' => 'required',
	];
	}
	public function messages()
	{
	return [
	'name.required' => '名前を入力してください',
	'email.required' => 'メールアドレスを入力してください',
	'email.email' => 'メールアドレスの形式で入力してください',
	'password.required' => 'パスワードを入力してください',
	'password.confirmed'=>'パスワードが異なります',
	'password_confirmation.required'=>'確認用パスワードは必須です'
	];
	}
}
