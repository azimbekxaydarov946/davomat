@extends('layouts.home')
@section('content_head')
@endsection
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-center justify-content-md-between">
            <h4 class="card-title">Davomat Ro'yxati</h4>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter" >Qo'shish</button>
        </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                <div class="table-responsive">
                    <table class="table zero-configuration">

                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Sana</th>
                            <th>Ovqat</th>
                            <th width="200px">Tahrir</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($days as $key=>$day)
                        @php
                               $key++;
                        @endphp
                        <tr>
                            <td width="1%">{{$key}}</td>
                            <td>{{$day->day}}</td>
                            <td>{{$day->food->name ?? 'Null'}}</td>
                            <td class="d-flex justify-content-between">

                                <form action="{{route('dayEdit', ['id' => $day->id])}}" method="get">
                                    @method('get')
                                    @csrf
                                    <button data-target="#foodedit" data-toggle="modal" class="btn btn-primary d-inline-block" style="margin-right: 10px">Tahrirlash</button>
                                </form>
                                <form action="{{route('dayDestroy', ['id' => $day->id])}}" method="Post">
                                    @method('DELETE')
                                    @csrf
                                    <button  class="btn btn-danger d-inline-block">O'chirish</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Sana</th>
                            <th>Ovqat</th>
                            <th width="200px">Tahrir</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
