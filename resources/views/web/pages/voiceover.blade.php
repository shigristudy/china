@extends('web.layouts.default')
@section('title', 'VOICEOVER')
@section('content')
    <!-- Banner Section Starts -->
    <div class="container-fluid bg-banner-speech-production-pg">
        <div class="bg-banner-tts-bottom-shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3	c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3	c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
            </svg>
        </div>
        <div class="row">
            <div class="banner-tts-heading-desc-pg">
                <h1>{{__('words.web.voiceover.voice_head')}}</h1>
                <p>{{__('words.web.voiceover.voice_des')}}</p>
                <div class="booking-text-link-tts-pg text-center">
                    <p>
                        @if(Auth::check())
                            <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                {{__('words.web.voiceover.uploadScript')}}
                            </a>
                        @else
                            <a href="" onclick="showVoiceLoginToast(); return false;">
                                {{__('words.web.voiceover.uploadScript')}}
                            </a>
                    @endif
                    <p>
                </div>
            </div>
        </div>
    </div>

    <!-- multiple upload modal using DropZone -->
    @auth
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-cloud-upload-alt" style="font-size: xx-large"></i>&nbsp;&nbsp;Multi script upload (Text documents)</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-default" style="margin-bottom: 0">
                            <div class="panel-body">
                                <form id="dropzoneForm" class="dropzone" action="{{ route('voiceover_file_upload') }}">
                                    @csrf
                                </form>
                                <div align="right" style="margin-top: 1em">
                                    <button type="button" class="btn btn-primary" id="submit-all">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth

    <!-- Banner Section Ends -->
    <!-- Icon with Description Section Starts -->
    <div class="container-fluid bg-iwd-tts-pg">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497.941 225.941L286.059 14.059A48 48 0 0 0 252.118 0H48C21.49 0 0 21.49 0 48v204.118a48 48 0 0 0 14.059 33.941l211.882 211.882c18.745 18.745 49.137 18.746 67.882 0l204.118-204.118c18.745-18.745 18.745-49.137 0-67.882zm-22.627 45.255L271.196 475.314c-6.243 6.243-16.375 6.253-22.627 0L36.686 263.431A15.895 15.895 0 0 1 32 252.117V48c0-8.822 7.178-16 16-16h204.118c4.274 0 8.292 1.664 11.314 4.686l211.882 211.882c6.238 6.239 6.238 16.39 0 22.628zM144 124c11.028 0 20 8.972 20 20s-8.972 20-20 20-20-8.972-20-20 8.972-20 20-20m0-28c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z"></path></svg>
                            <p>{{__('words.web.voiceover.from_min')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M544 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM320 256c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm0-192c44.1 0 80 35.9 80 80s-35.9 80-80 80-80-35.9-80-80 35.9-80 80-80zm244 192h-40c-15.2 0-29.3 4.8-41.1 12.9 9.4 6.4 17.9 13.9 25.4 22.4 4.9-2.1 10.2-3.3 15.7-3.3h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm304.1 180c-33.4 0-41.7 12-80.1 12-38.4 0-46.7-12-80.1-12-36.3 0-71.6 16.2-92.3 46.9-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c0-23.8-7.2-45.9-19.6-64.3-20.7-30.7-56-46.9-92.3-46.9zM480 432c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 27.4 0 37.2 12 80.2 12s52.8-12 80.1-12c27.3 0 51.9 12.3 65.7 32.8 9.2 13.7 14.1 29.8 14.1 46.4V432zM157.1 268.9c-11.9-8.1-26-12.9-41.1-12.9H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c5.5 0 10.8 1.2 15.7 3.3 7.5-8.5 16.1-16 25.4-22.4z"></path></svg>
                            <p>{{__('words.web.voiceover.voice_artist')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M345.34 182.46a7.98 7.98 0 0 0-5.66-2.34c-2.05 0-4.1.78-5.66 2.34L226.54 289.94l-48.57-48.57a7.98 7.98 0 0 0-5.66-2.34c-2.05 0-4.1.78-5.66 2.34l-11.31 11.31c-3.12 3.12-3.12 8.19 0 11.31l65.54 65.54c1.56 1.56 3.61 2.34 5.66 2.34s4.09-.78 5.65-2.34l124.45-124.45c3.12-3.12 3.12-8.19 0-11.31l-11.3-11.31zM512 256c0-35.5-19.4-68.2-49.6-85.5 9.1-33.6-.3-70.4-25.4-95.5s-61.9-34.5-95.5-25.4C324.2 19.4 291.5 0 256 0s-68.2 19.4-85.5 49.6c-33.6-9.1-70.4.3-95.5 25.4s-34.5 61.9-25.4 95.5C19.4 187.8 0 220.5 0 256s19.4 68.2 49.6 85.5c-9.1 33.6.3 70.4 25.4 95.5 26.5 26.5 63.4 34.1 95.5 25.4 17.4 30.2 50 49.6 85.5 49.6s68.1-19.4 85.5-49.6c32.7 8.9 69.4.7 95.5-25.4 25.1-25.1 34.5-61.9 25.4-95.5 30.2-17.3 49.6-50 49.6-85.5zm-91.1 68.3c5.3 11.8 29.5 54.1-6.5 90.1-28.9 28.9-57.5 21.3-90.1 6.5C319.7 433 307 480 256 480c-52.1 0-64.7-49.5-68.3-59.1-32.6 14.8-61.3 22.2-90.1-6.5-36.8-36.7-10.9-80.5-6.5-90.1C79 319.7 32 307 32 256c0-52.1 49.5-64.7 59.1-68.3-5.3-11.8-29.5-54.1 6.5-90.1 36.8-36.9 80.8-10.7 90.1-6.5C192.3 79 205 32 256 32c52.1 0 64.7 49.5 68.3 59.1 11.8-5.3 54.1-29.5 90.1 6.5 36.8 36.7 10.9 80.5 6.5 90.1C433 192.3 480 205 480 256c0 52.1-49.5 64.7-59.1 68.3z"></path></svg>
                            <p>{{__('words.web.voiceover.audio_editing')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M328 0h-16a16 16 0 0 0-16 16v480a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16V16a16 16 0 0 0-16-16zm-96 96h-16a16 16 0 0 0-16 16v288a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16V112a16 16 0 0 0-16-16zm192 32h-16a16 16 0 0 0-16 16v224a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16V144a16 16 0 0 0-16-16zm96-64h-16a16 16 0 0 0-16 16v352a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zM136 192h-16a16 16 0 0 0-16 16v96a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16v-96a16 16 0 0 0-16-16zm-96 32H24a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm576 0h-16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path></svg>
                            <p>{{__('words.web.voiceover.top')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M244.5 230.9L52.5 71.4C31.9 54.3 0 68.6 0 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160.5c15.3-12.9 15.3-36.5 0-49.2zM224 255.4L32 416V96l192 159.4zm276.5-24.5l-192-159.4C287.9 54.3 256 68.6 256 96v320c0 27.4 31.9 41.8 52.5 24.6l192-160.5c15.3-12.9 15.3-36.5 0-49.2zM480 255.4L288 416V96l192 159.4z"></path></svg>
                            <p>{{__('words.web.voiceover.fast_time')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-l</title><path d="M478.33,433.6l-90-218a22,22,0,0,0-40.67,0l-90,218a22,22,0,1,0,40.67,16.79L316.66,406H419.33l18.33,44.39A22,22,0,0,0,458,464a22,22,0,0,0,20.32-30.4ZM334.83,362,368,281.65,401.17,362Z"></path><path d="M267.84,342.92a22,22,0,0,0-4.89-30.7c-.2-.15-15-11.13-36.49-34.73,39.65-53.68,62.11-114.75,71.27-143.49H330a22,22,0,0,0,0-44H214V70a22,22,0,0,0-44,0V90H54a22,22,0,0,0,0,44H251.25c-9.52,26.95-27.05,69.5-53.79,108.36-31.41-41.68-43.08-68.65-43.17-68.87a22,22,0,0,0-40.58,17c.58,1.38,14.55,34.23,52.86,83.93.92,1.19,1.83,2.35,2.74,3.51-39.24,44.35-77.74,71.86-93.85,80.74a22,22,0,1,0,21.07,38.63c2.16-1.18,48.6-26.89,101.63-85.59,22.52,24.08,38,35.44,38.93,36.1a22,22,0,0,0,30.75-4.9Z"></path></svg>
                            <p>{{__('words.web.voiceover.lang')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Icon with Description Section Ends -->
    <!-- Accordion Section Starts -->
    <div class="container-fluid bg-accordion-tts-pg">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-heading-tts-pg text-center">
                            <h2>{{__('words.web.voiceover.how_produce')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-home accordion-speech-production">
                            <h4>{{__('words.web.voiceover.uploadScript_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.voiceover.uploadScript_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.voiceover.selectLang_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.voiceover.selectLang_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.voiceover.selectVA')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.voiceover.selectVA_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.voiceover.optional_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.voiceover.optional_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.voiceover.calculate_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.voiceover.calculate_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.voiceover.start_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.voiceover.start_des')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Accordian Section Ends -->
    <!-- Booking Section Starts -->
    <div class="container-fluid bg-booking-tts-pg">
        <div class="bg-booking-tts-top-shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3	c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3	c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
            </svg>
        </div>
        <div class="bg-booking-tts-bottom-shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3	c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3	c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
            </svg>
        </div>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="booking-text-link-tts-pg text-center">
                            <p>{{__('words.web.voiceover.book')}}
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        {{__('words.web.voiceover.uploadScript')}}
                                    </a>
                                @else
                                    <a href="" onclick="showVoiceLoginToast(); return false;">
                                        {{__('words.web.voiceover.uploadScript')}}
                                    </a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Section Ends -->
    <!-- Icon + Heading and Description Section Starts -->
    <div class="container-fluid bg-ihd-tts-pg">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="tts-icon-pg text-center">
                            <svg class="purple" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path d="M176 352c53.02 0 96-42.98 96-96V96c0-53.02-42.98-96-96-96S80 42.98 80 96v160c0 53.02 42.98 96 96 96zm160-160h-16c-8.84 0-16 7.16-16 16v48c0 74.8-64.49 134.82-140.79 127.38C96.71 376.89 48 317.11 48 250.3V208c0-8.84-7.16-16-16-16H16c-8.84 0-16 7.16-16 16v40.16c0 89.64 63.97 169.55 152 181.69V464H96c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16h160c8.84 0 16-7.16 16-16v-16c0-8.84-7.16-16-16-16h-56v-33.77C285.71 418.47 352 344.9 352 256v-48c0-8.84-7.16-16-16-16z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="tts-ihd-ott tts-ihd-ott-one">
                            <h6>{{__('words.web.voiceover.trusted_head')}}</h6>
                            <p>{{__('words.web.voiceover.trusted_des')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="tts-ihd-ott tts-ihd-ott-two">
                            <h6>{{__('words.web.voiceover.pro_head')}}</h6>
                            <p>{{__('words.web.voiceover.pro_des')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="tts-ihd-ott tts-ihd-ott-three">
                            <h6>{{__('words.web.voiceover.transPricing_head')}}</h6>
                            <p>{{__('words.web.voiceover.transPricing_des')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="tts-ihd-ott tts-ihd-ott-four">
                            <h6>{{__('words.web.voiceover.ready_head')}}</h6>
                            <p>{{__('words.web.voiceover.ready_des')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Icon + Heading and Description Section Ends -->
    <!-- Price Table Section Starts -->
    <div class="container-fluid bg-price-table-ts-pg">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                        <div class="panel-ts">
                            <div class="panel-ts-heading-desc text-center">
                                <h3>{{__('words.web.voiceover.voice_head')}}</h3>
                                <p>{{__('words.web.voiceover.professional')}}</p>
                            </div>
                            <div class="panel-ts-price purple">
                                <p>{{__('words.web.voiceover.from')}} 25€<span>/{{__('words.web.voiceover.min')}}</span></p>
                            </div>
                            <ul class="ts-listing">
                                <li>{{__('words.web.voiceover.lang')}}</li>
                                <li>{{__('words.web.voiceover.artist')}}</li>
                                <li>{{__('words.web.voiceover.fast_time')}}</li>
                                <li>{{__('words.web.voiceover.top')}}</li>
                                <li>{{__('words.web.voiceover.audio_edit')}}</li>
                                <li>{{__('words.web.voiceover.voice_casting')}}</li>
                            </ul>
                            <div class="ts-button-text-info text-center">
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        {{__('words.web.voiceover.uploadScript')}}
                                    </a>
                                @else
                                    <a href="" class="btn-tts-bap btn-ts" onclick="showVoiceLoginToast(); return false;">
                                        {{__('words.web.voiceover.uploadScript')}}
                                    </a>
                                @endif
                                <p><a href="#" class="question">{{__('words.web.voiceover.any_question')}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price Table Section Ends -->
    <!-- Information Section Starts -->
    <div class="container-fluid bg-fa-iv-ts-pg">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="fa-iv-heading-ts-pg text-center">
                            <h2>{{__('words.web.voiceover.importance_head')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="fa-iv-info-ts-pg">
                            <p>{{__('words.web.voiceover.importance_des_1')}}</p>
                            <p>{{__('words.web.voiceover.importance_des_2')}}</p>
                            <h6>{{__('words.web.voiceover.podcasts_head')}}</h6>
                            <p>{{__('words.web.voiceover.podcasts_des')}}</p>
                            <h6>{{__('words.web.voiceover.explanatory_head')}}</h6>
                            <p>{{__('words.web.voiceover.explanatory_des')}}</p>
                            <h6>{{__('words.web.voiceover.learning_head')}}</h6>
                            <p>{{__('words.web.voiceover.learning_des')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Information Section Ends -->
@endsection
@section('script')
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Accordion JS -->
    <script src="{{asset('assets/js/accordion.js')}}"></script>
    <!-- Speech Production JS -->
    <script src="{{asset('assets/js/speech-production.js')}}"></script>
    <!-- Scroll Js -->
    <script src="{{asset('assets/js/scroll.js')}}"></script>
    <script>
        $('.close').click(function () {
            window.location.href = "{{route('voiceover')}}";
        });
        let modal_status = "{{$showModal}}";
        if(modal_status) {
            $('#myModal').modal('show');
        }
        function modalShow(){
            $('#myModal').modal('show');
        }
    </script>
@endsection