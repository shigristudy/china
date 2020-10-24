@extends('layouts.master')
@section('style')
<link href="{{asset('assets')}}">
@endsection
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active"> {{__('words.admin.price.price_list')}}</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-users"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold"> {{__('words.admin.price.price_list')}}</h1>
                    <small> {{__('words.admin.price.price_list')}}</small>
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
                            {{__('words.admin.price.price_list')}}
                        </h5>
                    </div>
                    <div class="table-responsive mt-2">
                        <form action="{{route('admin.price.update')}}" method="POST">
                            @csrf
                            <table class="table table-bordered table-hover">
                                <thead class="thead-colored thead-primary">
                                <tr class="bg-blue">
                                    <th style="width:40px">#</th>
                                    <th>{{__('words.admin.price.lang')}}</th>
                                    <th>{{__('words.admin.price.transcrip')}}</th>
                                    <th>{{__('words.admin.price.transcrip')}}</th>
                                    <th>{{__('words.admin.price.transcrip')}}</th>
                                    <th>{{__('words.admin.price.transcrip')}}</th>
                                    <th>{{__('words.admin.price.trans')}}</th>
                                    <th>{{__('words.admin.price.proof')}}</th>
                                    <th>{{__('words.admin.price.voice')}}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center"><b>Basic package</b></td>
                                    <td class="text-center"><b>Advanced package</b></td>
                                    <td class="text-center"><b>Premium package</b></td>
                                    <td class="text-center"><b>Optional - Day delivery</b></td>
                                    <td class="text-center"><b>20€ minimum fee, <br>take this price for <br>translation</b></td>
                                    <td></td>
                                    <td class="text-center"><b>350€ minimum price(if<br> project is calculated below<br> 350€ => 350€)</b></td>
                                    <td><b>Factor length</b></td>
                                </tr>
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td>*per Minute</td>
                                    <td>*per Minute</td>
                                    <td>*per Minute</td>
                                    <td>*per Minute</td>
                                    <td>€ Ct. / Word</td>
                                    <td>€ Ct. / Word</td>
                                    <td>€ / Minute</td>
                                    <td></td>
                                </tr>
                                <?php $number = 1 ?>
                                @foreach ($lang as $item)
                                        <tr>
                                            <td>{{ $number ++ }}</td>
                                            <td class="service_type" data-value="{{$item->lang}}">{{$item->lang}}</td>
                                            <td class="basic_trans"><input type="number" name="basic-trans_1_{{ $item->id }}" value="{{ count($item->lang_price) ? $item->lang_price[0]['price'] : 0 }}" size="4" step="0.01" min="0"></td>
                                            <td class="advance_trans"><input type="number" name="advance-trans_2_{{ $item->id }}" value="{{ count($item->lang_price) ? $item->lang_price[1]['price'] : 0}}" size="4" step="0.01" min="0"></td>
                                            <td class="premium_trans"><input type="number" name="premium-trans_3_{{ $item->id }}" value="{{ count($item->lang_price) ? $item->lang_price[2]['price'] : 0}}" size="4" step="0.01" min="0"></td>
                                            <td class="optional_trans"><input type="number" name="optional-trans_4_{{ $item->id }}" value="{{ count($item->lang_price) ? $item->lang_price[3]['price'] : 0}}" size="4" step="0.01" min="0"></td>
                                            <td class="trans"><input type="number" name="trans_5_{{ $item->id }}" value="{{ count($item->lang_price) ? $item->lang_price[4]['price'] : 0}}" size="4" step="0.001" min="0"></td>
                                            <td class="proof"><input type="number" name="proof_6_{{ $item->id }}" value="{{ count($item->lang_price) ? $item->lang_price[5]['price'] : 0}}" size="4" step="0.01" min="0"></td>
                                            <td class="voiceover"><input type="number" name="voice_7_{{ $item->id }}" value="{{ count($item->lang_price) ? $item->lang_price[6]['price'] : 0}}" size="4" step="0.01" min="0"></td>
                                            <td class="factor"><input type="number" name="factor_8_{{ $item->id }}" value="{{ count($item->lang_price) ? $item->lang_price[7]['price'] : 0}}" size="4" step="0.01" min="0"></td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

