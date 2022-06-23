<?php

namespace App\Http\Controllers;

use App\Http\Requests\DayRequest;
use App\Models\Day\Day;
use App\Models\Food\Food;
use App\Services\Day\DayService;

class DayController extends Controller
{

    protected DayService $service;

    public function __construct(DayService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        // $days = $this->service->get(['food'])->get();
        // return view('page.day', compact('days'));
    }
    public function store(DayRequest  $request)
    {

        $this->service->store($request->validated());
        return redirect()->route('day.index');
    }

    public function edit($id)
    {
        $day = Day::find($id);

        return view('form.day-form', ['day' => $day]);
    }
    public function update(DayRequest $request, $id)
    {
         $this->service->edit($id, $request->validated());
         return redirect()->route('day.index');
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return redirect()->route('day.index');

    }
}
