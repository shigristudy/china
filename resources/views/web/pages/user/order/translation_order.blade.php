@extends('web.layouts.default')
@section('title', 'ORDER')
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
                                    <h4>{{ $data[0]->file_id }} {{__('words.web.order.upload_text')}}</h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>{{__('words.web.order.service_type')}}</label>
                                <h3>{{__('words.web.footer.translation')}}</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4" data-select2-id="162">
                                <div class="select-01" data-select2-id="161">
                                    <div class="form-group" data-select2-id="160">
                                        <label for="">{{__('words.web.trans_order.choose_lang1')}}</label>
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
                            <div class="col-sm-4 multi-language">
                                <div class="select-01" data-select2-id="12">
                                    <div id="divTargetLanguage" class="form-group" data-select2-id="divTargetLanguage">
                                        <!--<label for="">To <a href="" data-toggle="modal" data-target="#modalLanguages">Add Mutliple languages</a></label>
                                        onclick="ResetValues()"-->
                                        <label id="lblTo" for="">
                                            <p>{{__('words.web.trans_order.choose_lang2')}}</p>
                                        </label>
                                        <a id="aMultiple" data-toggle="modal" data-target="#multiple-lang" data-backdrop="static" data-keyboard="false">
                                            <input type="button" value="{{__('words.web.order.add_lang')}}">
                                        </a>
                                        <p class="error_message">{{__('words.web.order.lang_required')}}</p>
                                        <select class="form-control select2-hidden-accessible" id="targetLanguage"
                                                data-select2-id="targetLanguage" tabindex="-1" aria-hidden="true">
                                            {{--@foreach($data_lang as $item)--}}
                                                {{--<option data-selected2-id="{{ $item->id }}" value="{{ $item->id }}" {{$item->id == 33 ? 'selected' : '' }}>--}}
                                                    {{--{{ $item->lang }}--}}
                                                {{--</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for=" ">{{__('words.web.trans_order.word_count')}}</label>
                                <div class="word-count-or-upload">
                                    <input type="number" placeholder="word count" id="word_count" value="">
                                    <p class="error_message">{{__('words.web.order.wc_required')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 1em;">
                            <div class="col-sm-4 subject">
                                <div class="select-04">
                                    <div class="form-group">
                                        <label for="">{{__('words.web.trans_order.subject')}}</label>
                                        <select class="form-control select2-hidden-accessible" id="targetSubject"
                                                data-select2-id="targetSubject" tabindex="-1" aria-hidden="true">
                                            <option value="" disabled="">{{__('words.web.trans_order.subject')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_finance')}}">{{__('words.web.trans_order.sub_finance')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_license')}}">{{__('words.web.trans_order.sub_license')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_electronics')}}">{{__('words.web.trans_order.sub_electronics')}}</option>
                                            <option selected="" value="{{__('words.web.trans_order.sub_general')}}" data-select2-id="4">{{__('words.web.trans_order.sub_general')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_business')}}">{{__('words.web.trans_order.sub_business')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_information')}}">{{__('words.web.trans_order.sub_information')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_legal')}}">{{__('words.web.trans_order.sub_legal')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_marketing')}}">{{__('words.web.trans_order.sub_marketing')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_mechanic')}}">{{__('words.web.trans_order.sub_mechanic')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_medical')}}">{{__('words.web.trans_order.sub_medical')}}</option>
                                            <option value="{{__('words.web.trans_order.sub_travel')}}">{{__('words.web.trans_order.sub_travel')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="">{{__('words.web.order.choose_service')}}</label>
                                    <div class="delivery-input">
                                        <label>
                                            <input type="radio" id="delivery_type" value="1" name="delivery_type" @php if($data[0]->service_package == "Basic") echo "checked";@endphp> {{__('words.web.order.basic')}}
                                            <br>
                                            <input type="radio" id="delivery_type" value="2" name="delivery_type" @php if($data[0]->service_package == "Advanced") echo "checked";@endphp checked> {{__('words.web.order.advanced')}}
                                            <br>
                                            <input type="radio" id="delivery_type" value="3" name="delivery_type" @php if($data[0]->service_package == "Premium") echo "checked";@endphp> {{__('words.web.order.premium')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="">{{__('words.web.order.choose_time')}}</label>
                                <div class="deliveryDate_faster">
                                    <input type="checkbox" id="delivery_date" value="faster" name="faster">
                                    <label for="faster">{{__('words.web.trans_order.fast_time')}}</label>
                                </div>
                                <div class="deliveryDate_proofreading">
                                    <input type="checkbox" id="delivery_date" value="proofreading" name="proofreading">
                                    <label for="proofreading">{{__('words.web.trans_order.proofreading')}}</label>
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
                            <a class="trans-form-sub" id="order_submit">{{__('words.web.order.inquire_now')}}</a>
                        </div>
                    </form>
                    <!-- Modal -->
                    <!-- Multiple language modal -->
                    <div id="multiple-lang" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <div class="search-icon-right">
                                        <svg width="20px" height="20px" viewBox="0 0 20 20">
                                            <g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd">
                                                <g transform="translate(-2.000000, -2.000000)" fill-rule="nonzero">
                                                    <path d="M11,20 C6.02943725,20 2,15.9705627 2,11 C2,6.02943725 6.02943725,2 11,2 C15.9705627,2 20,6.02943725 20,11 C20,15.9705627 15.9705627,20 11,20 Z M11,18 C14.8659932,18 18,14.8659932 18,11 C18,7.13400675 14.8659932,4 11,4 C7.13400675,4 4,7.13400675 4,11 C4,14.8659932 7.13400675,18 11,18 Z M21.7071068,20.2928932 C22.0976311,20.6834175 22.0976311,21.3165825 21.7071068,21.7071068 C21.3165825,22.0976311 20.6834175,22.0976311 20.2928932,21.7071068 L15.9428932,17.3571068 C15.5523689,16.9665825 15.5523689,16.3334175 15.9428932,15.9428932 C16.3334175,15.5523689 16.9665825,15.5523689 17.3571068,15.9428932 L21.7071068,20.2928932 Z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <input type="text" placeholder="Search.." onkeyup="filter(this);"
                                           class="search-btn">
                                </div>
                                <div class="modal-body">
                                    <div id="divLang1" class="multi-columns">
                                        <ul id="ulLanguages1">
                                        </ul>
                                    </div>
                                    <div class="multi-columns">
                                        <ul id="ulLanguages2">
                                        </ul>
                                    </div>
                                    <div class="multi-columns">
                                        <ul id="ulLanguages3">
                                        </ul>
                                    </div>
                                    <div class="multi-columns">
                                        <ul id="ulLanguages4">
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="modal-footer">
                                    <span id="languageCount"></span>&nbsp;

                                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('words.web.order.done')}}</button>
                                    <button id="btnReset" type="button" class="btn btn-default">{{__('words.web.order.reset')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--<order data modal>--}}
                    <div id="confirm_order" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">{{__('words.web.trans_order.modal_overview')}}</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="order-summary__body">
                                        <div class="order-summary__body-item" id="source_lang">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-book"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.trans_order.modal_from')}}</span>
                                            <span class="sourceLangBold"></span>
                                            <span class="order-summary__body-item-label">{{__('words.web.trans_order.modal_to')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item order-summary__body-item-target-languages" id="target_lang">
                                            <span class="label--outline"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="service_type">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-server"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.order.modal_service_type')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="word_count">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-file-word"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.order.word_count')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="service_subject">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-suitcase"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.trans_order.subject')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="service_price">
                                            <div class="icon order-summary__body-item-icon">
                                                <i class="fas fa-dollar-sign"></i>
                                            </div>
                                            <span class="order-summary__body-item-label">{{__('words.web.trans_order.modal_per_word')}}</span>
                                            <span class="order-summary__body-item-text"></span>
                                        </div>
                                        <div class="order-summary__body-item" id="delivery_date">
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
                                        <h6>{{__('words.web.order.total')}} <span class="order-summary__total"></span></h6>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row" style="margin-right: 0px">
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
    <!-- LogIn Form Section Ends -->
    <input class="js-dropzone" type="hidden">
@endsection

@section('script')
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/inputfilter.js')}}"></script>
    <script src="{{asset('assets/js/scroll.js')}}"></script>

    <script>
        $(document).ready(function () {

            $('.multi-language span.select2-container').css('display', 'none');
            populateLanguages();

            let wc_count_error = $('div.word-count-or-upload p.error_message'),lang_count_error = $('div.multi-language p.error_message');
            wc_count_error.css('display', 'none');
            lang_count_error.css('display', 'none');

            $("input#word_count").inputFilter(function(value) {
                return /^\d*$/.test(value); });

            if ($('input[name=delivery_type]:checked').val() == "2") {
                $('.deliveryDate_proofreading').show();
                $('.deliveryDate_faster').show();
            } else if ($('input[name=delivery_type]:checked').val() == "1" || "3") {
                $('.deliveryDate_proofreading').hide();
            }

            $("input[name=delivery_type]:radio").change(function () {

                if ($('input[name=delivery_type]:checked').val() == "2") {
                    $('.deliveryDate_proofreading').show();
                    $('.deliveryDate_faster').show();
                } else if ($('input[name=delivery_type]:checked').val() == "1" || "3") {
                    $('.deliveryDate_proofreading').hide();
                }
            });

            // --modal order_message toggle--
            $("div.msg_text").hide();
            $("button.order_msg").click(function() {
                $("div.msg_text").animate({
                    height: 'toggle'
                });
            });

            $('#order_submit').click(function (e) {

                let order_data = getValue();

                if (!order_data['target_lang']) {
                    lang_count_error.css('display', 'unset');
                    return false
                }
                else{
                    wc_count_error.css('display', 'none');
                }
                if (!order_data['word_count']) {
                    wc_count_error.css('display', 'unset');
                    return false
                }
                else {
                    lang_count_error.css('display', 'none');
                }

                $.ajax({
                    url: '{{ route('get_trans_price') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        source_lang: order_data['source_lang'],
                        target_lang: order_data['target_lang'],
                        delivery_type: order_data['delivery_type'],
                        word_count: order_data['word_count'],
                        delivery_date: order_data['delivery_date'],
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {

                        let order_msg = $('#order_form textarea#order_msg').val();
                        var source_lang = "", service_type = "", lang_length = response.length, target_lang = "", word_count = $('#order_form #word_count').val(), subject = $('#order_form #targetSubject').val(), word_price = [], delivery_time = 0, total_price = 0;
                        response.forEach(function (item) {
                            console.log(item);
                            source_lang = item.source_lang;
                            target_lang += '<span class="label--outline">' + item.target_lang + '</span>' + '&nbsp';
                            service_type = item.service_package;
                            delivery_time = item.delivery_time;
                            word_price.push(item.data_per_price.toFixed(2).replace('.', ','));
                            total_price += item.total_price;

                        });
                        $('#confirm_order div#source_lang span.sourceLangBold').text(source_lang);
                        $('#confirm_order div#source_lang span.order-summary__body-item-text').text(lang_length + " {{__('words.web.trans_order.lang')}}");
                        $('#confirm_order div.order-summary__body-item-target-languages').html(target_lang);
                        $('#confirm_order div#word_count span.order-summary__body-item-text').text(word_count + " {{__('words.web.order.modal_words')}}");
                        $('#confirm_order div#service_subject span.order-summary__body-item-text').text(subject);
                        $('#confirm_order div#service_type span.order-summary__body-item-text').text(service_type);
                        $('#confirm_order div#service_price span.order-summary__body-item-text').text('€ ' + word_price+ " / {{__('words.web.order.modal_word')}}");
                        $('#confirm_order div#delivery_date span.order-summary__body-item-text').text(delivery_time + " {{__('words.web.order.modal_day')}}");
                        $('#confirm_order div.msg_text textarea').text(order_msg);
                        $('#confirm_order div#total_price span.order-summary__total').text('€ ' + total_price.toFixed(2).replace('.', ','));

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
                })
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
                    url: '{{ route('trans_order') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        source_lang: order_data['source_lang'],
                        target_lang: order_data['target_lang'],
                        delivery_type: order_data['delivery_type'],
                        word_count: order_data['word_count'],
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

                })
            });

        });

        function getValue() {
            let data = [], val = [];
            $(':checkbox:checked').each(function(i){
                val[i] = $(this).val();
            });
            data['source_lang'] = $('#order_form #sourceLanguage').val();
            data['target_lang'] = $('#order_form #targetLanguage').val();
            data['word_count']  = $('#order_form #word_count').val();
            data['subject']  = $('#order_form #targetSubject').val();
            data['delivery_type']  = $('#order_form input#delivery_type:checked').val();
            data['delivery_date'] = val;

            return data;
        }

        // --add multi-language--
        $('#btnReset').click(function () {
            resetAll();
        });

        function resetAll()
        {
            collectedLanguages = [];

            $('#ulLanguages1 li').each(function () {
                $(this).removeClass("active");
            });

            $('#ulLanguages2 li').each(function () {
                $(this).removeClass("active");
            });

            $('#ulLanguages3 li').each(function () {
                $(this).removeClass("active");
            });

            $('#ulLanguages4 li').each(function () {
                $(this).removeClass("active");
            });

            $('#targetLanguage').text("");
            // addLanguagesOptions().then(item => $('#targetLanguage').append(item));

            $('#languageCount').text("0 {{__('words.web.trans_order.upper_select_lang')}}");

            // $('#aMultiple').text("Add multiple languages.");

            // $('#targetLanguage').prop("disabled", false);
        }

        function collectLanguages(obj)
        {
            var objVal = replaceChars($(obj).text());
            if ($.inArray($(obj).text(), collectedLanguages) > -1)
            {
                Array.prototype.remove = function () {
                    var what, a = arguments, L = a.length, ax;
                    while (L && this.length) {
                        what = a[--L];
                        while ((ax = this.indexOf(what)) !== -1) {
                            this.splice(ax, 1);
                        }
                    }
                    return this;
                };

                collectedLanguages.remove($(obj).text());

                if(collectedLanguages.length > 0)
                {
                    $('#' + objVal).removeClass("active");
                    setTargetLanguageSelect($(obj).text(), "remove");
                    setCount();
                }
                else
                {
                    resetAll();
                }
            }
            else
            {
                $('#' + objVal).addClass("active");
                setTargetLanguageSelect($(obj).text(), "add");
                setCount();
            }
            return false;
        }

        function setTargetLanguageSelect(str, action)
        {


            $('#targetLanguage').text("");

            if (action == "add")
            {
                collectedLanguages.push(str);
            }

            optionText = collectedLanguages.join(",");
            optionValue = collectedLanguages.join(",");

            $('#targetLanguage').append(`<option value="${optionValue}">
                                       ${optionText}
                                  </option>`);
        }

        function setCount()
        {
            $('#languageCount').text(collectedLanguages.length.toString() + " {{__('words.web.trans_order.upper_select_lang')}}");
            {{--$('#aMultiple').text(collectedLanguages.length.toString() + " {{__('words.web.trans_order.lower_select_lang')}}.");--}}
            {{--$('#targetLanguage').prop("disabled", true);--}}
        }

        function populateLanguages()
        {
            $.ajax({
                url: 'https://aivox.de/get_lang',
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    var lang_list = [];
                    if (response.data) {
                        response.data.forEach(function (item) {
                            var temp = item.id + '#' + item.lang;
                            lang_list.push(temp);

                        });
                        makeLangList(lang_list);
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });

        }

        function makeLangList(lang_list) {
            var languageMasterList = lang_list;
            var languageMasterText = [];
            var languageMasterValue = [];

            $.each(languageMasterList, function (i, item) {
                languageMasterText.push(item.toString().split("#")[1]);
            });

            languageMasterText = languageMasterText.sort();

            var languageList1 = [];
            var languageList2 = [];
            var languageList3 = [];
            var languageList4 = [];
            //var i = 1;
            $.each(languageMasterText, function (i, item) {
                if (i <= 20)
                {
                    languageList1.push(item.toString());
                }
                else if (i > 20 && i <= 41)
                {
                    languageList2.push(item.toString());
                }
                else if (i > 42 && i <= 63)
                {
                    languageList3.push(item.toString());
                }
                else if (i > 63) {
                    languageList4.push(item.toString());
                }
            });
            $.each(languageList1, function (i, item) {
                $("#ulLanguages1").append('<li id=' + replaceChars(item) + '><a href="" onclick="return collectLanguages(this);">' + item + '</a><div class="multi-column-tick"><svg width="18px" height="13px" viewBox="0 0 18 13"><g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd"><g transform="translate(-3.000000, -5.000000)" fill-rule="nonzero"><path d="M19.2928932,5.29289322 C19.6834175,4.90236893 20.3165825,4.90236893 20.7071068,5.29289322 C21.0976311,5.68341751 21.0976311,6.31658249 20.7071068,6.70710678 L9.70710678,17.7071068 C9.31658249,18.0976311 8.68341751,18.0976311 8.29289322,17.7071068 L3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 C3.68341751,10.9023689 4.31658249,10.9023689 4.70710678,11.2928932 L9,15.5857864 L19.2928932,5.29289322 Z"></path></g></g></svg></div></li>');
            });

            $.each(languageList2, function (i, item) {
                $("#ulLanguages2").append('<li id=' + replaceChars(item) + '><a href="" onclick="return collectLanguages(this);">' + item + '</a><div class="multi-column-tick"><svg width="18px" height="13px" viewBox="0 0 18 13"><g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd"><g transform="translate(-3.000000, -5.000000)" fill-rule="nonzero"><path d="M19.2928932,5.29289322 C19.6834175,4.90236893 20.3165825,4.90236893 20.7071068,5.29289322 C21.0976311,5.68341751 21.0976311,6.31658249 20.7071068,6.70710678 L9.70710678,17.7071068 C9.31658249,18.0976311 8.68341751,18.0976311 8.29289322,17.7071068 L3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 C3.68341751,10.9023689 4.31658249,10.9023689 4.70710678,11.2928932 L9,15.5857864 L19.2928932,5.29289322 Z"></path></g></g></svg></div></li>');
            });

            $.each(languageList3, function (i, item) {
                $("#ulLanguages3").append('<li id=' + replaceChars(item) + '><a href="" onclick="return collectLanguages(this);">' + item + '</a><div class="multi-column-tick"><svg width="18px" height="13px" viewBox="0 0 18 13"><g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd"><g transform="translate(-3.000000, -5.000000)" fill-rule="nonzero"><path d="M19.2928932,5.29289322 C19.6834175,4.90236893 20.3165825,4.90236893 20.7071068,5.29289322 C21.0976311,5.68341751 21.0976311,6.31658249 20.7071068,6.70710678 L9.70710678,17.7071068 C9.31658249,18.0976311 8.68341751,18.0976311 8.29289322,17.7071068 L3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 C3.68341751,10.9023689 4.31658249,10.9023689 4.70710678,11.2928932 L9,15.5857864 L19.2928932,5.29289322 Z"></path></g></g></svg></div></li>');
            });

            $.each(languageList4, function (i, item) {
                $("#ulLanguages4").append('<li id=' + replaceChars(item) + '><a href="" onclick="return collectLanguages(this);">' + item + '</a><div class="multi-column-tick"><svg width="18px" height="13px" viewBox="0 0 18 13"><g stroke="none" stroke-width="1" class="icon__fill" fill-rule="evenodd"><g transform="translate(-3.000000, -5.000000)" fill-rule="nonzero"><path d="M19.2928932,5.29289322 C19.6834175,4.90236893 20.3165825,4.90236893 20.7071068,5.29289322 C21.0976311,5.68341751 21.0976311,6.31658249 20.7071068,6.70710678 L9.70710678,17.7071068 C9.31658249,18.0976311 8.68341751,18.0976311 8.29289322,17.7071068 L3.29289322,12.7071068 C2.90236893,12.3165825 2.90236893,11.6834175 3.29289322,11.2928932 C3.68341751,10.9023689 4.31658249,10.9023689 4.70710678,11.2928932 L9,15.5857864 L19.2928932,5.29289322 Z"></path></g></g></svg></div></li>');
            });
        }
    </script>
@endsection