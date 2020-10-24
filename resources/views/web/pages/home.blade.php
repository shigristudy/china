@extends('web.layouts.default')
@section('title', 'HOME')
@section('style')
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/slick.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/slick-theme.min.css')}}" type="text/css" />
@endsection
@section('content')
    <!-- Banner Section Starts -->
    <div class="container-fluid bg-banner-home" id="home">
        <div class="bg-banner-bottom-shape-home">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z"></path>
                <path class="elementor-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
                <path class="elementor-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z"></path>
            </svg>
        </div>
        <div class="row">
            <div class="banner-info-home">
                <h1>{{__('words.web.home.featured_head')}}</h1>
                <p>{{__('words.web.home.featured_des')}}</p>
            </div>
        </div>
    </div>
    <!-- Banner Section Ends -->
    <!-- Transcription, Translation and Speech Production Box Section Starts -->
    <div class="container-fluid bg-ttsp-box-home">
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="panel-ttsp-home panel-ttsp-home-one">
                    <a href="{{route('transcription')}}">
                        <img src="{{asset('assets/images/home-1.jpg')}}" class="img-responsive" alt="" />
                    </a>
                    <div class="panel-body-ttsp-home panel-body-ttsp-one-home">
                        <a href="{{route('transcription')}}">
                            <h3>{{__('words.web.transcription.trans_head')}}</h3>
                            <p>{{__('words.web.transcription.trans_des')}}</p>
                        </a>
                    </div>
                    <div class="panel-ttsp-right-box-home">
                        <h3>{{__('words.web.transcription.from')}} {{__('words.web.home.transcription.price')}}€</h3>
                        <p>/{{__('words.web.transcription.min')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="panel-ttsp-home panel-ttsp-home-two">
                    <a href="{{route('translation')}}">
                        <img src="{{asset('assets/images/home-2.jpg')}}" class="img-responsive" alt="" />
                    </a>
                    <div class="panel-body-ttsp-home panel-body-ttsp-two-home">
                        <a href="{{route('translation')}}">
                            <h3>{{__('words.web.translation.trans_head')}}</h3>
                            <p>{{__('words.web.translation.trans_des')}}</p>
                        </a>
                    </div>
                    <div class="panel-ttsp-right-box-home">
                        <h3>{{__('words.web.translation.from')}} {{__('words.web.home.translation.price')}}€</h3>
                        <p>/{{__('words.web.translation.word')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="panel-ttsp-home panel-ttsp-home-three">
                    <a href="{{route('voiceover')}}">
                        <img src="{{asset('assets/images/home-3.jpg')}}" class="img-responsive" alt="" />
                    </a>
                    <div class="panel-body-ttsp-home panel-body-ttsp-three-home">
                        <a href="{{route('voiceover')}}">
                            <h3>{{__('words.web.voiceover.voice_head')}}</h3>
                            <p>{{__('words.web.voiceover.voice_des')}}</p>
                        </a>
                    </div>
                    <div class="panel-ttsp-right-box-home">
                        <h3>{{__('words.web.voiceover.from')}} {{__('words.web.home.voiceover.price')}}€</h3>
                        <p>/{{__('words.web.voiceover.min')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Transcription, Translation and Speech Production Box Section Ends -->
    <!-- Client Logo Section Starts -->
    <div class="container-fluid bg-client-logo-home">
        <div class="row">
            <div class="col-xs-12">
                <div class="client-logo-slick-slider-home">
                    <div><img src="{{asset('assets/images/client-1.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-2.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-3.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-4.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-5.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-6.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-7.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-8.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-9.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                    <div><img src="{{asset('assets/images/client-10.jpg')}}" class="img-responsive img-client-logo-home" alt="" /></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Client Logo Section Ends -->
    <!-- Transcription, Translation and Speak Icon-Heading-Desc Section Starts -->
    <div class="container-fluid bg-tts-icon-heading-desc-home">
        <div class="bg-tts-icon-heading-desc-overlay-home"></div>
        <div class="bg-tts-top-shape-home">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
		c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
		c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
            </svg>
        </div>
        <div class="bg-tts-bottom-shape-home">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3
				c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3
				c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
            </svg>
        </div>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="panel-tts-ihd-home panel-tts-ihd-home-one">
                            <img src="{{asset('assets/images/headset.png')}}" class="img-responsive" alt="" />
                            <h3>1. {{__('words.web.home.transcribe')}}</h3>
                            <p>{{__('words.web.home.transcribe_des')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="panel-tts-ihd-home panel-tts-ihd-home-two">
                            <img src="{{asset('assets/images/language.png')}}" class="img-responsive" alt="" />
                            <h3>2. {{__('words.web.home.translate')}}</h3>
                            <p>{{__('words.web.home.translate_des')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="panel-tts-ihd-home panel-tts-ihd-home-three">
                            <img src="{{asset('assets/images/mic.png')}}" class="img-responsive" alt="" />
                            <h3>3. {{__('words.web.home.record')}}</h3>
                            <p>{{__('words.web.home.record_des')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Transcription, Translation and Speak Icon-Heading-Desc Section Ends -->
    <!-- Testimonials Section Starts -->
    <div class="container-fluid bg-testimonials-home">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="testimonials-heading text-center">
                            <h2>{{__('words.web.home.our_voice_head')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="testimonials-slick-slider-home">
                            <div>
                                <div class="testimonial-review">
                                    <p>{{__('words.web.home.our_voice_text1')}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                                        <div class="media media-testimonial">
                                            <div class="media-left media-left-testimonial">
                                                <img src="{{asset('assets/images/testimonial-1.jpg')}}" class="media-object" alt="" />
                                            </div>
                                            <div class="media-body media-body-testimonial">
                                                <h4 class="media-heading">{{__('words.web.home.our_voice_mauricio')}}</h4>
                                                <p>{{__('words.web.home.our_voice_latin')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="testimonial-review">
                                    <p>{{__('words.web.home.our_voice_text2')}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                                        <div class="media media-testimonial">
                                            <div class="media-left media-left-testimonial">
                                                <img src="{{asset('assets/images/testimonial-2.jpg')}}" class="media-object" alt="" />
                                            </div>
                                            <div class="media-body media-body-testimonial">
                                                <h4 class="media-heading">{{__('words.web.home.our_voice_gabi')}}</h4>
                                                <p>{{__('words.web.home.our_voice_german1')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="testimonial-review">
                                    <p>{{__('words.web.home.our_voice_text3')}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                                        <div class="media media-testimonial">
                                            <div class="media-left media-left-testimonial">
                                                <img src="{{asset('assets/images/testimonial-3.jpg')}}" class="media-object" alt="" />
                                            </div>
                                            <div class="media-body media-body-testimonial">
                                                <h4 class="media-heading">{{__('words.web.home.our_voice_zhenyu')}}</h4>
                                                <p>{{__('words.web.home.our_voice_mandarin1')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="testimonial-review">
                                    <p>{{__('words.web.home.our_voice_text4')}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                                        <div class="media media-testimonial">
                                            <div class="media-left media-left-testimonial">
                                                <img src="{{asset('assets/images/testimonial-4.jpg')}}" class="media-object" alt="" />
                                            </div>
                                            <div class="media-body media-body-testimonial">
                                                <h4 class="media-heading">{{__('words.web.home.our_voice_feifeng')}}</h4>
                                                <p>{{__('words.web.home.our_voice_mandarin2')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="testimonial-review">
                                    <p>{{__('words.web.home.our_voice_text5')}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                                        <div class="media media-testimonial">
                                            <div class="media-left media-left-testimonial">
                                                <img src="{{asset('assets/images/testimonial-5.jpg')}}" class="media-object" alt="" />
                                            </div>
                                            <div class="media-body media-body-testimonial">
                                                <h4 class="media-heading">{{__('words.web.home.our_voice_paul')}}</h4>
                                                <p>{{__('words.web.home.our_voice_uk')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="testimonial-review">
                                    <p>{{__('words.web.home.our_voice_text6')}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                                        <div class="media media-testimonial">
                                            <div class="media-left media-left-testimonial">
                                                <img src="{{asset('assets/images/testimonial-6.jpg')}}" class="media-object" alt="" />
                                            </div>
                                            <div class="media-body media-body-testimonial">
                                                <h4 class="media-heading">{{__('words.web.home.our_voice_gilles')}}</h4>
                                                <p>{{__('words.web.home.our_voice_german2')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="testimonial-review">
                                    <p>{{__('words.web.home.our_voice_text7')}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                                        <div class="media media-testimonial">
                                            <div class="media-left media-left-testimonial">
                                                <img src="{{asset('assets/images/testimonial-7.jpg')}}" class="media-object" alt="" />
                                            </div>
                                            <div class="media-body media-body-testimonial">
                                                <h4 class="media-heading">{{__('words.web.home.our_voice_yezi')}}</h4>
                                                <p>{{__('words.web.home.our_voice_mandarin3')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Section Ends -->
    <!-- Company Information Section Starts -->
    <div class="container-fluid bg-company-info-home">
        <div class="company-info-top-shape-home">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3
				c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3
				c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
            </svg>
        </div>
        <div class="company-info-bottom-shape-home">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                <path class="elementor-shape-fill" d="M790.5,93.1c-59.3-5.3-116.8-18-192.6-50c-29.6-12.7-76.9-31-100.5-35.9c-23.6-4.9-52.6-7.8-75.5-5.3
				c-10.2,1.1-22.6,1.4-50.1,7.4c-27.2,6.3-58.2,16.6-79.4,24.7c-41.3,15.9-94.9,21.9-134,22.6C72,58.2,0,25.8,0,25.8V100h1000V65.3
				c0,0-51.5,19.4-106.2,25.7C839.5,97,814.1,95.2,790.5,93.1z"></path>
            </svg>
        </div>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="company-info-home company-info-home-one">
                            <p>{{__('words.web.home.about_us_1')}}</p>
                            <p>{{__('words.web.home.about_us_2')}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="company-info-home company-info-home-two">
                            <p>{{__('words.web.home.about_us_3')}}</p>
                            <p>{{__('words.web.home.about_us_4')}}</p>
                            <p>{{__('words.web.home.about_us_5')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Company Information Section Ends -->
    <!-- Important Accordion Section Starts -->
    <div class="container-fluid bg-imp-accordion-home">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wave-form-ih-accordion-home">
                            <img src="{{asset('assets/images/waveform.svg')}}" class="img-responsive" alt="" />
                            <h2>{{__('words.web.home.about_us_title')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="accordion-home">
                            <h4>{{__('words.web.home.about_us_6_title')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.home.about_us_6_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.home.about_us_7_title')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.home.about_us_7_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.home.about_us_8_title')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.home.about_us_8_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.home.about_us_9_title')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.home.about_us_9_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.home.about_us_10_title')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.home.about_us_10_des')}}</p>
                                </div>
                            </div>
                            <h4>{{__('words.web.home.about_us_11_title')}}</h4>
                            <div>
                                <div class="imp-notes">
                                    <p>{{__('words.web.home.about_us_11_des')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Important Accordion Section Ends -->
    <!-- Price Table Section Starts -->
    <div class="container-fluid bg-price-table-home">
        <div class="row">
            <div class="container">
                <div class="row remove-margin-price-table">
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-tts-bap">
                            <div class="panel-tts-bap-heading-desc text-center">
                                <h3>{{__('words.web.home.transcription.header')}}</h3>
                                <p>{{__('words.web.home.transcription.method')}}</p>
                            </div>
                            <div class="panel-tts-bap-price">
                                <p>{{__('words.web.transcription.from')}} {{__('words.web.home.transcription.price')}}€<span>/{{__('words.web.transcription.min')}}</span></p>
                            </div>
                            <ul class="tts-bap-listing tts-listing-home">
                                <li>{{__('words.web.home.transcription.lang')}}</li>
                                <li>{{__('words.web.home.transcription.time')}}</li>
                                <li>{{__('words.web.home.transcription.text')}}</li>
                                <li>{{__('words.web.home.transcription.ready')}}</li>
                                <li>{{__('words.web.home.transcription.price_1')}}</li>
                                <li>{{__('words.web.home.transcription.price_2')}}</li>
                            </ul>
                            <div class="tts-bap-button text-center">
                                <a href="{{route('transcription')}}" class="btn-tts-bap btn-tts-one-three">{{__('words.web.home.transcription.upload')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-tts-bap blue">
                            <div class="panel-tts-bap-heading-desc text-center">
                                <h3>{{__('words.web.home.translation.header')}}</h3>
                                <p>{{__('words.web.home.translation.method')}}</p>
                            </div>
                            <div class="panel-tts-bap-price">
                                <p>{{__('words.web.translation.from')}} {{__('words.web.home.translation.price')}}€<span>/{{__('words.web.translation.word')}}</span></p>
                            </div>
                            <ul class="tts-bap-listing tts-listing-home blue">
                                <li>{{__('words.web.home.translation.lang')}}</li>
                                <li>{{__('words.web.home.translation.time')}}</li>
                                <li>{{__('words.web.home.translation.text')}}</li>
                                <li>{{__('words.web.home.translation.ready')}}</li>
                                <li>{{__('words.web.home.translation.price_1')}}</li>
                                <li>{{__('words.web.home.translation.price_2')}}</li>
                            </ul>
                            <div class="tts-bap-button text-center">
                                <a href="{{route('translation')}}" class="btn-tts-bap btn-tts-two">{{__('words.web.home.translation.upload')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4 remove-padding-price-table">
                        <div class="panel-tts-bap">
                            <div class="panel-tts-bap-heading-desc text-center">
                                <h3>{{__('words.web.home.voiceover.header')}}</h3>
                                <p>{{__('words.web.home.voiceover.method')}}</p>
                            </div>
                            <div class="panel-tts-bap-price">
                                <p>{{__('words.web.voiceover.from')}} {{__('words.web.home.voiceover.price')}}€<span>/{{__('words.web.voiceover.min')}}</span></p>
                            </div>
                            <ul class="tts-bap-listing tts-listing-home">
                                <li>{{__('words.web.home.voiceover.lang')}}</li>
                                <li>{{__('words.web.home.voiceover.time')}}</li>
                                <li>{{__('words.web.home.voiceover.text')}}</li>
                                <li>{{__('words.web.home.voiceover.ready')}}</li>
                                <li>{{__('words.web.home.voiceover.price_1')}}</li>
                                <li>{{__('words.web.home.voiceover.price_2')}}</li>
                            </ul>
                            <div class="tts-bap-button text-center">
                                <a href="{{route('voiceover')}}" class="btn-tts-bap btn-tts-one-three">{{__('words.web.home.voiceover.upload')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Slick Slide JS -->
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <!-- Home Page JS -->
    <script src="{{asset('assets/js/home-page.js')}}"></script>
    <!-- Accordion JS -->
    <script src="{{asset('assets/js/accordion.js')}}"></script>
    <!-- Scroll Js -->
    <script src="{{asset('assets/js/scroll.js')}}"></script>
@endsection

