@extends('web.layouts.default')
@section('title', 'media ORDER')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css') }}">
@endsection

@section('content')
    <!-- trans Form Section Starts -->
    <div class="container-fluid instant-quote-form-wrapper">
        <div class="row">
            <div class="container">
                <h2 class="mb-5">{{__('words.web.order.inquiry')}}</h2>
                <div class="col-sm-12 instant-quote-form">
                    <form data-select2-id="13" id="order_form">
                        <input type="hidden" value="{{ $data[0]->id}}" id="order_data_id">
                        <input type="hidden" value="{{ $data[0]->service_id}}" id="service_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h4>{{ $data[0]->file_id }} {{__('words.web.media_order.upload_text')}}</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>{{__('words.web.order.service_type')}}</label>
                                <h3>{{__('words.web.footer.transcription')}}</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6" data-select2-id="162">
                                <div class="select-01" data-select2-id="161">
                                    <div class="form-group" data-select2-id="160">
                                        <label for="">{{__('words.web.media_order.choose_lang')}}</label>
                                        <select id="sourceLanguage" class="form-control select2-hidden-accessible"
                                                data-select2-id="sourceLanguage" tabindex="-1" aria-hidden="true">
                                            @foreach($data_lang as $item)
                                                <option data-selected2-id="{{ $item->id }}" value="{{ $item->id }}" {{$item->id == 22 ? 'selected' : '' }}>
                                                    {{ $item->lang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for=" ">{{__('words.web.media_order.length')}}</label>
                                <div class="length-count-or-upload">
                                    <input type="text" placeholder="audio_length" id="audio_length"
                                           value="{{ $total_duration }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:1em;">
                            <div class="col-sm-6">
                                <label for="">{{__('words.web.order.choose_service')}}</label>
                                <div class="delivery-input">
                                    <label>
                                        <input type="radio" id="delivery_type" value="1"
                                               name="delivery_type" @php if($data[0]->service_package == "undefined" || $data[0]->service_package == "Basic") echo "checked";@endphp checked> {{__('words.web.order.basic')}}
                                        <br>
                                        <input type="radio" id="delivery_type" value="2"
                                               name="delivery_type" @php if($data[0]->service_package == "Advanced") echo "checked";@endphp> {{__('words.web.order.advanced')}}
                                        <br>
                                        <input type="radio" id="delivery_type" value="3"
                                               name="delivery_type" @php if($data[0]->service_package == "Premium") echo "checked";@endphp> {{__('words.web.order.premium')}}
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="">{{__('words.web.order.choose_time')}}</label>
                                <div class="deliveryDate_standard">
                                    <input type="checkbox" id="delivery_date" value="timestamp" name="delivery_date">
                                    <label for="TimeStamp">{{__('words.web.media_order.timestamp')}}</label>
                                </div>
                                <div class="deliveryDate_standard">
                                    <input type="checkbox" id="delivery_date" value="smooth" name="delivery_date">
                                    <label for="textSmoothing">{{__('words.web.media_order.smooth')}}</label>
                                </div>
                                <div class="deliveryDate_standard">
                                    <input type="checkbox" id="delivery_date" value="warranty" name="delivery_date">
                                    <label for="warranty">{{__('words.web.media_order.warranty')}}</label>
                                </div>
                                <div class="deliveryDate_special">
                                    <input type="checkbox" id="delivery_date" value="express" name="delivery_date">
                                    <label for="express">{{__('words.web.media_order.express')}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 1em;">
                            <div class="col-sm-12">
                                <div class="form-group user_message">
                                    <label for="message">{{__('words.web.order.message')}}</label>
                                    <textarea class="form-control" placeholder="{{__('words.web.order.msg_placeholder')}}" id="order_msg" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" class="privacy-data" required="required" aria-required="true">
                                    <label for="privacy">{{__('words.web.order.privacy_checkbox')}}
                                        <a class="privacy" href="https://aivox.de/legals" rel="noopener" target="_blank">
                                            {{__('words.web.order.privacy_policy')}}
                                        </a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <a class="trans-form-sub" id="order_submit" data-backdrop="static" data-keyboard="false">{{__('words.web.order.inquire_now')}}</a>
                        </div>
                    </form>
                    <!-- Modal -->
                    <div id="confirm_order" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">{{__('words.web.media_order.modal_overview')}}</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="order-summary__body">
                                        <div class="order-summary__body-item" id="source_lang">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-language"></i>
                                            </div>
                                            <span class="sourceLangBold">{{__('words.web.order.lang')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="service_type">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-server"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.order.modal_service_type')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
										<div class="order-summary__body-item" id="audio_length">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-file-word"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.media_order.modal_file_length')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="service_price">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.media_order.modal_per_length')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="delivery_time">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-file-word"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.order.modal_delivery_time')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="order_msg">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">
                                                <button type="button" class="btn btn-info order_msg">{{__('words.web.order.message')}}</button>
                                            </span>
                                        </div>
                                        <div class="msg_text">
                                            <textarea disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="order-summary__footer" id="total_price">
                                        <h6>{{__('words.web.order.total')}} <span class="order-summary__total">¥17,779.88</span></h6>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row" style="margin-right: 0">
                                        <button class="btn btn-primary order_confirm">{{__('words.web.order.request')}}</button>
                                        <button class="btn btn-danger order-cancel">{{__('words.web.order.cancel')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/inputfilter.js')}}"></script>
    <script src="{{asset('assets/js/scroll.js')}}"></script>

    <script>
        $(document).ready(function () {

			if ($('input[name=delivery_type]:checked').val() == "1") {
                $('.deliveryDate_standard').show();
            } else if ($('input[name=delivery_type]:checked').val() == "2" || "3") {
                $('.deliveryDate_standard').hide();
                $("input[value='express']").removeAttr("disabled");
            }

            $("input[name=delivery_type]:radio").change(function () {

                if ($('input[name=delivery_type]:checked').val() == "1") {
                    $('.deliveryDate_standard').show();
                } else if ($('input[name=delivery_type]:checked').val() == "2" || "3") {
                    $('.deliveryDate_standard').hide();
                    $("input[value='express']").removeAttr("disabled");
                }
            });

            $('input[name=delivery_date]:checkbox').change(function () {

                let val = $(this).val();
                if (val == "warranty") {
                    $("input[value='express']").prop("disabled", $(this).is(":checked"));

                } else if (val == "express") {
                    $("input[value='warranty']").prop("disabled", $(this).is(":checked"));
                }
            });

            // --modal order_message toggle--
            $("div.msg_text").hide();
            $("button.order_msg").click(function() {
                $("div.msg_text").animate({
                    height: 'toggle'
                });
            });

            // --order submit--
            $('#order_submit').click(function (e) {

                let order_data = getValue();

                $.ajax({
                    url: '{{ route('get_audio_price') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        source_lang: order_data['source_lang'],
                        delivery_type: order_data['delivery_type'],
                        audio_length: order_data['audio_length'],
                        delivery_date: order_data['delivery_date'],
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {

                        let order_msg = $('#order_form textarea#order_msg').val();

                        $('#confirm_order div#source_lang span.order-summary__body-item-text').text(response.source_lang);
                        $('#confirm_order div#audio_length span.order-summary__body-item-text').text(response.audio_length + " {{__('words.web.order.modal_minute')}}(s)");
                        $('#confirm_order div#service_type span.order-summary__body-item-text').text(response.service_package);
                        $('#confirm_order div#service_price span.order-summary__body-item-text').text('€ ' + response.per_price.toFixed(2).replace('.', ',') + " / {{__('words.web.order.modal_minute')}}");
                        $('#confirm_order div#delivery_time span.order-summary__body-item-text').text(response.delivery_time + " {{__('words.web.order.modal_day')}}");
                        $('#confirm_order div.msg_text textarea').text(order_msg);
                        $('#confirm_order div#total_price span.order-summary__total').text('€ ' + response.total_price.toFixed(2).replace('.', ','));

                        if (order_msg) {
                            $("button.order_msg").prop("enabled", true);
                        }
                        else {
                            $("button.order_msg").prop("disabled", true);
                        }

                        if ($('.privacy-data').is(':checked')) {
                            $('#confirm_order').modal();
                        }
                        else {
                            toastr_call('error', "Error", "{{__('words.web.order.privacy_error')}}")
                        }

                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            //close the confirm modal
            $('.order-cancel').click(function () {
                $('#confirm_order').modal('toggle');
            });

            //confirm the order
            $('#confirm_order button.order_confirm').click(function () {
                let order_data = getValue();
                let order_data_id = $('#order_form input#order_data_id').val();
                let service_id = $('#order_form input#service_id').val();
                let order_msg = $('#order_form textarea#order_msg').val();

                $.ajax({
                    url: '{{ route('audio_order') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        source_lang: order_data['source_lang'],
                        delivery_type: order_data['delivery_type'],
                        audio_length: order_data['audio_length'],
                        delivery_date: order_data['delivery_date'],
                        order_data_id: order_data_id,
                        service_id: service_id,
                        order_msg: order_msg,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        Swal.fire({
                            title: response.data,
                            icon: "success",
                            confirmButtonColor: "#007BFF",
                            confirmButtonText: '{{__('words.web.order.ok')}}',
                            allowOutsideClick: false,
                            position: "center"
                        }).then(function() {
                            window.location.href = "{{route('project')}}";
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });

            // --order value definition--
            function getValue() {
                let data = [], val = [];
                $(':checkbox:checked').each(function(i){
                    val[i] = $(this).val();
                });
                data['source_lang'] = $('#order_form #sourceLanguage').val();
                data['audio_length'] = $('#order_form #audio_length').val();
                data['delivery_type'] = $('#order_form input#delivery_type:checked').val();
                data['delivery_date'] = val;
                return data;
            }
        });


    </script>
@endsection