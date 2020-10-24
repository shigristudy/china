@extends('web.layouts.default')
@section('title', 'TRANSLATION')
@section('content')
    <!-- Banner Section Starts -->
    <div class="container-fluid bg-banner-translation-pg">
        <div class="bg-banner-tts-bottom-shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3	c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3	c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
            </svg>
        </div>
        <div class="row">
            <div class="banner-tts-heading-desc-pg">
                <h1>{{__('words.web.translation.trans_head')}}</h1>
                <p>{{__('words.web.translation.trans_des')}}</p>
                <div class="booking-text-link-tts-pg text-center">
                    <p>
                        @if(Auth::check())
                            <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                {{__('words.web.translation.upload')}}
                            </a>
                        @else
                            <a href="" onclick="showTransLoginToast(); return false;">
                                {{__('words.web.translation.upload')}}
                            </a>
                        @endif
                    </p>
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
                        <h4 class="modal-title"><i class="fa fa-cloud-upload-alt" style="font-size: xx-large"></i>&nbsp;&nbsp;Script file upload (Text documents)</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel panel-default" style="margin-bottom: 0">
                            <div class="panel-body">
                                <form id="dropzoneForm" class="dropzone" action="{{ route('trans_file_upload') }}">
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
                            <p>{{__('words.web.translation.from_word')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M544 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zM320 256c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm0-192c44.1 0 80 35.9 80 80s-35.9 80-80 80-80-35.9-80-80 35.9-80 80-80zm244 192h-40c-15.2 0-29.3 4.8-41.1 12.9 9.4 6.4 17.9 13.9 25.4 22.4 4.9-2.1 10.2-3.3 15.7-3.3h40c24.2 0 44 21.5 44 48 0 8.8 7.2 16 16 16s16-7.2 16-16c0-44.1-34.1-80-76-80zM96 224c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80zm0-128c26.5 0 48 21.5 48 48s-21.5 48-48 48-48-21.5-48-48 21.5-48 48-48zm304.1 180c-33.4 0-41.7 12-80.1 12-38.4 0-46.7-12-80.1-12-36.3 0-71.6 16.2-92.3 46.9-12.4 18.4-19.6 40.5-19.6 64.3V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-44.8c0-23.8-7.2-45.9-19.6-64.3-20.7-30.7-56-46.9-92.3-46.9zM480 432c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16v-44.8c0-16.6 4.9-32.7 14.1-46.4 13.8-20.5 38.4-32.8 65.7-32.8 27.4 0 37.2 12 80.2 12s52.8-12 80.1-12c27.3 0 51.9 12.3 65.7 32.8 9.2 13.7 14.1 29.8 14.1 46.4V432zM157.1 268.9c-11.9-8.1-26-12.9-41.1-12.9H76c-41.9 0-76 35.9-76 80 0 8.8 7.2 16 16 16s16-7.2 16-16c0-26.5 19.8-48 44-48h40c5.5 0 10.8 1.2 15.7 3.3 7.5-8.5 16.1-16 25.4-22.4z"></path></svg>
                            <p>{{__('words.web.translation.qualified_trans')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M345.34 182.46a7.98 7.98 0 0 0-5.66-2.34c-2.05 0-4.1.78-5.66 2.34L226.54 289.94l-48.57-48.57a7.98 7.98 0 0 0-5.66-2.34c-2.05 0-4.1.78-5.66 2.34l-11.31 11.31c-3.12 3.12-3.12 8.19 0 11.31l65.54 65.54c1.56 1.56 3.61 2.34 5.66 2.34s4.09-.78 5.65-2.34l124.45-124.45c3.12-3.12 3.12-8.19 0-11.31l-11.3-11.31zM512 256c0-35.5-19.4-68.2-49.6-85.5 9.1-33.6-.3-70.4-25.4-95.5s-61.9-34.5-95.5-25.4C324.2 19.4 291.5 0 256 0s-68.2 19.4-85.5 49.6c-33.6-9.1-70.4.3-95.5 25.4s-34.5 61.9-25.4 95.5C19.4 187.8 0 220.5 0 256s19.4 68.2 49.6 85.5c-9.1 33.6.3 70.4 25.4 95.5 26.5 26.5 63.4 34.1 95.5 25.4 17.4 30.2 50 49.6 85.5 49.6s68.1-19.4 85.5-49.6c32.7 8.9 69.4.7 95.5-25.4 25.1-25.1 34.5-61.9 25.4-95.5 30.2-17.3 49.6-50 49.6-85.5zm-91.1 68.3c5.3 11.8 29.5 54.1-6.5 90.1-28.9 28.9-57.5 21.3-90.1 6.5C319.7 433 307 480 256 480c-52.1 0-64.7-49.5-68.3-59.1-32.6 14.8-61.3 22.2-90.1-6.5-36.8-36.7-10.9-80.5-6.5-90.1C79 319.7 32 307 32 256c0-52.1 49.5-64.7 59.1-68.3-5.3-11.8-29.5-54.1 6.5-90.1 36.8-36.9 80.8-10.7 90.1-6.5C192.3 79 205 32 256 32c52.1 0 64.7 49.5 68.3 59.1 11.8-5.3 54.1-29.5 90.1 6.5 36.8 36.7 10.9 80.5 6.5 90.1C433 192.3 480 205 480 256c0 52.1-49.5 64.7-59.1 68.3z"></path></svg>
                            <p>{{__('words.web.translation.quality')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497.9 97.98L414.02 14.1c-9-9-21.19-14.1-33.89-14.1H176c-26.5.1-47.99 21.6-47.99 48.09V165.7c-5.97 0-11.94-1.68-24.13-5.03-1.7-.46-3.36-.66-4.96-.66-5.56 0-10.43 2.5-13.66 5.79-17.95 18.26-17.07 17.77-41.7 24.5-6.7 1.81-11.97 7.21-13.78 14.07-6.47 24.67-6.09 24.16-24.02 42.32-4.95 5.04-6.9 12.48-5.08 19.43 6.56 24.38 6.52 24.39 0 48.76-1.82 6.95.12 14.4 5.08 19.45 18 18.15 17.58 17.79 24.02 42.29 1.8 6.88 7.08 12.27 13.78 14.1 1.8.48 2.92.8 4.46 1.21V496c0 5.55 2.87 10.69 7.59 13.61 4.66 2.91 10.59 3.16 15.56.7l56.84-28.42 56.84 28.42c2.25 1.12 4.72 1.69 7.16 1.69h272c26.49 0 47.99-21.5 47.99-47.99V131.97c0-12.69-5.1-24.99-14.1-33.99zM384.03 32.59c2.8.7 5.3 2.1 7.4 4.2l83.88 83.88c2.1 2.1 3.5 4.6 4.2 7.4h-95.48V32.59zM33.28 316.68c5.7-22.3 5.7-30.23.01-52.39 15.65-16.2 19.56-22.98 25.63-45.06 21.57-6.13 28.06-9.92 43.88-25.69 9.8 2.62 16.82 4.15 25.21 4.15 8.28 0 15.25-1.49 25.19-4.16 15.56 15.51 22.49 19.58 43.86 25.68 5.98 21.95 9.71 28.63 25.65 45.07-5.77 22.45-5.76 30 0 52.4-15.62 16.17-19.55 22.96-25.61 44.96-14.63 3.92-24 7.36-37.25 19.36-9.94-4.53-20.78-6.89-31.85-6.89s-21.9 2.36-31.85 6.9c-13.18-11.88-22.56-15.34-37.23-19.33-5.97-21.89-9.72-28.57-25.64-45zm101.89 133.01c-4.5-2.25-9.81-2.25-14.31 0l-40.84 20.42V409.9c.12.12.19.17.31.29 3.75 3.82 8.68 5.79 13.64 5.79 3.5 0 7.02-.98 10.16-2.97 7.25-4.59 15.56-6.88 23.87-6.88s16.62 2.29 23.87 6.86c3.16 2.02 6.68 3.01 10.17 3.01 4.96 0 9.87-1.99 13.63-5.79.13-.13.21-.18.34-.32v60.22l-40.84-20.42zm344.84 14.32c0 8.8-7.2 16-16 16h-256V391.9c1.54-.4 2.65-.71 4.44-1.19 6.7-1.82 11.97-7.22 13.77-14.08 6.47-24.68 6.09-24.16 24.03-42.32 4.95-5.04 6.9-12.49 5.07-19.44-6.53-24.33-6.55-24.34 0-48.76 1.83-6.95-.12-14.4-5.07-19.45-18-18.15-17.58-17.79-24.03-42.29-1.8-6.87-7.07-12.27-13.75-14.09-24.23-6.57-23.89-6.23-41.72-24.52-2.94-2.97-6.78-4.52-10.74-5.16V48.09c0-8.8 7.2-16.09 16-16.09h176.03v104.07c0 13.3 10.7 23.93 24 23.93h103.98v304.01z"></path></svg>
                            <p>{{__('words.web.translation.iso_certified')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-l</title><path d="M478.33,433.6l-90-218a22,22,0,0,0-40.67,0l-90,218a22,22,0,1,0,40.67,16.79L316.66,406H419.33l18.33,44.39A22,22,0,0,0,458,464a22,22,0,0,0,20.32-30.4ZM334.83,362,368,281.65,401.17,362Z"></path><path d="M267.84,342.92a22,22,0,0,0-4.89-30.7c-.2-.15-15-11.13-36.49-34.73,39.65-53.68,62.11-114.75,71.27-143.49H330a22,22,0,0,0,0-44H214V70a22,22,0,0,0-44,0V90H54a22,22,0,0,0,0,44H251.25c-9.52,26.95-27.05,69.5-53.79,108.36-31.41-41.68-43.08-68.65-43.17-68.87a22,22,0,0,0-40.58,17c.58,1.38,14.55,34.23,52.86,83.93.92,1.19,1.83,2.35,2.74,3.51-39.24,44.35-77.74,71.86-93.85,80.74a22,22,0,1,0,21.07,38.63c2.16-1.18,48.6-26.89,101.63-85.59,22.52,24.08,38,35.44,38.93,36.1a22,22,0,0,0,30.75-4.9Z"></path></svg>
                            <p>{{__('words.web.translation.lang')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M312.5 168.5c-4.7-4.7-12.3-4.7-17 0l-98.3 98.3c-4.7 4.7-4.7 12.3 0 17l5.7 5.7c4.7 4.7 12.3 4.7 17 0l68.2-68.2V372c0 6.6 5.4 12 12 12h8c6.6 0 12-5.4 12-12V221.3l68.2 68.2c4.7 4.7 12.3 4.7 17 0l5.7-5.7c4.7-4.7 4.7-12.3 0-17l-98.5-98.3zm259.2 70.3c2.8-9.9 4.3-20.2 4.3-30.8 0-61.9-50.1-112-112-112-16.7 0-32.9 3.6-48 10.8-31.6-45-84.3-74.8-144-74.8-94.4 0-171.7 74.5-175.8 168.2C39.2 220.2 0 274.3 0 336c0 79.6 64.4 144 144 144h368c70.7 0 128-57.2 128-128 0-47-25.8-90.8-68.3-113.2zM512 448H144c-61.9 0-112-50.1-112-112 0-56.8 42.2-103.7 97-111-.7-5.6-1-11.3-1-17 0-79.5 64.5-144 144-144 60.3 0 111.9 37 133.4 89.6C420 137.9 440.8 128 464 128c44.2 0 80 35.8 80 80 0 18.5-6.3 35.6-16.9 49.2C573 264.4 608 304.1 608 352c0 53-43 96-96 96z"></path></svg>
                            <p>{{__('words.web.translation.file_format')}}</p>
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
                            <h2>{{__('words.web.translation.how_we_translate')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-home accordion-translation">
                            <h4>{{__('words.web.translation.docAnalysis_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.translation.docAnalysis_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.translation.proManagement_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.translation.proManagement_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.translation.professional_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.translation.professional_des_1')}}</p>
                                    <p>{{__('words.web.translation.professional_des_2')}}</p>
                                    <p>{{__('words.web.translation.professional_des_3')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.translation.transReview_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.translation.transReview_des_1')}}</p>
                                    <p>{{__('words.web.translation.transReview_des_2')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.translation.finalApproval_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.translation.finalApproval_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.translation.delivery_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.translation.delivery_des')}}</p>
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
                            <p>{{__('words.web.translation.book')}}
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        {{__('words.web.translation.upload')}}
                                    </a>
                                @else
                                    <a href="" onclick="showTransLoginToast(); return false;">
                                        {{__('words.web.translation.upload')}}
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
                            <svg class="pink" xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><title>ionicons-v5-l</title><path d="M478.33,433.6l-90-218a22,22,0,0,0-40.67,0l-90,218a22,22,0,1,0,40.67,16.79L316.66,406H419.33l18.33,44.39A22,22,0,0,0,458,464a22,22,0,0,0,20.32-30.4ZM334.83,362,368,281.65,401.17,362Z"></path><path d="M267.84,342.92a22,22,0,0,0-4.89-30.7c-.2-.15-15-11.13-36.49-34.73,39.65-53.68,62.11-114.75,71.27-143.49H330a22,22,0,0,0,0-44H214V70a22,22,0,0,0-44,0V90H54a22,22,0,0,0,0,44H251.25c-9.52,26.95-27.05,69.5-53.79,108.36-31.41-41.68-43.08-68.65-43.17-68.87a22,22,0,0,0-40.58,17c.58,1.38,14.55,34.23,52.86,83.93.92,1.19,1.83,2.35,2.74,3.51-39.24,44.35-77.74,71.86-93.85,80.74a22,22,0,1,0,21.07,38.63c2.16-1.18,48.6-26.89,101.63-85.59,22.52,24.08,38,35.44,38.93,36.1a22,22,0,0,0,30.75-4.9Z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="tts-ihd-ott tts-ihd-ott-four">
                            <h6>{{__('words.web.translation.cost_head')}}</h6>
                            <p>{{__('words.web.translation.cost_des')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="tts-ihd-ott tts-ihd-ott-two">
                            <h6>{{__('words.web.translation.certified_head')}}</h6>
                            <p>{{__('words.web.translation.certified_des')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="tts-ihd-ott tts-ihd-ott-three">
                            <h6>{{__('words.web.translation.projectManage_head')}}</h6>
                            <p>{{__('words.web.translation.projectManage_des')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="tts-ihd-ott tts-ihd-ott-one">
                            <h6>{{__('words.web.translation.ocr_head')}}</h6>
                            <p>{{__('words.web.translation.ocr_des')}}</p>
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
                <div class="row remove-margin-price-table">
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-ts">
                            <div class="panel-ts-heading-desc text-center">
                                <h3>{{__('words.web.translation.basic')}}</h3>
                                <p>{{__('words.web.translation.economy')}}</p>
                            </div>
                            <div class="panel-ts-price orange">
                                <p>{{__('words.web.translation.from')}} {{__('words.web.home.translation.price')}}€<span>/{{__('words.web.translation.word')}}</span></p>
                            </div>
                            <ul class="ts-listing">
                                <li>{{__('words.web.translation.target_lang')}}</li>
                                <li>{{__('words.web.translation.machine')}}</li>
                                <li>{{__('words.web.translation.incl_light')}}</li>
                                <li>{{__('words.web.translation.speed')}}</li>
                                <li>{{__('words.web.translation.low_price')}}</li>
                                <li>{{__('words.web.translation.non_critical')}}</li>
                            </ul>
                            <div class="ts-button-text-info text-center">
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        <input type="hidden" id="basic" value="trans_basic">
                                        {{__('words.web.translation.upload')}}
                                    </a>
                                @else
                                    <a href="" class="btn-tts-bap btn-ts" onclick="showTransLoginToast(); return false;">
                                        {{__('words.web.translation.upload')}}
                                    </a>
                                @endif
                                <p><a href="#" class="question">{{__('words.web.translation.any_question')}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-ts orange">
                            <div class="panel-ts-heading-desc text-center">
                                <h3>{{__('words.web.translation.advanced')}}</h3>
                                <p>{{__('words.web.translation.recommendation')}}</p>
                            </div>
                            <div class="panel-ts-price">
                                <p>{{__('words.web.translation.from')}} {{__('words.web.translation.price_1')}}€<span>/{{__('words.web.translation.word')}}</span></p>
                            </div>
                            <ul class="ts-listing orange">
                                <li>{{__('words.web.translation.target_lang')}}</li>
                                <li>{{__('words.web.translation.iso')}}</li>
                                <li>{{__('words.web.translation.mt_translators')}}</li>
                                <li>{{__('words.web.translation.advanced_revision')}}</li>
                                <li>{{__('words.web.translation.top')}}</li>
                                <li>{{__('words.web.translation.advanced_proofreading')}}</li>
                                <li>{{__('words.web.translation.advanced_business')}}</li>
                            </ul>
                            <div class="ts-button-text-info text-center">
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        <input type="hidden" id="basic" value="trans_advanced">
                                        {{__('words.web.translation.upload')}}
                                    </a>
                                @else
                                    <a href="" class="btn-tts-bap btn-transcription-white" onclick="showTransLoginToast(); return false;">
                                        {{__('words.web.translation.upload')}}
                                    </a>
                                @endif
                                <p><a href="#" class="question">{{__('words.web.translation.any_question')}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-ts">
                            <div class="panel-ts-heading-desc text-center">
                                <h3>{{__('words.web.translation.premium')}}</h3>
                                <p>{{__('words.web.translation.demand')}}</p>
                            </div>
                            <div class="panel-ts-price">
                                <p>{{__('words.web.translation.from')}} {{__('words.web.translation.price_2')}}€<span>/{{__('words.web.translation.word')}}</span></p>
                            </div>
                            <ul class="ts-listing">
                                <li>{{__('words.web.translation.target_lang')}}</li>
                                <li>{{__('words.web.translation.iso')}}</li>
                                <li>{{__('words.web.translation.mt_translators')}}</li>
                                <li>{{__('words.web.translation.premium_revision')}}</li>
                                <li>{{__('words.web.translation.premium_proofreading')}}</li>
                                <li>{{__('words.web.translation.optimal_result')}}</li>
                                <li>{{__('words.web.translation.premium_business')}}</li>
                            </ul>
                            <div class="ts-button-text-info text-center">
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        <input type="hidden" id="premium" value="trans_premium">
                                        {{__('words.web.translation.upload')}}
                                    </a>
                                @else
                                    <a href="" class="btn-tts-bap btn-ts" onclick="showTransLoginToast(); return false;">
                                        {{__('words.web.translation.upload')}}
                                    </a>
                                @endif
                                <p><a href="#" class="question">{{__('words.web.translation.any_question')}}</a></p>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="fa-iv-info-ts-pg">
                            <h6>{{__('words.web.translation.why_aivox_head')}}</h6>
                            <p>{{__('words.web.translation.why_aivox_des_1')}}</p>
                            <p>{{__('words.web.translation.why_aivox_des_2')}}</p>
                            <p>{{__('words.web.translation.why_aivox_des_3')}}</p>
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
    <!-- Translation Page JS -->
    <script src="{{asset('assets/js/translation.js')}}"></script>
    <!-- Scroll Js -->
    <script src="{{asset('assets/js/scroll.js')}}"></script>
    <script>
        $('.close').click(function () {
            window.location.href = "{{route('translation')}}";
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