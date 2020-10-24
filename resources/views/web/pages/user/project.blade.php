@extends('web.layouts.default')
@section('title', 'ORDER')
@section('style')
    <link href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css') }}">
@endsection
@section('content')

    <div class="container-fluid bg-register-pg" style="margin-bottom: 40em;">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-title mb-5">
                        <h3>{{__('words.web.order_table.project_order')}}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table" width="100%">
                            <thead>
                            <tr>
                                <th>{{__('words.web.order_table.user_id')}}</th>
                                <th>{{__('words.web.order_table.number')}}</th>
                                <th>{{__('words.web.order_table.service')}}</th>
                                <th>{{__('words.web.order_table.file')}}</th>
                                <th>{{__('words.web.order_table.total')}}</th>
                                {{--<th>{{__('words.web.order_table.tax')}}</th>--}}
                                <th>{{__('words.web.order_table.status')}}</th>
                                <th>{{__('words.web.order_table.time')}}</th>
                                <th>{{__('words.web.order_table.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <!-- The Modal for transcription -->
                    <div class="modal fade" id="media_myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">
                                        {{__('words.common.order_view.title')}} {{__('words.common.order_view.media')}}
                                    </h4>
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

                    <!-- The Modal for translation -->
                    <div class="modal fade" id="trans_myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">
                                        {{__('words.common.order_view.title')}} {{__('words.common.order_view.trans')}}
                                    </h4>
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

                    <!-- The Modal for voiceover -->
                    <div class="modal fade" id="voice_myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">
                                        {{__('words.common.order_view.title')}} {{__('words.common.order_view.voice')}}
                                    </h4>
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

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.17/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {

            // $('.bg-footer-home').css('display', 'none');
            // $('.bg-copyright-home').css('display', 'none');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({

                "language": {
                    "sEmptyTable":     "{{__('words.web.order_table.empty_table')}}",
                    "sInfo":           "{{__('words.web.order_table.info_text1')}} _START_ {{__('words.web.order_table.info_text2')}} _END_ {{__('words.web.order_table.info_text3')}} _TOTAL_ {{__('words.web.order_table.info_text4')}}",
                    "sInfoEmpty":      "{{__('words.web.order_table.info_text1')}} 0 {{__('words.web.order_table.info_text2')}} 0 {{__('words.web.order_table.info_text3')}} 0 {{__('words.web.order_table.info_text4')}}",
                    "sInfoFiltered":   "({{__('words.web.order_table.info_filtered_text1')}} _MAX_ {{__('words.web.order_table.info_text2')}})",
                    "sInfoPostFix":    "",
                    "sInfoThousands":  ",",
                    "sLengthMenu":     "{{__('words.web.order_table.length_menu_text')}} _MENU_ {{__('words.web.order_table.info_text4')}}",
                    "sLoadingRecords": "{{__('words.web.order_table.loading')}}",
                    "sProcessing":     "{{__('words.web.order_table.processing')}}",
                    "sSearch":         "{{__('words.web.order_table.search')}}",
                    "sZeroRecords":    "{{__('words.web.order_table.zero_record')}}",
                    "oPaginate": {
                        "sFirst":    "{{__('words.web.order_table.paginate_first')}}",
                        "sLast":     "{{__('words.web.order_table.paginate_last')}}",
                        "sNext":     "{{__('words.web.order_table.paginate_next')}}",
                        "sPrevious": "{{__('words.web.order_table.paginate_previous')}}"
                    },
                    "oAria": {
                        "sSortAscending":  "{{__('words.web.order_table.aria_ascending')}}",
                        "sSortDescending": "{{__('words.web.order_table.aria_descending')}}"
                    }
                },

                processing: true,
                serverSide: true,
                "scrollX": true,
                order: [[ 6, "desc" ]],
                ajax: "{{ route('project') }}",
                columns: [
                    {data: 'user_id'},
                    {data: 'order_number'},
                    {data: 'service_id'},
                    {
                        data: 'file_name',
                        render: function (data) {
                            if(data.length === 1){
                                return data[0]
                            } else {
                            }
                            let optionsHtml = '';
                            data.forEach((datum) => {
                                optionsHtml += `<li><a href="#">${datum}</a></li>`;
                            });
                            return `<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width:100%">
                                    ${data.length} {{__('words.admin.order.upload')}}&nbsp;&nbsp;<span class="caret"></span></button>
                                    <ul class="dropdown-menu">${optionsHtml}</ul>`;
                        }
                    },
                    {data: 'price'},
                    // {data: 'tax'},
                    {data: 'order_status_id'},
                    {
                        data: 'created_at',
                        render: function (data) {
                            let new_date_mode = new Date(data);
                            let new_date = changeDateFormat(new_date_mode);
                            return new_date;
                        }
                    },
                    {
                      data: '',
                        render: function () {
                            return `<button type="button" id="order_view" class="btn btn-danger" data-toggle="modal" data-backdrop="static" data-keyboard="false" style="width: 100%">
                                    {{__('words.common.order_view.view')}}</button>`;
                        }
                    }
                ]
            });

        });

        function changeDateFormat(m) {
            let timestamp = `${m.getFullYear()}-${`0${m.getMonth() + 1}`.slice(
                -2
            )}-${`0${m.getDate()}`.slice(-2)} ${`0${m.getHours()}`.slice(
                -2
            )}:${`0${m.getMinutes()}`.slice(-2)}:${`0${m.getSeconds()}`.slice(-2)}`;
            return timestamp;
        }

        // --modal order_message toggle--
        $("div.msg_text").hide();
        $("button.order_msg").click(function() {
            $("div.msg_text").animate({
                height: 'toggle'
            });
        });

        // --Details for services--
        $('.data-table').on('click', 'button#order_view', function() {

            let order_id = $(this).parents("tr:first").find("td:nth-child(2)").text();
            let service_id = $(this).parents("tr:first").find("td:nth-child(3)").text();
            let service_type = ['Transcription', 'Translation', 'Voiceover'];

            $.ajax({
                url: '{{ route('order_view') }}',
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
                        console.log('----', response);

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
        });

        // --modal close--
        $('button.close').click(function () {
            window.location.href = "{{route('project')}}";
        });
        $('button.modal_close').click(function () {
            window.location.href = "{{route('project')}}";
        });
    </script>

@endsection






