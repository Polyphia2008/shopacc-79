<?php
   require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/function.php';
?>

<body>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5QZPQVZ" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
     
    <header id="heading" class="">
        <nav class="heading">
            <div class="container c-container header-container">
                <div class="box-logo ">
                    <a href="/"> <img src="<?=BASE_URL($CMSNAV->site('logo_dark'));?>" alt="" class="d-lg-block d-none" style="max-width: 100%; height: auto;"> <img src="<?=BASE_URL($CMSNAV->site('logo_dark'));?>" alt="" class="d-lg-none" style="max-width: 100%; height: auto;"> </a>
                </div>
                <div class="d-none d-lg-flex h-100">
                    <div class="box-menu c-mr-16 c-py-10">
                        <div class="box-menu-bar  ">
                            <div class="box-icon brs-8 c-mr-8"> <img src="/assets/frontend1/theme_5/image/nam/menu.svg" alt=""> </div> <span class="lh-40 box-icon-text fw-700">Danh mục</span> </div>
                        <div class="menu-list">
                            <div class="menu-category">
                                <div class="container c-container">
                                    <ul class="d-flex justify-content-between px-0">
                                        <li class="w-100 c-px-4">
                                            <a href="/">
                                                <div class="c-p-8 brs-8 d-flex justify-content-center" style="white-space: nowrap;">
                                                    <div> <img src="https://cdn3.upanh.info/upload/server-sw3/images/home.png" alt="" class="c-pr-4"> </div> <span class="fw-500 fz-15 lh-24 ">Trang chủ</span> </div>
                                            </a>
                                        </li>
                                        <li class="w-100 c-px-4"> <a <?php if(empty($_SESSION['username'])) { ?> onclick="openLoginModal();" data-dismiss="modal" <?php }else{?> href="/user/recharge" <?php }?>>
                                                <div class="c-p-8 brs-8   d-flex justify-content-center" style="white-space: nowrap;">
                                                    <div>
                                                        <img src="https://cdn3.upanh.info/upload/server-sw3/images/download%20(4).png" alt="" class="c-pr-4">
                                                    </div>

                                                    <span class="fw-500 fz-15 lh-24 ">Nạp tiền</span>
                                                </div>
                                            </a> </li>
                                        <li class="w-100 c-px-4"> <a <?php if(empty($_SESSION['username'])) { ?> onclick="openLoginModal();" data-dismiss="modal" <?php }else{?> href="/dich-vu" <?php }?>>
                                                <div class="c-p-8 brs-8   d-flex justify-content-center" style="white-space: nowrap;">
                                                    <div>
                                                        <img src="https://cdn3.upanh.info/upload/server-sw3/images/download%20(5).png" alt="" class="c-pr-4">
                                                    </div>

                                                    <span class="fw-500 fz-15 lh-24 ">Dịch Vụ</span>
                                                </div>
                                            </a> </li>
                                        <li class="w-100 c-px-4"> <a <?php if(empty($_SESSION['username'])) { ?> onclick="openLoginModal();" data-dismiss="modal" <?php }else{?> href="/tin-tuc" <?php }?>>
                                                <div class="c-p-8 brs-8   d-flex justify-content-center" style="white-space: nowrap;">
                                                    <div>
                                                        <img src="https://cdn3.upanh.info/upload/server-sw3/images/z6032195102620_f04ebe7011547de7d7687ac88278dc9a.jpg" alt="" class="c-pr-4">
                                                    </div>

                                                    <span class="fw-500 fz-15 lh-24 ">Tin Tức</span>
                                                </div>
                                            </a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                  <div class="box-viewed d-flex c-py-10">
                <div class="box-icon brs-8 c-mr-8">
                    <img src="/assets/frontend1/theme_5/image/viewed.png" alt="viewed"
                        style="filter: invert(80%)">
                </div>
                <a href="/viewed" class="lh-40 box-icon-text fw-700">Đã xem</a>
            </div>
        </div>

                <div class="box-search d-none d-lg-block">
            <form class="form-search" id="formSearchHeader">
                <input type="search" placeholder="Tìm kiếm" class="has-submit" id="search-header-input">
                <button type="submit" id="btnSearch" title="Tìm kiếm"></button>
                <div class="tooltip-search-hearder" id="input-search-header">
                </div>
            </form>
        </div>
     


                <div class="d-flex"> <a id="recharge-btn" class="btn primary handle-recharge-modal c-px-xl-20 c-px-34 c-mr-16 d-none" href="javascript:void(0)" data-tab="1">Nạp tiền</a>
                    <div class="box-search_mobile">
                        <div class="box-notify-1 ">
                            <div class="box-icon brs-8"> <img src="/assets/frontend1/theme_5/image/nam/search.svg" alt=""> </div>
                        </div>
                    </div> 
                     <div class="d-lg-none">
            <div class="box-notify-1 ">
                <div class="box-icon brs-8 ">
                    <a href="/viewed">
                        <img src="/assets/frontend1/theme_5/image/DA-XEM.png" alt="DA-XEM"
                            style="position: absolute;top: 20px;right: 60px;width:30px; height: 30px">
                    </a>
                </div>
            </div>
        </div>
                    <div class="box-notify d-flex">
                        <div class="box-icon brs-8" data-notity=""> <img src="/assets/frontend1/theme_5/image/nam/ring.svg" alt="">
                            <p id="num-notification" class="d-none">0</p>
                        </div>
                        <div class="notify_menu notify_active position-absolute brs-12">
                            <div class="notify_header d-flex justify-content-between c-p-16">
                                <div class="fw-700 fz-20 lh-28 title-color">Thông báo</div> <img src="/assets/frontend1/theme_5/image/nam/profile_close.svg" alt="" class="close-notification-popup c-mr-12"> </div>
                            <div class="notification_type c-ml-14 c-mr-14 c-mt-8 c-pb-4"> <a class="tag c-ml-4" data-id="1" href="javascript:void(0)">Hệ thống/Event</a> <a class="tag c-ml-4" data-id="2" href="javascript:void(0)">Giao dịch</a> </div>
                            <div class="notify_content_layout">
                                <div class="notify_content c-pr-4 c-mr-4 c-pl-16 c-mt-8 c-mb-12"> </div>
                            </div>
                            <div class="notify_menu_seeMore c-px-12 c-pb-12 c-pt-4 text-center cursor-pointer" data-type=""> <span class="text-color fw-500">Xem thêm</span> <img src="/assets/frontend1/theme_5/image/nam/notification_down.png" alt=""> </div>
                        </div>
                        <div class="step noti_menu_mobile">
                            <div class="head-mobile">
                                <a href="javascript:void(0);" class="link-back close-step"></a>
                                <p class="head-title text-title">Thông báo</p>
                            </div>
                            <div class="notification_type mobile c-ml-14 c-mr-14 c-pb-4"> <a class="tag c-ml-4" data-id="1" href="javascript:void(0)">Hệ thống/Event</a> <a class="tag c-ml-4" data-id="2" href="javascript:void(0)">Giao dịch</a> </div>
                            <div class="notify_content_layout ">
                                <div class="notify-content_mobile c-px-16"> </div>
                            </div>
                            <div class="notify_menu_seeMore  c-px-12 c-pb-12 c-pt-12 text-center cursor-pointer"> <span class="text-color fw-500">Xem thêm</span> <img src="/assets/frontend1/theme_5/image/nam/notification_down.png" alt=""> </div>
                        </div>
                    </div> 
               <div class="d-flex ml-3 ">
                <!--<div class="box-icon brs-8 cart-view-header">-->
                    <!--<img class="position-relative" src="/assets/frontend1/theme_5/image/nam/cart.svg"-->
                    <!--    alt="cart" style="width: 25px;">-->
                    <!--<p id="num_cart" class="">0</p>-->
                    <link rel="stylesheet" href="/assets/frontend1/theme_5/css/header.css">
