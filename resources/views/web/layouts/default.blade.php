<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"/>
    <title>@yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon"/>
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon"/>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}" type="text/css"/>
    <!-- Bootstrap-3 Minified CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css"/>
@yield('style')
<!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css"/>
    <!-- Media CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/media.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('assets/sweetalert/sweetalert2.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('backend/plugins/toastr/toastr.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/dropzone/dropzone.min.css')}}"/>
    {!! RecaptchaV3::initJs() !!}

</head>
<body>
@include('web.includes.header')
@yield('content')
@include('web.includes.footer')
@include('cookieConsent::index')
<!-- jQuery Library -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-49088760-6"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-49088760-6');
</script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/plugins/toastr/toastr.min.js')}}"></script>
@yield('script')
<!-- Custom JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/dropzone/dropzone.min.js')}}"></script>
<script src="{{asset('assets/sweetalert/sweetalert2.all.min.js')}}"></script>

<script>
    let notification = '{!! session()->get("success"); !!}';
    if (notification != '') {
        toastr_call("success", "{{__('words.web.alert.login.success_title')}}", notification);
    }
    let errors_string = '{!! json_encode($errors->all()); !!}';
    errors_string = errors_string.replace("[", "").replace("]", "").replace(/\"/g, "");
    let errors = errors_string.split(",");
    if (errors_string != "") {
        for (let i = 0; i < errors.length; i++) {
            const element = errors[i];
            toastr_call("error", "{{__('words.web.alert.login.error_title')}}", element);
        }
    }

    function toastr_call(type, title, msg, override) {
        toastr[type](msg, title, override);
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }
</script>
@php
$exts = config('constants.Translation_ext');
$route = route('trans_file_upload');
    if(session('current_service_type') == 1) {
        $exts = config('constants.Transcription_ext');
    }
    if(session('current_service_type') == 2){
        $exts = config('constants.Translation_ext');
    }
    if(session('current_service_type') == 3){
        $exts = config('constants.Voiceover_ext');
    }
@endphp

<script>
    // Alert for authentication when click the upload buttons
    function showMediaLoginToast(){
        Swal.fire({
            width: 500,
            title: "{{__('words.web.alert.service_pages.title')}}",
            text: "{{__('words.web.alert.service_pages.text')}}",
            confirmButtonColor: "#162441",
            confirmButtonText: '<span onclick="mediaLogin()">{{__('words.web.alert.service_pages.login_btn')}}</span>',
            showCloseButton: true,
            position: "center"
        })
    }

    function mediaLogin() {
        window.location.href = "{{route('login_view', ['transcription'])}}";
    }

    function showTransLoginToast(){
        Swal.fire({
            width: 500,
            title: "{{__('words.web.alert.service_pages.title')}}",
            text: "{{__('words.web.alert.service_pages.text')}}",
            confirmButtonColor: "#162441",
            confirmButtonText: '<span onclick="transLogin()">{{__('words.web.alert.service_pages.login_btn')}}</span>',
            showCloseButton: true,
            position: "center"
        })
    }

    function transLogin() {
        window.location.href = "{{route('login_view', ['translation'])}}";
    }

    function showVoiceLoginToast(){
        Swal.fire({
            width: 500,
            title: "{{__('words.web.alert.service_pages.title')}}",
            text: "{{__('words.web.alert.service_pages.text')}}",
            confirmButtonColor: "#162441",
            confirmButtonText: '<span onclick="voiceLogin()">{{__('words.web.alert.service_pages.login_btn')}}</span>',
            showCloseButton: true,
            position: "center"
        })
    }

    function voiceLogin() {
        window.location.href = "{{route('login_view', ['voiceover'])}}";
    }

    // File upload for services
    Dropzone.options.dropzoneForm = {
        autoProcessQueue: false,
        uploadMultiple: true,
        acceptedFiles: "<?=$exts?>",
        parallelUploads: 10,
        maxFilesize: 2048,
        timeout: 3000000,
        init: function () {
            voiceDropzone = this;
            $('#submit-all').click(function () {
                voiceDropzone.processQueue();
            });
        },
        sending: function (file, xhr, formData) {
            formData.append("service_id", <?php echo session('current_service_type')?>);
            // formData.append("service_package", $(this)[0].element.children[0].value);
        },
        successmultiple: function (file, res) {
            toastr_call('success', 'Success',res.message);
            setTimeout(window.location.href = "/order", 2000);
        },
        error: function (file, res) {
            file.previewElement.classList.add("dz-error");
        }
    };

    // Contact form email sending
    $("#contact_form").submit(function(e) {
        e.preventDefault();
        contact_name = $("#contact_name").val();
        contact_email = $("#contact_email").val();
        contact_message = $("#contact_message").val();
        if (!contact_name || !contact_email || !contact_message) {
            Swal.fire({
                icon: 'error',
                title: "{{__('words.web.alert.contact.error_title_1')}}",
                text: "{{__('words.web.alert.contact.error_text_1')}}",
                confirmButtonColor: "#162441",
                confirmButtonText: "{{__('words.web.alert.contact.btn')}}",
                showCloseButton: true,
                allowOutsideClick: false,
                position: "center"
            });
            return;
        }
        // $("#contact_name").val('');
        ///$("#contact_email").val('');
        // $("#contact_message").val('')//;
        $.ajax({
            url: "{{route('contact')}}",
            {{--data: {--}}
                {{--_token: "{{csrf_token()}}",--}}
                {{--name: contact_name,--}}
                {{--email: contact_email,--}}
                {{--message: contact_message,--}}
            {{--},--}}
            data: $('#contact_form').serialize(),
            type: 'post',
            success: function(result) {
                if (result == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: "{{__('words.web.alert.contact.success_title')}}",
                        confirmButtonColor: "#007BFF",
                        confirmButtonText: "{{__('words.web.alert.contact.btn')}}",
                        showCloseButton: true,
                        allowOutsideClick: false,
                        position: "center"
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: "{{__('words.web.alert.contact.error_title_2')}}",
                        text: "{{__('words.web.alert.contact.error_text_2')}}",
                        confirmButtonColor: "#162441",
                        confirmButtonText: "{{__('words.web.alert.contact.btn')}}",
                        showCloseButton: true,
                        allowOutsideClick: false,
                        position: "center"
                    })
                }
            },
            error: function(e) {
                console.log(e)
            }
        })
    })
</script>
</body>
</html>