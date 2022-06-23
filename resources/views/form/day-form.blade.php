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

    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('dayUpdate', ['id' => $day->id]) }}" method="POST">
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

                                    <fieldset class="form-label-group">
                                        <input type="date" class="form-control" id="cal-start-date" placeholder="Date" name="day" value="{{ isset($day) ? $day->day : old('date') }}">
                                        <span data-error="wrong" style="color: red;">{{ $errors->first('day') }}</span>
                                    </fieldset>
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
                                            <option value="{{ $food->id }}" {{isset($day)? (!empty($day->food_id == $food->id)? 'selected':''):''}}>
                                                {{ $food->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-error="wrong" style="color: red;">{{ $errors->first('food_id') }}</span>
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
