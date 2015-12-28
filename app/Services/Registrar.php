<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'email' => 'required|email|max:255|unique:users',
			'projected_graduation_year' => 'required|integer|min:4',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'user_first_name' => $data['user_first_name'],
			'user_last_name' => $data['user_last_name'],
			'projected_graduation_year' => $data['projected_graduation_year'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
