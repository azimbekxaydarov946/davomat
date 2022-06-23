@extends('layouts.home')
@section('content_head')
@endsection
@section('content')
{{-- @php
    dd($payment);
@endphp --}}
<style>
    select{
        border: solid 1px #7367f0  !important;
    }
    input{
        border: solid 1px #7367f0 !important;
    }
    textarea{
        border: solid 1px #7367f0 !important;
    }

</style>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ isset($payment) ? route('payme.update', ['id' => $payment->id]) : route('payme.store') }}" method="POST">
                @csrf
                @if (isset($payment))
                    @method('PUT')
                @else
                    @method('POST')
                @endif

                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>FIO</span>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="basicSelect" name="user_id">
                                        @foreach ($users as $user)


                                            <option value="{{ $user->id }}" {{isset($payment)? (!empty($user->id == $payment->user_id)? 'selected':''):''}}>
                                                {{ $user->firstname . ' ' . $user->lastname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-error="wrong" style="color: red;">{{ $errors->first('user_id') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Kun</span>
                                </div>
                                <div class="col-md-8">

                                    <fieldset class="form-label-group">
                                        <input type="date" class="form-control" id="cal-start-date" placeholder="Date" name="date" value="{{ isset($payment) ? $payment->date : old('date') }}">
                                        <span data-error="wrong" style="color: red;">{{ $errors->first('date') }}</span>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Kun</span>
                                </div>
                                <div class="col-md-8">

                                    <fieldset class="form-label-group">
                                        <input type="text" class="form-control pickadate" id="cal-start-date" placeholder="Date" name="date">
                                    </fieldset>
                                </div>
                            </div>
                        </div> --}}


                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Narx</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="email-id" class="form-control" name="amount" placeholder="Narx"  value="{{ isset($payment) ? $payment->amount : old('amount') }}">
                                    <span data-error="wrong" style="color: red;">{{ $errors->first('amount') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>To'lov maqsadi</span>
                                </div>
                                <div class="col-md-8">

                                    <select class="form-control" id="basicSelect" name="debit_cost">
                                        <option value="0" {{isset($payment)? (!empty( $payment->debit_cost == 0) ? 'selected' : '') :''}}>Kirim</option>
                                        <option value="1" {{isset($payment)? (!empty( $payment->debit_cost == 1) ? 'selected' : '') :''}}>Chiqim</option>
                                    </select>
                                    <span data-error="wrong" style="color: red;">{{ $errors->first('debit_cost') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>To'lov turi</span>
                                </div>
                                <div class="col-md-8">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect" name="pay_type">

                                            <option value="1" {{isset($payment)? ( $payment->pay_type == '1' ? 'selected' : ' ') :' '}}}>Naqd</option>
                                            <option value="0" {{isset($payment)? ($payment->pay_type == '0' ? 'selected' : ' ') :' '}}>Karta</option>
                                        </select>
                                        <span data-error="wrong" style="color: red;">{{ $errors->first('pay_type') }}</span>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Izoh</span>
                                </div>
                                <div class="col-md-8">
                                    <fieldset class="form-group">
                                        <textarea class="form-control" id="basicTextarea" rows="2" placeholder="Textarea"
                                            name="description">{{isset($payment) ? $payment->description : old('description')  }}</textarea>
                                            <span data-error="wrong" style="color: red;">{{ $errors->first('description') }}</span>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary mr-5 mb-1">Yuborish</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Qayta o'rnatish</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
