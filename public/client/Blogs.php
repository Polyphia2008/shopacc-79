<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Blogs | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
    CheckLogin();
?>
<!-- content -->

<form id="logout-form" action="https://shopsheep.net/ajax/logout" method="POST" class="d-none">
    <input type="hidden" name="_token" value="opRTRuXjTgzzZNtaMa8j8MUM6HzOZY5elyz0KoQa"></form>
    <div class="layout">
        <div class="content" style="">
                <link rel="stylesheet" href="/assets/frontend/theme_5/css/jirim/news.css">

    <div class="c-container container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0)" class="breadcrumb-link">Tin tức</a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/service-mobile" class="link-back"></a>
            <h1 class="head-title text-title">Tin tức</h1>
            <a href="/viewed">
        <img src="/assets/frontend/theme_5/image/DA-XEM.png" alt="DA-XEM"
            style="position: absolute;top: 16px;right: 60px;width:30px; height: 30px">
    </a>
    <a href="/cart">
        <img src="/assets/frontend/theme_5/image/nam/cart.svg" alt="cart"
            style="position: absolute;top: 16px;right: 16px;width:30px; height: 30px">
        <p id="num_cart_mob" class="">0</p>
    </a>
        </div>

        <div class="ads-banner row f_box-product" id="c_slider_banner">
        <div class="col-lg-6 col-md-12 top_box-product">
                                                <div class="fix_ads-banner-fecond fix_ads-banner-second_top fix_ads-banner-ffist brs-12 h-100">
                                                    <a href="/tin-tuc/huong-dan-cach-vao-roblox-khi-khong-dang-nhap-duoc-connection-error" >
                                                                    <img onerror="imgError(this)" loading="lazy" src="//cdn3.upanh.info/upload/server-sw3/images/robux-sap-server.png" alt="">
                                                            </a>
                                                <div class="item-article-content">
                            <div class="item-article-name text-limit limit-1">Hướng dẫn cách vào Roblox khi không đăng nhập được - Connection Error</div>
                            <div class="item-article-user text-limit limit-1"><p>Hướng dẫn cách vào game Roblox khi bị chặn truy cập, lỗi đăng nhập&nbsp;Connection Error</p></div>
                        </div>
                    </div>
                                                                                            </div>
        <div class="col-lg-3 col-6 d-lg-flex flex-column justify-content-between center_swiper-general_right" style="min-height: 100%">
                                                                            <div class="fix_ads-banner-second fix_ads-banner-fist brs-12">
                                                    <a href="/tin-tuc/chuong-trinh-gioi-thieu-ban-be" >
                                                                    <img onerror="imgError(this)" loading="lazy" src="//cdn3.upanh.info/upload/server-sw3/images/z5859681964043_68a8de32f6016a509a47d7ecca5750b2%20(1)(2).jpg" alt="">
                                                            </a>
                                                <div class="item-article-content-secon">
                            <div class="item-article-name text-limit limit-1">Chương trình giới thiệu bạn bè</div>
                            <div class="item-article-user text-limit limit-1"><p>Giới thiệu Shop Sheep&nbsp;cho bạn bè để giảm giá sản phẩm, nhận tiền, vật phẩm&nbsp;và nhận hoa hồng vĩnh viễn.</p></div>
                        </div>
                    </div>
                                                                <div class="fix_ads-banner-second fix_ads-banner-fist brs-12">
                                                    <a href="/tin-tuc/su-kien-give-away-chao-he" >
                                                                    <img onerror="imgError(this)" loading="lazy" src="//cdn3.upanh.info/upload/server-sw3/images/z6168388351717_6522feedf8cd75d39347c362cfed6564.jpg" alt="">
                                                            </a>
                                                <div class="item-article-content-secon">
                            <div class="item-article-name text-limit limit-1">SỰ KIỆN GIVE AWAY CHÀO HÈ</div>
                            <div class="item-article-user text-limit limit-1"><p>Trong thời gian diễn ra sự kiện, khách hàng chỉ cần thực hiện giao dịch mua acount (Mua nick thường hoặc mua nick random đều được) là đã có thẻ tham gia dự thưởng rồi đó</p></div>
                        </div>
                    </div>
                                    </div>
        <div class="col-lg-3 col-6 d-lg-flex flex-column justify-content-between end_swiper-general_right" style="min-height: 100%">
                                                                                                        </div>
    </div>
        <div class="row">
            <div class="col-12 col-lg-8" id="list-article">
                <div class="card --custom c-mt-24" style="display: none" id="weeky-hot-games">
                    <div class="card--header">
                        <div class="card--header__title">
                            Game hot trong tuần
                        </div>
                    </div>
                    <div class="card--body weeky-hot-game-article">
                        <div>
                            <div class="swiper-container swiper-weekly-hot-games">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0);">
                                            <img src="/assets/frontend/theme_5/image/duong/image_article/image_52.png"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0);">
                                            <img src="/assets/frontend/theme_5/image/duong/image_article/image_53.png"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0);">
                                            <img src="/assets/frontend/theme_5/image/duong/image_article/image_54.png"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0);">
                                            <img src="/assets/frontend/theme_5/image/duong/image_article/image_55.png"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0);">
                                            <img src="/assets/frontend/theme_5/image/duong/image_article/image_56.png"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card--mobile__title c-pt-16 d-flex justify-content-between j-flex-sm-wrap">
                    <h4>Tin mới cập nhật</h4>
                    <form action="" class="form-search c-pt-sm-16" id="formSearchHeaderr">
                        <input type="search" placeholder="Tìm kiếm" class="has-submit" name="querry">
                        <button type="submit"></button>
                    </form>
                </div>

                <div class="row flex-column-reverse " id="card--body__news">
                    <div class=" px-0 mt-lg-0" id="list-article" style="max-width: 100%">
                        <div class=" --custom p-3" id="new-article-update">
                            
                            <div class="tab-content-title mt-4">
                                <div class="card--body">
                                                                                                                        <div class="item-article c-mt-16">
                                                <a href="/tin-tuc/huong-dan-cach-vao-roblox-khi-khong-dang-nhap-duoc-connection-error">
                                                    <div class="card">
                                                        <div class="card-body c-p-16 c-p-lg-8">
                                                            <div class="article-thumb c-mb-lg-0">
                                                                <img onerror="imgError(this)" loading="lazy"
                                                                    src="//cdn3.upanh.info/upload/server-sw3/images/robux-sap-server.png"
                                                                    class="article-thumb-image" alt="article-thumbnail">
                                                            </div>
                                                            <div class="article-body" style="flex: 1">
                                                                <div
                                                                    class="article-title text-limit limit-2 limit-lg-3 fz-lg-13 lh-lg-20 c-ml-12">
                                                                    Hướng dẫn cách vào Roblox khi không đăng nhập được - Connection Error
                                                                </div>
                                                                <div
                                                                    class="article--description d-none d-lg-block c-pt-16 c-ml-12" style="height: 96px;overflow: hidden">
                                                                    <p>Hướng dẫn cách vào game Roblox khi bị chặn truy cập, lỗi đăng nhập&nbsp;Connection Error</p>
                                                                </div>
                                                                <div class="article-info c-mt-16 c-mt-lg-6 c-ml-12">
                                                                    <div class="datetime">
                                                                        04/04/2024
                                                                    </div>
                                                                    <div
                                                                        class="author c-ml-4 bread-word text-limit limit-1">
                                                                        qtvtrang</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                                                                    <div class="item-article c-mt-16">
                                                <a href="/tin-tuc/chuong-trinh-gioi-thieu-ban-be">
                                                    <div class="card">
                                                        <div class="card-body c-p-16 c-p-lg-8">
                                                            <div class="article-thumb c-mb-lg-0">
                                                                <img onerror="imgError(this)" loading="lazy"
                                                                    src="//cdn3.upanh.info/upload/server-sw3/images/z5859681964043_68a8de32f6016a509a47d7ecca5750b2%20(1)(2).jpg"
                                                                    class="article-thumb-image" alt="article-thumbnail">
                                                            </div>
                                                            <div class="article-body" style="flex: 1">
                                                                <div
                                                                    class="article-title text-limit limit-2 limit-lg-3 fz-lg-13 lh-lg-20 c-ml-12">
                                                                    Chương trình giới thiệu bạn bè
                                                                </div>
                                                                <div
                                                                    class="article--description d-none d-lg-block c-pt-16 c-ml-12" style="height: 96px;overflow: hidden">
                                                                    <p>Giới thiệu Shop Sheep&nbsp;cho bạn bè để giảm giá sản phẩm, nhận tiền, vật phẩm&nbsp;và nhận hoa hồng vĩnh viễn.</p>
                                                                </div>
                                                                <div class="article-info c-mt-16 c-mt-lg-6 c-ml-12">
                                                                    <div class="datetime">
                                                                        05/09/2023
                                                                    </div>
                                                                    <div
                                                                        class="author c-ml-4 bread-word text-limit limit-1">
                                                                        qtvan</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                                                                    <div class="item-article c-mt-16">
                                                <a href="/tin-tuc/su-kien-give-away-chao-he">
                                                    <div class="card">
                                                        <div class="card-body c-p-16 c-p-lg-8">
                                                            <div class="article-thumb c-mb-lg-0">
                                                                <img onerror="imgError(this)" loading="lazy"
                                                                    src="//cdn3.upanh.info/upload/server-sw3/images/z6168388351717_6522feedf8cd75d39347c362cfed6564.jpg"
                                                                    class="article-thumb-image" alt="article-thumbnail">
                                                            </div>
                                                            <div class="article-body" style="flex: 1">
                                                                <div
                                                                    class="article-title text-limit limit-2 limit-lg-3 fz-lg-13 lh-lg-20 c-ml-12">
                                                                    SỰ KIỆN GIVE AWAY CHÀO HÈ
                                                                </div>
                                                                <div
                                                                    class="article--description d-none d-lg-block c-pt-16 c-ml-12" style="height: 96px;overflow: hidden">
                                                                    <p>Trong thời gian diễn ra sự kiện, khách hàng chỉ cần thực hiện giao dịch mua acount (Mua nick thường hoặc mua nick random đều được) là đã có thẻ tham gia dự thưởng rồi đó</p>
                                                                </div>
                                                                <div class="article-info c-mt-16 c-mt-lg-6 c-ml-12">
                                                                    <div class="datetime">
                                                                        19/05/2023
                                                                    </div>
                                                                    <div
                                                                        class="author c-ml-4 bread-word text-limit limit-1">
                                                                        qtvvietbaily</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                                                                                            </div>
                            </div>
                            <div class="c-pt-32">
                                                                    
                                                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
    </div>
        </div>
    </div>



<?php 
    require_once("../../public/client/Footer.php");
?>
