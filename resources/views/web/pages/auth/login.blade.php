@extends('web.layouts.default')
@section('title', 'LOGIN')
@section('style')
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid bg-log-in-pg">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>{{__('words.web.sign_in.header_text')}}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 sign_in">
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{__('words.web.sign_in.email')}}:</label>
                                <input type="email" class="form-control" id="email" name="email"/>
                            </div>
                            <div class="form-group">
                                <label for="pwd">{{__('words.web.sign_in.pwd')}}:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger login" value="{{__('words.web.sign_in.login')}}">
                            </div>
                            <div class="form-group form-group-lp">
                                <label class="remember-data-label">
                                    <input type="checkbox" name="remember-data" class="remember-data">
                                    <span></span>
                                    <span>{{__('words.web.sign_in.remember')}}</span>
                                </label>
                            </div>
                            <div class="form-group form-group-lp">
                                <p class="forgot-pwd-lp"><a href="{{route('forgot_password')}}">{{__('words.web.sign_in.forgot')}}</a></p>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3 sign_in">
                        <div class="ct_account">
                            <h3>{{__('words.web.sign_in.ct_account')}}</h3>
                        </div>
                        <div class="benefit">
                            <h4>{{__('words.web.sign_in.benefit')}}:</h4>
                        </div>
                        <div class="txt_list">
                            <h4>{{__('words.web.sign_in.checkout')}}</h4>
                            <p>{{__('words.web.sign_in.payment')}}</p>
                            <h4>{{__('words.web.sign_in.preference')}}</h4>
                            <p>{{__('words.web.sign_in.format')}}</p>
                            <h4>{{__('words.web.sign_in.informed')}}</h4>
                            <p>{{__('words.web.sign_in.history')}}</p>
                        </div>
                        <div class="form-group">
                            <a href="{{route('register')}}" class="btn btn-success register">
                                {{__('words.web.sign_in.register')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/js/login.js')}}"></script>
    <!-- Scroll Js -->
    <script src="{{asset('assets/js/scroll.js')}}"></script>
@endsection