@extends('layouts.home')
@section('content_head')
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Foydalanuvchilar ro'yxati</h4>
            <form action="{{ route('userCreate') }}" style="margin: 0;padding: 0">

                <button type="submit" class="btn btn-primary " data-toggle="modal">Qo'shish</button>
            </form>
        </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>FIO</th>
                                {{-- <th>Email</th> --}}
                                <th>Telefon Raqam</th>
                                {{-- <th>Parol</th> --}}
                                <th>Ruxsat</th>
                                <th style="width: 200px ;">Tahrir</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                @php
                                    $key++;
                                @endphp
                                <tr>
                                    <td width="1%">{{ $key }}</td>
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                    {{-- <td>{{ $user->email }}</td> --}}
                                    <td>{{ $user->phone }}</td>
                                    {{-- <td >{{ $user->password }}</td> --}}
                                    <td>{{ $user->is_admin == false ? 'Student' : 'Teacher' }}</td>
                                    <td class="d-flex justify-content-between">
                                        <form action="{{ route('userEdit', ['id' => $user->id]) }}" method="get">
                                            @method('get')
                                            @csrf
                                            <button data-target="#foodedit" data-toggle="modal"
                                                class="btn btn-primary d-inline-block"
                                                style="margin-right: 10px">Tahrirlash</button>
                                        </form>
                                        @if (auth()->user()->id!= $user->id)
                                        <form action="{{ route('userDestroy', ['id' => $user->id]) }}" method="Post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger d-inline-block">O'chirish</button>
                                        </form>
                                        @endif

                                    </td>

                                </tr>
                            @endforeach
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>FIO</th>
                                {{-- <th>Email</th> --}}
                                <th>Telefon Raqam</th>
                                {{-- <th>Parol</th> --}}
                                <th>Ruxsat</th>
                                <th style="width: 200px ;">Tahrir</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
