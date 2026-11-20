<body>
     <!-- Start Switcher -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="border-bottom border-block-end-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                    <button class="side-menu__item active" id="switcher-home-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                        aria-selected="true">Theme Styles</button>
                    <button class="side-menu__item" id="switcher-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-profile" type="button" role="tab" aria-controls="switcher-profile"
                        aria-selected="false">Theme Colors</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel"
                    aria-labelledby="switcher-home-tab" tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-light-theme">
                                        Light
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-light-theme" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-dark-theme">
                                        Dark
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-dark-theme">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-ltr">
                                        LTR
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-ltr"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-rtl">
                                        RTL
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-vertical">
                                        Vertical
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-vertical" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-horizontal">
                                        Horizontal
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-horizontal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-click">
                                        Menu Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-hover">
                                        Menu Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-hover">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-click">
                                        Icon Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-hover">
                                        Icon Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-hover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-menu">
                                        Default Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-closed-menu">
                                        Closed Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icontext-menu">
                                        Icon Text
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-overlay">
                                        Icon Overlay
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-detached">
                                        Detached
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-detached">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-double-menu">
                                        Double Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-regular">
                                        Regular
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-regular" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-classic">
                                        Classic
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-classic">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-modern">
                                        Modern
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-modern">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-full-width">
                                        Full Width
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-full-width" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-boxed">
                                        Boxed
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-boxed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Loader:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-enable">
                                        Enable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-enable">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-loader-disable">
                                        Disable
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-loader"
                                        id="switcher-loader-disable" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel"
                    aria-labelledby="switcher-profile-tab" tabindex="0">
                    <div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Menu Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Header" type="radio" name="header-colors"
                                        id="switcher-header-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio" name="header-colors"
                                        id="switcher-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio" name="header-colors"
                                        id="switcher-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Header" type="radio"
                                        name="header-colors" id="switcher-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Header"
                                        type="radio" name="header-colors" id="switcher-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-3" type="radio"
                                        name="theme-primary" id="switcher-primary2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-4" type="radio"
                                        name="theme-primary" id="switcher-primary3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-5" type="radio"
                                        name="theme-primary" id="switcher-primary4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-3" type="radio"
                                        name="theme-background" id="switcher-background2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4">
                                </div>
                                <div
                                    class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                    <div class="theme-container-background"></div>
                                    <div class="pickr-container-background"></div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-image mb-3">
                            <p class="switcher-style-head">Menu With Background Image:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="theme-background" id="switcher-bg-img">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="theme-background" id="switcher-bg-img1">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img3" type="radio"
                                        name="theme-background" id="switcher-bg-img2">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="theme-background" id="switcher-bg-img3">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="theme-background" id="switcher-bg-img4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid canvas-footer">
                    <a href="javascript:void(0);" id="reset-all" class="btn btn-danger m-1">Reset</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Switcher -->

<header class="app-header">
    <div class="main-header-container container-fluid">
        <div class="header-content-left">
            <div class="header-element">
                <div class="horizontal-logo">
                    <a href="/cpanel/home" class="header-logo text-logo">
                         ADMIN PANEL
                    </a>
                </div>
            </div>
            <a aria-label="Hide Sidebar"
               class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
               data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
        </div>
         <div class="header-element header-theme-mode">
    <a href="javascript:void(0);" class="header-link layout-setting">
        <span class="light-layout">
            <i class="bx bx-moon header-link-icon"></i>
        </span>
        <span class="dark-layout">
            <i class="bx bx-sun header-link-icon"></i>
        </span>
    </a>
</div>
    </div>
</header>

