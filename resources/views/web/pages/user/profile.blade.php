@extends('web.layouts.default')
@section('title', 'REGISTER')
@section('style')
    <!-- Coutry Code CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.css')}}" type="text/css" />
@endsection
@section('content')
    <!-- Registration Form Section Starts -->
    <div class="container-fluid bg-register-pg" >
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="register-ihd-rp text-left">

                            <h1>{{__('words.web.profile.profile_head')}}</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                <form class="form-horizontal form-horizontal-rp" action="{{route('profile_update')}}">
                    <div class="row">
                        <div class="col-xs-12 profile">
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.company')}} <span></span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input type="text" name="company" class="form-control" value="{{$user->company? $user->company: ''}}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.first_name')}} <span>*</span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="first_name" value="{{ $user->first_name ? $user->first_name : '' }}" placeholder="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.last_name')}} <span>*</span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="last_name" value="{{ $user->last_name ? $user->last_name : '' }}" placeholder="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.email')}} <span>*</span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" name="email" type="email" value="{{$user->email ? $user->email : ''}}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.phone')}}</label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" name="phone_number" type="text" value="{{$user->phone_number ? $user->phone_number : ''}}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.street')}} <span></span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="street" value="{{ $user->street ? $user->street : ''}}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.house_number')}} <span></span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="house_number" value="{{ $user->house_number ? $user->house_number : '' }}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.zip')}} <span></span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="zip_code" value="{{ $user->zip_code ? $user->zip_code : '' }}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.city')}} <span></span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="city" value="{{ $user->city ? $user-> city : '' }}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.federal_state')}}</label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="federal_state" value="{{$user->federal_state ? $user->federal_state : ''}}" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.country')}} <span></span></label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="country" value="{{$user->country ? $user->country : ''}}" placeholder="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3">{{__('words.web.profile.tax')}}</label>
                                <div class="col-sm-9 col-md-9 col-lg-9">
                                    <input class="form-control" type="text" name="tax_id" value="{{ $user->tax_id ? $user->tax_id : '' }}" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center profile_btn">
                        <button class="btn btn-primary" type="submit">{{__('words.web.profile.update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Registration Form Section Ends -->
@endsection
@section('script')
    <!-- Country Codde JS -->
    <script src="{{asset('assets/js/intlTelInput.js')}}"></script>
    <!-- Registration Page JS -->
    <script src="{{asset('assets/js/registration.js')}}"></script>
@endsection