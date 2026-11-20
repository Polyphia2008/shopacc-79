<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'Tài khoản | ' . $CMSNAV->site('tenweb');
require_once("../../public/client/Header.php");
require_once("../../public/client/Nav.php");


function phantrang2($url, $start, $total, $kmess)
{
    $out[] = ' <nav class="relative z-0 inline-flex v-pagination mx-auto v-text-1 v-light-theme">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="mx-1 border border-gray-400 bg-white relative v-page-no w-8 md:w-10 h-8 md:h-10 text-md md:text-lg rounded font-bold inline-flex items-center justify-center px-2 py-2 leading-5 font-medium focus:outline-none transition ease-in-out duration-150 text-gray-800 v-pagination-text disabled" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<svg viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
    <path fill-rule="evenodd"
        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
        clip-rule="evenodd"></path>
</svg>');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    for ($nCont = $neighbors; $nCont >= 1; $nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="border mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded inline-flex justify-center items-center px-4 py-2 focus:outline-none text-white border-red-600 text-white bg-red-600"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1; $nCont <= $neighbors; $nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<svg viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
        <path fill-rule="evenodd"
            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
            clip-rule="evenodd"></path>
    </svg>
        ');
    }
    $out[] = '</ul></nav>';
    return implode('', $out);
}

if (isset($_GET['id'])) {
    $row = $CMSNAV->get_row(" SELECT * FROM `groups` WHERE `id` = '" . check_string($_GET['id']) . "'  ");
    if (!$row) {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
} else {
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}
$CMSNAV->query("UPDATE `groups` SET `luotxem` = `luotxem` + 1 WHERE `id` = '" . check_string($_GET['id']) . "'  ");

$sotin1trang = 16;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$from = ($page - 1) * $sotin1trang;

$amount = '';
$type_amount = '';
if (isset($_GET['amount'])) {
    $type_amount = check_string($_GET['amount']);
    switch ($type_amount) {
        case 1:
            $amount = ' AND `money` <= 50000 ';
            break;
        case 2:
            $amount = ' AND `money` >= 50000 AND `money` <= 100000 ';
            break;
        case 3:
            $amount = ' AND `money` >= 100000 AND `money` <= 200000 ';
            break;
        case 4:
            $amount = ' AND `money` >= 200000 AND `money` <= 500000 ';
            break;
        case 5:
            $amount = ' AND `money` >= 500000 ';
            break;
    }
}

$id_acc = isset($_GET['id_acc']) ? check_string($_GET['id_acc']) : NULL;

$listAccount = $CMSNAV->get_list("SELECT * FROM `accounts` WHERE `groups` = '" . $row['id'] . "' AND `id` LIKE '%$id_acc%' AND `username` IS NULL $amount ORDER BY id DESC LIMIT $from,$sotin1trang ");
?>


    <div class="layout">
        <div class="content" style="">
                <div class="container c-container" id="">
                    <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="" class="breadcrumb-link">Danh Mục</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)"
                        class="breadcrumb-link"><?= $row['title']; ?></a>
                </li>
            </ul>
            <div class="head-mobile">
                <a href="" class="link-back"></a>
                <p class="head-title text-title"><?= $row['title']; ?></p>
                <a href="/viewed">
        <img src="/assets/frontend1/theme_5/image/DA-XEM.png" alt="DA-XEM"
            style="position: absolute;top: 16px;right: 60px;width:30px; height: 30px">
    </a>
    <a href="/cart">
        <img src="/assets/frontend1/theme_5/image/nam/cart.svg" alt="cart"
            style="position: absolute;top: 16px;right: 16px;width:30px; height: 30px">
        <p id="num_cart_mob" class=""></p>
    </a>
            </div>
            
            <div class="banner-slide swiper-general c-mt-2">
        <div class=" swiper swiper-banner brs-12">
            <div class="swiper-wrapper">
                            </div>

            <div class="navigation slider-next "></div>
            <div class="navigation slider-prev "></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
            <div class="booking_detail"></div>
            
            <section class="list-account" style="margin-top: 2px">
                <div class="section-header justify-content-between  d-none d-lg-flex c-py-16">
                    <h1 class="section-title"><?= $row['title']; ?> </h1>
                </div>
                <div class="filter-account c-my-16 d-none d-lg-flex">
                    <div class="filter-title text-title fw-700 text-color-header">
                        Chọn game muốn mua account
                    </div>
                                            <div class="value-filter">
                            <div class="nick-findter-data" id="params-filter">
                            </div>
                            <div class="show-modal-filter noselect" data-toggle="modal" data-target="#modal-filter">Bộ lọc
                            </div>
                        </div>
                                    </div>

                                                    <div class="list-related-tag-home">
                                                                                            </div>
                
                <div class="sort-account c-mb-16 d-none d-lg-flex">
                    <div class="text-title fw-700 text-color-header" id="numberResult"></div>
                                            <div class="value-sort d-flex align-items-center">
                            <div class="text-title fw-700 c-mr-16 text-color-header">
                                Sắp xếp theo:
                            </div>
                            <div>
                                <a href="#" class="selection active md" data-sort="random">Ngẫu nhiên</a>
                                <a href="#" class="selection md" data-sort="price_start">Giá từ cao đến thấp</a>
                                <a href="#" class="selection md" data-sort="price_end">Giá từ thấp đến cao</a>
                                <a href="#" class="selection md" data-sort="created_at_start">Mới nhất</a>
                                <a href="#" class="selection md" data-sort="created_at_end">Cũ nhất</a>
                            </div>
                        </div>
                                    </div>
                <!-- Mobile -->
                <div class="fw-700 c-mb-8 d-lg-none text-color-header">
                   <?= $row['title']; ?></div>
                                    <div class="mobile-tools c-mb-8 d-lg-none">
                        <label class="tool-filter c-mr-12 open-sheet" data-target="#sheet-filter">
                            Bộ lọc
                        </label>
                        <label class="tool-sort selection-mobile c-mr-12" data-target="#sheet-sort" data-sort="price_end">
                            Giá thấp nhất
                        </label>
                        <label class="tool-sort selection-mobile" data-target="#sheet-sort" data-sort="price_start">
                            Giá cao nhất
                        </label>
                    </div>
                    <!-- End Mobile -->
                                <div class="">

