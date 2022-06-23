<?php

namespace App\Http\Controllers;

use App\Models\Food\Food;
use App\Models\Payment\Payment;
use App\Models\User;
use App\Models\UserDay\UserDay;
use App\Services\Day\DayService;
use App\Services\Payment\PaymentService;
use App\Services\UserDay\UserDayService;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected UserDayService $service;

    protected UserDayService $UserDayService;
    protected DayService $dayService;
    protected PaymentService $paymentService;

    public function __construct(UserDayService $UserDayService, DayService $dayService, PaymentService $paymentService)
    {
        $this->UserDayService = $UserDayService;
        $this->dayService = $dayService;
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        $month = [1 => 'Yanvar', 2 => 'Fevral', 3 => 'Mart', 4 => 'Aprel', 5 => 'May', 6 => 'Iyun', 7 => 'Iyul', 8 => 'Avgust', 9 => 'Sentabr', 10 => 'Oktabr', 11 => 'Noyabr', 12 => 'Dekabr'];

        $filter = request()->input('filter');
        // $payment = $this->paymentService->get()->select('user_id' , 'amount');
        $payments = DB::table('payments')->select(DB::raw('payments.user_id ,sum(payments.amount) as amount'))->where('debit_cost', 0);
        if ($filter) {
            $days = $this->dayService->get()->where('day', 'like', '%' . $filter . '%');
           $payments = $payments->where('date', 'like', '%' . $filter . '%');
        } else {
            $filter = date('Y-m');
            $days = $this->dayService->get()->where('day', 'like', '%' . $filter . '%');
            $payments = $payments->where('date', 'like', '%' . $filter . '%');

        }
        $payments = $payments->groupBy('payments.user_id') ;
        $sum = $payments->pluck('amount')->all();


        $payments = $payments->get();
        $day_ids = $days->pluck('id');
        $days = $days->get();
        $today = date('Y-m-d') ?? '2022-01-01';

        $users = User::orderBy('id', 'asc')->get();
        $foods = Food::get();

        $todays = $this->dayService->get()->where('day', 'like', '%' . $today . '%')->get() ;
        $now = $todays[0]->id ?? 0;

        $user_days = $this->UserDayService->get()->get();
        $count_foods =  DB::table('user_days')->rightJoin('days', 'user_days.day_id', '=', 'days.id')->select(DB::raw('days.day as day,count(user_days.user_id) as count_users'))->where('days.day', 'like', '%' . $filter . '%')->groupBy('days.id')->groupBy('days.day')->orderBy('days.id')->get();


        $todays = $this->UserDayService->get()->where('day_id',$now )->get();

        return view('page.home', compact('days', 'users', 'user_days',  'todays','month','count_foods', 'payments',  'sum'));
    }
}
