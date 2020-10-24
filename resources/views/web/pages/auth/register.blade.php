@extends('web.layouts.default')
@section('title', 'REGISTER')
@section('style')
    <!-- Country Code CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.css')}}" type="text/css" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid bg-register-pg">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h1>{{__('words.web.sign_up.header_text')}}</h1>
                    </div>
                </div>
                <div class="row sign_up">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="first_name">{{__('words.web.sign_up.first_name')}} <span>*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required="" oninvalid="this.setCustomValidity('Please Enter valid first name')"
                                       oninput="setCustomValidity('')"/>
                                @if($errors->has('first_name'))
                                    <p class="error_message">{{$errors->first('last_name')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="last_name">{{__('words.web.sign_up.last_name')}} <span>*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required="" oninvalid="this.setCustomValidity('Please Enter valid last name')"
                                       oninput="setCustomValidity('')"/>
                                @if($errors->has('last_name'))
                                    <p class="error_message">{{$errors->first('last_name')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('words.web.sign_up.email')}} <span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required="" oninvalid="this.setCustomValidity('Please Enter valid email')"
                                       oninput="setCustomValidity('')"/>
                                @if($errors->has('email'))
                                    <p class="error_message">{{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="form-group" style="margin-bottom: 0">
                                <label for="password">{{__('words.web.sign_up.pwd')}} <span>*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required="" oninvalid="this.setCustomValidity('Please Enter valid Password')"
                                       oninput="setCustomValidity('')"/>
                                @if($errors->has('password'))
                                    <p class="error_message">{{$errors->first('password')}}</p>
                                @endif
                                <label for="length_limit" class="length_limit">{{__('words.web.sign_up.length_limit')}}</label>
                            </div>
                            <div class="form-group">
                                <label for="company">{{__('words.web.sign_up.company')}}</label>
                                <input type="text" class="form-control" id="company" name="company" required="" oninvalid="this.setCustomValidity('Please Enter valid Company')"
                                       oninput="setCustomValidity('')"/>
                                @if($errors->has('company'))
                                    <p class="error_message">{{$errors->first('company')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12 mb-5">
                            <div class="row col-sm-8 form-group terms-conditions">
                                <input type="checkbox" name="terms-condition" value="terms-condition"/>
                                <label>{{__('words.web.sign_up.terms')}}</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="submit" class="btn btn-success register" value="{{__('words.web.sign_up.submit')}}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Country Code JS -->
    <script src="{{asset('assets/js/intlTelInput.js')}}"></script>
    <!-- Registration Page JS -->
    <script src="{{asset('assets/js/registration.js')}}"></script>

    <!-- Scroll Js -->
    <script src="{{asset('assets/js/scroll.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/js/password.js')}}"></script>
@endsection