<div class="listing-account list-content">
   
                                     
                                                                 <div class="loading-container item-account loading-item-account d-none">
                    <div class="loading-nick">
                        <div class="shape1"></div>
                        <div class="shape2"></div>
                        <div class="shape3"></div>
                        <div class="shape4"></div>
                        <div class="shape5"></div>
                        <div class="shape6"></div>
                        <div class="shape7"></div>
                        <div class="shape8"></div>
                        <div class="shape9"></div>
                    </div>
                </div>
                <?php foreach($listAccount as $acc) {?>
                <div class="item-account scroll-load">
                    <div class="card card-hover h-100">
                        <a href="<?=BASE_URL('Orders/'.$acc['id']);?>" class="card-body scale-thumb ">
                            <div class="account-thumb c-mb-8 position-realative">
                                                                    <img src="https://shopsenpai.com/assets/storage/images/gif_loading4D9.png" data-src="<?=$acc['img'];?>" alt="114" class="account-thumb-image lazy" onerror="imgError(this)">

                                                                                            </div>
                            <div class="account-title">
                                <div class="text-title fw-700 text-limit limit-1"><?=$acc['title'];?></div>
                            </div>
                                                        <div class="account-info c-mb-8">
                                            <div class="info-attr">
                                                                                            </div>
                                            <div class="info-attr c-mb-8">
                                                ID: #AC<?=$acc['id'];?>                                           </div>
                                                 <?php if(!empty($acc['chitiet'])) { ?>
                    <?php $a = explode(PHP_EOL, $acc['chitiet']); $i=0; foreach($a as $b) {  $c = explode(":", $b); $i++; if($i >= 5){break;} ;?>
                                                                                                                                                                                                                                                                                                                                        <div class="info-attr">
                                                                                <?=$c[0];?>                       </div>     <?php }?>
                    <?php }?>
                    </div>
                                                            <div class="price">
                                                                                                                                                                                   <div class="price-current w-100"><?=format_cash($acc['money']);?>đ                       </div>           
          
        <div class="price-old c-mr-8">
        <?=format_cash($acc['money']*2);?>đ
        </div>

        <div class="discount">
            9.898%
        </div>
                                 
                                                            </div>
                          
                        </a>
                    </div>
                </div>
 <?php }?>
                                        
                            
      

                <!-- Previous Page Link -->
                                                                               

