<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'MINI GAME | ' . $CMSNAV->site('tenweb');
require_once("../../public/client/Header.php");
require_once("../../public/client/Nav.php");


$row = false;

if(isset($_GET['slug'])){
    $slug = check_string($_GET['slug']);
    $row = $CMSNAV->get_row("SELECT * FROM mini_game WHERE slug='$slug'");
}

if(!$row && isset($_GET['id'])){
    $id = intval($_GET['id']);
    $row = $CMSNAV->get_row("SELECT * FROM mini_game WHERE id='$id'");
}

if(!$row){
    admin_msg_error("Mini game không tồn tại", BASE_URL(), 500);
}

$id = $row['id'];
?>

<script src="/template/js/rotate.js"></script>


    <div class="layout">
        <div class="content" style="">
                <div class="container c-container" id="minigame-detail">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="minigame" class="breadcrumb-link">Vòng quay</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0)" class="breadcrumb-link"><?=mini_game($id, 'name');?></a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/" class="link-back"></a>
            <p class="head-title text-title">Danh sách minigame</p>
            <a href="/viewed">
        <img src="//BLOXVN.NET/assets/frontend/theme_5/image/DA-XEM.png" alt="DA-XEM"
            style="position: absolute;top: 16px;right: 60px;width:30px; height: 30px">
    </a>
    <a href="/cart">
        <img src="//BLOXVN.NET/assets/frontend/theme_5/image/nam/cart.svg" alt="cart"
            style="position: absolute;top: 16px;right: 16px;width:30px; height: 30px">
        <p id="num_cart_mob" class=""></p>
    </a>
        </div>
        <section class="rotation-content c-mb-40 c-mb-lg-20 c-pt-lg-16">
            <div class="row rotation-content-section">
                <div class="col-12 col-lg-8 c-pr-8 c-px-lg-0">
                    <div class="c-px-lg-16 d-block d-lg-none  c-mb-12">
                        <div class="rotation-header-mobile d-flex justify-content-between">
                            <div class="rotation-header c-pb-8">
                                <h1 class="fw-700 fz-18 lh-24"><?=mini_game($id, 'name');?></h1>
                                <p class="fw-400 fz-13 mb-0"> <b id="result"><?=rand(000,999)?></b>người đang xem  </p>
                            </div>
                                                    </div>
                    </div>
                                            <div class="d-block d-lg-none c-mb-16 c-px-lg-16">
                            <div class="rotation-notify w-100 ">
                                <img src="/assets/frontend1/theme_5/image/svg/sound_mobile.svg"
                                    alt="">
                                <marquee class="rotation-marquee">
                                    <div class="rotation-marquee-item">
                                        Danh sách trúng thưởng: &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Wa*****ita</span> - đã trúng Chúc mừng bạn nhận được  Full Combo Trang Phục Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Al*****ia</span> - đã trúng Chúc mừng bạn nhận được Quần Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Rya*****we</span> - đã trúng Bạn Đã Trúng Thưởng 25.000 Kim Cương&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Ke*****era</span> - đã trúng Random Kim Cương&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Ky*****don</span> - đã trúng Chúc mừng bạn nhận được Quần Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Ale*****ia</span> - đã trúng Chúc mừng bạn nhận được Quần Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Dou*****es</span> - đã trúng Chúc Mừng Bạn Đã Trúng Thưởng 20.000 Kim Cương&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Al*****ra</span> - đã trúng Chúc Mừng Bạn Đã Trúng Thưởng Đầu Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Sh*****ia</span> - đã trúng Chúc Mừng Bạn Đã Trúng Thưởng Đầu Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;He*****ce</span> - đã trúng Chúc Mừng Bạn Đã Trúng Thưởng 20.000 Kim Cương&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Li*****zak</span> - đã trúng Random Kim Cương
                                    </div>
                                </marquee>
                            </div>
                        </div>
                                        <div class="d-block d-lg-none c-mb-16 c-px-lg-16">
                        <div class="rotation-top-mobile brs-12 d-block d-lg-none">
                            <div class="rotation-sale-content brs-12 c-py-12 d-flex flex-column align-items-center">
                                <p class="d-flex align-items-center c-mb-0">
                                    <span id="rotationFirstPrice" class="fw-400 fz-12 lh-16 c-mr-8">
                                                                            </span>
                                    <span id="rotationSalePrice"
                                        class="fw-700 fz-20 lh-28 c-mr-8"><?= number_format(mini_game($id, 'price')); ?>đ</span>
                                                                                                        </p>
                                <p class="c-mb-0 fw-400 fz-13">Rẻ vô đối, giá tốt nhất thị trường</p>
                            </div>
                        </div>
                    </div>
                    <div class="rotation-detail c-mb-16 brs-12">
                        <div class="rotation-top c-p-16 d-none d-lg-flex justify-content-between">
                            <div>
                                <div class="rotation-header d-flex align-items-center c-mb-8">
                                    <h3 class="fw-700 fz-24 lh-32 c-mr-8"><?=mini_game($id, 'name');?></h3>
                                                                    </div>
                                <div class="rotation-player d-flex align-items-center">
                                    <img class="c-mr-4"
                                        src="/assets/frontend1/theme_5/image/svg/security-user1.svg"
                                        alt="">
                                    <p class="fw-400 fz-13 mb-0"><b id="result"><?=rand(000,999)?></b>người đang xem</p>
                                </div>
                            </div>
                            <div class="rotation-header-sale d-flex align-items-start">

                            </div>
                        </div>
                        <div class="rotation c-p-16 " style="background-image: url(/assets/frontend/theme_5/image/phu/rotation_bg.png);">
                                                            <div class="rotation-notify d-none d-lg-flex w-100 c-mb-16">
                                    <img src="/assets/frontend/theme_5/image/svg/sound.svg"
                                        alt="">
                                    <marquee class="rotation-marquee">
                                        <div class="rotation-marquee-item">
                                            Danh sách trúng thưởng: &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Wa*****ita</span> - đã trúng Chúc mừng bạn nhận được  Full Combo Trang Phục Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Al*****ia</span> - đã trúng Chúc mừng bạn nhận được Quần Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Rya*****we</span> - đã trúng Bạn Đã Trúng Thưởng 25.000 Kim Cương&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Ke*****era</span> - đã trúng Random Kim Cương&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Ky*****don</span> - đã trúng Chúc mừng bạn nhận được Quần Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Ale*****ia</span> - đã trúng Chúc mừng bạn nhận được Quần Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Dou*****es</span> - đã trúng Chúc Mừng Bạn Đã Trúng Thưởng 20.000 Kim Cương&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Al*****ra</span> - đã trúng Chúc Mừng Bạn Đã Trúng Thưởng Đầu Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Sh*****ia</span> - đã trúng Chúc Mừng Bạn Đã Trúng Thưởng Đầu Quỷ Dạ Xoa&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;He*****ce</span> - đã trúng Chúc Mừng Bạn Đã Trúng Thưởng 20.000 Kim Cương&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Li*****zak</span> - đã trúng Random Kim Cương
                                        </div>
                                    </marquee>
                                </div>
                                                                                            <div class="d-flex align-items-center justify-content-center" id="rubywheel">
                                        <div class="rotation-button " id="start" style="z-index: 2">
                                            <img loading="lazy"
                                                src="https://cdn3.upanh.info/upload/server-sw3/images/Nut%20quay%20ngay%202(1).png" s style="width: 70px; height: auto; cursor: pointer;" class="btn-spin-small"
                                                alt="">
                                        </div>
                                                 <img style="width: 80%" loading="lazy"
                                            src="<?= mini_game($id, 'image'); ?>" id="rotate">
                                    </div>
                                 </div>
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-6 c-p-16 c-py-lg-8">
                                                                <div class="rotation-sale-content brs-8 c-py-8 d-none d-lg-flex justify-content-center">
                                    <p class="d-flex align-items-center c-mb-0">
                                        <span id="rotationFirstPrice" class="fw-400 fz-14 c-mr-8">
                                                                                    </span>
                                        <span id="rotationSalePrice"
                                              class="fw-700 fz-24 lh-32 c-mr-8"><?= number_format(mini_game($id, 'price')); ?>đ</span>
                                                                                                                    </p>
                                </div>
                                                                    <input type="hidden" id="payment_methods" name="payment_methods" value="0">
                                                            </div>
                            <div class="col-12 col-lg-6 c-p-16 c-py-lg-8">
                                <div class="rotation-inputs c-mb-24 c-mb-lg-0 row no-gutters">

                                    <div class="col-12 c-pl-12">
                                        <select class="rotation-inputs-select" name="type" id="numrolllop">
                                            <option value="1">Quay 1 Lần - Giá <?= number_format(mini_game($id, 'price')); ?>đ
                                            </option>
                                                                                    </select>
                                    </div>
                                </div>
                                <div class="row no-gutters d-none d-lg-flex">
                                <div class="col-12 col-md-6 c-pr-6">                                               
                                            </div>
                                                                                                                <div class="col-12 col-md-6 c-pl-6">
                                        <button id="start1" ariadisabled="false" type="button" class="btn primary w-100 play google_buy_minigame">Quay ngay</button>
                                    </div>
                                </div>
                                <div class="footer-mobile">
                                    <div class="row marginauto">
                                                                                                                                    <div class="col-6 pl-0 c-pr-8">
                                                    
                                                </div>
                                                                                                                            <div class="col-6 pr-0 c-pl-8">
                                            <button id="start1" ariadisabled="false" type="button" class="btn primary w-100  play google_buy_minigame">Quay ngay</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                    </div>
                                </div>
                           

                
                <div class="d-block d-lg-none c-mb-16">
                    <div class="rotation-leaderboard c-p-lg-0">
                        <div class="leaderboard-header d-flex align-items-center c-pl-16 c-mb-16">
                            <img class="c-mr-4"
                                src="/assets/frontend/theme_5/image/svg/top-leaderboard.svg"
                                alt="">
                            <h5 class="fw-700 fz-18 lh-20">Top quay thưởng</h5>
                        </div>
                        <div class="leaderboard-type c-mb-16 brs-8 brs-lg-0 row no-gutters">
                            <ul class="nav justify-content-between row no-gutters w-100 c-p-4 c-p-lg-0" role="tablist">
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0 active"
                                        data-toggle="tab" href="#leaderboard_m-1" role="tab" aria-selected="true">
                                        Hôm nay</p>
                                </li>
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0" data-toggle="tab"
                                        href="#leaderboard_m-2" role="tab" aria-selected="false">7 ngày</p>
                                </li>
                                <li class="nav-item col-4 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 brs-lg-0" data-toggle="tab"
                                        href="#leaderboard_m-3" role="tab" aria-selected="false">Quà đua top</p>
                                </li>
                            </ul>
                        </div>
                        <div class="leaderboard-table">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="leaderboard_m-1" role="tabpanel">
                                    <div class="leaderboard-content c-px-16">
                                                                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        1</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Jef*****per</p>
                                                        <span
                                                            class="fw-400 fz-12">954
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        2</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ro*****cki</p>
                                                        <span
                                                            class="fw-400 fz-12">641
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        3</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Gar*****ren</p>
                                                        <span
                                                            class="fw-400 fz-12">472
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        4</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ja*****oy</p>
                                                        <span
                                                            class="fw-400 fz-12">454
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        5</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ke*****uz</p>
                                                        <span
                                                            class="fw-400 fz-12">343
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        6</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Law*****ld</p>
                                                        <span
                                                            class="fw-400 fz-12">250
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        7</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Law*****nia</p>
                                                        <span
                                                            class="fw-400 fz-12">213
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        8</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Dyl*****ego</p>
                                                        <span
                                                            class="fw-400 fz-12">170
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        9</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Pa*****ene</p>
                                                        <span
                                                            class="fw-400 fz-12">54
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        10</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Jes*****hke</p>
                                                        <span
                                                            class="fw-400 fz-12">1
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                                                        </div>
                                </div>
                                <div class="tab-pane fade" id="leaderboard_m-2" role="tabpanel">
                                    <div class="leaderboard-content">
                                                                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        1</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Emi*****ida</p>
                                                        <span
                                                            class="fw-400 fz-12">966
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        2</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ma*****nia</p>
                                                        <span
                                                            class="fw-400 fz-12">878
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        3</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Noa*****on</p>
                                                        <span
                                                            class="fw-400 fz-12">768
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        4</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Br*****ht</p>
                                                        <span
                                                            class="fw-400 fz-12">598
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        5</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ro*****ud</p>
                                                        <span
                                                            class="fw-400 fz-12">588
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        6</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Dy*****don</p>
                                                        <span
                                                            class="fw-400 fz-12">381
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        7</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">An*****ha</p>
                                                        <span
                                                            class="fw-400 fz-12">354
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        8</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Jer*****Luz</p>
                                                        <span
                                                            class="fw-400 fz-12">210
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        9</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ala*****ha</p>
                                                        <span
                                                            class="fw-400 fz-12">186
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        10</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class="brs-100 w-100 c-pr-12"
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Nat*****ora</p>
                                                        <span
                                                            class="fw-400 fz-12">113
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                                                        </div>
                                </div>
                                <div class="tab-pane fade" id="leaderboard_m-3" role="tabpanel">
                                    <div class="leaderboard-content">
                                                                                    <div class="leaderboard-item row no-gutters">
                                                <div
                                                    class="col-12 leaderboard-item-name text-center justify-content-center">
                                                    Không có dữ liệu
                                                </div>
                                            </div>
                                                                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="leaderboard-seemore">
                            <p>Xem thêm</p>
                        </div>
                    </div>
                </div>
                
                <div class="d-block d-lg-none c-mb-16">
                                        <div class="leaderboard-buttons c-px-16 c-py-8 row no-gutters" style="border-bottom: none;">
                        <div class="col-6 c-pr-5">
                            <a href="javascript:void(0)"
                                class="btn secondary w-100 logsHisMinigameMobile open-sheet modal_spin_bonus__mobile btn-history-spin"
                                data-target="#sheet-filter-02">
                                Lịch sử quay
                            </a>
                        </div>
                        <div class="col-6 c-pl-5">
                            <a class="btn primary w-100" href="/withdrawitem-2">Rút
                                quà</a>
                        </div>
                    </div>
                </div>
                
                                    <div class="rotation-comment-block c-px-lg-16">
                        <h6 class="d-block d-lg-none fw-700 fz-18 lh-24 c-py-16">Bình luận</h6>
                        <div class="rotation-comment chat-history brs-12 c-p-16">
                            <h6 class="fw-700 fz-20 lh-28 c-mb-20  d-none d-lg-block">Bình luận</h6>
                            <ul class="comment-block list-unstyled chat-scroll c-pr-8">

                            </ul>
                            <div class="commment-input d-flex align-items-center c-mb-20">
                                <div class="comment-user-avatar c-mr-8 d-none d-lg-block">
                                    <img src=""
                                        alt="">
                                </div>
                                <input name="message-to-send" type="text" class="input-primary" id="message-to-send">
                            </div>
                            <div class="comment-button">
                                <button type="button" class="btn primary btn-send-message pill-button">Bình luận</button>
                            </div>
                        </div>
                    </div>
                            </div>
            <div class="col-12 col-lg-4 c-pl-8 d-none d-lg-block">
                <div class="rotation-leaderboard c-py-16 c-px-16 brs-12">
                                        <div class="leaderboard-buttons c-pb-24 c-mb-16 row no-gutters">
                        <div class="col-6 c-pr-5">
                            <a href="javascript:void(0)" class="btn secondary w-100 modal_spin_bonus btn-history-spin">
                                Lịch sử quay
                            </a>
                        </div>
                        <div class="col-6 c-pl-5">
                            <a href="javascript:void(0)" class="btn primary w-100 modal_withdraw_items btn-withdraw-items">
                                Rút quà
                            </a>
                        </div>
                    </div>
                    <div class="leaderboard-header d-flex align-items-center c-mb-16">
                        <img class="c-mr-4"
                            src="/assets/frontend/theme_5/image/svg/top-leaderboard.svg"
                            alt="">
                        <h5 class="fw-700 fz-20 lh-28">Top quay thưởng</h5>
                    </div>
                    <div class="leaderboard-type c-mb-16 brs-8 row no-gutters">
                        <ul class="nav justify-content-between row no-gutters w-100 c-p-4" role="tablist">
                            <li class="nav-item col-4 p-0" role="presentation">
                                <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8 active" data-toggle="tab"
                                    href="#leaderboard-1" role="tab" aria-selected="true">Hôm nay</p>
                            </li>
                            <li class="nav-item col-4 p-0" role="presentation">
                                <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8" data-toggle="tab"
                                    href="#leaderboard-2" role="tab" aria-selected="false">7 ngày</p>
                            </li>
                            <li class="nav-item col-4 p-0" role="presentation">
                                <p class="nav-link text-center mb-0 fw-400 fz-13 brs-8" data-toggle="tab"
                                    href="#leaderboard-3" role="tab" aria-selected="false">Quà đua top</p>
                            </li>
                        </ul>
                    </div>
                    <div class="leaderboard-table">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="leaderboard-1" role="tabpanel">
                                <div class="leaderboard-content">
                                                                                                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    1</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Jef*****per</p>
                                                    <span
                                                        class="fw-400 fz-12">954
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    2</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ro*****cki</p>
                                                    <span
                                                        class="fw-400 fz-12">641
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    3</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Gar*****ren</p>
                                                    <span
                                                        class="fw-400 fz-12">472
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    4</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ja*****oy</p>
                                                    <span
                                                        class="fw-400 fz-12">454
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    5</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ke*****uz</p>
                                                    <span
                                                        class="fw-400 fz-12">343
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    6</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Law*****ld</p>
                                                    <span
                                                        class="fw-400 fz-12">250
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    7</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Law*****nia</p>
                                                    <span
                                                        class="fw-400 fz-12">213
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    8</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Dyl*****ego</p>
                                                    <span
                                                        class="fw-400 fz-12">170
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    9</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Pa*****ene</p>
                                                    <span
                                                        class="fw-400 fz-12">54
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    10</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Jes*****hke</p>
                                                    <span
                                                        class="fw-400 fz-12">1
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                                            </div>
                            </div>
                            <div class="tab-pane fade" id="leaderboard-2" role="tabpanel">
                                <div class="leaderboard-content">
                                                                                                                        <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    1</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Emi*****ida</p>
                                                    <span
                                                        class="fw-400 fz-12">966
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    2</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ma*****nia</p>
                                                    <span
                                                        class="fw-400 fz-12">878
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    3</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Noa*****on</p>
                                                    <span
                                                        class="fw-400 fz-12">768
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    4</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Br*****ht</p>
                                                    <span
                                                        class="fw-400 fz-12">598
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    5</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ro*****ud</p>
                                                    <span
                                                        class="fw-400 fz-12">588
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    6</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Dy*****don</p>
                                                    <span
                                                        class="fw-400 fz-12">381
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    7</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">An*****ha</p>
                                                    <span
                                                        class="fw-400 fz-12">354
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    8</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Jer*****Luz</p>
                                                    <span
                                                        class="fw-400 fz-12">210
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    9</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ala*****ha</p>
                                                    <span
                                                        class="fw-400 fz-12">186
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    10</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class="brs-100 w-100 c-pr-12"
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Nat*****ora</p>
                                                    <span
                                                        class="fw-400 fz-12">113
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                                            </div>
                            </div>
                            <div class="tab-pane fade" id="leaderboard-3" role="tabpanel">
                                <div class="leaderboard-content">
                                                                            <div class="leaderboard-item row no-gutters">
                                            <div class="col-12 leaderboard-item-name text-center justify-content-center">
                                                Không có dữ liệu
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="leaderboard-seemore">
                        <p>Xem thêm</p>
                    </div>
                </div>
            </div>


    </div>
    </section>
    
    <section class="c_section-category lien-quan">
    <div class="section-header c-mb-24 c-mb-lg-16">
        <h2 class="section-title">
            Mini game liên quan
        </h2>
        <a href="" class="link arr-right ml-auto">Xem thêm</a>
    </div>

    <!-- Đặt tên class cho swiper sau đó config trong file "public/assets/frontend/theme_5/js/swiper-slider-conf/swiper-slider-conf.js" -->
    <!-- Nếu có giao diện giống nhau hoàn toàn thì có thể dùng chung config (chung tên class 'class-config-demo') -->
        <div class="swiper class-config-demo card-list">
        <div class="swiper-wrapper">
            <?php foreach ($CMSNAV->get_list("SELECT * FROM mini_game WHERE status = 'true' ") as $minigame) { ?>
                                                                            <div class="swiper-slide h-auto">
                <div class="item-category h-100">
                    <div class="card h-100">
                        <a href="<?=BASE_URL('VongQuay/' . $minigame['id']); ?>" class="card-body scale-thumb c-p-16 c-p-lg-12">
                            <div class="account-thumb c-mb-8">
                                                                    <img src="<?=mini_game($minigame['id'], 'thumb'); ?>" alt="<?=$minigame['name']; ?>" class="account-thumb-image" loading="lazy">
                                                            </div>
                            <div class="account-title">
                                <div class="text-title fw-700 text-limit limit-1"><?=$minigame['name']; ?></div>
                            </div>
                            <div class="account-info c-mb-8">
                                <div class="info-attr">
                                    Đã chơi: <?=$minigame['sudung']; ?>
                                </div>
                            </div>
                            <div class="price">
                                <div class="price-current w-100"> <?= number_format($minigame['price']); ?>đ</div>
                                                                    <div class="price-old c-mr-8">
                                        <?= number_format($minigame['price']*3); ?>đ
                                    </div>
                                                                                                    <div class="discount">
                                        -50%
                                    </div>
                                
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                                  <?php }?>   
                                  
                                   <?php foreach($CMSNAV->get_list("SELECT * FROM setting_latthe WHERE display = 'SHOW' ") as $latthe) { ?>
                                                                            <div class="swiper-slide h-auto">
                <div class="item-category h-100">
                    <div class="card h-100">
                        <a href="<?=BASE_URL('LatThe/'.$latthe['id']);?>" class="card-body scale-thumb c-p-16 c-p-lg-12">
                            <div class="account-thumb c-mb-8">
                                                                    <img src="<?=$latthe['imglatthe_thumb'];?>" alt="<?=$latthe['imglatthe_thumb'];?>" class="account-thumb-image" loading="lazy">
                                                            </div>
                            <div class="account-title">
                                <div class="text-title fw-700 text-limit limit-1"><?=$latthe['title']; ?></div>
                            </div>
                            <div class="account-info c-mb-8">
                                <div class="info-attr">
                                    Đã chơi: <?=$latthe['luotdaquay']; ?>
                                </div>
                            </div>
                            <div class="price">
                                <div class="price-current w-100"> <?= number_format($latthe['giatien']); ?>đ</div>
                                                                    <div class="price-old c-mr-8">
                                        <?= number_format($latthe['giatien']*3); ?>đ
                                    </div>
                                                                                                    <div class="discount">
                                        -50%
                                    </div>
                                
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                                  <?php }?>          
                    </div>
        <div class="navigation slider-next"></div>
        <div class="navigation slider-prev"></div>
    </div>
    </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var bRotate = false;

    function rotateFn(angles, gifts) {
        bRotate = true;
        gsap.to('#rotate', {
            rotation: angles + 1800,
            duration: 4,
            ease: "power2.out",
            onComplete: function() {
                Swal.fire('Thành công !', gifts, 'success');
                bRotate = false;
                gsap.to('#rotate', {rotation: 0, duration: 0});
            }
        });
    }

    // 🔹 Gắn sự kiện cho cả 2 nút: #start và #start1
    $('#start, #start1').click(function() {
        if (bRotate) return;
        $.ajax({
            url: '/assets/ajaxs/Quay.php',
            type: 'POST',
            dataType: "JSON",
            data: { id_vongquay: <?= $id; ?> },
            success: function(json) {
                if (json.status == 3) {
                    Swal.fire('Oops !', 'Vui lòng đăng nhập !', 'error');
                } else if (json.status == 4) {
                    Swal.fire('Oops !', 'Bạn không đủ tiền để quay !', 'error');
                } else if (json.status == 1) {
                    if (json.item > 0 && json.item < 9) {
                        rotateFn(json.location, json.msg);
                    } else {
                        Swal.fire('Oops !', 'Đã có lỗi xảy ra !', 'error');
                    }
                } else {
                    Swal.fire('Oops !', 'Hệ thống đang bảo trì !', 'error');
                }
            },
            error: function() {
                Swal.fire('Oops !', 'Không thể kết nối máy chủ!', 'error');
            }
        });
    });
});
</script>
 <script src="/assets/frontend1/theme_5/js/minigame/fake-cmt.js"></script>
    <?php
    require_once("../../public/client/Footer.php");
    ?>
