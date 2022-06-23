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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.user-from');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $data['password'] = bcrypt($data['password']);
        $this->service->store($data);
        return redirect()->route('userIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (auth()->user()->is_admin == 1) {

            return view('form.user-from', ['user' => $user]);
        } else {
            //    dd('deed');
            return view('form.edit-profil', ['user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            //    dd($data);

            return redirect()->route('userIndex');
        } else {
            //    dd('deed');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('userIndex');
    }
}
