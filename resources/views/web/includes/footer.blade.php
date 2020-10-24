<!-- Footer Section Starts -->
<div class="container-fluid bg-footer-home">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="footer-heading">
                        <h4>{{__('words.web.footer.about_us')}}</h4>
                        <div class="footer-about-description">
                            <p>{{__('words.web.footer.about_us_des')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="footer-heading">
                        <h4>{{__('words.web.footer.service')}}</h4>
                        <ul class="footer-services-listing">
                            <li><a href="{{route('transcription')}}">{{__('words.web.footer.transcription')}}</a></li>
                            <li><a href="{{route('translation')}}">{{__('words.web.footer.translation')}}</a></li>
                            <li><a href="{{route('voiceover')}}" >{{__('words.web.footer.voiceover')}}</a></li>
                        </ul>
                        <h4>{{__('words.web.footer.legal')}}</h4>
                        <ul class="footer-legal-listing">
                            <li><a href="{{route('legals')}}">{{__('words.web.footer.imprint_policy')}}</a></li>
                            <li><a href="{{route('terms_and_conditions')}}">{{__('words.web.footer.terms')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="visible-sm clearfix"></div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="footer-heading">
                        <h4>{{__('words.web.footer.contact_us')}}</h4>
                        @if (count($errors))
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form id="contact_form" method="POST">
                            @csrf
                            {!! RecaptchaV3::field('register') !!}
                            <div class="form-group-footer">
                                <input type="text" id="contact_name" class="form-control form-control-footer" onkeypress="return handleEnter(this, event)" placeholder="{{__('words.web.footer.name')}}" name="name"/>
                            </div>
                            <div class="form-group-footer">
                                <input type="email" id="contact_email"  class="form-control form-control-footer" onkeypress="return handleEnter(this, event)" placeholder="{{__('words.web.footer.email')}}" name="email"/>
                            </div>
                            <div class="form-group-footer">
                                <textarea type="text" rows="5" id="contact_message" class="form-control form-control-footer" placeholder="{{__('words.web.footer.message')}}" name="message"></textarea>
                            </div>
                            <div class="form-group-footer">
                                <input type="submit" class="btn-send" value="{{__('words.web.footer.send')}}" tabindex="-1"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Section Ends -->
<!-- Copyright Section Starts -->
<div class="container-fluid bg-copyright-home">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="copyright-info text-center">
                        <p>We <i class="far fa-heart"></i> localization. Copyright 2020. AIVOX. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Copyright Section Ends -->
<!-- Scroll To Top Section Starts -->
<div class="scroll-to-top-home">
    <a href="#home">
        <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- Scroll To Top Section Ends -->
<script>
    function handleEnter (field, event) {
        var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
        if (keyCode == 13) {
            var i;
            for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                    break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
        }
        else
            return true;
    }
</script>