<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Shop dịch vụ all game giá rẻ, uy tín, tự động. | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>

    <div class="layout">
        <div class="content" style="">
                <div class="container c-container" id="account-category">
                    <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/vat-pham" class="breadcrumb-link">Vật phẩm</a>
                </li>
            </ul>
            <div class="head-mobile">
                <a href="/" class="link-back"></a>

                <h1 class="head-title text-title">Vật phẩm</h1>

                <a href="/"> </a>
        
            </div>
            
            <div class="banner-slide swiper-general c-mt-lg-0">
        <div class=" swiper swiper-banner brs-12">
            <div class="swiper-wrapper">
                            </div>
            <div class="navigation slider-next"></div>
            <div class="navigation slider-prev"></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

<section class="listing-service c-mt-16 c-mt-lg-0">
                <div class="section-header justify-content-between c-pb-20 c-pb-lg-0">
                    <h2 class="section-title fw-700 fz-20 lh-28 ">Danh sách vật phẩm</h2>
                    
                </div>
                <hr>
                <div class="text-title fw-700 c-py-16 c-py-lg-8 c-mb-lg-8 text-color-header">
                    Chọn dịch vụ
                </div>
                 
                <div class="list-service">
    <?php foreach($CMSNAV->get_list("SELECT * FROM `category_gamepass`") as $row) { ?>

        <div class="item-service js-service">
            <div class="card card-hover">
                <a href="<?=BASE_URL('vatpham/'.$row['id']);?>" class="card-body scale-thumb c-p-16 c-p-lg-12">

                    <div class="account-thumb c-mb-8">
                        <img onerror="imgError(this)" src="<?=$row['img'];?>"
                             class="account-thumb-image" loading="lazy" width="200" height="120">
                    </div>

                    <div class="account-title">
                        <div class="text-title fw-700 text-limit limit-1"><?=$row['title'];?></div>
                    </div>
<div class="account-info">
                    <div class="info-attr">
                                                                                                                                                                                                                            
                                                   <?=$CMSNAV->site('giamgia');?>
                                                                                                                                                                                                                                                                                                    </div>
                            </div>

                </a>
            </div>
        </div>

    <?php } ?>
</div>

            </section>
          
<?php 
    require_once("../../public/client/Footer.php");
?>