<div class="view-menu-cart pt-3 pl-3 pr-3 pb-0">
    <h6 class="mb-2 text-center">Giỏ hàng</h6>
    <div class="cart-header-main">
        <p class="m-0 h6" id="title-nick"></p>
        <ul class="list-group list-group-flush" id="cart-header-nick">
            <li>
                <p class="text-center fz-20">Giỏ hàng trống !!!</p>
            </li>
            <li>
                <div class="d-flex justify-content-center">
                    <img class="w-75 img-null-cart" src="/assets/frontend1/theme_5/image/nam/empty-cart.png" alt="Giỏ hàng trống">
                </div>
            </li>
        </ul>
        <p class="m-0 h6" id="title-service"></p>
        <ul class="list-group list-group-flush" id="cart-header-service">
        </ul>
    </div>
    <div class="row justify-content-end mb-3 mt-3">
        <a class="btn primary c-px-xl-20 c-px-34 c-mr-16" href="/cart" data-tab="1">Xem giỏ hàng</a>
    </div>
</div>
<script src="/assets/frontend1/theme_5/js/header.js"></script>

                </div>

            </div>
                    <div class="box-loading btn-loading">
                        <div class="loading">
                            <div class="loading-child"></div>
                        </div>
                    </div>
                    <div class="box-account c-ml-16 d-none position-relative">
                        <?php if(empty($_SESSION['username'])) { ?>
                        
                        <div class="account-logined" onclick="openLoginModal()">
                            <div class="box-icon brs-8 "> <img src="/assets/frontend1/theme_5/image/nam/profile.svg" alt=""> </div>
                        </div>
                        
                        
                       
                        <?php }else{?>
                         <div class="account-logined box-account-open">
                            <div class="d-flex ">
                                <div class="account-name">
                                    <div class="text-right title-color fw-500">
                                        <?=$_SESSION['username'];?>
                                    </div>
                                    <div class="account-balance fw-400">Số dư:
                                        <?=format_cash($getUser['money']);?> VND </div>
                                </div>
                                <div class="account-avatar c-ml-12"><img src="https://ui-avatars.com/api/?background=random&name=<?=isset($_SESSION[ 'user']) ? $row[ 'username'] : 'Khách';?>" alt=""> </div>
                            </div>
                        </div>
                           <script>
    document.addEventListener('DOMContentLoaded', function() {
      var loadingWrap = document.querySelector('.loading-wrap');
      loadingWrap.style.display = 'none';

      var layout = document.querySelector('.layout');
      layout.style.display = 'block';
    });
  </script>
                        
                        
                        
                        
                        <?php }?>
                        <div class="box-account-logined position-absolute brs-12">
                            <div class="box-account-title d-flex justify-content-between c-mb-18">
                                <div class="fw-700 fz-20 lh-28 title-color">Tài khoản</div> <img src="/assets/frontend1/theme_5/image/nam/profile_close.svg" alt="" class="close-login-popup c-mr-12"> </div>
                            <div class="c-pr-16 account-logined-content box-account_nologined">
                                <div class="login-popup brs-12 c-p-16 d-flex m-auto justify-content-between">
                                    <div class="m-auto "> <img src="/assets/frontend1/theme_5/image/nam/login-robot.png" alt=""> </div>
                                    <div class="login-popup_content c-ml-24">
                                        <div class="text-secondary-color fw-700 lh-28 fz-20">
                                            <?=$_SERVER[ 'SERVER_NAME'];?> xin chào! </div>
                                        <div class="fw-400 c-mt-4">Vui lòng đăng nhập để sử dụng dịch vụ của chúng tôi</div>
                                        <button class="btn primary w-100 c-mt-12" onclick="openLoginModal()">Đăng nhập</button>
                                        <div class="c-mt-10">Bạn chưa có tài khoản? <a href="#" onclick="openLoginModal()" class="text-primary-color fw-500 underline" style="text-decoration: underline">Đăng ký</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-logined-content c-pr-4 box-account_logined" style="display: block;">
                                <div class="sidebar">
                                    <div class="sidebar-section d-flex brs-12 c-mb-16 sidebar-user-profile">
                                        <div class="sidebar-section-avt brs-100 c-mr-12"><img class="brs-100" src="https://ui-avatars.com/api/?background=random&name=<?=isset($_SESSION[ 'user']) ? $row[ 'username'] : 'Khách';?>" alt=""> </div>
                                        <div class="sidebar-section-info">
                                            <div class="sidebar-section-title c-mb-4 fz-15 fw-500">
                                               <?=$_SESSION['username'];?>
                                            </div>
                                            <div class="sidebar-section-info-text c-mb-4 fz-13 fw-500 sidebar-user-balance">Số dư: <span><?=$_SESSION['username'] ? format_cash($getUser['money']) : 'Khách';?></span> VNĐ </div>
                                            <p class="sidebar-section-info-text mb-0 fz-13 fw-500 sidebar-user-id">ID: <span><?=$getUser['id'];?></span> </p>
                                        </div>
                                    </div>
                                    <div class="sidebar-section brs-12 c-mb-16">
                                        <div class="sidebar-item">
                                            <a href="/user/profile" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Thông tin tài khoản</p> <img src="/assets/frontend1/theme_5/image/svg/ducvietdz.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <?php if(isset($_SESSION['username']) && $getUser['level'] == 'admin') { ?>
                                        <a href="/cpanel/home" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Trang Quản Trị</p> <img src="/assets/frontend1/theme_5/image/svg/ducvietdz.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <?php }?>
                                        <?php if(isset($_SESSION['username']) && $getUser['ctvacc'] == 1) { ?>
                                        <a href="<?=BASE_URL('public/ctvacc/');?>" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)"></div>
                                            <p class="sidebar-item-text fw-400 fz-12 mb-0">Cộng Tác Viên Bán Nick</p> <img src="/assets/frontend1/theme_5/image/svg/ducvietdz.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <?php }?>
                                        <?php if(isset($_SESSION['username']) && $getUser['ctv'] == 1) { ?>
                                        <a href="<?=BASE_URL('public/ctv/');?>" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Cộng Tác Viên Cày Thuê</p> <img src="/assets/frontend1/theme_5/image/svg/ducvietdz.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <?php }?>
                                        <?php if(isset($_SESSION['username']) && $getUser['ctvrobux'] == 1) { ?>
                                        <a href="<?=BASE_URL('public/ctvrobux/');?>" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Cộng Tác Viên Robux</p> <img src="/assets/frontend1/theme_5/image/svg/ducvietdz.svg" alt=""> </a>
                                        </div>
                                   
                                        <?php }?>
                                        <?php if(isset($_SESSION['username']) && $getUser['ctvgpass'] == 1) { ?>
                                         <a href="<?=BASE_URL('public/ctvgpass/');?>" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Cộng Tác Viên Gamepass</p> <img src="/assets/frontend1/theme_5/image/svg/ducvietdz.svg" alt=""> </a>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <!-- Tìm parent trước -->
                                    <div class="sidebar-section brs-12 c-mb-16">
                                        <p class="sidebar-section-title c-mb-16 fz-15 fw-500">Quản lý giao dịch</p>
                                        <div class="d-flex justify-content-between transaction-manager">
                                            <div class="sidebar-item sidebar-item-col">
                                                <a href="/user/recharge" class=" d-flex flex-column align-items-center">
                                                    <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/naptien.svg)"></div>
                                                    <div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">Nạp thẻ cào</div>
                                                </a>
                                                
                                            </div>
                                                   <div class="sidebar-item sidebar-item-col ">
                                        <a href="/user/rutvatpham" class=" d-flex flex-column align-items-center">
                                            <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/rutvatpham.svg)">
                                            </div>
                                            <div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">
                                                Rút vật phẩm</div>
                                        </a>
                                     </div>
                                                                                    </div>
                    </div>
                                    <!-- Tìm parent trước -->
                                    <div class="sidebar-section brs-12 c-mb-16">
                                        <p class="sidebar-section-title fz-15 fw-500 c-mb-16">LỊCH SỬ GIAO DỊCH</p>
                                        
        
                                        <div class="sidebar-item">
                                            <a href="/user/history/acc" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/dichvudamua.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử mua nick</p> <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <div class="sidebar-item">
                                            <a href="/user/history/caythue" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/dichvudamua.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử dịch vụ</p> <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <div class="sidebar-item">
                                            <a href="/user/history/robux" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/dichvudamua.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử mua robux</p> <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <div class="sidebar-item">
                                            <a href="/user/history/vatpham" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/dichvudamua.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử mua vật phẩm</p> <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <div class="sidebar-item">
                                            <a href="/lichsunapthe" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/dichvudamua.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử nạp thẻ</p> <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt=""> </a>
                                        </div>
                                        <div class="sidebar-item-partition d-flex c-my-8"></div>
                                        <div class="sidebar-item">
                                            <a href="/voucher" class="d-block align-items-center d-flex">
                                                <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/napatmtudong.svg)"></div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Mã Giảm Giá</p> <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt=""> </a>
                                        </div>
                                        
                                    </div>
                                    <div class="sidebar-section brs-12 c-mb-16">
                                        <div class="sidebar-item log-out-button">
                                            <a href="/Auth/Logout" class="d-block align-items-center d-flex">
                                                <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12"><img src="/assets/frontend1/theme_5/image/svg/log-out.svg" alt="" style="width: 24px;height: 24px"> </div>
                                                <p class="sidebar-item-text fw-400 fz-12 mb-0">Đăng xuất</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
   <form class="search-mobi-header formSearchHeaderMob">
    <div class="d-lg-none d-block header-mobile">
        <div class="cat-mob-search change-bg-cat c-px-12 c-py-12 position-relative">

            <img src="/assets/frontend1/theme_5/image/nam/search.svg" 
                 alt="search" 
                 class="mw-20 c-ml-12 position-absolute bor-0 ic-search" 
                 style="top:20px; left: 12px">

            <!-- Input mobile giữ class nhưng thêm id PC -->
            <input type="text" 
                   placeholder="Tìm kiếm" 
                   class="change-bg-search-mob brs-8 c-pl-40 bor-0 search-header-mob search-header-input-mob"
                   id="search-header-input">

            <!-- Tooltip mobile giữ class nhưng thêm id PC -->
            <div class="tooltip-search-hearder input-search-header-mob"
                 id="input-search-header">
            </div>

        </div>
    </div>
</form>


