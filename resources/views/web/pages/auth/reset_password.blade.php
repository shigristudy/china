@extends('web.layouts.default')
@section('title', 'LOGIN')
@section('style')
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid bg-log-in-pg">
        <div class="row">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-xs-12">
                        <h1>{{__('words.web.forgot_pwd.reset_text')}}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 forgot_pwd">
                        <form action="{{route('reset_password')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="password">{{__('words.web.forgot_pwd.password')}} <span>*</span></label>
                                <input type="password" class="form-control" id="password" name="password"/>
                                <label for="length_limit" class="length_limit">{{__('words.web.forgot_pwd.length_limit')}}</label>
                            </div>
                            <div class="form-group" style="margin-top: 0">
                                <label for="confirm_password">{{__('words.web.forgot_pwd.confirm_pwd')}} <span>*</span></label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger change_btn" value="{{__('words.web.forgot_pwd.change_btn')}}">
                            </div>
                        </form>
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