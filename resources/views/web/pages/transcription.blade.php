@extends('web.layouts.default')
@section('title', 'TRANSCRIPTION')
@section('content')

    <!-- Banner Section Starts -->
    <div class="container-fluid bg-banner-transcription-pg">
        <div class="bg-banner-tts-bottom-shape">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3	c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3	c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
            </svg>
        </div>
        <div class="row">
            <div class="banner-tts-heading-desc-pg">
                <h1>{{__('words.web.transcription.trans_head')}}</h1>
                <p>{{__('words.web.transcription.trans_des')}}</p>
                <div class="booking-text-link-tts-pg text-center">
                    <p>
                        @if(Auth::check())
                            <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                {{__('words.web.transcription.upload')}}
                            </a>
                        @else
                            <a href="" onclick="showMediaLoginToast(); return false;">
                                {{__('words.web.transcription.upload')}}
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
                    <h5 class="modal-title"><i class="fa fa-cloud-upload-alt" style="font-size: xx-large"></i>&nbsp;&nbsp;Media file upload (MP3, MOV, MP4, WAV, AIFF, FLAC, AAC, MKV, MKA, OGG)</h5>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default" style="margin-bottom: 0">
                        <div class="panel-body">
                            <form id="dropzoneForm" class="dropzone" action="{{ route('audio_file_upload') }}">
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
                            <p>{{__('words.web.transcription.from_min')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="93.523" height="94.767" viewBox="0 0 93.523 94.767"><g id="diamond_2_" data-name="diamond (2)" transform="translate(-3.358)"><g id="Group_143" data-name="Group 143" transform="translate(3.358 22.196)"><g id="Group_142" data-name="Group 142"><path id="Path_1055" data-name="Path 1055" d="M96.418,138.806,80.279,120.543a1.851,1.851,0,0,0-1.387-.625H21.349a1.851,1.851,0,0,0-1.387.625L3.822,138.806A1.85,1.85,0,0,0,4,141.431l.011.014,44.726,50.422a1.851,1.851,0,0,0,2.769,0l44.726-50.422.011-.014a1.85,1.85,0,0,0,.177-2.626ZM75.61,123.62,67.384,136.88,54.2,123.62ZM63.457,138.18H36.784L50.12,124.764ZM46.039,123.62,32.856,136.88,24.631,123.62Zm-24.977,1.269,8.245,13.292H9.315ZM9.346,141.882H31.22l15.11,41.694ZM53.979,183.5l10.557-28.573a1.851,1.851,0,1,0-3.472-1.283L50.137,183.216l-14.98-41.334H90.894ZM70.934,138.18l8.245-13.292L90.925,138.18Z" transform="translate(-3.358 -119.918)"></path></g></g><g id="Group_145" data-name="Group 145" transform="translate(48.269)"><g id="Group_144" data-name="Group 144"><path id="Path_1056" data-name="Path 1056" d="M247.851,0A1.851,1.851,0,0,0,246,1.851v9.535a1.851,1.851,0,1,0,3.7,0V1.851A1.851,1.851,0,0,0,247.851,0Z" transform="translate(-246)"></path></g></g><g id="Group_147" data-name="Group 147" transform="translate(57.073 6.773)"><g id="Group_146" data-name="Group 146"><path id="Path_1057" data-name="Path 1057" d="M303.466,37.137a1.851,1.851,0,0,0-2.618,0l-6.742,6.742a1.851,1.851,0,0,0,2.618,2.618l6.742-6.742A1.851,1.851,0,0,0,303.466,37.137Z" transform="translate(-293.564 -36.595)"></path></g></g><g id="Group_149" data-name="Group 149" transform="translate(32.363 6.773)"><g id="Group_148" data-name="Group 148"><path id="Path_1058" data-name="Path 1058" d="M169.963,43.879l-6.742-6.742a1.851,1.851,0,1,0-2.618,2.618l6.742,6.742a1.851,1.851,0,0,0,2.618-2.618Z" transform="translate(-160.061 -36.595)"></path></g></g><g id="Group_151" data-name="Group 151" transform="translate(63.341 47.82)"><g id="Group_150" data-name="Group 150"><circle id="Ellipse_220" data-name="Ellipse 220" cx="1.851" cy="1.851" r="1.851"></circle></g></g></g></svg>
                            <p>{{__('words.web.transcription.high_quality')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M393.3 141.3l17.5-17.5c4.7-4.7 4.7-12.3 0-17l-5.7-5.7c-4.7-4.7-12.3-4.7-17 0l-17.5 17.5c-35.8-31-81.5-50.9-131.7-54.2V32h25c6.6 0 12-5.4 12-12v-8c0-6.6-5.4-12-12-12h-80c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h23v32.6C91.2 73.3 0 170 0 288c0 123.7 100.3 224 224 224s224-100.3 224-224c0-56.1-20.6-107.4-54.7-146.7zM224 480c-106.1 0-192-85.9-192-192S117.9 96 224 96s192 85.9 192 192-85.9 192-192 192zm4-128h-8c-6.6 0-12-5.4-12-12V172c0-6.6 5.4-12 12-12h8c6.6 0 12 5.4 12 12v168c0 6.6-5.4 12-12 12z"></path></svg>
                            <p>{{__('words.web.transcription.request_time')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M509.21 275c-20.94-47.12-48.44-151.73-73.09-186.75A207.88 207.88 0 0 0 266.09 0H200C95.48 0 4.14 80.08.14 184.55A191.34 191.34 0 0 0 64 334.81V504a8 8 0 0 0 8 8h16a8 8 0 0 0 8-8V320.55L85.38 311a159.63 159.63 0 0 1-53.24-125.23C34.65 119.6 81.29 63.56 144 41.92v74.35a112 112 0 1 0 128 0V32.36a175.82 175.82 0 0 1 137.92 74.3c12.53 17.79 29.12 66.75 42.47 106.07 9.72 28.71 18.93 55.83 27.56 75.27H416v96a32 32 0 0 1-32 32h-96v88a8 8 0 0 0 8 8h16a8 8 0 0 0 8-8v-56h64a64 64 0 0 0 64-64v-64h32a32 32 0 0 0 29.21-45zM176 34.29c7.9-1.11 15.8-2.29 24-2.29h40v69.2c-10.2-3.06-20.8-5.2-32-5.2s-21.8 2.14-32 5.2zM288 208a80 80 0 1 1-80-80 80.08 80.08 0 0 1 80 80zm-80-48a48 48 0 1 0 48 48 48.05 48.05 0 0 0-48-48zm0 64a16 16 0 1 1 16-16 16 16 0 0 1-16 16z"></path></svg>
                            <p>{{__('words.web.transcription.manual_method')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><defs><style>.fa-secondary{opacity:.4}</style></defs><path d="M496 288H304a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0 128H304a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-256H304a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-128H304a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z" class="fa-secondary"></path><path d="M208 288H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0 128H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-384H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zm0 128H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z" class="fa-primary"></path></svg>
                            <p>{{__('words.web.transcription.prepared_trans')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="icon-desc-tts-pg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 256h-66.56c-16.26 0-29.44-13.18-29.44-29.44v-9.46c0-27.37 8.88-53.42 21.46-77.73 9.11-17.61 12.9-38.38 9.05-60.42-6.77-38.78-38.47-70.7-77.26-77.45C267.41.49 261.65 0 256 0c-53.02 0-96 42.98-96 96 0 14.16 3.12 27.54 8.68 39.57C182.02 164.43 192 194.71 192 226.5v.06c0 16.26-13.18 29.44-29.44 29.44H96c-53.02 0-96 42.98-96 96v32c0 17.67 14.33 32 32 32v64c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-64c17.67 0 32-14.33 32-32v-32c0-53.02-42.98-96-96-96zm32 224H64v-64h384v64zm32-96H32v-32c0-35.29 28.71-64 64-64h66.56c33.88 0 61.44-27.56 61.44-61.5 0-32.42-8.35-65.58-26.27-104.35-3.8-8.23-5.73-17.03-5.73-26.15 0-35.29 28.71-64 64-64 3.88 0 7.83.35 11.76 1.03 25.24 4.39 46.79 26.02 51.22 51.42 2.45 14.04.39 27.95-5.95 40.21C296.19 157.23 288 187.47 288 217.1v9.46c0 33.88 27.56 61.44 61.44 61.44H416c35.29 0 64 28.71 64 64v32z"></path></svg>
                            <p>{{__('words.web.transcription.timestamp_smooth')}}</p>
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
                        <div class="accordion-home accordion-transcription">
                            <h4>{{__('words.web.transcription.human_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.transcription.human_des_1')}}</p>
                                    <p>{{__('words.web.transcription.human_des_2')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.transcription.hidden_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.transcription.hidden_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.transcription.language_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.transcription.language_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.transcription.files_head')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.transcription.files_des')}}</p>
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
                            <p>{{__('words.web.transcription.book')}}
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        {{__('words.web.transcription.upload')}}
                                    </a>
                                @else
                                    <a href="" onclick="showMediaLoginToast(); return false;">
                                        {{__('words.web.transcription.upload')}}
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
    <!-- Price Table Section Starts -->
    <div class="container-fluid bg-price-table-transcription">
        <div class="row">
            <div class="container">
                <div class="row remove-margin-price-table">
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-transcription">
                            <div class="panel-transcription-heading-desc text-center">
                                <h3>{{__('words.web.transcription.basic')}}</h3>
                                <p>{{__('words.web.transcription.media_simple')}}</p>
                            </div>
                            <div class="panel-transcription-price orange">
                                <p>{{__('words.web.home.transcription.price')}}€<span>/min</span></p>
                            </div>
                            <ul class="transcription-listing">
                                <li>{{__('words.web.transcription.source_lang')}}</li>
                                <li>{{__('words.web.transcription.approx')}}</li>
                                <li>{{__('words.web.transcription.simple_rule')}}</li>
                                <li>{{__('words.web.transcription.timestamp')}}</li>
                                <li>{{__('words.web.transcription.smooth')}}</li>
                                <li>{{__('words.web.transcription.warranty')}}</li>
                                <li>{{__('words.web.transcription.basic_express')}}</li>
                            </ul>
                            <div class="transcription-button text-center">
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        <input type="hidden" id="basic" value="basic">
                                        {{__('words.web.transcription.upload_media_file')}}
                                    </a>
                                @else
                                    <a href="" class="btn-tts-bap btn-transcription" onclick="showMediaLoginToast(); return false;">
                                        {{__('words.web.transcription.upload_media_file')}}
                                    </a>
                                @endif
                                <p><a href="#" class="question">{{__('words.web.transcription.any_question')}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-transcription orange">
                            <div class="panel-transcription-heading-desc text-center">
                                <h3>{{__('words.web.transcription.advanced')}}</h3>
                                <p>{{__('words.web.transcription.recommendation')}}</p>
                            </div>
                            <div class="panel-transcription-price">
                                <p>{{__('words.web.transcription.price_1')}}€<span>/min</span></p>
                            </div>
                            <ul class="transcription-listing orange">
                                <li>{{__('words.web.transcription.source_lang')}}</li>
                                <li>{{__('words.web.transcription.guaranteed')}}</li>
                                <li>{{__('words.web.transcription.simple_rule')}}</li>
                                <li>{{__('words.web.transcription.timestamp_include')}}</li>
                                <li>{{__('words.web.transcription.smooth_include')}}</li>
                                <li>{{__('words.web.transcription.ready')}}</li>
                                <li>{{__('words.web.transcription.advanced_express')}}</li>
                            </ul>
                            <div class="transcription-button text-center">
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        <input type="hidden" id="advanced" value="advanced">
                                        {{__('words.web.transcription.upload_media_file')}}
                                    </a>
                                @else
                                    <a href="" class="btn-tts-bap btn-transcription-white" onclick="showMediaLoginToast(); return false;">
                                        {{__('words.web.transcription.upload_media_file')}}
                                    </a>
                                @endif
                                <p><a href="#" class="question">{{__('words.web.transcription.any_question')}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-transcription">
                            <div class="panel-transcription-heading-desc text-center">
                                <h3>{{__('words.web.transcription.premium')}}</h3>
                                <p>{{__('words.web.transcription.demand')}}</p>
                            </div>
                            <div class="panel-transcription-price">
                                <p>{{__('words.web.transcription.price_2')}}€<span>/min</span></p>
                            </div>
                            <ul class="transcription-listing">
                                <li>{{__('words.web.transcription.source_lang')}}</li>
                                <li>{{__('words.web.transcription.guaranteed')}}</li>
                                <li>{{__('words.web.transcription.advanced_rule')}}</li>
                                <li>{{__('words.web.transcription.timestamp_include')}}</li>
                                <li>{{__('words.web.transcription.smooth_include')}}</li>
                                <li>{{__('words.web.transcription.ready')}}</li>
                                <li>{{__('words.web.transcription.proofreading')}}</li>
                                <li>{{__('words.web.transcription.advanced_express')}}</li>
                            </ul>
                            <div class="transcription-button text-center">
                                @if(Auth::check())
                                    <a href="javascript:modalShow()" data-backdrop="static" data-keyboard="false">
                                        <input type="hidden" id="premium" value="premium">
                                        {{__('words.web.transcription.upload_media_file')}}
                                    </a>
                                @else
                                    <a href="" class="btn-tts-bap btn-transcription" onclick="showMediaLoginToast(); return false;">
                                        {{__('words.web.transcription.upload_media_file')}}
                                    </a>
                                @endif
                                <p><a href="#" class="question">{{__('words.web.transcription.any_question')}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price Table Section Ends -->
    <!-- Box Information Section Starts -->
    <div class="container-fluid bg-esgz-transcription">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="box-esgz-information-transcription-pg box-esgz-information-transcription-pg-one">
                            <h5>{{__('words.web.transcription.experience_head')}}</h5>
                            <p>{{__('words.web.transcription.experience_des_1')}}</p>
                            <p>{{__('words.web.transcription.experience_des_2')}}</p>
                            <p>{{__('words.web.transcription.experience_des_3')}}</p>
                        </div>
                        <div class="box-esgz-information-transcription-pg box-esgz-information-transcription-pg-two">
                            <h5>{{__('words.web.transcription.smoothing_head')}}</h5>
                            <p>{{__('words.web.transcription.smoothing_des_1')}}</p>
                            <p>{{__('words.web.transcription.smoothing_des_2')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="box-esgz-information-transcription-pg box-esgz-information-transcription-pg-three">
                            <h5>{{__('words.web.transcription.80_languages_head')}}</h5>
                            <p>{{__('words.web.transcription.80_languages_des_1')}}</p>
                            <p>{{__('words.web.transcription.80_languages_des_2')}}</p>
                        </div>
                        <div class="box-esgz-information-transcription-pg box-esgz-information-transcription-pg-four">
                            <h5>{{__('words.web.transcription.timestamp_head')}}</h5>
                            <p>{{__('words.web.transcription.timestamp_des_1')}}</p>
                            <p>{{__('words.web.transcription.timestamp_des_2')}}</p>
                            <p>{{__('words.web.transcription.timestamp_des_3')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Box Information Section Ends -->
    <!-- Information Section Starts -->
    <div class="container-fluid bg-fa-iv-ts-pg">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="fa-iv-heading-ts-pg text-center">
                            <h2>{{__('words.web.transcription.trans_mean_head')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="fa-iv-info-ts-pg">
                            <p>{{__('words.web.transcription.trans_mean_des_1')}}</p>
                            <p>{{__('words.web.transcription.trans_mean_des_2')}}</p>
                            <p>{{__('words.web.transcription.trans_mean_des_3')}}</p>
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
    <!-- Transcription Page JS -->
    <script src="{{asset('assets/js/transcription.js')}}"></script>
    <!-- Scroll Js -->
    <script src="{{asset('assets/js/scroll.js')}}"></script>
    <script>
        $('.close').click(function () {
            window.location.href = "{{route('transcription')}}";
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