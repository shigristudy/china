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
                        <h1>{{__('words.web.forgot_pwd.header_text')}}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 forgot_texts">
                        {{__('words.web.forgot_pwd.text_1')}}<br>
                        {{__('words.web.forgot_pwd.text_2')}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 forgot_pwd">
                        <form action="{{route('post_email')}}" method="POST">
                            @csrf
                            <div class="form-group mb-5">
                                <label for="email">{{__('words.web.forgot_pwd.email')}}:</label>
                                <input type="email" class="form-control" id="email" name="email"/>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger forgot_btn" value="{{__('words.web.forgot_pwd.submit')}}">
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