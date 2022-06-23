@extends('layouts.home')
@section('content_head')
@endsection
@section('content')


<style>
@media (max-width:750px) {
form {
    flex-direction: column;
    align-items:start
}
.form-control {
    margin: 0 !important;
    margin-bottom: 12px !important;
}
.btn-primary {
    margin:0 !important;
}
.add_btn {
    height: 100% !important;
}
}
@media (max-width:470px) {
    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .add_btn {
        margin-top: 12px !important;
    }
}


</style>
    <div class="card">
        <div class="card-header"style="margin-bottom: 10px">
            <h4 class="card-title" style="margin-top: 20px">To'lov</h4>
        </div>
        <div class="card-content">

            <div class="card-body d-flex " style="display: flex; justify-content: space-between">
                <form class="d-flex" action="{{ route('payme.index') }}" method="get">
                    @csrf
                    @method('get')
                    <select class="form-control" name="filter" id="">
                        @if (isset($months))
                            @for ($i = 1; $i <= sizeof($months); $i++)
                                <option value="{{ $i }}"
                                    {{ isset($filter) ? ($i == $filter ? 'selected' : '') : '' }}>{{ $months[$i] }}
                                </option>
                            @endfor
                        @endif
                    </select>
                    <select style="margin-left: 25px" class="form-control" name="debit_cost" id="">

                        <option value="null" {{ isset($debit_cost) ? 'selected' : '' }}>Barcha</option>
                        <option value="1" {{ isset($debit_cost) ? ($debit_cost == 1 ? 'selected' : '') : '' }}>Chiqim
                        </option>
                        <option value="0" {{ isset($debit_cost) ? ($debit_cost == 0 ? 'selected' : '') : '' }}>Kirim
                        </option>

                    </select>


                    <button style="width: 250px; margin-left: 25px;" type="submit" class="btn btn-primary">Tanlash</button>
                </form>

                <a href="{{ route('payme.create') }}" class="btn btn-primary add_btn">Qo'shish</a>
            </div>



            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>FIO</th>
                                <th>To'lov</th>
                                <th>Sana</th>
                                <th>To'lov turi</th>
                                <th>Kirim Chiqim</th>
                                <th>Izoh</th>
                                <th width="200px">Amallar</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $kirim = 0;
                                $chiqim = 0;

                            @endphp

                            @foreach ($payments as $key => $payment)
                                @php

                                    if ($debit_cost == 'null') {
                                        if ($payment->debit_cost == 1) {
                                            $chiqim = $chiqim + $payment->amount;
                                        } elseif ($payment->debit_cost == 0) {
                                            $kirim += $payment->amount;
                                        }
                                    } else {
                                        if ($payment->debit_cost == 1) {
                                            $chiqim = $chiqim + $payment->amount;
                                        } elseif ($payment->debit_cost == 0) {
                                            $kirim += $payment->amount;
                                        }
                                        $sum[] = $payment->amount;
                                    }
                                    $key++;
                                @endphp
                                <tr>
                                    <td width="1%">{{ $key }}</td>
                                    <td>{{ $payment->user->firstname . ' ' . $payment->user->lastname }}</td>
                                    <td>{{ number_format($payment->amount) }} So'm</td>
                                    <td>{{ $payment->date }}</td>
                                    <td>{{ $payment->pay_type == 1 ? 'Naqd' : 'Karta' }}</td>
                                    <td>{{ $payment->debit_cost == 0 ? 'Kirim' : 'Chiqim' }}</td>
                                    <td>{{ $payment->description }}</td>
                                    <td class="d-flex justify-content-between">
                                        <form action="{{ route('payme.edit', ['id' => $payment->id]) }}" method="get"
                                            style="margin-right: 10px">
                                            @csrf
                                            @method('get')
                                            <button data-target="#foodedit" data-toggle="modal"
                                                class="btn btn-primary d-inline-block">Tahrirlash</button>
                                        </form>
                                        <form action="{{ route('payme.delete', ['id' => $payment->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger d-inline-block">O'chirish</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>FIO</th>
                                <th>To'lov</th>
                                <th>Sana</th>
                                <th>To'lov turi</th>
                                <th>Kirim Chiqim</th>
                                <th>Izoh</th>
                                <th width="200px">Amallar</th>
                            </tr>
                        </tfoot>
                    </table>

                    <div style="width: 200px">
                        <h4> Jami:
                            {{ isset($debit_cost) ? ($debit_cost == 'null' ? number_format($kirim - $chiqim) : (isset($sum) ? ($sum ? number_format(array_sum($sum)) : '0') : '0')) : number_format($kirim - $chiqim) }}

                            so'm
                        </h4>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
