<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Day\DayService;
use App\Services\Payment\PaymentService;
use App\Services\UserDay\UserDayService;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected UserDayService $service;
    protected UserDayService $UserDayService;
    protected DayService $dayService;

    public function __construct(UserDayService $UserDayService, DayService $dayService)
    {
        $this->UserDayService = $UserDayService;
        $this->dayService = $dayService;
    }
    public function index()
    {
        $month = [1 => 'Yanvar', 2 => 'Fevral', 3 => 'Mart', 4 => 'Aprel', 5 => 'May', 6 => 'Iyun', 7 => 'Iyul', 8 => 'Avgust', 9 => 'Sentabr', 10 => 'Oktabr', 11 => 'Noyabr', 12 => 'Dekabr'];
        $filter = request()->input('filter');
        if ($filter) {
            $days = $this->dayService->get()->where('day', 'like', '%' . $filter . '%');
        } else {
            $filter = date('Y-m');
            $days = $this->dayService->get()->where('day', 'like', '%' . $filter . '%');
        }
        $days = $days->get();
        $today = date('Y-m-d') ?? '2022-01-01';
        $users = User::orderBy('id', 'asc')->get();
        $todays = $this->dayService->get()->where('day', 'like', '%' . $today . '%')->get() ;
        $now = $todays[0]->id ?? 0;
        $user_days = $this->UserDayService->get()->get();
        $count_foods =  DB::table('user_days')->rightJoin('days', 'user_days.day_id', '=', 'days.id')->select(DB::raw('days.day as day,count(user_days.user_id) as count_users'))->where('days.day', 'like', '%' . $filter . '%')->groupBy('days.id')->groupBy('days.day')->orderBy('days.id')->get();
        $todays = $this->UserDayService->get()->where('day_id',$now )->get();
        return view('page.home', compact('days', 'users', 'user_days',  'todays','month','count_foods'));
    }
}