<aside class="app-sidebar sticky" id="sidebar" style="border-right-width: 0px;">
    <div class="main-sidebar-header" style="border-bottom-width: 0px; border-right-width: 0px;">
        <a href="/cpanel/home" class="header-logo text-logo">
            ADMIN PANEL
        </a>
    </div>
    <div class="main-sidebar" id="sidebar-scroll">
      

                <!-- Start::nav -->
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <div class="slide-left" id="slide-left">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                        </svg>
                    </div>
                    <ul class="main-menu" >
                        <li class="slide__category"><span class="category-name">Main</span></li>
                          <li class="slide">
                            <a href="/cpanel/home"
                                class="side-menu__item <?=active_sidebar(['Home.php']);?>">
                                <i class="bx bxs-dashboard side-menu__icon"></i>
                                <span class="side-menu__label">Dashboard</span>
                            </a>
                        </li>
                        <li class="slide has-sub ">
                            <a href="javascript:void(0);"
                                class="side-menu__item ">
                                <i class='bx bx-history side-menu__icon'></i>
                                <span class="side-menu__label">Lịch sử</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                                        
                                                                                                <li class="slide">
                                    <a href="/cpanel/transactions"
                                        class="side-menu__item <?=active_sidebar(['dong-tien.php']);?>">Biến động
                                        số dư</a>
                                </li>
                                <li class="slide">
                                    <a href="/cpanel/logs"
                                        class="side-menu__item <?=active_sidebar(['logs.php']);?>">Nhật ký hoạt động</a>
                                </li>
                                                            </ul>
                        </li>
                                                
                                            
                                                <li class="slide__category"><span class="category-name">Dịch vụ</span></li>
                                                <li
                            class="slide has-sub ">
                            <a href="javascript:void(0);"
                                class="side-menu__item ">
                                <i class='bx bx-cart side-menu__icon'></i>
                                <span class="side-menu__label">Đơn hàng dịch vụ</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                               
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangCayThueXuLy.php');?>"
                                        class="side-menu__item ">Đơn chờ xử lý <span class="badge bg-info right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `status` = 'xuly' ");?></span></a>
                                </li>
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangCayThueDangCay.php');?>"
                                        class="side-menu__item ">Đơn đang cày <span class="badge bg-warning right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `status` = 'dangcay'");?></span></a>
                                </li>
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangCayThueHuy.php');?>"
                                        class="side-menu__item ">Đơn bị hủy  <span class="badge bg-danger right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `status` = 'huy' ");?></span></a>
                                </li>
                                  <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangCayThueHoanTat.php');?>"
                                        class="side-menu__item ">Đơn hoàn tất <span class="badge bg-success right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `status` = 'hoantat' ");?></span></a>
                                </li>
                            </ul>
                            <li
                            class="slide has-sub ">
                            <a href="javascript:void(0);"
                                class="side-menu__item ">
                                <i class='bx bx-cart side-menu__icon'></i>
                                <span class="side-menu__label">Đơn hàng vật phẩm</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                               
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangGpassXuLy.php');?>"
                                        class="side-menu__item ">Đơn chờ xử lý<span class="badge bg-info right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_gamepass` WHERE `status` = 'xuly' ");?></span></a>
                                </li>
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangGpassDangCay.php');?>"
                                        class="side-menu__item ">Đơn đang cày<span class="badge bg-warning right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_gamepass` WHERE `status` = 'dangcay'");?></span></a>
                                </li>
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangGpassHuy.php');?>"
                                        class="side-menu__item ">Đơn bị hủy <span class="badge bg-danger right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_gamepass` WHERE `status` = 'huy' ");?></span></a>
                                </li>
                                  <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangGpassHoanTat.php');?>"
                                        class="side-menu__item ">Đơn hoàn tất <span class="badge bg-success right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_gamepass` WHERE `status` = 'hoantat' ");?></a>
                                </li>
                            </ul>
                               <li
                            class="slide has-sub ">
                            <a href="javascript:void(0);"
                                class="side-menu__item ">
                                <i class='bx bx-cart side-menu__icon'></i>
                                <span class="side-menu__label">Đơn hàng robux</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                               
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangRobuxXuLy.php');?>"
                                        class="side-menu__item ">Đơn chờ xử lý<span class="badge bg-info right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_robux` WHERE `status` = 'xuly' ");?></span></a>
                                </li>
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangRobuxDangCay.php');?>"
                                        class="side-menu__item ">Đơn đang cày<span class="badge bg-warning right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_robux` WHERE `status` = 'dangcay'");?></span></a>
                                </li>
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangRobuxHuy.php');?>"
                                        class="side-menu__item ">Đơn bị hủy <span class="badge bg-danger right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_robux` WHERE `status` = 'huy' ");?></span></a>
                                </li>
                                  <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/DonHangRobuxHoanTat.php');?>"
                                        class="side-menu__item ">Đơn hoàn tất <span class="badge bg-success right"><?=$CMSNAV->num_rows("SELECT * FROM `orders_robux` WHERE `status` = 'hoantat' ");?></span></a>
                                </li>
                            </ul>
                            
                        </li>
                          <li
                            class="slide has-sub ">
                            <a href="javascript:void(0);"
                                class="side-menu__item ">
                                <i class='bx bx-cart side-menu__icon'></i>
                                <span class="side-menu__label">Đơn hàng khác</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                               
                                <li class="slide">
                                    <a href="<?=BASE_URL('public/admin/WithDraw.php');?>"
                                        class="side-menu__item ">Đơn rút minigame <span class="badge badge-info "><?=$CMSNAV->num_rows("SELECT * FROM `orders_withdraw` WHERE `status` = 'dangcay'");?></span></span></a>
                                </li>
                                
                            </ul>
                            
                        </li>
                           <li class="slide__category"><span class="category-name">Tài khoản</span></li>
                                               <li class="slide">
                            <a href="<?=BASE_URL('public/admin/Account-Wait.php');?>" class="side-menu__item <?=active_sidebar(['Account-Wait.php']);?>">
                                <i class="nav-icon fa-solid fa-meteor side-menu__icon"></i>
                               <span class="side-menu__label">Tài khoản chưa bán <span class="badge bg-warning "><?=$CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `username` IS NULL");?></span></span>
                            </a>
                        </li>
                        <li class="slide">
                            <a href="<?=BASE_URL('public/admin/Account-Sold.php');?>" class="side-menu__item <?=active_sidebar(['Account-Sold.php']);?>">
                                <i class="nav-icon fa-solid fa-meteor side-menu__icon"></i>
                               <span class="side-menu__label"> Tài khoản đã bán <span class="badge bg-success "><?=$CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `username` IS NOT NULL");?></span></span>
                            </a>
                        </li>
                  
                                                <li class="slide__category"><span class="category-name">Quản lý</span></li>
                                               <li class="slide">
                            <a href="<?=BASE_URL('Admin/Danhmuc');?>" class="side-menu__item <?=active_sidebar(['Danhmuc.php']);?>">
                                <i class="bx bx-cart side-menu__icon"></i>
                                <span class="side-menu__label">Thêm danh mục</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a href="<?=BASE_URL('Admin/Users');?>" class="side-menu__item <?=active_sidebar(['Users.php']);?>">
                                <i class="nav-icon fas fa-users side-menu__icon"></i>
                               <span class="side-menu__label">Danh mục thành viên</span>
                            </a>
                        </li>
                        
                        <li class="slide">
                            <a href="<?=BASE_URL('public/admin/MiniGame.php');?>" class="side-menu__item <?=active_sidebar(['MiniGame.php']);?>">
                                <i class="bx bx-cart side-menu__icon"></i>
                              <span class="side-menu__label">Danh mục trò chơi</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a href="<?=BASE_URL('Admin/Category');?>" class="side-menu__item <?=active_sidebar(['Category.php']);?>">
                                <i class="bx bx-cart side-menu__icon"></i>
                              <span class="side-menu__label">Danh mục accounts</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a href="<?=BASE_URL('Admin/Category/Cay-thue/');?>" class="side-menu__item <?=active_sidebar(['CategoryCayThue.php']);?>">
                                <i class="bx bx-cart side-menu__icon"></i>
                                 <span class="side-menu__label">Danh mục dịch vụ</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a href="<?=BASE_URL('Admin/Category/Robux/');?>" class="side-menu__item <?=active_sidebar(['CategoryRobux.php']);?>">
                                <i class="bx bx-cart side-menu__icon"></i>
                              <span class="side-menu__label">Danh mục robux</span>
                            </a>
                        </li>
                        <li class="slide">
                            <a href="<?=BASE_URL('Admin/Category/Game-pass/');?>" class="side-menu__item <?=active_sidebar(['CategoryGamePass.php']);?>">
                                <i class="bx bx-cart side-menu__icon "></i>
                                <span class="side-menu__label ">Danh mục bán vật phẩm</span>
                            </a>
                        </li>                   
                        <li class="slide">
                            <a href="<?=BASE_URL('public/admin/Voucher.php');?>" class="side-menu__item <?=active_sidebar(['Voucher.php']);?>">
                                <i class="nav-icon fas fa-percent side-menu__icon"></i>
                                <span class="side-menu__label"> Mã giảm giá</span>
                            </a>
                        </li>                       
                            <li class="slide">
                            <a href="<?=BASE_URL('public/admin/sale.php');?>" class="side-menu__item <?=active_sidebar(['sale.php']);?>">
                                <i class="nav-icon fas fa-clock side-menu__icon"></i>
                                <span class="side-menu__label"> Giờ Sale</span>
                            </a>
                        </li>                   
                                 <li class="slide">
                            <a href="<?=BASE_URL('public/admin/pinned.php');?>" class="side-menu__item <?=active_sidebar(['pinned.php']);?>">
                                <i class="nav-icon fas fa-thumbtack side-menu__icon"></i>
                                <span class="side-menu__label">Danh Sách Ghim</span>
                            </a>
                        </li>     
                           <li class="slide">
                            <a href="<?=BASE_URL('public/admin/Blogs.php');?>" class="side-menu__item <?=active_sidebar(['Blogs.php']);?>">
                                <i class="nav-icon fas fa fa-square-full side-menu__icon"></i>
                                <span class="side-menu__label">Bài Viết</span>
                            </a>
                        </li>     
                    
                                                                    
                        
                      
                                                <li class="slide__category"><span class="category-name">Cài đặt hệ thống</span></li>
                                            
                                                                        <li class="slide">
                            <a href="<?=BASE_URL('Admin/Cards');?>"
                                class="side-menu__item ">
                                <i class="fa-solid fa-credit-card side-menu__icon"></i>
                                <span class="side-menu__label">Api nạp thẻ</span>
                            </a>
                        </li>
                                <li class="slide">
                            <a href="<?=BASE_URL('Admin/Bank');?>"
                                class="side-menu__item ">
                                <i class="nav-icon fas fa-university side-menu__icon"></i>
                                <span class="side-menu__label">Ngân hàng</span>
                            </a>
                        </li>
                                                                        <li class="slide">
                            <a href="<?=BASE_URL('public/admin/Theme.php');?>"
                                class="side-menu__item ">
                                <i class="bx bxs-image side-menu__icon"></i>
                                <span class="side-menu__label">Giao diện</span>
                            </a>
                        </li>
                         <li class="slide">
                            <a href="<?=BASE_URL('public/admin/HienThi.php');?>"
                                class="side-menu__item ">
                                <i class="nav-icon fas fa-solid fa-eye side-menu__icon"></i>
                                <span class="side-menu__label">Cài đặt hiển thị</span>
                            </a>
                        </li>
                                                                        <li class="slide mb-5">
                            <a href="<?=BASE_URL('public/admin/Setting.php');?>"
                                class="side-menu__item ">
                                <i class="bx bx-cog side-menu__icon"></i>
                                <span class="side-menu__label">Cài đặt</span>
                            </a>
                        </li>
                       
                                            </ul>
                    <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                            width="24" height="24" viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg></div>
                </nav>
                <!-- End::nav -->

            </div>
            <!-- End::main-sidebar -->

        </aside>
        <!-- End::app-sidebar -->

