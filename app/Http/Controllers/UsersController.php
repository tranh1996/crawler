<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\RoleService;


class UsersController extends Controller
{
	 protected $userService;

    /**
     * create new class instance
     *
     * @param App\Services\userService $userService
     * @return void
     */
    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->middleware('auth');
    }

    public function index() 
    {
    	$users = $this->userService->getUser();
    	return view('users.index', compact('users'));
    }

    /**
     * create new users
     *
     * @return \Iluminate\Http\Respone
     */
    public function create()
    {
        $roles = $this->roleService->getList();
        return view('users.create', compact('roles'));
    }

    /**
     * Store new users
     *
     * @param App\Http\Requests\userRequest $request
     * @return \Iluminate\Http\Respone
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $success = $this->userService->createUser($datas);
        if ($success) {
            flash(__('Create user successfully'))->success();
            return redirect()->route('user.create', $request->channel_id);
        } else {
            flash (__('Create job failed , please try again'))->error();
            return redirect()->back();
        }
    }

    /**
     * show edit users
     *
     * @param int $id
     * @return \Iluminate\Http\Respone
     */
    public function edit(int $id)
    {
        $roles = $this->roleService->getList();
        $user = $this->userService->findUserByID($id);
        $channel_id = $user->channel_id;
        return view('users.edit', compact('user', 'channel_id', 'roles'));
    }

    /**
     * update user
     *
     * @param App\Http\Requests\userRequest $request
     * @param int $id
     * @return \Iluminate\Http\Respone
     */
    public function update(Request $request, int $id)
    {
        $success = $this->userService->updateUser($request->all(), $id);
        if ($success) {
            flash('Edit user successfull')->success();
            return redirect()->route('user.edit', $id);
        } else {
            flash('Edit user failed, please try again')->error();
            return redirect()->back();
        }
    }

    /**
     * delete user
     *
     * @param int $id
     * @return \Iluminate\Http\Respone
     */
    public function delete(int $id)
    {   
        $user = $this->userService->finduserByID($id);
        $channel_id = $user->channel_id;
        $success = $this->userService->deleteUser($id);
        if ($success) {
            flash('Delete user successfull')->success();
            return redirect()->route('channels.index', $channel_id);
        } else {
            flash('Delete user false')->error();
            return redirect()->back();
        }
    }

}