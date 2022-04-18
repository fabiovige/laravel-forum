<?php

namespace App\Http\Controllers;

use App\Http\Requests\Manager\UserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use function App\Http\Controllers\Manager\flash;
use function bcrypt;
use function env;
use function redirect;
use function view;

class UserController extends Controller
{
	private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

    public function index()
    {
    	$users = $this->user->paginate(10);
        return view('manager.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $roles = Role::all('id', 'name');
        return view('manager.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, $id)
    {
        try{
        	$data = $request->all();

			$user = $this->user->find($id);
			$user->update($data);

			$role = Role::find($data['role']);
			$user = $user->role()->associate($role);
			$user->save();

            return back()->with('success','Registro atualizado com sucesso.');

        } catch (\Exception $e) {
	        $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar atualização...';
            return back()->with('warning', $message);
        }
    }
}
