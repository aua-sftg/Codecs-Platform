@props(['livewire_enable'=>false])
<!DOCTYPE html>
<html lang="en">
<head>
    @if ($livewire_enable)
        @livewireStyles
    @endif

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Codecs | Maximising the CO-benefits  of agricultural Digitalisation  through conducive digital ECoSystems' }}</title>

    <meta name="keywords" content="{{ $keywords ?? 'Codecs, digital, agriculture' }}" />
    <meta name="description" content="{{ $description ?? 'CODECS will develop, and turn into concepts, methods, tools, evidence, a vision of “sustainable digitalisation” with the goal of improving the collective capacity to understand, assess and foresee the full range of benefits and costs of farm digitalisation, and to build digital ecosystems that maximise the net benefits of digitalisation.' }}">
    <meta name="author" content="{{ $author ?? 'AUA Sftg' }}">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content='Codecs | Maximising the CO-benefits  of agricultural Digitalisation  through conducive digital ECoSystems' />
    <meta property="og:description" content="CODECS will develop, and turn into concepts, methods, tools, evidence, a vision of “sustainable digitalisation” with the goal of improving the collective capacity to understand, assess and foresee the full range of benefits and costs of farm digitalisation, and to build digital ecosystems that maximise the net benefits of digitalisation." />
    <meta property="og:url" content="https://digital-agriculture.horizoncodecs.eu/" />
    <meta property="og:site_name" content="CODECS" />
    <meta property="og:image" content="{{asset('img/logos/cropped-codecs-192x192.png')}}" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logos/cropped-codecs-32x32.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/logos/cropped-codecs-32x32.png') }}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/animate/animate.compat.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-shop.css') }}">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ asset('css/demos/demo-construction.css') }}">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="{{ asset('css/skins/skin-construction.css') }}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('vendor/modernizr/modernizr.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>



    <!-- Cookie Consent by TermsFeed https://www.TermsFeed.com -->
    <script type="text/javascript" src="//www.termsfeed.com/public/cookie-consent/4.1.0/cookie-consent.js" charset="UTF-8"></script>
    <script type="text/javascript" charset="UTF-8">
        document.addEventListener('DOMContentLoaded', function () {
            cookieconsent.run({"notice_banner_type":"simple","consent_type":"express","palette":"light","language":"en","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"CODECS","website_privacy_policy_url":"https://digital-agriculture.horizoncodecs.eu/privacy-policy"});
        });
    </script>

    <noscript>Free cookie consent management tool by <a href="https://www.termsfeed.com/">TermsFeed</a></noscript>
    <!-- End Cookie Consent by TermsFeed https://www.TermsFeed.com -->

        {{--    <script src="{{asset('js/popper2.9.2.min.js')}}"></script>--}}
{{--    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>--}}


    {{$head_scripts??''}}
</head>
<body data-plugin-scroll-spy data-plugin-options="{'target': '#sidebar'}">

<div class="body">
    <header id="header" class="header-transparent header-semi-transparent header-semi-transparent-light" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 1, 'stickySetTop': '1'}">
        <div class="header-body border-0">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo custom-header-logo">
                                <img class="logo" alt="Codecs" width="150"  src="{{ asset('img/logos/horizontal/Logo-Codec-horizontal-light.png') }}">
                                <a href="{{route('home')}}">
                                    <img class="logo-sticky" alt="Codecs" width="150" src="{{ asset('img/logos/horizontal/Logo-Codec-horizontal.png') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav header-nav-links order-3 order-lg-1">
                                <div class="header-nav-main header-nav-main-square header-nav-main-text-capitalize header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                    <nav class="collapse px-3-5">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li>
                                                <a class="nav-link {{ (request()->routeIs('home')) ? ' active' : '' }}" href="{{route('home')}}">
                                                    Home
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link {{ (request()->routeIs('meta_inventory_home')) ? ' active' : '' }}" href="{{route('meta_inventory_home')}}">
                                                    Meta-inventory
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link {{ (request()->routeIs('inventory_of_datasets')) ? ' active' : '' }}" href="{{route('inventory_of_datasets')}}">
                                                    Inventory of datasets
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                            <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border d-none d-sm-flex ms-3 order-1 order-lg-2">
                                <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean social-icons-medium ms-0">
                                    <li class="social-icons-facebook"><a href="https://www.facebook.com/horizoneucodecs" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-twitter"><a href="https://twitter.com/HORIZONCODECS" target="_blank" title="Twitter"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="https://www.linkedin.com/company/horizoncodecs/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                            <div class="header-nav-features header-nav-features-no-border header-nav-features-sm-show-border ms-3 ps-4 order-2 order-lg-3">
                                <div class="header-nav-feature header-nav-features-search d-inline-flex">

                                    <a href="{{route('profile.edit')}}" class="mx-2">
                                        <img src="{{asset('img/icons/account_circle.svg')}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div role="main" class="main">

        @isset($hero_section)
           {{ $hero_section }}
        @endisset

        @isset($main_body)
            {{ $main_body }}
        @endisset
    </div>



    <footer id="footer" class="overflow-hidden border-0 m-0">
        <div class="container pt-1">
            <div class="row pt-4 mb-1 gy-4">
                <div class="col-lg-2 align-self-center">
                    <a href="{{route('home')}}">
                        <img alt="Codecs" loading="lazy" class="img-fluid logo" width="123" height="48" src="{{ asset('img/logos/vertical/Logo-Codec-blanc.png') }}">
                    </a>
                    <div>
                        <p class="text-color-primary text-3 mb-1 mt-2">Project Coordinator</p>
                        <p class="text-color-white text-3">Prof. Gianluca Brunori (UNIPI)</p>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-0 mt-5">
                    <h4 class="text-color-white font-weight-bold mb-4-5">Digital Repository</h4>
                    <ul class="list list-unstyled columns-lg-1">
                        @foreach(\App\Logic\LinkList::footer_navigation() as $menu)
                            <li>
                                <a href="{{$menu['url']}}" class="text-color-hover-primary">
                                    {{$menu['label']}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 offset-lg-0 mt-5">
                    <h4 class="text-color-white font-weight-bold mb-4-5">ABOUT US</h4>
                    <ul class="list list-unstyled columns-lg-1">
                        @foreach(\App\Logic\LinkList::footer_about_links() as $menu)
                            <li>
                                <a href="{{$menu['url']}}" target="_blank" class="text-color-hover-primary">
                                    {{$menu['label']}}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-lg-4 mt-5">
                    <p class="text-color-white text-3 mb-3">The CODECS platform is a dynamic hub for showcasing cutting-edge digital tools and research, promoting technology adoption in line with a sustainable digital vision. Its integrated infrastructure provides a centralized control panel, empowering users to conveniently access and oversee available resources through a unified interface.</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-center mb-0">
                    <ul class="footer-social-icons social-icons social-icons-clean social-icons-medium mb-0">
                        <li class="social-icons-facebook">
                            <a href="https://www.facebook.com/horizoneucodecs" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-4 text-color-white"></i></a>
                        </li>
                        <li class="social-icons-twitter">
                            <a href="https://twitter.com/HORIZONCODECS" target="_blank" title="Twitter"><i class="fa-brands fa-x-twitter text-4 text-color-white"></i></a>
                        </li>
                        <li class="social-icons-linkedin">
                            <a href="https://www.linkedin.com/company/horizoncodecs/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in text-4 text-color-white"></i></a>
                        </li>
                    </ul>
                    <p style="text-align: right">
{{--                        <a href="demo-construction-services.html" class="text-color-hover-primary">--}}
{{--                            Terms and conditions--}}
{{--                        </a>--}}
{{--                        <span class="text-color-white">|</span>--}}
                        <a href="{{route('page.show',['page'=>'privacy-policy'])}}" class="text-color-hover-primary">
                            Privacy Policy
                        </a>
                        <span class="text-color-white">|</span>
                        <a href="#" class="text-color-hover-primary" id="open_preferences_center">Update Cookies Preferences</a>
{{--                        <span class="text-color-white">|</span>--}}
{{--                        <a href="demo-construction-services.html" class="text-color-hover-primary">--}}
{{--                            Disclaimer--}}
{{--                        </a>--}}
                    </p>
                </div>

            </div>
            <div class="row pb-0">
                <div class="col text-center mb-0">
                    <p class="text-color-white text-3 mb-0">CODECS © 2023. All Rights Reserved. </p>
                </div>
            </div>
        </div>
{{--        <div class="position-absolute left-100pct transform3dx-n50 top-0 d-none d-lg-block">--}}
{{--            <div class="appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1000" data-appear-animation-duration="1500ms">--}}
{{--                <div class="custom-square-1 custom-square-1-big bg-dark mt-0 mb-5 me-5"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </footer>
    <div class="row pb-2 pt-2">
        <img alt="Codecs" style="max-width: 300px" loading="lazy" src="{{ asset('img/co-funded-by-the-eu.svg') }}">
    </div>

</div>
{{--<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>--}}

<!-- Vendor -->
<script src="{{ asset('vendor/plugins/js/plugins.min.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('js/theme.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ asset('js/views/view.contact.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ asset('js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('js/theme.init.js') }}"></script>


@if ($livewire_enable)
    @livewireScripts
@endif

@include('partials.sweet-alert-setup')
<script>
    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
    })
</script>
{{$body_scripts??''}}
</body>
</html>
