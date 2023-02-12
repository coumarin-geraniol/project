<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="{{ asset('/') }}">
    <title>Document</title>

    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href={{ asset('css/vendors.bundle.css') }}>
    <link rel="stylesheet" media="screen, print" href={{ asset('css/app.bundle.css') }}>

    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('img/favicon/apple-touch-icon.png') }}>
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('img/favicon/favicon-32x32.png') }}>
    <link rel="mask-icon" href={{ asset('img/favicon/safari-pinned-tab.svg') }} color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href={{ asset('css/datagrid/datatables/datatables.bundle.css') }}>
    <link rel="stylesheet" media="screen, print" href={{ asset('css/fa-solid.css') }}>

    {{--   boot box icin eklenenler--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="mod-bg-1">
<!-- DOC: script to save and load page settings -->
<script>
    /**
     *    This script should be placed right after the body tag for fast execution
     *    Note: the script is written in pure javascript and does not depend on thirdparty library
     **/
    'use strict';

    var classHolder = document.getElementsByTagName("BODY")[0],
        /**
         * Load from localstorage
         **/
        themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {},
        themeURL = themeSettings.themeURL || '',
        themeOptions = themeSettings.themeOptions || '';
    /**
     * Load theme options
     **/
    if (themeSettings.themeOptions) {
        classHolder.className = themeSettings.themeOptions;
        console.log("%c✔ Theme settings loaded", "color: #148f32");
    } else {
        console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
    }
    if (themeSettings.themeURL && !document.getElementById('mytheme')) {
        var cssfile = document.createElement('link');
        cssfile.id = 'mytheme';
        cssfile.rel = 'stylesheet';
        cssfile.href = themeURL;
        document.getElementsByTagName('head')[0].appendChild(cssfile);
    }
    /**
     * Save to localstorage
     **/
    var saveSettings = function () {
        themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function (item) {
            return /^(nav|header|mod|display)-/i.test(item);
        }).join(' ');
        if (document.getElementById('mytheme')) {
            themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
        }
        ;
        localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
    }
    /**
     * Reset settings
     **/
    var resetSettings = function () {
        localStorage.setItem("themeSettings", "");
    }

</script>
<!-- BEGIN Page Wrapper -->
<div class="page-wrapper">
    <div class="page-inner">

        @guest
        @else
            <!-- Sidebar Menu -->
            @include('layouts.sidebar')
            <!-- /.sidebar-menu -->
        @endguest

        <div class="page-content-wrapper">

            <header class="page-header" role="banner">
                @guest
                @else
                    <!-- DOC: nav menu layout change shortcut -->
                    <div class="hidden-md-down dropdown-icon-menu position-relative">
                        <a href="#" class="header-btn btn js-waves-off" data-action="toggle"
                           data-class="nav-function-hidden" title="Hide Navigation">
                            <i class="ni ni-menu"></i>
                        </a>
                    </div>
                @endguest

                <div class="ml-auto d-flex">

                    @guest

                        <nav class="navbar navbar-expand-lg navbar-light">

                            <div class="collapse navbar-collapse" id="navbarColor02">
                                <ul class="navbar-nav mr-auto">
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif

                                </ul>

                            </div>
                        </nav>
                    @else

                        <div>
                            <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com"
                               class="header-icon d-flex align-items-center justify-content-center ml-2">
                                <img src="img/demo/avatars/avatar-admin.png" class="profile-image rounded-circle"
                                     alt="Dr. Codex Lantern">
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                                    <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                                                                             <span class="mr-2">
                                                                                 <img
                                                                                     src="img/demo/avatars/avatar-admin.png"
                                                                                     class="rounded-circle profile-image"
                                                                                     alt="{{ auth()->user()->name }}"></span>
                                        <div class="info-card-text">
                                            <div
                                                class="fs-lg text-truncate text-truncate-lg">{{ auth()->user()->name }}
                                                - {{ auth()->user()->role }}</div>
                                            <span
                                                class="text-truncate text-truncate-md opacity-80">{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider m-0"></div>

                                <a href="#" class="dropdown-item" data-toggle="modal">
                                    Profil Bilgileri
                                </a>

                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cikis Yap
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}"
                                      method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>


                        </div>
                    @endguest

                </div>


            </header>


            @yield('content')
        </div>
    </div>
</div>


<!-- BEGIN Page Settings -->
<div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right modal-md">
        <div class="modal-content">
            <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                <h4 class="m-0 text-center color-white">
                    Layout Settings
                    <small class="mb-0 opacity-80">User Interface Settings</small>
                </h4>
                <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2"
                        data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="settings-panel">
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                App Layout
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="fh">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="header-function-fixed"></a>
                        <span class="onoffswitch-title">Fixed Header</span>
                        <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                    </div>
                    <div class="list" id="nff">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="nav-function-fixed"></a>
                        <span class="onoffswitch-title">Fixed Navigation</span>
                        <span class="onoffswitch-title-desc">left panel is fixed</span>
                    </div>
                    <div class="list" id="nfm">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="nav-function-minify"></a>
                        <span class="onoffswitch-title">Minify Navigation</span>
                        <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
                    </div>
                    <div class="list" id="nfh">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="nav-function-hidden"></a>
                        <span class="onoffswitch-title">Hide Navigation</span>
                        <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                    </div>
                    <div class="list" id="nft">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="nav-function-top"></a>
                        <span class="onoffswitch-title">Top Navigation</span>
                        <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                    </div>
                    <div class="list" id="mmb">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-main-boxed"></a>
                        <span class="onoffswitch-title">Boxed Layout</span>
                        <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                    </div>
                    <div class="expanded">
                        <ul class="">
                            <li>
                                <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                            </li>
                            <li>
                                <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                            </li>
                            <li>
                                <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                            </li>
                            <li>
                                <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                            </li>
                        </ul>
                        <div class="list" id="mbgf">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                               data-class="mod-fixed-bg"></a>
                            <span class="onoffswitch-title">Fixed Background</span>
                        </div>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Mobile Menu
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="nmp">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="nav-mobile-push"></a>
                        <span class="onoffswitch-title">Push Content</span>
                        <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                    </div>
                    <div class="list" id="nmno">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="nav-mobile-no-overlay"></a>
                        <span class="onoffswitch-title">No Overlay</span>
                        <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                    </div>
                    <div class="list" id="sldo">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="nav-mobile-slide-out"></a>
                        <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                        <span class="onoffswitch-title-desc">Content overlaps menu</span>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Accessibility
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="mbf">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-bigger-font"></a>
                        <span class="onoffswitch-title">Bigger Content Font</span>
                        <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
                    </div>
                    <div class="list" id="mhc">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-high-contrast"></a>
                        <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
                        <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
                    </div>
                    <div class="list" id="mcb">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-color-blind"></a>
                        <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
                        <span class="onoffswitch-title-desc">color vision deficiency</span>
                    </div>
                    <div class="list" id="mpc">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-pace-custom"></a>
                        <span class="onoffswitch-title">Preloader Inside</span>
                        <span class="onoffswitch-title-desc">preloader will be inside content</span>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Global Modifications
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="mcbg">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-clean-page-bg"></a>
                        <span class="onoffswitch-title">Clean Page Background</span>
                        <span class="onoffswitch-title-desc">adds more whitespace</span>
                    </div>
                    <div class="list" id="mhni">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-hide-nav-icons"></a>
                        <span class="onoffswitch-title">Hide Navigation Icons</span>
                        <span class="onoffswitch-title-desc">invisible navigation icons</span>
                    </div>
                    <div class="list" id="dan">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-disable-animation"></a>
                        <span class="onoffswitch-title">Disable CSS Animation</span>
                        <span class="onoffswitch-title-desc">Disables CSS based animations</span>
                    </div>
                    <div class="list" id="mhic">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-hide-info-card"></a>
                        <span class="onoffswitch-title">Hide Info Card</span>
                        <span class="onoffswitch-title-desc">Hides info card from left panel</span>
                    </div>
                    <div class="list" id="mlph">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-lean-subheader"></a>
                        <span class="onoffswitch-title">Lean Subheader</span>
                        <span class="onoffswitch-title-desc">distinguished page header</span>
                    </div>
                    <div class="list" id="mnl">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle"
                           data-class="mod-nav-link"></a>
                        <span class="onoffswitch-title">Hierarchical Navigation</span>
                        <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
                    </div>
                    <div class="list mt-1">
                        <span class="onoffswitch-title">Global Font Size <small>(RESETS ON REFRESH)</small> </span>
                        <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm"
                                   data-target="html">
                                <input type="radio" name="changeFrontSize"> SM
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text"
                                   data-target="html">
                                <input type="radio" name="changeFrontSize" checked=""> MD
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg"
                                   data-target="html">
                                <input type="radio" name="changeFrontSize"> LG
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl"
                                   data-target="html">
                                <input type="radio" name="changeFrontSize"> XL
                            </label>
                        </div>
                        <span class="onoffswitch-title-desc d-block mb-g">Change <strong>root</strong> font size to effect rem values</span>
                    </div>
                    <div class="mt-2 d-table w-100 pl-5 pr-3">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Theme colors <small>(overlays base css)</small>
                            </h5>
                            <div class="fs-xs text-muted p-2 alert alert-warning mt-3 mb-0">
                                <i class="fal fa-exclamation-triangle text-warning mr-2"></i>Due to network latency and
                                CPU utilization, you may experience a brief flickering effect on page load which may
                                show the intial applied theme for a split second. Setting the prefered style/theme in
                                the header will prevent this from happening.
                            </div>
                        </div>
                    </div>
                    <div class="expanded theme-colors pl-5 pr-3">
                        <ul class="m-0">
                            <li><a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme=""
                                   data-toggle="tooltip" data-placement="top" title="Wisteria (base css)"
                                   data-original-title="Wisteria (base css)"></a></li>
                            <li><a href="#" id="myapp-1" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-1.css" data-toggle="tooltip" data-placement="top"
                                   title="Tapestry" data-original-title="Tapestry"></a></li>
                            <li><a href="#" id="myapp-2" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-2.css" data-toggle="tooltip" data-placement="top"
                                   title="Atlantis" data-original-title="Atlantis"></a></li>
                            <li><a href="#" id="myapp-3" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-3.css" data-toggle="tooltip" data-placement="top"
                                   title="Indigo" data-original-title="Indigo"></a></li>
                            <li><a href="#" id="myapp-4" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-4.css" data-toggle="tooltip" data-placement="top"
                                   title="Dodger Blue" data-original-title="Dodger Blue"></a></li>
                            <li><a href="#" id="myapp-5" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-5.css" data-toggle="tooltip" data-placement="top"
                                   title="Tradewind" data-original-title="Tradewind"></a></li>
                            <li><a href="#" id="myapp-6" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-6.css" data-toggle="tooltip" data-placement="top"
                                   title="Cranberry" data-original-title="Cranberry"></a></li>
                            <li><a href="#" id="myapp-7" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-7.css" data-toggle="tooltip" data-placement="top"
                                   title="Oslo Gray" data-original-title="Oslo Gray"></a></li>
                            <li><a href="#" id="myapp-8" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-8.css" data-toggle="tooltip" data-placement="top"
                                   title="Chetwode Blue" data-original-title="Chetwode Blue"></a></li>
                            <li><a href="#" id="myapp-9" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-9.css" data-toggle="tooltip" data-placement="top"
                                   title="Apricot" data-original-title="Apricot"></a></li>
                            <li><a href="#" id="myapp-10" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-10.css" data-toggle="tooltip" data-placement="top"
                                   title="Blue Smoke" data-original-title="Blue Smoke"></a></li>
                            <li><a href="#" id="myapp-11" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-11.css" data-toggle="tooltip" data-placement="top"
                                   title="Green Smoke" data-original-title="Green Smoke"></a></li>
                            <li><a href="#" id="myapp-12" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-12.css" data-toggle="tooltip" data-placement="top"
                                   title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a></li>
                            <li><a href="#" id="myapp-13" data-action="theme-update" data-themesave
                                   data-theme="css/themes/cust-theme-13.css" data-toggle="tooltip" data-placement="top"
                                   title="Emerald" data-original-title="Emerald"></a></li>
                        </ul>
                    </div>
                    <hr class="mb-0 mt-4">
                    <div class="pl-5 pr-3 py-3 bg-faded">
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset
                                    Settings</a>
                            </div>
                            <div class="col-6 pl-1">
                                <a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Factory
                                    Reset</a>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="saving"></span>
            </div>
        </div>
    </div>
</div> <!-- END Page Settings -->

<!-- base vendor bundle:
        DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
                   + pace.js (recommended)
                   + jquery.js (core)
                   + jquery-ui-cust.js (core)
                   + popper.js (core)
                   + bootstrap.js (core)
                   + slimscroll.js (extension)
                   + app.navigation.js (core)
                   + ba-throttle-debounce.js (core)
                   + waves.js (extension)
                   + smartpanels.js (extension)
                   + src/../jquery-snippets.js (core) -->
<script src="js/vendors.bundle.js"></script>
<script src="js/app.bundle.js"></script>

<!-- datatble responsive bundle contains:
+ jquery.dataTables.js
+ dataTables.bootstrap4.js
+ dataTables.autofill.js
+ dataTables.buttons.js
+ buttons.bootstrap4.js
+ buttons.html5.js
+ buttons.print.js
+ buttons.colVis.js
+ dataTables.colreorder.js
+ dataTables.fixedcolumns.js
+ dataTables.fixedheader.js
+ dataTables.keytable.js
+ dataTables.responsive.js
+ dataTables.rowgroup.js
+ dataTables.rowreorder.js
+ dataTables.scroller.js
+ dataTables.select.js
+ datatables.styles.app.js
+ datatables.styles.buttons.app.js -->
<script src="js/datagrid/datatables/datatables.bundle.js"></script>
<!-- datatbles buttons bundle contains:
+ "jszip.js",
+ "pdfmake.js",
+ "vfs_fonts.js"
NOTE: 	The file size is pretty big, but you can always use the
    build.json file to deselect any components you do not need under "export" -->
<script src="js/datagrid/datatables/datatables.export.js"></script>


@yield('script')

</body>
</html>
