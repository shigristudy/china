@extends('web.layouts.default')
@section('title', 'TERMS AND CONDITIONS')
@section('content')
    <div class="page__intro">
        <div class="container">
            <div class="intro__title">
                {{__('words.web.terms.title')}}
            </div>
        </div>
    </div>
    <div class="text__container">
        <div class="container">
            <div class="block">
                <div class="text">
                    <p></p>
                    <ol>
                        <li style="display: block; width: 0px; height: 0px; padding: 0px; border: 0px; margin: 0px; position: absolute; top: 0px; left: -9999px; opacity: 0; overflow: hidden;">&nbsp;</li>
                        <li><span>{{__('words.web.terms.first')}}</span></li>
                        <li><span>{{__('words.web.terms.second')}}</span></li>
                        <li><span>{{__('words.web.terms.third')}}</span></li>
                        <li><span>{{__('words.web.terms.fourth')}}</span></li>
                        <li><span>{{__('words.web.terms.fifth')}}</span></li>
                        <li><span>{{__('words.web.terms.sixth')}}</span></li>
                        <li><span>{{__('words.web.terms.seventh')}}</span></li>
                        <li><span>{{__('words.web.terms.eighth')}}</span></li>
                        <li><span>{{__('words.web.terms.ninth')}}</span></li>
                        <li><span>{{__('words.web.terms.tenth')}}</span></li>
                        <li><span>{{__('words.web.terms.eleventh')}}</span></li>
                        <li><span>{{__('words.web.terms.twelfth')}}</span></li>
                        <li><span>{{__('words.web.terms.thirteenth')}}</span></li>
                        <li><span>{{__('words.web.terms.fourteenth')}}</span></li>
                        <li><span>{{__('words.web.terms.fifteenth')}}</span></li>
                        <li><span>{{__('words.web.terms.sixteenth')}}</span></li>
                        <li><span>{{__('words.web.terms.seventeenth')}}</span></li>
                        <li><span>{{__('words.web.terms.eighteenth')}}</span></li>
                        <li><span>{{__('words.web.terms.nineteenth')}}</span></li>
                        <li><span>{{__('words.web.terms.twentieth')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-one')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-two')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-three')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-four')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-five')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-six')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-seven')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-eight')}}</span></li>
                        <li><span>{{__('words.web.terms.twenty-nine')}}</span></li>
                        <li><span>{{__('words.web.terms.thirty')}}</span></li>
                    </ol><br>
                    <div style="text-align: justify;"><span style="font-size:14px;">{{__('words.web.terms.date')}}</span></div><p></p>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Accordion JS -->
    <script src="{{asset('assets/js/accordion.js')}}"></script>
    <!-- Scroll Js -->
    <script src="{{asset('assets/js/scroll.js')}}"></script>
@endsection