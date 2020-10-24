@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/dropzone/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/audioplayer/css/audioplayer.css') }}">
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
                            {{__('words.admin.service_lang.voiceover')}}{{ $lang[0]->lang }}.
                        </h5>
                        <div class="float-right">
                            <label>Language Status : </label>
                            <input type="checkbox" class="float-right" id="status_flag" @if( $lang[0]->status) checked
                                   @endif data-toggle="toggle">
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-colored thead-primary">
                            <tr class="bg-blue">
                                <th style="width:40px">#</th>
                                <th style="font-weight: 600">{{__('words.admin.service_lang.name')}}</th>
                                <th style="width: 10px">{{ __('words.admin.service_lang.gender') }}</th>
                                <th></th>
                                <th style="width: 10px">{{__('words.admin.service_lang.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($data_voiceover_sample as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>
                                        <audio preload="auto" controls>
                                            <source src="{{asset('voiceover_template/'. $item->orig_name) }}">
                                        </audio>
                                    </td>
                                    <td>
                                        <a href="{{route('superadmin.service_lang.delete_voicesample_file', $item->id)}}" class="btn-confirm" style="color: red;">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="15">
                                        There is no Data
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="clearfix">
                        <div class="float-right">
                            <div class="js-dropzone">
                                <div class="dz__block">
                                    <div class="dz-default dz-message">
                                        <div class="btn btn--ellipse btn--blue">
                                            <img src="{{asset('assets/images/upload.svg')}}" width="30px" alt="">
                                            {{__('words.admin.service_lang.select_voice_samples')}}
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
@endsection
@section('script')
    <script src="{{asset('backend/plugins/bootstrap4-toggle/js/bootstrap4-toggle.min.js')}}"></script>
    <script src="{{asset('assets/dropzone/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/audioplayer/js/audioplayer.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#status_flag").change(function () {
                let flag = 0;
                if ($(this).is(":checked")) {
                    flag = 1;
                } else {
                    flag = 0;
                }
                let self = $(this);
                $.ajax({
                    url: "{{route('superadmin.service_lang.status_flag', $lang[0]->id)}}",
                    type: "POST",
                    dataType: "json",
                    data: {flag: flag},
                    success: function (data) {
                        if (data == 'success') {
                            swal("Successful Set!", '', 'success')
                        } else {
                            swal("{{__('words.something_went_wrong')}}", '', 'error')
                            if (flag) {
                                self.prpp('checked', false);
                            } else {
                                self.prpp('checked', true);
                            }
                        }
                    },
                    error: function (data) {
                        swal("{{__('words.something_went_wrong')}}", '', 'error')
                        if (flag) {
                            self.prpp('checked', false);
                        } else {
                            self.prpp('checked', true);
                        }
                    }
                })
            });

            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone(".js-dropzone", {
                    url: '{{ route('superadmin.service_lang.upload_sample_file') }}',
                    headers: {
                        'x-csrf-token': '{{csrf_token()}}'
                    },
                    acceptedFiles: ".mp3",
                    paramName: "file",
                    uploadMultiple: true,
                    addRemoveLinks: true,
                    sending: function (file, xhr, formData) {
                        formData.append("lang_id", "{{ $lang[0]->id }}");
                    },
                    success: function (file, response) {
                        console.log(response);
                    },
                    error: function (file, error) {
                        console.log("file error", error);
                    },
                    complete: function (file, response) {
                        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                            console.log("response", response);
                            location.href = '/superadmin/service_lang/edit/{{ $lang[0]->id }}';
                        }
                    }
            });

            $('audio').audioPlayer();
        });

    </script>

@endsection

