<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDayRequest;
use App\Models\Day\Day;
use App\Models\Food\Food;
use App\Models\User;
use App\Models\UserDay\UserDay;
use App\Services\UserDay\UserDayService;
use Illuminate\Http\Request;

class UserDayController extends Controller
{

    protected UserDayService $service;

    public function __construct(UserDayService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $params = $this->service->get(['user', 'day', 'food'])->get();
            //    dd($params);
        return view('page.userday', compact('params'));
    }

    public function store(UserDayRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->back();
    }

    public function edit($id)
    {
        $userday = UserDay::find($id);
        $days = Day::get();
        $users = User::where('is_admin', '!=', '1')->get();
        $foods = Food::get();
        return view('form.userday-from', ['days' => $days, 'foods' => $foods,'users'=>$users,'userday'=>$userday]);
    }
    public function update(UserDayRequest $request, $id)
    {
        $this->service->edit($id, $request->validated());
        return redirect()->route('dayUser.index');
    }
    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->back();
    }
    public function delete($id)
    {
        $this->service->delete($id);
        return redirect()->route('dayUser.index');
    }
}
