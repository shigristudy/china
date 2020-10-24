@extends('layouts.master')
@section('content')
    <div class="content-header row align-items-center m-0">
        <nav aria-label="breadcrumb" class="col-sm-4 order-sm-last mb-3 mb-sm-0 p-0 ">
            <ol class="breadcrumb d-inline-flex font-weight-600 fs-13 bg-white mb-0 float-sm-right">
                <li class="breadcrumb-item"><a href="#"><i class="hvr-buzz-out fas fa-home"></i></a></li>
                <li class="breadcrumb-item active"> {{__('words.admin.order.order_list')}}</li>
            </ol>
        </nav>
        <div class="col-sm-8 header-title p-0">
            <div class="media">
                <div class="header-icon text-success mr-3"><i class="hvr-buzz-out fas fa-users"></i></div>
                <div class="media-body">
                    <h1 class="font-weight-bold"> {{__('words.admin.order.order_list')}}</h1>
                    <small> {{__('words.admin.order.order_list')}}</small>
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
                            {{__('words.admin.order.order_list')}}
                        </h5>
                        <form action="" class="form-inline float-right" method="post">
                            @csrf
                            <select type="search" class="form-control form-control-sm mr-2" name="order_status">
                                <option value="0" selected>All</option>
                                @foreach($order_data_status as $item)
                                    <option value="{{$item->id}}" @if($item->id == $order_status) selected @endif>{{$item->status}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary float-right mt-2 mt-md-0" id="btn-add-user"><i class="fas fa-shopping-bag mr-1"></i>{{__('words.admin.user.search')}}</button>
                        </form>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-colored thead-primary">
                            <tr class="bg-blue">
                                <th>{{__('words.admin.order.user_id')}}</th>
                                <th>{{__('words.admin.order.order_id')}}</th>
                                <th>{{__('words.admin.order.service_type')}}</th>
                                <th>{{__('words.admin.order.first_name')}}</th>
                                <th>{{__('words.admin.order.last_name')}}</th>
                                <th>{{__('words.admin.order.company')}}</th>
                                <th>{{__('words.admin.order.files')}}</th>
                                <th>{{__('words.admin.order.total_price')}}</th>
                                <th>{{__('words.admin.order.status')}}</th>
                                <th>{{__('words.admin.order.email')}}</th>
                                <th>{{__('words.admin.order.order_created')}}</th>
                                <th style="width:150px">{{__('words.admin.order.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($order as $item)

                                <tr>
                                    <td class="order_id" style="display: none;">{{ $item->id }}</td>
                                    <td class="user_id">{{ $item->user_id }}</td>
                                    <td class="order_number">{{ $item->order_number }}</td>
                                    <td class="service_type" data-value="{{$item->service_id}}">{{$item->service_id}}</td>
                                    <td class="first_name">{{$item->first_name}}</td>
                                    <td class="last_name">{{$item->last_name}}</td>
                                    <td class="company">{{$item->company}}</td>
                                    <td class="filename">
                                        @if(count($item->file_name) === 1)
                                            {{$item->file_name[0]}}&nbsp;&nbsp;
                                            <a class="download" href="https://www.dropbox.com/home/Apps/AIVOX/{{$item->file_path.'/'.$item->orig_name[0]}}" target="_blank">{{__('words.admin.order.download')}}</a>
                                        @else
                                            <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" style="width:100%">
                                                {{count($item->file_name)}} {{__('words.admin.order.upload')}} &nbsp;&nbsp;<span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" style="position: fixed !important;">
                                                @foreach($item->file_name as $key => $file_names)
                                                    <li>
                                                        <span>{{$file_names}}</span>
                                                        <a class="download" href="https://www.dropbox.com/home/Apps/AIVOX/{{$item->file_path.'/'.$item->orig_name[$key]}}" target="_blank">{{__('words.admin.order.download')}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="price">{{$item->price}}</td>
                                    <td class="status" data-value="{{$item->order_status_id}}" style="color:@switch($item->order_status_id) @case(1) lightgrey @break @case(2) darkblue  @break @case(3) green @break @case(4) red  @break @case(5) pink @break @case(6) orange @break @default red @endswitch ">
                                        {{$item->status}}
                                    </td>
                                    <td class="email">{{$item->email}}</td>
                                    <td class="order_created">{{$item->created_at}}</td>
                                    <td class="py-1">
                                        <a href="javascript:;" class="btn btn-sm btn-primary btn-icon mr-1 btn-view-order" data-toggle="tooltip" title="{{__('words.common.order_view.view')}}"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:;" class="btn btn-sm btn-success btn-icon mr-1 btn-update-order" data-id="{{$item->id}}" data-toggle="tooltip" title="{{__('words.admin.user.edit')}}"><i class="fa fa-edit"></i></a>
                                        @if($item->order_msg == "")
                                            <a href="javascript:;" onclick="return false;" class="btn btn-sm btn-info btn-icon mr-1 btn-msg" data-toggle="tooltip" title="{{__('words.admin.user.message')}}" disabled="disabled"><i class="fas fa-envelope"></i></a>
                                        @else
                                            <a href="javascript:;" class="btn btn-sm btn-info btn-icon mr-1 btn-msg" data-toggle="tooltip" title="{{__('words.admin.user.message')}}"><i class="fas fa-envelope"></i></a>
                                        @endif
                                        <a href="{{route('admin.order.delete', $item->order_number)}}" class="btn btn-sm btn-danger btn-icon mr-1 btn-confirm" data-toggle="tooltip" title="{{__('words.admin.user.delete')}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" align="center">No Data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="clearfix mt-2">
                            <div class="float-left" style="margin: 0;">
                                <p>{{__('words.admin.order.total')}} <strong style="color: red">{{ count($order) }}</strong> {{__('words.admin.order.items')}}</p>
                            </div>
                            <div class="float-right" style="margin: 0;">
                                {{--{!! $order->appends([--}}
                                    {{--'order' => $order->currentPage(),--}}
                                    {{--'order_status' => $order_status,--}}
                                {{--])->links() !!}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{----modal for admin order data view----}}
    {{----Transcription----}}
    <div class="modal fade" id="media_myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        {{__('words.common.order_view.title')}} {{__('words.common.order_view.media')}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom: 0; padding-top: 20px">

                    <div class="order-summary__body" style="border: none;">
                        <div class="order-summary__body-item" id="lang">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <span class="sourceLangBold">{{__('words.common.order_view.lang')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="length">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.length')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="service">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-server"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.service')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>

                        <div class="order-summary__body-item" id="option">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.option')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="msg">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="order-summary__body-item-label">
                                                <button type="button" class="btn btn-info order_msg">{{__('words.common.order_view.msg')}}</button>
                                            </span>
                        </div>
                        <div class="msg_text">
                            <textarea disabled style="width: 100%; padding: 15px"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger modal_close" data-dismiss="modal">{{__('words.common.order_view.close')}}</button>
                </div>

            </div>
        </div>
    </div>

    {{----Translation----}}
    <div class="modal fade" id="trans_myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        {{__('words.common.order_view.title')}} {{__('words.common.order_view.trans')}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom: 0; padding-top: 20px">

                    <div class="order-summary__body" style="border: none;">
                        <div class="order-summary__body-item" id="source_lang">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <span class="sourceLangBold">{{__('words.common.order_view.source_lang')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="target_lang">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <span class="sourceLangBold">{{__('words.common.order_view.target_lang')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="word_count">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.word_count')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="service">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-server"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.service')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>

                        <div class="order-summary__body-item" id="option">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.option')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="msg">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="order-summary__body-item-label">
                                                <button type="button" class="btn btn-info order_msg">{{__('words.common.order_view.msg')}}</button>
                                            </span>
                        </div>
                        <div class="msg_text">
                            <textarea disabled style="width: 100%; padding: 15px"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger modal_close" data-dismiss="modal">{{__('words.common.order_view.close')}}</button>
                </div>

            </div>
        </div>
    </div>

    {{----Voicever----}}
    <div class="modal fade" id="voice_myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        {{__('words.common.order_view.title')}} {{__('words.common.order_view.voice')}}
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="padding-bottom: 0; padding-top: 20px">

                    <div class="order-summary__body" style="border: none;">
                        <div class="order-summary__body-item" id="lang">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <span class="sourceLangBold">{{__('words.common.order_view.lang(s)')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="voice_num">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.voices')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="word_count">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.word_count')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="casting">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-server"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.casting')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>

                        <div class="order-summary__body-item" id="editing">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <span class="order-summary__body-item-label">{{__('words.common.order_view.editing')}}</span>
                            <span class="order-summary__body-item-text"></span>
                        </div>
                        <div class="order-summary__body-item" id="msg">
                            <div class="icon order-summary__body-item-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span class="order-summary__body-item-label">
                                                <button type="button" class="btn btn-info order_msg">{{__('words.common.order_view.msg')}}</button>
                                            </span>
                        </div>
                        <div class="msg_text">
                            <textarea disabled style="width: 100%; padding: 15px"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger modal_close" data-dismiss="modal">{{__('words.common.order_view.close')}}</button>
                </div>

            </div>
        </div>
    </div>


    {{----modal for admin order data update----}}
    <div class="modal fade" id="UpdateOrderModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('words.admin.order.change_order_status')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="" id="update_order_form" method="post">
                    @csrf
                    <input type="hidden" name="id" class="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">{{__('words.admin.order.status')}} <span class="text-danger">*</span></label>
                            <select class="form-control order_status" name="order_status">
                                @foreach($order_data_status as $item)
                                    <option value="{{$item->id}}">{{$item->status}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback order_status_error">
                                <strong></strong>
                            </span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-submit"><i class="fas fa-check mr-1"></i>{{__('words.admin.user.update')}}</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times mr-1"></i>{{__('words.admin.user.close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{----modal for admin flexible message display of all orders----}}
    <div class="modal fade" id="OrderMessageModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('words.admin.user.message')}}</h4>
                </div>

                <div class="modal-body">
                    <textarea class="order_msg" style="width: 100%; padding: 10px;" disabled></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        {{__('words.admin.user.close')}}
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('backend/dist/js/pages/Dropbox-sdk.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $(".btn-update-order").click(function(){
                let id = $(this).data("id");
                let status = $(this).parents('tr').find(".status").data('value');

                console.log("status_value", status)
                $("#update_order_form .id").val(id);
                $("#update_order_form .order_status").val(status);


                $("#UpdateOrderModal").modal();
            });



            $(".btn-msg").click(function () {

                let order_id = $(this).parents('tr').find(".order_id").html();

                $.ajax({
                    url: "{{route('admin.order.message')}}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        order_id: order_id,
                        _token: "{{ csrf_token() }}"
                    },
                    success : function (response) {
                        $("textarea.order_msg").text(response);
                        $("#OrderMessageModal").modal();
                    }
                })
            });

            $("#update_order_form .btn-submit").click(function(){
                $(".page-loader-wrapper").fadeIn();
                $.ajax({
                    url: "{{route('admin.order.update')}}",
                    type: 'POST',
                    dataType: 'json',
                    data: $('#update_order_form').serialize(),
                    success : function(response) {
                        $(".page-loader-wrapper").fadeOut();
                        if(response.status.msg == 'success') {
                            window.location.reload();
                        }
                    },
                    error: function(response) {
                        $(".page-loader-wrapper").fadeOut();
                        swal("Something went wrong", '', 'error')
                        console.log(response)
                    }
                });
            });

            $("#pagesize").change(function(){
                $("#pagesize_form").submit();
            });
        });

        // --modal order_message toggle--
        $("div.msg_text").hide();
        $("button.order_msg").click(function() {
            $("div.msg_text").animate({
                height: 'toggle'
            });
        });

        // --Details for services---
        $(".btn-view-order").click(function () {
            let order_id = $(this).parents("tr:first").find("td:nth-child(3)").text();
            let service_id = $(this).parents("tr:first").find("td:nth-child(4)").text();
            let service_type = ['Transcription', 'Translation', 'Voiceover'];

            $.ajax({
                url: '{{ route('admin.order.view') }}',
                method: 'POST',
                dataType: 'json',
                data: {
                    order_id: order_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {

                    // ---order message button action---
                    if(response[0].order_msg != null){
                        $("button.order_msg").prop("enabled", true);
                    }
                    else{
                        $("button.order_msg").prop("disabled", true);
                    }
                    // --- order view for transcription ---
                    if(service_id == service_type[0]){

                        let total_duration = 0;
                        response.forEach(function (item) {
                            total_duration += item.duration
                        });
                        $('#media_myModal div#lang span.order-summary__body-item-text').text(response[0].source_lang);
                        $('#media_myModal div#length span.order-summary__body-item-text').text(total_duration);
                        $('#media_myModal div#service span.order-summary__body-item-text').text(response[0].service_package);
                        $('#media_myModal div#option span.order-summary__body-item-text').text(response[0].service_option);
                        $('#media_myModal div.msg_text textarea').text(response[0].order_msg);
                        $('#media_myModal').modal();
                    }

                    // --- order view for translation ---
                    if(service_id == service_type[1]){
                        $('#trans_myModal div#source_lang span.order-summary__body-item-text').text(response[0].source_lang);
                        $('#trans_myModal div#target_lang span.order-summary__body-item-text').text(response[0].target_lang);
                        $('#trans_myModal div#word_count span.order-summary__body-item-text').text(response[0].item_cnt);
                        $('#trans_myModal div#service span.order-summary__body-item-text').text(response[0].service_package);
                        $('#trans_myModal div#option span.order-summary__body-item-text').text(response[0].service_option);
                        $('#trans_myModal div.msg_text textarea').text(response[0].order_msg);
                        $('#trans_myModal').modal();
                    }

                    // --- order view for voiceover ---
                    if(service_id == service_type[2]){
                        $('#voice_myModal div#lang span.order-summary__body-item-text').text(response[0].source_lang);
                        $('#voice_myModal div#voice_num span.order-summary__body-item-text').text(response[0].voice_num);
                        $('#voice_myModal div#word_count span.order-summary__body-item-text').text(response[0].item_cnt);
                        $('#voice_myModal div#casting span.order-summary__body-item-text').text(response[0].service_package);
                        $('#voice_myModal div#editing span.order-summary__body-item-text').text(response[0].service_option);
                        $('#voice_myModal div.msg_text textarea').text(response[0].order_msg);
                        $('#voice_myModal').modal();
                    }

                },
                error: function (error) {
                    console.log(error);
                }
            });

        })

        // --modal close--
        $('button.close').click(function () {
            window.location.href = "{{route('admin.order.index')}}";
        })
        $('button.modal_close').click(function () {
            window.location.href = "{{route('admin.order.index')}}";
        })

    </script>
@endsection
