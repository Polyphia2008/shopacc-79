<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Blogs | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>
<style>

.c-layout-breadcrumbs-1 .c-page-breadcrumbs > li, .c-layout-breadcrumbs-1 .c-page-breadcrumbs > li > a {
    color: #ffffff;
    font-size: 16px;
    font-weight: 400;
}
.article-title.title_custom {
    font-size: 26px;
    text-transform: uppercase;
    color: white;
}
.c-content-title-1.c-title-md > h3.c-font-uppercase {
    font-size: 20px;
    color: white;
}
.bg-gray-100 {
    --tw-bg-opacity: 1;
    background-color: aliceblue;
}
.checked {
  color: orange;
}
</style>

            <script src="https://cdn.tailwindcss.com"></script> 
<div class="bg-gray-100">
    <div class="w-full max-w-6xl mx-auto py-4 px-2 md:px-0 mb-4 md:mb-6">
        <h4 class="font-bold text-2xl">TIN TỨC</h4>
        <div>
            <a href="/" class="hover:text-red-600">Trang chủ </a>
            <span>
                <i class="relative bx bx-chevron-right" style="top: 1px;"></i>
            </span>
            <a href="/Feedback" class="hover:text-red-600">Đánh giá </a>
            <span>
                <i class="relative bx bx-chevron-right" style="top: 1px;"></i>
            </span>
        </div>
    </div>
</div>
<div class="w-full max-w-6xl mx-auto px-2 md:px-0 tw-bg-gray-100" style="font-family: 'Roboto Condensed', sans-serif; min-height:70vh;">
    <div class="tw-grid tw-grid-cols-12 tw-gap-2 md:tw-gap-4">
        <?php $i = 0; foreach(
            $CMSNAV->get_list(" SELECT * FROM `orders_caythue` WHERE `ghichu`  IS NOT NULL ORDER BY id DESC  ") +
            $CMSNAV->get_row(" SELECT * FROM `orders_robux`  WHERE `ghichu`  IS NOT NULL ORDER BY id DESC  ") +
            $CMSNAV->get_row(" SELECT * FROM `orders_gamepass`  WHERE `ghichu`  IS NOT NULL ORDER BY id DESC  ")
        as $row){ ?>
                <div class="tw-col-span-6 sm:tw-col-span-6 md:tw-col-span-3 tw-bg-white tw-shadow-sm tw-rounded-b-sm tw-border md:tw-border-0 md:tw-rounded-b tw-relative">
            <div class="tw-my-1 tw-px-2">
                <a class="tw-text-xs"><b><?=$row['username'];?></b>: <?=$row['ghichu'];?></a>
                            <div class="tw-text-2xl">
                     <span class="bx bxs-star checked"></span><span class="bx bxs-star checked"></span><span class="bx bxs-star checked"></span><span class="bx bxs-star checked"></span><span class="bx bxs-star checked"></span>                </div>
            </div>
            <a href="//random-account-blox-fruits" class="">
                <div class="tw-col-span-5"><img class="tw-w-full lazyLoad isLoaded" src="">
                </div>
                <hr>
                <div class="tw-col-span-12 tw-px-2 tw-py-3 tw-h-28 tw-relative">
                    <h4 class="tw-sub-interface-title tw-uppercase tw-text-xs tw-font-semibold tw-text-gray-800 tw-mb-0">
                                ADMIN trả lời:                           </h4>                        <p><small>Dịch vụ:<i>
                           <a class="tw-text-red-600" href="//random-account-blox-fruits"></a>
                            
                        </i></small></p>
                </div>
            </a>
        </div>
        <?php }?>
<?php 
    require_once("../../public/client/Footer.php");
?>