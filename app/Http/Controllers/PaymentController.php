<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment\Payment;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PaymentController extends Controller
{


    public function index()
    {
        $months = [1 => 'Yanvar', 2 => 'Fevral', 3 => 'Mart', 4 => 'Aprel', 5 => 'May', 6 => 'Iyun', 7 => 'Iyul', 8 => 'Avgust', 9 => 'Sentabr', 10 => 'Oktabr', 11 => 'Noyabr', 12 => 'Dekabr'];
        $filter = request()->input('filter');
        $debit_cost = request()->input('debit_cost');
        $payments = Payment::query();
        if ($filter) {
            if ($debit_cost == 'null') {
                $payments = $payments->with('user')->whereMonth('date', $filter)->get();
            } else {

                $payments = $payments->with('user')->whereMonth('date', $filter)->where('debit_cost', '=', $debit_cost)->get();
            }
        } else {
            $filter = date('Y-m');
            $payments = $payments->with('user')->where('date', 'like', '%' . $filter . '%')->get();
        }


        return view('page.payment', ['payments' => $payments, 'months' => $months, 'filter' => $filter, 'debit_cost' => $debit_cost]);
    }
    public function create()
    {
        $users = User::where('id', '!=', '1')->get();
        return view('form.form', ['users' => $users]);
    }
    public function store(PaymentRequest $request)
    {

        $data = $request->validated();
        Payment::create($data);
        return redirect()->route('payme.index');
    }
    public function edit($id)
    {

        $users = User::where('is_admin', '!=', '1')->get();
        $payment = Payment::with('user')->find($id);
        return view('form.form', ['payment' => $payment, 'users' => $users]);
    }
    public function update(PaymentRequest $request, $id)
    {
        $data = $request->validated();
        $payment = Payment::find($id);
        $payment->update($data);
        return redirect()->route('payme.index');
    }


    public function delete($id)
    {
        $data = Payment::find($id);
        $data->delete();
        return redirect()->route('payme.index');
    }
}