<script>
var currentUrl = window.location.pathname;

document.querySelectorAll('.side-menu__item').forEach(function(item) {
    var href = item.getAttribute('href');
    if (!href) return;

    if (currentUrl.endsWith(href.replace(/\/$/, ''))) {
        item.classList.add('active');
    }
});
</script>
<script>
// Lấy trạng thái theme từ localStorage
const savedTheme = localStorage.getItem('theme');
if(savedTheme){
    document.body.classList.add(savedTheme);
} else {
    document.body.classList.add('light-theme');
}

// Cập nhật icon hiển thị
function updateIcon() {
    const lightIcon = document.querySelector('.header-theme-mode .light-layout');
    const darkIcon = document.querySelector('.header-theme-mode .dark-layout');
    if(document.body.classList.contains('dark-theme')){
        lightIcon.style.display = 'none';
        darkIcon.style.display = 'inline-block';
    } else {
        lightIcon.style.display = 'inline-block';
        darkIcon.style.display = 'none';
    }
}
updateIcon();

// Thêm sự kiện toggle
document.querySelector('.header-theme-mode .layout-setting').addEventListener('click', function(){
    if(document.body.classList.contains('dark-theme')){
        // Dark → Light: remove dark, add light, reload page
        document.body.classList.remove('dark-theme');
        document.body.classList.add('light-theme');
        localStorage.setItem('theme', 'light-theme');
        updateIcon();
        location.reload(); // reload khi đổi về light
    } else {
        // Light → Dark: chỉ đổi theme, không reload
        document.body.classList.remove('light-theme');
        document.body.classList.add('dark-theme');
        localStorage.setItem('theme', 'dark-theme');
        updateIcon();
    }
});
</script>
 <style>
        .main-header-container.container-fluid {
    background-color: #0868d4; /* xanh biển */
}
       .app-sidebar {
     color: white !important;
}
.category-name {
    color: #c9d2f5 !important;
}
.main-sidebar-header {
     background-color: #156fd4!important;
}
.side-menu__label {
    color: #3d3b3b !important;
}
.side-menu__icon {
    color: #1898ed !important;
}
.side-menu__item.active,
.side-menu__item.active .side-menu__label {
    color: #030303 !important; /* xanh biển nhạt */
}
.sidemenu-toggle span {
    background: #fff;
}
.sidemenu-toggle span::before,
.sidemenu-toggle span::after {
    background: #fff !important;
}
.header-link.layout-setting i.header-link-icon {
    font-size: 1.2rem;
    color: #fff;
    cursor: pointer;
}
.text-logo {
    font-size: 1.2rem;        /* chữ lớn */
    font-weight: bold;         /* in đậm */
    color: #fff;               /* màu chữ trắng */
    text-decoration: none;     /* bỏ gạch chân */
}

</style>