@extends('layouts.auth')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="../../../app-assets/images/pages/register.jpg" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Ro'yhatdan o'tish</h4>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form action="{{route('register')}}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputName" class="form-control"  name="firstname" placeholder="Ism" required>
                                                        <label for="inputName">Ism</label>
                                                        <span data-error="wrong" style="color: red;">{{ $errors->first('firstname') }}</span>
                                                    </div>   <div class="form-label-group">
                                                        <input type="text" id="inputName" class="form-control" name="lastname"  placeholder="Familiya" required>
                                                        <label for="inputName">Familya</label>
                                                        <span data-error="wrong" style="color: red;">{{ $errors->first('lastname') }}</span>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="text"  class="form-control"  name="phone" placeholder="Telefon" required>
                                                        <label for="inputEmail">Telefon</label>
                                                        <span data-error="wrong" style="color: red;">{{ $errors->first('phone') }}</span>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control"  name="password" placeholder="Parol" required>
                                                        <label for="inputPassword">Parol</label>
                                                        <span data-error="wrong" style="color: red;">{{ $errors->first('password') }}</span>
                                                    </div>

                                                    {{-- <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class=""> I accept the terms & conditions.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div> --}}
                                                    <a href="/login" class="btn btn-outline-primary float-left btn-inline mb-50 mr-2">Kirish</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Ro'yxatdan o'tish</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection
