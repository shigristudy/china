@php
    $page = config('site.page');
@endphp
<nav class="sidebar sidebar-bunker">
    <div class="sidebar-header">
        <a href="{{route('admin.home')}}" class="logo mx-auto"><span>{{config('app.name')}}</span></a>
    </div>
    <hr class="my-0 bg-success">
    <div class="profile-element d-flex align-items-center flex-shrink-0">
        <div class="avatar online">
            <img src="{{asset('assets/images/avatar128.png')}}" class="img-fluid rounded-circle" alt="">
        </div>
        <div class="profile-text">
            <h6 class="m-0">
                @if(Auth::guard('admin')->check())
                    {{Auth::guard('admin')->user()->username}}
                @elseif(Auth::guard('superadmin')->check())
                    {{Auth::guard('superadmin')->user()->username}}
                @endif

            </h6>
        </div>
    </div>
    <div class="sidebar-body">
        <nav class="sidebar-nav">
            <ul class="metismenu">
                @if(Auth::guard('admin')->check())
                    <li class="@if(request()->is('admin/dashboard')) mm-active @endif"><a href="{{route('admin.home')}}"><i class="fas fa-tachometer-alt mr-2"></i> {{__('words.admin.dashboard')}}</a></li>
                    <li class="@if(request()->is('admin/user/*')) mm-active @endif"><a href="{{route('admin.user.index')}}"><i class="fas fa-user-friends mr-2"></i> {{__('words.admin.user.user_management')}}</a></li>
                    <li class="@if(request()->is('admin/order/*')) mm-active @endif"><a href="{{route('admin.order.index')}}"><i class="fas fa-shopping-bag mr-3"></i> {{__('words.admin.order.orders')}}</a></li>
                    <li class="@if(request()->is('admin/service_lang/*')) mm-active @endif"><a href="{{route('admin.service_lang.index')}}"><i class="fas fa-angle-double-right mr-3"></i> {{__('words.admin.service_lang.lang')}}</a></li>
                    <li class="@if(request()->is('admin/price/*')) mm-active @endif"><a href="{{route('admin.price.index')}}"><i class="fas fa-list mr-3"></i> {{__('words.admin.price.prices')}}</a></li>
                @elseif(Auth::guard('superadmin')->check())
                    <li class="@if(request()->is('superadmin/dashboard')) mm-active @endif"><a href="{{route('superadmin.home')}}"><i class="fas fa-tachometer-alt mr-2"></i> {{__('words.admin.dashboard')}}</a></li>
                    <li>
                        <a class="has-arrow material-ripple" href="#">
                            <i class="fas fa-user-friends mr-2"></i> {{__('words.admin.user.user_management')}}
                        </a>
                        <ul class="nav-second-level">
                            <li class="@if(request()->is('superadmin/user/admin/*')) mm-active @endif"><a href="{{route('superadmin.user.admin_index')}}">Admin</a></li>
                            <li class="@if(request()->is('superadmin/user/customer/*')) mm-active @endif"><a href="{{route('superadmin.user.customer_index')}}">Customer</a></li>
                            <li class="@if(request()->is('superadmin/user/role')) mm-active @endif"><a href="{{route('superadmin.user.role_index')}}">Role</a></li>
                        </ul>
                    </li>
                    <li class="@if(request()->is('superadmin/order/*')) mm-active @endif"><a href="{{route('superadmin.order.index')}}"><i class="fas fa-shopping-bag mr-2"></i>{{__('words.admin.order.orders')}}</a></li>
                    <li class="@if(request()->is('superadmin/service_lang/*')) mm-active @endif"><a href="{{route('superadmin.service_lang.index')}}"><i class="fas fa-angle-double-right mr-3"></i> {{__('words.admin.service_lang.lang')}}</a></li>
                    <li class="@if(request()->is('superadmin/price/*')) mm-active @endif"><a href="{{route('superadmin.price.index')}}"><i class="fas fa-list mr-3"></i> {{__('words.admin.price.prices')}}</a></li>
                @endif
                <li>
                    {{--<a class="has-arrow material-ripple" href="#">--}}
                        {{--<i class="fas fa-money-bill-alt mr-2"></i>--}}
                        {{--{{__('words.financial_management')}}--}}
                    {{--</a>--}}
                    {{--<ul class="nav-second-level">--}}
                        {{--<li class="@if($page == 'deposit') mm-active @endif"><a href="{{route('admin.deposit.index')}}">{{__('words.deposit')}}</a></li>--}}
                        {{--<li class="@if($page == 'withdraw') mm-active @endif"><a href="{{route('admin.withdraw.index')}}">{{__('words.withdraw')}}</a></li>--}}
                        {{--<li class="@if($page == 'credit_transaction') mm-active @endif"><a href="{{route('admin.credit_transaction.index')}}">{{__('words.credit_transaction')}}</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

                {{--<li>--}}
                    {{--<a class="has-arrow material-ripple" href="#">--}}
                        {{--<i class="fas fa-user-secret mr-2"></i>--}}
                        {{--&nbsp;&nbsp;{{__('words.game_accounts')}}--}}
                    {{--</a>--}}
                    {{--<ul class="nav-second-level">--}}
                        {{--<li class="@if($page == 'game_account') mm-active @endif"><a href="{{route('admin.game_account.index')}}">{{__('words.search_player')}}</a></li>--}}
                        {{--<li class="@if($page == 'game_log') mm-active @endif"><a href="{{route('admin.game_account.game_log')}}">{{__('words.game_log')}}</a></li>--}}
                        {{--<li class="@if($page == 'score_log') mm-active @endif"><a href="{{route('admin.game_account.score_log')}}">{{__('words.score_log')}}</a></li>--}}
                    {{--</ul>--}}

                {{--</li>--}}
                {{--<li class="@if($page == 'game_transaction') mm-active @endif"><a href="{{route('admin.game_transaction')}}"><i class="fas fa-history mr-2"></i>&nbsp;&nbsp;{{__('words.transaction_history')}}</a></li>--}}
                {{--<li class="@if($page == 'activity') mm-active @endif"><a href="{{route('admin.activity')}}"><i class="fas fa-hourglass-half mr-2"></i>&nbsp;&nbsp;{{__('words.admin_activity')}}</a></li>--}}
                {{--<li class="@if($page == 'bonus') mm-active @endif"><a href="{{route('admin.bonus')}}"><i class="fas fa-star mr-2"></i>&nbsp;&nbsp;{{__('words.bonus')}}</a></li>--}}
                {{--@php--}}
                    {{--$setting_items = ['bank', 'game', 'promotion'];--}}
                {{--@endphp--}}
                {{--<li>--}}
                    {{--<a class="has-arrow material-ripple" href="#">--}}
                        {{--<i class="fas fa-cogs mr-2"></i>--}}
                        {{--{{__('words.setting')}}--}}
                    {{--</a>--}}
                    {{--<ul class="nav-second-level">--}}
                        {{--<li class="@if($page == 'bank') mm-active @endif"><a href="{{route('admin.bank.index')}}">{{__('words.bank')}}</a></li>--}}
                        {{--<li class="@if($page == 'game') mm-active @endif"><a href="{{route('admin.game.index')}}">{{__('words.games')}}</a></li>--}}
                        {{--<li class="@if($page == 'promotion') mm-active @endif"><a href="{{route('promotion.index')}}">{{__('words.promotion')}}</a></li>--}}
                        {{--<li class="@if($page == 'setting') mm-active @endif"><a href="{{route('admin.setting')}}">{{__('words.setting')}}</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            </ul>
        </nav>
    </div>
</nav>