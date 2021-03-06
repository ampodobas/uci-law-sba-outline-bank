<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Criteria\User\UsersWithRoles;
use App\Repositories\UserRepository as User;
use App\Repositories\RoleRepository as Role;
use Laracasts\Flash\Flash;

class UsersController extends Controller {

	/**
	 * @var User
	 */
	protected $user;

	/**
	 * @param User $user
	 * @param Role $role
	 */
	public function __construct(User $user, Role $role)
	{
		$this->user = $user;
		$this->role = $role;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$users = $this->user->pushCriteria(new UsersWithRoles())->paginate(10);
		return view('users.index', compact('users'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$roles = $this->role->all();
		return view('users.create', compact('roles'));
	}

	/**
	 * @param CreateUserRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(CreateUserRequest $request)
	{
		$user = $this->user->create($request->all());

		if($request->get('role'))
		{
			$user->roles()->sync($request->get('role'));
		}
		else
		{
			$user->roles()->sync([]);
		}

		Flash::success('User successfully created');

		return redirect('/users');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);
		$roles = $this->role->all();
		$userRoles = $user->roles();
		return view('users.edit', compact('user', 'roles', 'userRoles'));
	}
	
	public function password_reset_non_admin($id)
	{
		$user = $this->user->find($id);
		$roles = $this->role->all();
		$userRoles = $user->roles();
		return view('users.non-admin-password-reset', compact('user', 'roles', 'userRoles'));
	}
	
	public function change_password_non_admin(UpdateUserRequest $request, $id)
	{
		$user = $this->user->find($id);
		
		if($request->get('password'))
		{
			$user->password = $request->get('password');
		}
		$user->save();
		
		Flash::success('Password successfully changed');

		return redirect('/dashboard');
	}
	
	/**
	 * @param $id
	 * @param UpdateUserRequest $request
	 */
	public function update(UpdateUserRequest $request, $id)
	{
		$user = $this->user->find($id);
		
		$user->user_first_name = $request->get('user_first_name');
		$user->user_last_name = $request->get('user_last_name');
		$user->projected_graduation_year = $request->get('projected_graduation_year');

		$user->email = $request->get('email');
		if($request->get('password'))
		{
			$user->password = $request->get('password');
		}
		$user->save();

		if($request->get('role'))
		{
			$user->roles()->sync($request->get('role'));
		}
		else
		{
			$user->roles()->sync([]);
		}

		Flash::success('User successfully updated');

		return redirect('/users');
	}

	/**
	 * @param $id
	 */
	public function destroy($id)
	{
		$this->user->delete($id);

		Flash::success('User successfully deleted');

		return redirect('/users');
	}

}