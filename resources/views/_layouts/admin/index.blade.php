@include('_layouts.admin.header')
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
        @include('_layouts.admin.topbar')
        <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
            @include('_layouts.admin.sidebar')
            <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                    <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <div class="d-flex flex-column flex-column-fluid">
                    @yield('content')
                </div>
                <div id="kt_app_footer" class="app-footer ">
                    <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                        <div class="text-gray-900 order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2024&copy;</span>
                            <a href="#!" target="" class="text-gray-800 text-hover-primary">H!km4t</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('_layouts.admin.footer')