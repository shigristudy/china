@extends('layouts.master')

@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active">Super Admin Dashboard</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-tachometer-alt"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold">Super Admin Dashboard</h1>
                    <small>Super Admin Dashboard</small>
                </div>
            </div>
        </div>
    </div>
    <!--/.Content Header (Page header)-->
    <div class="body-content">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-primary card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-users"></i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"></p>
                        <h3 class="card-title fs-21 font-weight-bold"></h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            <i class="typcn typcn-calendar-outline mr-2"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"></p>
                        <h3 class="card-title fs-21 font-weight-bold"></h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            <i class="typcn typcn-calendar-outline mr-2"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-money-check-alt"></i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"></p>
                        <h3 class="card-title fs-21 font-weight-bold"></h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            <i class="typcn typcn-calendar-outline mr-2"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats statistic-box mb-4">
                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                        <div class="card-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-coins"></i>
                        </div>
                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"></p>
                        <h3 class="card-title fs-21 font-weight-bold"></h3>
                    </div>
                    <div class="card-footer p-3">
                        <div class="stats">
                            <i class="typcn typcn-calendar-outline mr-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header clearfix">
                        <h4 class="float-left"><i class="fas fa-home mr-1"></i>{{__('words.dashboard')}}</h4>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('backend/plugins/echarts/echarts-en.js')}}"></script>
    <script src="{{asset('backend/plugins/daterangepicker/jquery.daterangepicker.min.js')}}"></script>
    <script>
        // $("#search_period").dateRangePicker({
        //     format: 'YYYY-MM-DD',
        //     autoClose: false,
        // });
        // $("#btn-reset").click(function(){
        //     $("#search_period").val('');
        // })
    </script>
@endsection
