@extends('layouts.home')
@section('content_head')
@endsection
@section('content')
<style>
    input{
        border: solid 1px #7367f0 !important;
    }

</style>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('foodUpdate', ['id' => $food->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Nomi</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="email-id" class="form-control" name="name" placeholder="Nomi"  value="{{ isset($food) ? $food->name : old('name') }}" {{ isset($food) ? '' :  'required'}}>
                                    <span data-error="wrong" style="color: red;">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Narx</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="email-id" class="form-control" name="price" placeholder="Narx"  value="{{ isset($food) ? $food->price : old('price') }}">
                                    <span data-error="wrong" style="color: red;">{{ $errors->first('price') }}</span>
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
