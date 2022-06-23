@extends('layouts.home')
@section('content_head')
@endsection
@section('content')
<style>
    select{
        border: solid 1px #7367f0  !important;
    }
    input{
        border: solid 1px #7367f0 !important;
    }

</style>
{{-- @php
    dd($userday)
@endphp --}}
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('dayUserUpdate', ['id' => $userday->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Sana</span>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="basicSelect" name="day_id">
                                        @foreach ($days as $day)
                                            <option value="{{ $day->id }}" {{isset($userday)? (!empty($userday->day_id == $day->id)? 'selected':''):''}}>
                                                {{ $day->day }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-error="wrong" style="color: red;">{{ $errors->first('day_id') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Foydalanuvchi</span>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="basicSelect" name="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{isset($userday)? (!empty($userday->user_id == $user->id)? 'selected':''):''}}>
                                                {{ $user->firstname }}  {{ $user->lastname }}
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
                                    <span>Ovqat</span>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control" id="basicSelect" name="food_id">
                                        @foreach ($foods as $food)
                                            <option value="{{ $food->id }}" {{isset($userday)? (!empty($userday->food_id == $food->id)? 'selected':''):''}}>
                                                {{ $food->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-error="wrong" style="color: red;">{{ $errors->first('food_id') }}</span>
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
                                        <select class="form-control" id="basicSelect" name="is_pay">

                                            <option value="1" {{isset($userday)? ( $userday->is_pay == '1' ? 'selected' : ' ') :' '}}}>To'langan</option>
                                            <option value="0" {{isset($userday)? ($userday->is_pay == '0' ? 'selected' : ' ') :' '}}>To'lanmagan</option>
                                        </select>
                                        <span data-error="wrong" style="color: red;">{{ $errors->first('is_pay') }}</span>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Davomat</span><br>
                                </div>
                                <div class="col-md-8">
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect" name="yegan_yemagan">

                                            <option value="1" {{isset($userday)? ( $userday->yegan_yemagan == '1' ? 'selected' : ' ') :' '}}}>Keldi</option>
                                            <option value="0" {{isset($userday)? ($userday->yegan_yemagan == '0' ? 'selected' : ' ') :' '}}>Kelmadi</option>
                                        </select>
                                        <span data-error="wrong" style="color: red;">{{ $errors->first('is_pay') }}</span>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex col-12 offset-md-4">
                            <button type="submit" class="btn btn-primary mr-3 mb-1">Yuborish</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Qayta o'rnatish</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
