<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodStoreRequest;
use App\Models\Food\Food;
use App\Services\Food\FoodService;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    protected FoodService $service;

    public function __construct(FoodService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        $foods  = $this->service->get()->get();
        return view('page.food',compact('foods'));
    }

    /**
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }


    public function store(FoodStoreRequest $request)
    {
         $this->service->store($request->validated());
        return redirect()->route('food.index');
    }
    public function edit($id)
    {

        $food = Food::find($id);
        return view('form.food-form', ['food' => $food]);
    }
    public function update(FoodStoreRequest $request, $id)
    {
         $this->service->edit($id, $request->validated());
         return redirect()->route('food.index');
    }

    public function show($id)
    {

    }
    public function destroy($id)
    {
         $this->service->delete($id);
        return redirect()->route('food.index');
    }
}
