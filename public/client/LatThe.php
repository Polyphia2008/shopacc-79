
     
    <link rel="stylesheet" href="https://bloxvn.net/assets/frontend/theme_5/css/hivewheel.css?v=1762516986">
    <?php
        require_once("../../config/config.php");
        require_once("../../config/function.php");
        $title = 'MINI GAME | '.$CMSNAV->site('tenweb');
        require_once("../../public/client/Header.php");
        require_once("../../public/client/Nav.php");
?>

<?php
// Ưu tiên lấy bằng slug khi rewrite gọi vào
if(isset($_GET['slug'])) {
    $slug = check_string($_GET['slug']);
    $row = $CMSNAV->get_row("SELECT * FROM `setting_latthe` WHERE `slug` = '$slug' ");
}

// Nếu không có slug → chạy như code gốc dùng id
if((!isset($row) || !$row) && isset($_GET['id'])) {
    $id = check_string($_GET['id']);
    $row = $CMSNAV->get_row("SELECT * FROM `setting_latthe` WHERE `id` = '$id' ");
}

// Nếu vẫn không có → y như code gốc
if(!$row){
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
}

// đây là thứ AJAX cần
$id = intval($row['id']);
?>

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
          <a href="javascript:void(0)" class="breadcrumb-link"><?=$row['title'];?></a>
        </li>
      </ul>
      <div class="head-mobile">
        <a href="/minigame" class="link-back "></a>
        <p class="head-title text-title">Danh sách minigame</p>
        <a href="/viewed">
          <img src="/assets/frontend/theme_5/image/DA-XEM.png" alt="DA-XEM" style="position: absolute;top: 16px;right: 60px;width:30px; height: 30px">
        </a>
        <a href="/cart">
          <img src="/assets/frontend/theme_5/image/nam/cart.svg" alt="cart" style="position: absolute;top: 16px;right: 16px;width:30px; height: 30px">
        </a>
      </div>
      <section class="rotation-content c-mb-40 c-mb-lg-20 c-pt-lg-16">
        <div class="row rotation-content-section">
          <div class="col-12 col-lg-8 c-pr-8 c-px-lg-0">
            <div class="c-px-lg-16 d-block d-lg-none  c-mb-12">
              <div class="rotation-header-mobile d-flex justify-content-between">
                <div class="rotation-header c-pb-8">
                  <h1 class="fw-700 fz-18 lh-24"><?=$row['title'];?></h1>
                  <p class="fw-400 fz-13 mb-0"> <span class="userCount"></span> </p>
                </div>
              </div>
            </div>
            <div class="d-block d-lg-none c-mb-16 c-px-lg-16">
              <div class="rotation-notify w-100 ">
                <img src="/assets/frontend/theme_5/image/svg/sound_mobile.svg" alt="">
                <marquee class="rotation-marquee">
                  <div class="rotation-marquee-item">
                    Danh sách trúng thưởng: 
                    <?php foreach ($CMSNAV->get_list("SELECT * FROM `users` ORDER BY RAND() ") as $user) { ?>
                    <span><b><i class="ws-relative ws-top-[1.5px] bx bxs-user"></i><?=substr($user['username'], 0, -3) . '***';?>

                      </b> - <span class="ws-capitalize">- Trúng <?=rand(000,999)?> Robux (<?=rand(1,24)?> giờ trước)</span></span>
                    <?php }  ?>    
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
                                        class="fw-700 fz-20 lh-28 c-mr-8"><?= number_format(mini_game_latthe($id, 'giatien')); ?>đ</span>
                                                                                                        </p>
                                <p class="c-mb-0 fw-400 fz-13">Rẻ vô đối, giá tốt nhất thị trường</p>
                            </div>
                        </div>
                    </div>
                    <div class="rotation-detail c-mb-16 brs-12">
                        <div class="rotation-top c-p-16 d-none d-lg-flex justify-content-between">
                            <div>
                                <div class="rotation-header d-flex align-items-center c-mb-8">
                                    <h3 class="fw-700 fz-24 lh-32 c-mr-8"><?=mini_game_latthe($id, 'title');?></h3>
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
                        

                                                <div class="rotation c-p-16 " style="background-image: url(<?=$row['imglatthe_upthe'];?>);">
                                                            <div class="rotation-notify d-none d-lg-flex w-100 c-mb-16">
                                    <img src="/assets/frontend/theme_5/image/svg/sound.svg"
                                        alt="">
                                    <marquee class="rotation-marquee">
                                        <div class="rotation-marquee-item">
                                            Danh sách trúng thưởng: &nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Mar*****ki</span> - đã trúng Nakroth Thứ Nguyên Vệ Thần&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;De*****we</span> - đã trúng Túi Mù Skin SS&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Sar*****ws</span> - đã trúng 69 Quân Huy&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Gab*****roy</span> - đã trúng 29 Quân Huy&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Be*****roy</span> - đã trúng 1000 Quân Huy&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Ro*****fy</span> - đã trúng Nakroth Thứ Nguyên Vệ Thần&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Log*****ele</span> - đã trúng 29 Quân Huy&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Tim*****er</span> - đã trúng 300 Quân Huy&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Ed*****nna</span> - đã trúng 500 Quân Huy&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Sar*****aud</span> - đã trúng 150 Quân Huy&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #28a745"><i class="menu-icon fas fa-user"></i>&nbsp;&nbsp;Aar*****per</span> - đã trúng 3000 Quân Huy
                                        </div>
                                    </marquee>
                                </div>
                                                                                            <div class="d-flex align-items-center justify-content-center flex-wrap" id=hivewheel">
                          <div class="gallery">

    <!-- 1 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">             
            <div id="imglatthe_1" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_1'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_1'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 2 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
              
            <div id="imglatthe_2" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_2'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_2'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 3 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
            <div id="imglatthe_3" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_3'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_3'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 4 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
            <div id="imglatthe_4" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_4'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_4'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 5 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
            <div id="imglatthe_5" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_5'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_5'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 6 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
            <div id="imglatthe_6" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_6'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_6'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 7 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
            <div id="imglatthe_7" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_7'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_7'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 8 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
            <div id="imglatthe_8" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_8'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_8'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 9 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
            <div id="imglatthe_9" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_9'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_9'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 10 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
            <div id="imglatthe_10" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_10'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_10'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 11 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
               
            <div id="imglatthe_11" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_11'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_11'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 12 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
               
            <div id="imglatthe_12" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_12'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_12'];?>" alt="">
            </div>
        </div>
    </div>

    <!-- 13 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
               
            <div id="imglatthe_13" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_13'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_13'];?>" alt="">
            </div>
        </div>
    </div>
    <!-- 14 -->
    <div class="hexagon-outer" style="background: #a044ff">
        <div class="hexagon-middle hexagon-middle-color">
           
            <div id="imglatthe_14" class="hexagon-inner box-item"
             style="
              background: #9733EE;  /* fallback for old browsers */
              background: -webkit-linear-gradient(to right, #a044ff, #9733EE);  /* Chrome 10-25, Safari 5.1-6 */
              background: linear-gradient(to right, #a044ff, #9733EE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */"
                 data-fancybox="galleryNickDetail"
                 href="<?=$row['imglatthe_14'];?>">
                <img style="width: 100%" src="<?=$row['imglatthe_14'];?>" alt="">
            </div>
        </div>
    </div>
                    </div>
                                   
                                                        </div>
</div>

                                 

                        <div class="row no-gutters">
                            <div class="col-12 col-lg-6 c-p-16 c-py-lg-8">
                                                                <div class="rotation-sale-content brs-8 c-py-8 d-none d-lg-flex justify-content-center">
                                    <p class="d-flex align-items-center c-mb-0">
                                        <span id="rotationFirstPrice" class="fw-400 fz-14 c-mr-8">
                                                                                   <?= number_format(mini_game_latthe($id, 'giatien') * 3); ?>đ
                                                                                    </span>
                                        <span id="rotationSalePrice"
                                              class="fw-700 fz-24 lh-32 c-mr-8"><?= number_format(mini_game_latthe($id, 'giatien')); ?></span>
                                                                                                                        
                                                                            </p>
                                </div>
                                                                    <input type="hidden" id="payment_methods" name="payment_methods" value="0">
                                                            </div>
                            <div class="col-12 col-lg-6 c-p-16 c-py-lg-8">
                                <div class="rotation-inputs c-mb-24 c-mb-lg-0 row no-gutters">
                                   
                                    <div class="col-12 c-pl-12">
                                        <select class="rotation-inputs-select" name="type" id="numrolllop">
                                            <option value="1">Quay 1 Lần - Giá <?= number_format(mini_game_latthe($id, 'giatien')); ?>đ
                                            </option>
                                                                                    </select>
                                    </div>
                                </div>
                                <div class="row no-gutters d-none d-lg-flex">
                                                                                                                        <div class="col-12 col-md-6 c-pr-6">
                                                
                                            </div>
                                                                                                                <div class="col-12 col-md-6 c-pl-6">
                                        <button id="start1" class="btn primary w-100 play google_buy_minigame">Quay ngay</button>
                                    </div>
                                </div>
                                <div class="footer-mobile">
                                    <div class="row marginauto">
                                                                                                                                   
                                                  
                                               
                                                                                                                            <div class="col-12 pr-0 c-pl-8">
                                            <button id="start2" class="btn primary w-100  play google_buy_minigame">Quay ngay</button>
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
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Jas*****der</p>
                                                        <span
                                                            class="fw-400 fz-12">994
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        2</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Wa*****al</p>
                                                        <span
                                                            class="fw-400 fz-12">957
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        3</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ste*****go</p>
                                                        <span
                                                            class="fw-400 fz-12">785
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        4</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Roy*****anz</p>
                                                        <span
                                                            class="fw-400 fz-12">745
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        5</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ju*****upo</p>
                                                        <span
                                                            class="fw-400 fz-12">738
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        6</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Vi*****ge</p>
                                                        <span
                                                            class="fw-400 fz-12">681
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        7</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Jac*****ami</p>
                                                        <span
                                                            class="fw-400 fz-12">430
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        8</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Rog*****era</p>
                                                        <span
                                                            class="fw-400 fz-12">384
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        9</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">An*****er</p>
                                                        <span
                                                            class="fw-400 fz-12">230
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        10</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Sar*****oby</p>
                                                        <span
                                                            class="fw-400 fz-12">167
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
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">La*****age</p>
                                                        <span
                                                            class="fw-400 fz-12">909
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        2</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ju*****es</p>
                                                        <span
                                                            class="fw-400 fz-12">907
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        3</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Nat*****rna</p>
                                                        <span
                                                            class="fw-400 fz-12">866
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        4</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Jer*****ha</p>
                                                        <span
                                                            class="fw-400 fz-12">635
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        5</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Bra*****er</p>
                                                        <span
                                                            class="fw-400 fz-12">392
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        6</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ste*****ion</p>
                                                        <span
                                                            class="fw-400 fz-12">277
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        7</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Jos*****een</p>
                                                        <span
                                                            class="fw-400 fz-12">239
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        8</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ma*****yd</p>
                                                        <span
                                                            class="fw-400 fz-12">219
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        9</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Ja*****ng</p>
                                                        <span
                                                            class="fw-400 fz-12">185
                                                            lượt</span>
                                                    </div>
                                                </div>
                                                                                            <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                    <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                        10</div>
                                                    <div class="leaderboard-item-avt brs-100">
                                                        <img class=""
                                                            src=""
                                                            alt="">
                                                    </div>
                                                    <div class="leaderboard-item-content">
                                                        <p class="fw-500 fz-13 c-mb-0">Li*****ta</p>
                                                        <span
                                                            class="fw-400 fz-12">172
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
                            <a class="btn primary w-100" href="/withdrawitem-1">Rút
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
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Jas*****der</p>
                                                    <span
                                                        class="fw-400 fz-12">994
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    2</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Wa*****al</p>
                                                    <span
                                                        class="fw-400 fz-12">957
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    3</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ste*****go</p>
                                                    <span
                                                        class="fw-400 fz-12">785
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    4</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Roy*****anz</p>
                                                    <span
                                                        class="fw-400 fz-12">745
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    5</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ju*****upo</p>
                                                    <span
                                                        class="fw-400 fz-12">738
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    6</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Vi*****ge</p>
                                                    <span
                                                        class="fw-400 fz-12">681
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    7</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Jac*****ami</p>
                                                    <span
                                                        class="fw-400 fz-12">430
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    8</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Rog*****era</p>
                                                    <span
                                                        class="fw-400 fz-12">384
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    9</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">An*****er</p>
                                                    <span
                                                        class="fw-400 fz-12">230
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    10</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Sar*****oby</p>
                                                    <span
                                                        class="fw-400 fz-12">167
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
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">La*****age</p>
                                                    <span
                                                        class="fw-400 fz-12">909
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    2</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ju*****es</p>
                                                    <span
                                                        class="fw-400 fz-12">907
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    3</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Nat*****rna</p>
                                                    <span
                                                        class="fw-400 fz-12">866
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    4</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Jer*****ha</p>
                                                    <span
                                                        class="fw-400 fz-12">635
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    5</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Bra*****er</p>
                                                    <span
                                                        class="fw-400 fz-12">392
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    6</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ste*****ion</p>
                                                    <span
                                                        class="fw-400 fz-12">277
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    7</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Jos*****een</p>
                                                    <span
                                                        class="fw-400 fz-12">239
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    8</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ma*****yd</p>
                                                    <span
                                                        class="fw-400 fz-12">219
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    9</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Ja*****ng</p>
                                                    <span
                                                        class="fw-400 fz-12">185
                                                        lượt</span>
                                                </div>
                                            </div>
                                                                                    <div class="leaderboard-item c-p-8 d-flex align-items-center">
                                                <div class="leaderboard-item-serial lh-24 fw-600 fz-12 c-mr-12">
                                                    10</div>
                                                <div class="leaderboard-item-avt brs-100">
                                                    <img class=""
                                                        src=""
                                                        alt="">
                                                </div>
                                                <div class="leaderboard-item-content">
                                                    <p class="fw-500 fz-13 c-mb-0">Li*****ta</p>
                                                    <span
                                                        class="fw-400 fz-12">172
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
       <style>
/* ⚙️ Fix Swiper full screen */
.swiper-wrapper {
  height: auto !important;
  width: auto !important;
}
.swiper-container,
.swiper {
  overflow: visible !important;
  height: auto !important;
}
</style>
            <?php foreach ($CMSNAV->get_list("SELECT * FROM mini_game WHERE status = 'true' ") as $minigame) { ?>
                              <div class="swiper-slide h-auto">
  <div class="item-category h-auto">
    <div class="card h-auto">
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
  <div class="item-category h-auto">
    <div class="card h-auto">
                        <a href="<?=BASE_URL('LatThe/'.$latthe['id']);?>" class="card-body scale-thumb c-p-16 c-p-lg-12">
                            <div class="account-thumb c-mb-8">
                                                                    <img src="<?=htmlspecialchars(trim($latthe['imglatthe_thumb']));?>" alt="<?=htmlspecialchars($latthe['title']);?>" class="account-thumb-image" loading="lazy">

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


      <style>
          .hexagon-middle-color{
                                                    background-color: #000000;
                                                }
.hexagon-inner {
  position: relative;
  transition: all 0.2s ease;
  box-shadow: 0 0 0 3px transparent;
  border-radius: 10px;
}

/* Ô đang chạy (sáng vàng đậm hơn) */
.hexagon-inner.active {
  box-shadow:
    0 0 25px 8px #ffea00,       /* viền ngoài sáng mạnh hơn */
    0 0 10px 4px #ffea00 inset, /* sáng trong viền */
    0 0 30px 12px rgba(255, 215, 0, 0.8); /* ánh sáng lan ra */
  transform: scale(1.05);
}

/* Ô trúng thưởng (ánh vàng chói + nhấp nháy rực rỡ hơn) */
.hexagon-inner.winner {
  box-shadow:
    0 0 35px 10px #ffeb3b,
    0 0 15px 5px #ffd700 inset,
    0 0 60px 20px rgba(255, 255, 150, 0.9);
  animation: pulseGold 0.8s infinite alternate;
  transform: scale(1.1);
}

/* Hiệu ứng nhấp nháy ánh kim vàng */
@keyframes pulseGold {
  from {
    box-shadow:
      0 0 35px 8px #ffd700,
      0 0 10px 4px #ffd700 inset,
      0 0 50px 15px rgba(255, 230, 0, 0.9);
  }
  to {
    box-shadow:
      0 0 60px 15px #fff78a,
      0 0 20px 6px #fff176 inset,
      0 0 90px 25px rgba(255, 255, 200, 1);
  }
}

</style>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const total = 14;
  const boxes = [];
  for (let i = 1; i <= total; i++) {
    const el = document.getElementById(`imglatthe_${i}`);
    if (el) boxes.push(el);
  }

  const buttons = document.querySelectorAll("#start1, #start2");
  let spinning = false;

  function highlight(index) {
    boxes.forEach(b => b.classList.remove("active"));
    if (boxes[index]) boxes[index].classList.add("active");
  }

   function spin(stopAt, message) {
    let index = 0;
    let speed = 80;
    let step = 0;
    const rounds = 3;
    const totalSteps = rounds * total + stopAt;

    function loop() {
      highlight(index);
      index = (index + 1) % total;
      step++;

      if (step > totalSteps - total) speed += 25;

      if (step < totalSteps) {
        setTimeout(loop, speed);
      } else {
        boxes.forEach(b => b.classList.remove("active"));
        boxes[stopAt].classList.add("winner");
        spinning = false;
        setTimeout(() => {
          Swal.fire({
            icon: "success",
            title: "Chúc mừng 🎉",
            text: message,
            confirmButtonColor: "#ffd700"
          });
        }, 800);
      }
    }

    loop();
  }

  // Gắn sự kiện click cho cả 2 nút
  buttons.forEach(btn => {
    btn.addEventListener("click", () => {
      if (spinning) return;
      spinning = true;

      // 🧹 Xoá toàn bộ viền cũ trước khi quay
      boxes.forEach(b => b.classList.remove("winner", "active"));

        $.ajax({
        url: "/assets/ajaxs/LatThe.php",
        type: "POST",
        dataType: "json",
        data: { id_latthe: "<?= $id; ?>" },
        success: function (data) {
        //   console.log("✅ JSON:", data);
          if (data.status == 1) {
            const stopAt = data.pos ? parseInt(data.pos) : Math.floor(Math.random() * total);
            spin(stopAt, data.msg);
          } else {
            spinning = false;
            Swal.fire({
              icon: "error",
              title: "Thất bại!",
              text: data.msg || "Có lỗi xảy ra!",
              confirmButtonColor: "#d33"
            });
          }
        },
        error: function (xhr) {
          spinning = false;
          console.error("❌ AJAX lỗi:", xhr.responseText);
          Swal.fire({
            icon: "error",
            title: "Lỗi máy chủ!",
            text: "Không thể kết nối đến máy chủ. Vui lòng thử lại.",
            confirmButtonColor: "#d33"
          });
        }
      });
    });
  });
  });
</script>
<style>/* Buộc slide tự co theo nội dung, không kéo giãn full-height */
.swiper-slide, .slick-slide {
  height: auto !important;
  align-items: flex-start; /* nếu dùng flexbox */
}

/* Thẻ chứa card không dùng 100% height */
.item-category, .card, .card-body {
  height: auto !important;
  min-height: 0 !important;
}

/* Giới hạn chiều cao ảnh và giữ tỉ lệ */
.account-thumb-image {
  display: block;
  width: 100%;
  max-height: 120px; /* chỉnh theo ý bạn */
  height: auto;
  object-fit: contain; /* không bóp méo */
}

/* Nếu card-body dùng flex, đảm bảo nội dung không giãn */
.card-body {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

/* Nếu dùng .h-100 trên nhiều chỗ, override */
.h-100 {
  height: auto !important;
}

/* Nếu swiper wrapper đang stretch slides */
.swiper-wrapper { align-items: flex-start; }</style>



            <script src="/assets/frontend1/theme_5/js/minigame/fake-cmt.js"></script>
            <?php 
    require_once("../../public/client/Footer.php");
?>
