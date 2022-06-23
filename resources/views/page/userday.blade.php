@extends('layouts.home')
@section('content_head')
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-center justify-content-md-between">
            <h4 class="card-title">Tushlik qilganlar Ro'yxati</h4>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#userday">Qo'shish</button>
        </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr >
                                <th>id</th>
                                <th>Kun</th>
                                <th>FIO</th>
                                <th>Ovqat</th>
                                <th>To'lov</th>
                                <th>Davomat</th>
                                <th width="200px">Tahrir</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($params as $key => $param)
                                @php
                                    $key++;
                                @endphp
                                <tr >
                                    <td width="1%">{{ $key }}</td>
                                    <td>{{ $param->day->day }}</td>
                                    <td>{{ $param->user->firstname }} {{ $param->user->lastname }}</td>
                                    <td>{{ $param->food->name ?? '' }}</td>
                                    <td style="color: {{ $param->is_pay == 1 ? 'green' : 'red' }}">{{ $param->is_pay == 1 ? 'To\'langan' : 'To\'lanmagan' }}</td>
                                    <td style="color: {{ $param->yegan_yemagan == 1 ? 'green' : 'red' }} ; font-size:25px; text-align:center;   ">{{ $param->yegan_yemagan == 1 ? 'Keldi' : 'Kelmadi' }}</td>
                                    <td class="d-flex justify-content-between">

                                <form action="{{route('dayUserEdit', ['id' => $param->id])}}" method="get">
                                    @method('get')
                                    @csrf
                                    <button data-target="#foodedit" data-toggle="modal"
                                            class="btn btn-primary d-inline-block" style="margin-right: 10px">Tahrirlash</button>
                                </form>

                                        <form action="{{ route('dayUserDestroySingle', ['id' => $param->id]) }}" method="Post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger d-inline-block">O'chirish</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
