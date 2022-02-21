<!-- START FOOTER -->
<footer class="bg_gray">
    <div class="footer_top small_pt pb_20">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="index-2.html#"><img src="{{asset('assets/images/logo.png')}}" alt="logo"/></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">لینک های مفید</h6>
                        <ul class="widget_links">
                            @if (!empty($fast_links->data))
                                @foreach ($fast_links->data as $link)
                                    <li><a href="{{ $link['link'] }}">{{ $link['type'] }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">پل های ارتباطی</h6>
                        <ul class="contact_info">
                            @if (!empty($contactUs->data))

                                <li class=""><i class="ti-mobile"></i> {{ $contactUs->data['phone'] }}</li>
                                <li class=""><i class="ti-email"></i> {{ $contactUs->data['email'] }}</li>
                                <li class=""><i class="ti-location-pin"></i> {{ $contactUs->data['address'] }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">مجوز ها</h6>
                        <ul class="contact_info">
                            <li><a href="//"><img src="{{asset('assets/images/eNamad.png')}}"
                                                  alt="amarican_express"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <resource>
                        <p class="mb-lg-0 text-center">توسعه توسط تیم
                            <a href="//KacharIT.ir">کاچار آی تی</a>
                        </p>
                    </resource>
                </div>
                <div class="col-lg-4 order-lg-first">
                    <div class="widget mb-lg-0">
                        <ul class="social_icons text-center text-lg-left">
                            @if (isset($socials))
                                @foreach ($socials['data'] as $social)
                                    <li>
                                        <a href="//{{ $social['link'] }}"
                                           class="sc_{{\Modules\SiteInformation\Entities\Socials::SOCIALS[$social['type']]}}">
                                            <i class=" {{ \Modules\SiteInformation\Entities\Socials::SOCIALS[$social['type']]['icon'] }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
