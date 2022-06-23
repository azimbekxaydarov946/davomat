@extends('layouts.home')
@section('content_head')
@endsection
@section('content')
{{-- @php
    dd($request);
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
            <form class="form form-horizontal" action="{{ route('userUpdate', ['id' => auth()->user()->id])  }}" method="POST">
                @csrf

                    @method('PUT')

                <div class="form-body">
                    <div class="row">


                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Familya</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="email-id" class="form-control" name="lastname" placeholder="familya"  value="{{ isset($user) ? $user->lastname : old('lastname') }}">
                                     <span data-error="wrong" style="color: red;">{{ $errors->first('lastname') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Ism</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="email-id" class="form-control" name="firstname" placeholder="ism"  value="{{ isset($user) ? $user->firstname : old('firstname') }}">
                                     <span data-error="wrong" style="color: red;">{{ $errors->first('firstname') }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Email</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" id="email-id" class="form-control" name="email" placeholder="email"  value="{{ isset($user) ? $user->email : old('email') }}">
                                     <span data-error="wrong" style="color: red;">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Telefon raqam</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="email-id" class="form-control" name="phone" placeholder="telefon raqam"  value="{{ isset($user) ? $user->phone : old('phone') }}">
                                     <span data-error="wrong" style="color: red;">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-4"><br>
                                    <span>Parol</span>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" id="email-id" class="form-control" name="password" placeholder="parol">
                                     <span data-error="wrong" style="color: red;">{{ $errors->first('password') }}</span>
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
