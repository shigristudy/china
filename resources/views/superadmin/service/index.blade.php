@extends('layouts.master')
@section('style')
    <link href="{{asset('assets')}}">
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active"> {{__('words.admin.service_lang.lang')}}</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-users"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold"> {{__('words.admin.service_lang.lang')}}</h1>

                    <small> {{__('words.admin.service_lang.lang')}}</small>
                </div>
            </div>
        </div>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body card-fill">
                    <div class="clearfix">
                        <h5 class="font-weight-bold float-left">
                            {{__('words.admin.service_lang.lang')}}
                        </h5>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-colored thead-primary">
                                <tr class="bg-blue">
                                    <th style="width:40px">#</th>
                                    <th style="font-weight: 600">{{__('words.admin.price.lang')}}</th>
                                    <th style="width: 10px">{{ __('words.admin.service_lang.status') }}</th>
                                    <th style="width: 10px">{{__('words.admin.service_lang.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $number = 1 ?>
                            @foreach ($data_service_lang as $item)
                                <tr>
                                    <td class="number">&laquo; {{ $number }} &raquo;</td>
                                    <td class="lang">&laquo; {{ $item->lang }} &raquo;</td>
                                    <td>
                                        @if($item->status === 1)
                                            <img src="{{asset('backend/dist/img/status_active.png')}}">
                                        @else
                                            <img src="{{asset('backend/dist/img/status_deactive.png') }}">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('superadmin.service_lang.edit', $item->id)}}">
                                            <img src="{{ asset('backend/dist/img/edit.png') }}">
                                        </a>
                                    </td>

                                </tr>
                                <?php $number++?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

