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
    <meta property="og:title" content='Codecs | Maximising the CO-benefits  of agricultural Digitalisation' />
    <meta property="og:description" content="CODECS will develop, and turn into concepts, methods, tools, evidence, a vision of “sustainable digitalisation” with the goal of improving the collective capacity to understand, assess and foresee the full range of benefits and costs of farm digitalisation, and to build digital ecosystems that maximise the net benefits of digitalisation." />
    <meta property="og:url" content="https://digital-agriculture.horizoncodecs.eu/" />
    <meta property="og:site_name" content="CODECS" />
    <meta property="og:image" content="{{asset('img/logos/horizontal/Logo-Codec-horizontal.png')}}" />
    <meta name="twitter:card" content="summary_large_image" />

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
                cookieconsent.run({"notice_banner_type":"simple","consent_type":"express","palette":"light","language":"en","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"CODECS","website_privacy_policy_url":"https://www.digital-agriculture.horizoncodecs.eu/privacy-policy"});
            });
        </script>

        <!-- Google Analytics -->
        <!-- Google Tag Manager -->

        <script type="text/plain" data-cookie-consent="tracking">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-TXSXSN9D');
        </script>

        <!-- End Google Tag Manager -->
        <!-- end of Google Analytics-->

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
                    <div class="header-column logo_column">
                        <div class="header-row">
                            <div class="header-logo custom-header-logo">
                                <a href="{{route('home')}}">
                                    <img class="logo" alt="Codecs" width="150"  src="{{ asset('img/logos/horizontal/Logo-Codec-horizontal-light.png') }}">
                                </a>
                                <a href="{{route('home')}}">
                                    <img class="logo-sticky" alt="Codecs" width="150" src="{{ asset('img/logos/horizontal/Logo-Codec-horizontal.png') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="d-flex flex-column align-items-end">
                        <a href="https://www.horizoncodecs.eu/" target="_blank" rel="noopener"
                           class="btn header-website-btn font-weight-bold mb-2">
                            CODECS Website
                        </a>
                        <div class="header-row">
                            <div class="header-nav header-nav-links order-3 order-lg-1">
                                <div class="header-nav-main header-nav-main-square header-nav-main-text-capitalize header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li>
                                                <a class="nav-link {{ (request()->routeIs('meta_inventory_home')) ? ' active' : '' }}" href="{{route('meta_inventory_home')}}">
                                                    Digital Technologies Inventory
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link {{ (request()->routeIs('inventory_of_datasets')) ? ' active' : '' }}" href="{{route('inventory_of_datasets')}}">
                                                    Inventory of datasets
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link {{ (request()->routeIs('assessment_tools')) ? ' active' : '' }}" href="{{route('assessment_tools')}}">
                                                    Assessment Toolkit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link {{ (request()->routeIs('storybooks')) ? ' active' : '' }}" href="{{route('storybooks')}}">
                                                    Storybooks
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link {{ (request()->routeIs('virtual_tours')) ? ' active' : '' }}" href="{{route('virtual_tours')}}">
                                                    Virtual Tours
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                            {{-- <div class="header-nav-features header_socials header-nav-features-no-border header-nav-features-lg-show-border d-none d-sm-flex ms-3 order-1 order-lg-2">
                                <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean social-icons-medium ms-0">
                                    <li class="social-icons-facebook"><a href="https://www.facebook.com/horizoneucodecs" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-twitter"><a href="https://twitter.com/HORIZONCODECS" target="_blank" title="Twitter"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="https://www.linkedin.com/company/horizoncodecs/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div> --}}
                            <div class="header-nav-features header-nav-features-no-border header-nav-features-sm-show-border ms-3 ps-1 order-2 order-lg-3">
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
                    <p class="text-color-white text-3 mb-3 text-justify">The CODECS platform is a dynamic hub for showcasing cutting-edge digital tools and research, promoting technology adoption in line with a sustainable digital vision. Its integrated infrastructure provides a centralized control panel, empowering users to conveniently access and oversee available resources through a unified interface.</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-left mb-0">
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
                </div>

            </div>
            <div class="d-flex pb-0 justify-content-between license_container" style="margin-bottom: 20px; margin-top: 20px">
                <div class="d-flex text-center mb-0 ">
                    <p class="text-color-white text-3 mb-0 me-2">© 2025. This work is openly licensed via CC BY 4.0. </p>
                    <img alt="CC" class="mb-2" style="width: 20px; height: 20px" loading="lazy" src="{{ asset('img/cc.svg') }}">
                    <img alt="BY" class="mb-2" style="width: 20px; height: 20px" loading="lazy" src="{{ asset('img/by.svg') }}">
                </div>
                <div>
                    <p class="mb-0 text-right">
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
        </div>
{{--        <div class="position-absolute left-100pct transform3dx-n50 top-0 d-none d-lg-block">--}}
{{--            <div class="appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1000" data-appear-animation-duration="1500ms">--}}
{{--                <div class="custom-square-1 custom-square-1-big bg-dark mt-0 mb-5 me-5"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </footer>
    <div class="row pb-2 pt-2">
        <img alt="Codecs" style="max-width: 300px" loading="lazy" src="{{ asset('img/co-funded-by-the-eu.png') }}">
    </div>

    <!-- Role Selection Modal -->
    <div class="modal fade" id="roleSelectionModal" tabindex="-1" aria-labelledby="roleSelectionModalLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 rounded-3 role-modal-content">
                <div class="modal-body modal-padding">
                    <h4 class="font-weight-bold mb-2" style="color: #1C64B6;">Choose your role</h4>
                    <p class="text-muted mb-4">Your role helps us customize content, tools, and recommendations for you.<br>Please the option that best reflects your role:</p>
                    <div class="row g-3 justify-content-center mb-4" id="roleOptions">
                        <div class="col-6 col-sm-4 col-md-auto">
                            <div class="role-card text-center p-3" data-role="researcher">
                                <div class="role-icon mb-2"><img src="{{ asset('img/popup/researcher.png') }}" alt="Researcher" style="width:80px;height:80px;object-fit:contain;"></div>
                                <span class="role-label d-block font-weight-bold" style="color: #1C64B6;">Researcher</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-auto">
                            <div class="role-card text-center p-3" data-role="advisor">
                                <div class="role-icon mb-2"><img src="{{ asset('img/popup/advisor.png') }}" alt="Advisor" style="width:80px;height:80px;object-fit:contain;"></div>
                                <span class="role-label d-block font-weight-bold" style="color: #1C64B6;">Advisor</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-auto">
                            <div class="role-card text-center p-3" data-role="policymaker">
                                <div class="role-icon mb-2"><img src="{{ asset('img/popup/policymaker.png') }}" alt="Policymaker" style="width:80px;height:80px;object-fit:contain;"></div>
                                <span class="role-label d-block font-weight-bold" style="color: #1C64B6;">Policy-Maker</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-auto">
                            <div class="role-card text-center p-3" data-role="farmer_forester">
                                <div class="role-icon mb-2"><img src="{{ asset('img/popup/farmer.png') }}" alt="Farmer / Forester" style="width:80px;height:80px;object-fit:contain;"></div>
                                <span class="role-label d-block font-weight-bold" style="color: #1C64B6;">Farmer</span>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-auto">
                            <div class="role-card text-center p-3" data-role="other">
                                <div class="role-icon mb-2"><img src="{{ asset('img/popup/other.png') }}" alt="Other" style="width:80px;height:80px;object-fit:contain;"></div>
                                <span class="role-label d-block font-weight-bold" style="color: #1C64B6;">Other</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn px-5 py-2 text-white font-weight-bold role-apply-btn" id="applyRoleBtn" style="background-color: #A0B63C; letter-spacing: 1px;">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        // Role selection popup — show after 4s unless a role has already been saved locally
        if (!localStorage.getItem('roleApplied')) {
            setTimeout(function () {
                var modalEl = document.getElementById('roleSelectionModal');
                if (modalEl) {
                    new bootstrap.Modal(modalEl).show();
                }
            }, 4000);
        }

        // Single role selection
        $(document).on('click', '.role-card', function () {
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
            } else {
                $('.role-card').removeClass('selected');
                $(this).addClass('selected');
            }
        });

        // Apply button — close modal and remember the applied role for this session
        $('#applyRoleBtn').on('click', function () {
            var $selected = $('.role-card.selected');
            if ($selected.length === 0) return;
            var selectedRole = $selected.data('role');
            localStorage.setItem('roleApplied', selectedRole);

            // Persist the selection to the database
            $.post('{{ route('role.selection.store') }}', { role: selectedRole }, function () {
                var modalEl = document.getElementById('roleSelectionModal');
                bootstrap.Modal.getInstance(modalEl).hide();
            }).fail(function () {
                // Still close the modal even if the request fails
                var modalEl = document.getElementById('roleSelectionModal');
                bootstrap.Modal.getInstance(modalEl).hide();
            });
        });
    });
</script>
{{$body_scripts??''}}
</body>
</html>
