@extends('layouts.home')
@section('content_head')
@endsection
@section('content')

    @php
    $fil = request()->input('filter') ?? date('m');

    @endphp


    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                        <h4 class="card-title">Asosiy jadval</h4>
                    @if (auth()->user()->is_admin)
                        <a href="/user?active=user"><span class="menu-title" data-i18n="Email">Foydalanuvchilar</span></a>
                    @endif
                </div>

                <div class="card-content">
                    <div class="card-body d-flex  ">
                        <form class="d-flex" action="{{ route('dashboard') }}" method="get">
                            @csrf
                            @method('get')
                            <select class="form-control" name="filter" id="">
                                @if (isset($month))
                                    @for ($i = 1; $i <= count($month); $i++)
                                        @php
                                            $value = date('Y') . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);

                                        @endphp
                                        <option @if ($fil == $value) {{ 'selected' }} @endif
                                            value="{{ $value }}"> @php

                                            @endphp {{ $month[$i] }}</option>
                                    @endfor
                                @endif


                            </select>
                            <button style="width: 200px; margin-left: 25px;" type="submit" class="btn btn-primary">
                                Tanlash
                            </button>
                        </form>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th style="width: 5px; ">№</th>
                                    <th>FIO</th>

                                    @foreach ($days as $day)
                                        @php
                                            $d = explode('-', $day->day);
                                        @endphp
                                        <th style="text-align: center">{{ $d[2] }} </th>
                                    @endforeach

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    @if ($user->id != 1)
                                        <tr>
                                            <td style="width: 5px">{{ $key++ }} </td>
                                            <td style="width: 150px !important;">{{ $user->firstname }}
                                                {{ $user->lastname }} </td>


                                            @foreach ($days as $day)
                                                <td style="padding: 5px;" class="text-center">

                                                    @php($count = false)
                                                    @foreach ($user_days as $user_day)
                                                        @if ($user_day->user_id == $user->id && $user_day->day_id == $day->id)
                                                            @if (auth()->user()->is_admin)
                                                                <span> {{ $user_day->food->name ?? '' }} </span>
                                                                <form
                                                                    action="{{ route('dayUserDestroy', ['id' => $user_day->id]) }}"
                                                                    method="Post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button
                                                                        style="width: 30px; height: 30px; padding: 0; margin: auto;"
                                                                        class="btn btn-danger d-inline-block">x
                                                                    </button>
                                                                </form>
                                                                @php($count = true)
                                                            @else
                                                                <span> + <br> {{ $user_day->food->name ?? '' }}</span>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    @if (!$count && auth()->user()->is_admin)
                                                        <form
                                                            class=" d-flex flex-column justify-content-center align-items-center"
                                                            action="{{ route('dayUserStore', ['day_id' => $day->id, 'user_id' => $user->id]) }}"
                                                            method="post">
                                                            @csrf


                                                            <button style="width: 30px; height: 30px; padding: 0"
                                                                type="submit" class="btn btn-primary ">+
                                                            </button>

                                                        </form>
                                                    @endif

                                                </td>
                                            @endforeach

                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <thead>


                                <tr>
                                    <th colspan="2"> Jami ovqatlanuvchilar:</th>

                                    @foreach ($count_foods as $key => $item)
                                        <th class="text-center"> {{ $item->count_users }}</th>
                                    @endforeach
                                </tr>


                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>















@endsection