</div>
</div>
</section>
            <!-- Modal Filter -->
            <div class="modal fade" id="modal-filter">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="<?= BASE_URL('public/client/Accounts.php'); ?>" method="GET" class="form-filter">
                            <input value="<?= check_string($_GET['id']); ?>" name="id" type="hidden">
                            <div class="modal-header">
                                <p class="modal-title center">Bộ lọc</p>
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="input-group">
                                    <label class="form-label">
                                        Mã số
                                    </label>
                                    <input type="text" class="input-defautf-ct id" name="id_acc"
                                        placeholder="Nhập mã số nick" value="<?= htmlspecialchars($id_acc); ?>">
                                </div>
 
                                <div class="input-group">
                                    <label class="form-label">
                                        Giá tiền
                                    </label>
                                    <select name="amount" class="price" id="">
                                        <option value="">-- Giá tiền --</option>
                    <option value="1" <?= $type_amount == 1 ? 'selected' : '' ?>>0 - 50.000</option>
                    <option value="2" <?= $type_amount == 2 ? 'selected' : '' ?>>50.000 - 100.000</option>
                    <option value="3" <?= $type_amount == 3 ? 'selected' : '' ?>>100.000 - 200.000</option>
                    <option value="4" <?= $type_amount == 4 ? 'selected' : '' ?>>200.000 - 500.000</option>
                    <option value="5" <?= $type_amount == 5 ? 'selected' : '' ?>> > 500.000</option>
                                    </select>
                                </div>

                                
                                                                                                                            
                                                                                                </div>
                            <div class="modal-footer c-mt-24 c-mt-lg-16">
                                <a href="javascript:void(0)" class="btn ghost js-reset-form">Xoá</a>
                                <A href="<?= BASE_URL('public/client/Accounts.php?id=' . check_string($_GET['id'])); ?>" class="btn primary js-submit-form">Xem kết quả</A>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Sheet filter -->
            <div class="bottom-sheet" id="sheet-filter" aria-hidden="true" data-height="60">
                <div class="layer"></div>
                <div class="content-bottom-sheet bar-slide">
                    <form action="<?= BASE_URL('public/client/Accounts.php'); ?>" method="GET" class="form-filter">
                        <input value="<?= check_string($_GET['id']); ?>" name="id" type="hidden">
                        <div class="sheet-header">
                            <p class="text-title center">
                                Bộ lọc
                            </p>
                            <label class="close"></label>
                        </div>
                        <div class="sheet-body">
                            <!-- body -->
                            <div class="input-group">
                                <span class="form-label">
                                    Mã số
                                </span>
                                <input type="text" class="id" name="id_acc" placeholder="Nhập mã số muốn tìm" value="<?= htmlspecialchars($id_acc); ?>">
                            </div>

                           

                            <div class="input-group">
                                <label class="form-label">
                                    Giá tiền
                                </label>
                                <select name="amount" class="price" id="">
                                    <option value="">-- Giá tiền --</option>
                    <option value="1" <?= $type_amount == 1 ? 'selected' : '' ?>>0 - 50.000</option>
                    <option value="2" <?= $type_amount == 2 ? 'selected' : '' ?>>50.000 - 100.000</option>
                    <option value="3" <?= $type_amount == 3 ? 'selected' : '' ?>>100.000 - 200.000</option>
                    <option value="4" <?= $type_amount == 4 ? 'selected' : '' ?>>200.000 - 500.000</option>
                    <option value="5" <?= $type_amount == 5 ? 'selected' : '' ?>> > 500.000</option>
                                </select>
                            </div>

                                                                                                                                                                                    
                                                                                                                                                                </div>
                        <div class="sheet-footer">
                            <button type="button" class="btn ghost js-reset-form">Xoá</button>
                            <A href="<?= BASE_URL('public/client/Accounts.php?id=' . check_string($_GET['id'])); ?>" class="btn primary js-submit-form">Xem kết quả</A>
                        </div>
                    </form>
                </div>
            </div>
          
          
          
          
          
          
          
          
          
          	
    <?php ?>
<div class="c-mb-16">
                    <div class="card overflow-hidden detailViewBlock">
                        <div class="card-body c-px-16">
                            <div class="content-desc hide detailViewBlockContent">
                                <div class="data-content">
                                    <?php if (isset($row['chitiet'])) { ?>
                                    <p style=""> <?= base64_decode($row['chitiet']); ?></p>

<div>
<?php } ?>
</div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                                
   
                                    <?php
            $tong = $CMSNAV->num_rows(" SELECT * FROM `accounts` WHERE `groups` = '".$row['id']."' AND `id` LIKE  '%$id_acc%' AND `username` IS NULL $amount ORDER BY id DESC ");
            if ($tong > $sotin1trang)
            {
                echo '' . phantrang($base_url.'public/client/Accounts.php?id='.check_string($_GET['id']).'&amount='.$type_amount.'&id_acc='.$id_acc.'&', $from, $tong, $sotin1trang) . '';
            }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    require_once("../../public/client/Footer.php");
?>
