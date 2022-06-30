<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $users = $this->service->get()->get();
        return view('page.user', compact('users'));
    }
    public function create()
    {
        return view('form.user-from');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $this->service->store($data);
        return redirect()->route('userIndex');
    }
    public function edit($id)
    {
        $user = User::find($id);
        if (auth()->user()->is_admin == 1) {

            return view('form.user-from', ['user' => $user]);
        } else {
            return view('form.edit-profil', ['user' => $user]);
        }
    }

    public function update(UserRequest $request, $id)
    {

        $data = $request->validated();
        if ($data['password'] == null || $data['password'] == '')
        {
            unset($data['password']);
            $this->service->edit($id, $data);
        }
        else {
            $data['password'] = bcrypt($data['password']);
            $this->service->edit($id, $data);

        }
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('userIndex');
        } else {
            return redirect()->route('dashboard');
        }
    }
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('userIndex');
    }
}
