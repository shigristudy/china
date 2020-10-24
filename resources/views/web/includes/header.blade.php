<!-- Preloader Section Starts -->
<div class="loader-wrapper">
    <div class="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- Preloader Section Ends -->
<!-- BG Blur Section Starts -->
<div class="bg-blur"></div>
<!-- BG Blur Section Ends -->
<!-- Mobile Navigation Menu Section Starts -->
<div class="fixed-navbar-menu-mob-tab">
    <ul class="menu-listing-mob-tab">
        <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">{{__('words.web.header.home')}}</a></li>
        <li class="{{ (request()->is('transcription')) ? 'active' : '' }}"><a href="{{route('transcription')}}">{{__('words.web.header.transcription')}}</a></li>
        <li class="{{ (request()->is('translation')) ? 'active' : '' }}"><a href="{{route('translation')}}">{{__('words.web.header.translation')}}</a></li>
        <li class="{{ (request()->is('voiceover')) ? 'active' : '' }}"><a href="{{route('voiceover')}}">{{__('words.web.header.voiceover')}}</a></li>
        @if(!Auth::check())
            <li class="{{ (request()->is('login_')) || (request()->is('register')) ? 'active' : '' }}">
                <a href="#">Account <i class="fas fa-chevron-down"></i></a>
                <ul class="sub-menu-listing-mob-tab">
                    <li><a href="{{route('login_view', ['index'])}}">{{__('words.web.header.login')}}</a></li>
                    <li><a href="{{route('register')}}">{{__('words.web.header.register')}}</a></li>
                </ul>
            </li>
        @else
            <li class="{{ (request()->is('profile')) || (request()->is('logout')) ? 'active' : '' }}">
                <a href="#">Account <i class="fas fa-chevron-down"></i></a>
                <ul class="sub-menu-listing-mob-tab">
                    <li><a href="{{route('profile')}}">{{__('words.web.header.profile')}}</a></li>
                    <li><a href="{{route('project')}}">{{__('words.web.header.project')}}</a></li>
                    <li><a href="{{route('logout')}}">{{__('words.web.header.logout')}}</a></li>
                </ul>
            </li>
        @endif
        <li><a href="#" class="contact_us" >{{__('words.web.header.contact_us')}}</a></li>
        <li>
            <a href="#">
                @php $locale = session()->get('locale'); @endphp
                @switch($locale)
                    @case('en')
                    <span> EN</span>
                    @break
                    @case('de')
                    <span> DE</span>
                    @break
                    @default
                    <span> EN</span>
                @endswitch
                <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="sub-menu-listing-mob-tab">
                @switch($locale)
                    @case('en')
                    <li><a href="{{route('lang', 'de')}}">DE</a></li>
                    @break
                    @case('de')
                    <li><a href="{{route('lang', 'en')}}">EN</a></li>
                    @break
                    @default
                    <li><a href="{{route('lang', 'de')}}">DE</a></li>
                @endswitch
            </ul>
        </li>
    </ul>
    {{--<div class="search-in-mob-tab">--}}
        {{--<i class="fas fa-search"></i>--}}
        {{--<p>Search</p>--}}
    {{--</div>--}}
</div>
<!-- Mobile Navigation Menu Section Ends -->
<!-- Mobile Logo and Hamburger Menu Section Starts -->
<div class="container-fluid bg-logo-hamburger-menu-mob-tab-home">
    <div class="row flex-align-center-desktop">
        <div class="col-xs-6">
            <div class="header-logo-mob-tab">
                <a href="/">
                    <img src="{{asset('assets/images/logo.png')}}" class="img-responsive" alt="" />
                </a>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="burger-menu text-right">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Logo and Hamburger Menu Section Ends -->
<!-- Search Section Starts -->
<div class="fixed-search-pop-up-home">
    <div class="search-pop-up-home">
        <div class="search-pop-up-heading-home text-center">
            <p>Start Typing and Press Enter To Search</p>
            <form>
                <div class="input-group">
                    <input type="text" class="form-control form-control-search-home" />
                    <div class="input-group-btn">
                        <button class="btn btn-search-home" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="search-pop-up-close-home">
        <img src="{{asset('assets/images/close.png')}}" class="img-responsive" alt="" />
    </div>
</div>
<!-- Search Section Ends -->
<!-- Desktop Logo and Navigationbar Menu Section Starts -->
<div class="container-fluid bg-logo-navbar-desktop-home {{ (request()->is('profile')) || (request()->is('project')) || (request()->is('order/*')) ? 'active' : '' }}">
    <div class="row">
        <div class="container">
            <div class="row flex-align-center-desktop">
                <div class="col-sm-3 col-md-2 col-lg-2">
                    <div class="header-desktop-logo">
                        <a href="/">
                            <img src="{{asset('assets/images/logo.png')}}" class="img-responsive" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-9 col-md-10 col-lg-10">
                    <div class="navbar-menu-desktop">
                        <ul class="menu-listing text-right">
                            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">{{__('words.web.header.home')}}</a></li>
                            <li class="{{ (request()->is('transcription')) ? 'active' : '' }}"><a href="{{route('transcription')}}">{{__('words.web.header.transcription')}}</a></li>
                            <li class="{{ (request()->is('translation')) ? 'active' : '' }}"><a href="{{route('translation')}}">{{__('words.web.header.translation')}}</a></li>
                            <li class="{{ (request()->is('voiceover')) ? 'active' : '' }}"><a href="{{route('voiceover')}}">{{__('words.web.header.voiceover')}}</a></li>
                            @if(!Auth::check())
                                <li class="{{ (request()->is('login')) || (request()->is('register')) ? 'active' : '' }}">
                                    <a href="#">{{__('words.web.header.account')}} <i class="fas fa-chevron-down"></i></a>
                                    <ul class="sub-menu-listing">
                                        <li><a href="{{route('login_view', ['index'])}}">{{__('words.web.header.login')}}</a></li>
                                        <li><a href="{{route('register')}}">{{__('words.web.header.register')}}</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="{{ (request()->is('profile')) || (request()->is('logout')) || (request()->is('project'))? 'active' : '' }}">
                                    <a href="#">Account <i class="fas fa-chevron-down"></i></a>
                                    <ul class="sub-menu-listing">
                                        <li><a href="{{route('profile')}}">{{__('words.web.header.profile')}}</a></li>
                                        <li><a href="{{route('project')}}">{{__('words.web.header.project')}}</a></li>
                                        <li><a href="{{route('logout')}}">{{__('words.web.header.logout')}}</a></li>
                                    </ul>
                                </li>
                            @endif
                            <li><a href="#" class="contact_us">{{__('words.web.header.contact_us')}}</a></li>
                            <li>
                                <a href="#">
                                @php $locale = session()->get('locale'); @endphp
                                    @switch($locale)
                                        @case('en')
                                        <span> EN</span>
                                        @break
                                        @case('de')
                                        <span> DE</span>
                                        @break
                                        @default
                                        <span> EN</span>
                                    @endswitch
                                <i class="fas fa-chevron-down"></i>
                                </a>
                                <ul class="sub-menu-listing">
                                    @switch($locale)
                                        @case('en')
                                        <li><a href="{{route('lang', 'de')}}">DE</a></li>
                                        @break
                                        @case('de')
                                        <li><a href="{{route('lang', 'en')}}">EN</a></li>
                                        @break
                                        @default
                                        <li><a href="{{route('lang', 'de')}}">DE</a></li>
                                    @endswitch
                                </ul>
                            </li>
                            {{--<li><a href="#"><i class="fas fa-search header-search"></i></a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Desktop Logo and Navigationbar Menu Section Ends -->