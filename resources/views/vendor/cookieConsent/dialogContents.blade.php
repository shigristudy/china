<div class="js-cookie-consent cookie-consent">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <span class="cookie-consent__message">
                    {!! trans('cookieConsent::texts.message') !!}
                    <a href="https://aivox.de/legals" rel="noopener" target="_blank">
                        {!! trans('cookieConsent::texts.cookie_policy') !!}
                    </a>.
                </span>
            </div>
            <div class="col-xs-12 col-sm-3">
                <button class="js-cookie-consent-agree cookie-consent__agree">
                    {{ trans('cookieConsent::texts.agree') }}
                </button>
            </div>
        </div>
    </div>
</div>
