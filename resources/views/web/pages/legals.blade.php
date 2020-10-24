@extends('web.layouts.default')
@section('title', 'LEGALS')
@section('content')

    <div class="page__intro">
        <div class="container">            
        </div>
    </div>

    <div class="text__container">
        <div class="container">
            <div class="block">
                <div class="text">
                    <h2><strong>{{__('words.web.legals.imprint_title')}}</strong></h2>
                    <br>
                    <p>{{__('words.web.legals.imprint_identification')}}</p>

                    <p>{{__('words.web.legals.imprint_address')}}<br>
                        {{__('words.web.legals.imprint_director')}}<br>
                        {{__('words.web.legals.imprint_street')}}<br>
                        {{__('words.web.legals.imprint_code')}}<br>
                        {{__('words.web.legals.imprint_country')}}<br>
                        {{__('words.web.legals.imprint_phone')}}<br>
                        {{__('words.web.legals.imprint_email')}}<br>
                        {{__('words.web.legals.imprint_id')}}<br>
                        {{__('words.web.legals.imprint_register')}}<br>
                        {{__('words.web.legals.imprint_register_number')}}<br>
						{{__('words.web.legals.imprint_copyright')}}<br>
                    </p><br>
                    <h2><strong>{{__('words.web.legals.privacy_title')}}</strong></h2>
                    <p><br>
                        {{__('words.web.legals.privacy_text1')}}</p>

                    <p>{{__('words.web.legals.privacy_text2')}}</p>

                    <p>{{__('words.web.legals.privacy_text3')}}</p>

                    <p>{{__('words.web.legals.privacy_structure')}}</p>

                    <p>{{__('words.web.legals.privacy_structure_one')}}<br>
                        {{__('words.web.legals.privacy_structure_two')}}<br>
                        {{__('words.web.legals.privacy_structure_three')}}</p>

                    <p>{{__('words.web.legals.privacy_structure_one')}}</p>

                    <p>{{__('words.web.legals.privacy_structure_one_text1')}}</p>

                    <p>
                        <span style="caret-color: rgb(255, 0, 0);">
                            {{__('words.web.legals.imprint_address')}}<br>
                            {{__('words.web.legals.imprint_street')}}<br>
                            {{__('words.web.legals.imprint_code')}}<br>
                            {{__('words.web.legals.imprint_country')}}
                        </span>
                    </p>

                    <p>{{__('words.web.legals.privacy_structure_one_text2')}}</p>

                    <p>{{__('words.web.legals.privacy_structure_two')}}</p>

                    <p>{{__('words.web.legals.privacy_structure_two_text1')}}</p>

                    <ul type="disc">
                        <li>{{__('words.web.legals.privacy_structure_two_text2')}}</li>
                        <li>{{__('words.web.legals.privacy_structure_two_text3')}}</li>
                        <li>{{__('words.web.legals.privacy_structure_two_text4')}}</li>
                        <li>{{__('words.web.legals.privacy_structure_two_text5')}}</li>
                        <li>{{__('words.web.legals.privacy_structure_two_text6')}}</li>
                    </ul>

                    <p>{{__('words.web.legals.privacy_structure_two_text7')}}</p>

                    <p><strong>{{__('words.web.legals.privacy_structure_two_text8')}}</strong></p>
                    <br>
                    <p>{{__('words.web.legals.privacy_structure_three')}}</p>

                    <p>{{__('words.web.legals.privacy_structure_three_text')}}</p>

                    <h4><strong>{{__('words.web.legals.server_data')}}</strong></h4>

                    <p>{{__('words.web.legals.server_data_text1')}}</p>

                    <p>{{__('words.web.legals.server_data_text2')}}</p>

                    <p>{{__('words.web.legals.server_data_text3')}}</p>

                    <p>{{__('words.web.legals.server_data_text4')}}</p>

                    <h4><strong>{{__('words.web.legals.cookies')}}</strong></h4>

                    <p>{{__('words.web.legals.session_cookies')}}</p>

                    <p>{{__('words.web.legals.session_cookies_text1')}}</p>

                    <p>{{__('words.web.legals.session_cookies_text2')}}</p>

                    <p>{{__('words.web.legals.session_cookies_text3')}}</p>

                    <p>{{__('words.web.legals.session_cookies_text4')}}</p>

                    <p>{{__('words.web.legals.session_cookies_text5')}}</p>

                    <p>{{__('words.web.legals.third_party_cookies')}}</p>

                    <p>{{__('words.web.legals.third_party_cookies_text1')}}</p>

                    <p>{{__('words.web.legals.third_party_cookies_text2')}}</p>

                    <p>{{__('words.web.legals.disabling_cookies')}}</p>

                    <p>{{__('words.web.legals.disabling_cookies_text1')}}</p>

                    <p>{{__('words.web.legals.disabling_cookies_text2')}}</p>

                    <h4><strong>{{__('words.web.legals.order_processing')}}</strong></h4>

                    <p>{{__('words.web.legals.order_processing_text1')}}</p>

                    <p>{{__('words.web.legals.order_processing_text2')}}</p>

                    <p>{{__('words.web.legals.order_processing_text5')}}</p>

                    <h4><br>
                        <strong>{{__('words.web.legals.customer_account')}}</strong></h4>

                    <p>{{__('words.web.legals.customer_account_text1')}}</p>

                    <p>{{__('words.web.legals.customer_account_text2')}}</p>

                    <p>{{__('words.web.legals.customer_account_text3')}}</p>

                    <p>{{__('words.web.legals.customer_account_text4')}}</p>

                    <p>{{__('words.web.legals.customer_account_text5')}}</p>

                    <p>{{__('words.web.legals.customer_account_text6')}}</p>

                    <h4><strong>{{__('words.web.legals.credit')}}</strong></h4>

                    <p>{{__('words.web.legals.credit_text1')}}</p>

                    <p>{{__('words.web.legals.credit_text2')}}</p>

                    <h4><strong>{{__('words.web.legals.newsletter')}}</strong></h4>

                    <p>{{__('words.web.legals.newsletter_text1')}}</p>

                    <p>{{__('words.web.legals.newsletter_text2')}}</p>

                    <p>{{__('words.web.legals.newsletter_text3')}}</p>

                    <h4><strong>{{__('words.web.legals.contact')}}</strong></h4>

                    <p>{{__('words.web.legals.contact_text1')}}</p>

                    <p>{{__('words.web.legals.contact_text2')}}</p>

                    <p>{{__('words.web.legals.contact_text3')}}</p>

                    <h4><strong>{{__('words.web.legals.linkedin')}}</strong></h4>

                    <p>{{__('words.web.legals.linkedin_text1')}}</p>

                    <p>{{__('words.web.legals.linkedin_text2')}}</p>

                    <p><a href="https://www.privacyshield.gov/participant?id=a2zt0000000L0UZAA0&amp;status=Active" rel="noopener" target="_blank">https://www.privacyshield.gov/participant?id=a2zt0000000L0UZAA0&amp;status=Active</a></p>

                    <p>{{__('words.web.legals.linkedin_text3')}}</p>

                    <p><a href="https://www.linkedin.com/legal/privacy-policy" rel="noopener" target="_blank">https://www.linkedin.com/legal/privacy-policy</a></p>

                    <h4><strong>{{__('words.web.legals.google_analytics')}}</strong></h4>

                    <p>{{__('words.web.legals.google_analytics_text1')}}</p>

                    <p>{{__('words.web.legals.google_analytics_text2')}}</p>

                    <p><a href="https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active" rel="noopener" target="_blank">https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active</a></p>

                    <p>{{__('words.web.legals.google_analytics_text3')}}</p>

                    <p>{{__('words.web.legals.google_analytics_text4')}}</p>

                    <p>{{__('words.web.legals.google_analytics_text5')}}</p>

                    <p>{{__('words.web.legals.google_analytics_text6')}}</p>

                    <p>{{__('words.web.legals.google_analytics_text7')}}</p>

                    <p><a href="https://www.google.com/intl/de/policies/privacy/partners" rel="noopener" target="_blank">https://www.google.com/intl/de/policies/privacy/partners,</a></p>

                    <p>{{__('words.web.legals.google_analytics_text8')}}</p>

                    <p>{{__('words.web.legals.google_analytics_text9')}}</p>

                    <p><a href="https://tools.google.com/dlpage/gaoptout?hl=de" rel="noopener" target="_blank">https://tools.google.com/dlpage/gaoptout?hl=en</a></p>

                    <p>{{__('words.web.legals.google_analytics_text10')}}</p>

                    <h4><strong>{{__('words.web.legals.google_captcha')}}</strong></h4>

                    <p>{{__('words.web.legals.google_captcha_text1')}}</p>

                    <p>{{__('words.web.legals.google_captcha_text2')}}</p>

                    <p><a href="https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active" rel="noopener" target="_blank">https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active</a></p>

                    <p>{{__('words.web.legals.google_captcha_text3')}}</p>

                    <p>{{__('words.web.legals.google_captcha_text4')}}&nbsp;&nbsp;&nbsp;</p>

                    <p>{{__('words.web.legals.google_captcha_text5')}}</p>

                    <p>{{__('words.web.legals.google_captcha_text6')}}</p>

                    <p><a href="https://policies.google.com/privacy" rel="noopener" target="_blank">https://policies.google.com/privacy</a></p>

                    <p>{{__('words.web.legals.google_captcha_text7')}}.</p>

                    <h4><strong>{{__('words.web.legals.google_fonts')}}</strong></h4>

                    <p>{{__('words.web.legals.google_fonts_text1')}}</p>

                    <p>{{__('words.web.legals.google_fonts_text2')}}</p>

                    <p><a href="https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active" rel="noopener" target="_blank">https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active</a></p>

                    <p>{{__('words.web.legals.google_fonts_text3')}}</p>

                    <p>{{__('words.web.legals.google_fonts_text4')}}</p>

                    <p>{{__('words.web.legals.google_fonts_text5')}}</p>

                    <p>{{__('words.web.legals.google_fonts_text6')}}</p>

                    <p>{{__('words.web.legals.google_fonts_text7')}}</p>

                    <p><a href="https://adssettings.google.com/authenticated" rel="noopener" target="_blank">https://adssettings.google.com/authenticated</a></p>

                    <p><a href="https://policies.google.com/privacy" rel="noopener" target="_blank">https://policies.google.com/privacy</a></p>

                    <p>{{__('words.web.legals.google_fonts_text8')}}.</p>

                    <h4><strong>{{__('words.web.legals.google_adwords')}}</strong></h4>

                    <p>{{__('words.web.legals.google_adwords_text1')}}</p>

                    <p>{{__('words.web.legals.google_adwords_text2')}}</p>

                    <p><a href="https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active" rel="noopener" target="_blank">https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active</a></p>

                    <p>{{__('words.web.legals.google_adwords_text3')}}</p>

                    <p>{{__('words.web.legals.google_adwords_text4')}}</p>

                    <p>{{__('words.web.legals.google_adwords_text5')}}</p>

                    <p>{{__('words.web.legals.google_adwords_text6')}}</p>

                    <p>{{__('words.web.legals.google_adwords_text7')}}</p>

                    <p>{{__('words.web.legals.google_adwords_text8')}}</p>

                    <p>{{__('words.web.legals.google_adwords_text9')}}</p>

                    <p><a href="https://services.google.com/sitestats/de.html" rel="noopener" target="_blank">https://services.google.com/sitestats/de.html</a></p>

                    <p><a href="http://www.google.com/policies/technologies/ads/" rel="noopener" target="_blank">http://www.google.com/policies/technologies/ads/</a>&nbsp;</p>

                    <p><a href="http://www.google.de/policies/privacy/" rel="noopener" target="_blank">http://www.google.de/policies/privacy/</a></p>

                    <p>{{__('words.web.legals.google_adwords_text10')}}</p>

                    <h4><strong>{{__('words.web.legals.google_adsense')}}</strong></h4>

                    <p>{{__('words.web.legals.google_adsense_text1')}}</p>

                    <p>{{__('words.web.legals.google_adsense_text2')}}</p>

                    <p><a href="https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active" rel="noopener" target="_blank">https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active</a></p>

                    <p>{{__('words.web.legals.google_adsense_text3')}}</p>

                    <p>{{__('words.web.legals.google_adsense_text4')}}</p>

                    <p>{{__('words.web.legals.google_adsense_text5')}}</p>

                    <p>{{__('words.web.legals.google_adsense_text6')}}</p>

                    <p>{{__('words.web.legals.google_adsense_text7')}}</p>

                    <p><a href="https://policies.google.com/privacy" rel="noopener" target="_blank">https://policies.google.com/privacy</a></p>

                    <p><a href="https://adssettings.google.com/authenticated" rel="noopener" target="_blank">https://adssettings.google.com/authenticated</a></p>

                    <p>{{__('words.web.legals.google_adsense_text8')}}</p>

                    <h4><strong>{{__('words.web.legals.google_remarketing')}}</strong></h4>

                    <p>{{__('words.web.legals.google_remarketing_text1')}}</p>

                    <p>{{__('words.web.legals.google_remarketing_text2')}}</p>

                    <p><a href="https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active" rel="noopener" target="_blank">https://www.privacyshield.gov/participant?id=a2zt000000001L5AAI&amp;status=Active</a></p>

                    <p>{{__('words.web.legals.google_remarketing_text3')}}</p>

                    <p>{{__('words.web.legals.google_remarketing_text4')}}</p>

                    <p>{{__('words.web.legals.google_remarketing_text5')}}</p>

                    <p>{{__('words.web.legals.google_remarketing_text6')}}</p>

                    <p>{{__('words.web.legals.google_remarketing_text7')}}</p>

                    <p><a href="https://www.google.com/settings/ads/plugin" rel="noopener" target="_blank">https://www.google.com/settings/ads/plugin?hl=de</a></p>

                    <p>{{__('words.web.legals.google_remarketing_text8')}}</p>

                    <p><a href="http://www.youronlinechoices.com/uk/your-ad-choices" rel="noopener" target="_blank">http://www.youronlinechoices.com/uk/your-ad-choices/</a></p>

                    <p>{{__('words.web.legals.google_remarketing_text9')}}</p>

                    <p><a href="http://www.networkadvertising.org/choices/" rel="noopener" target="_blank">http://www.networkadvertising.org/choices/</a></p>

                    <p>{{__('words.web.legals.google_remarketing_text10')}}</p>

                    <p><strong>{{__('words.web.legals.cross_device')}}</strong> {{__('words.web.legals.cross_device_text1')}}</p>

                    <p>{{__('words.web.legals.cross_device_text2')}}</p>

                    <p><a href="http://www.google.com/privacy/ads/" rel="noopener" target="_blank">http://www.google.com/privacy/ads/</a></p>

                    <p><a href="https://www.ratgeberrecht.eu/leistungen/muster-datenschutzerklaerung.html" rel="noopener" target="_blank">{{__('words.web.legals.cross_device_text3')}}</a> {{__('words.web.legals.cross_device_text4')}} <a href="https://www.ratgeberrecht.eu/" target="_blank">{{__('words.web.legals.cross_device_text5')}}</a></p>
                    <p></p>
                    <!--    -->
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <!-- Accordion JS -->
    <script src="{{asset('assets/js/accordion.js')}}"></script>
    <!-- Scroll Js -->
    <script src="{{asset('assets/js/scroll.js')}}"></script>
@endsection