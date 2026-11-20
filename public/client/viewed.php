<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Shop dịch vụ all game giá rẻ, uy tín, tự động. | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>
<div class="layout">
        <div class="content" style="">
                <div class="container c-container c-pt-12">
        <div class="fz-20 fz-lg-16 fw-500 text-color-header">Sản phẩm bạn đã xem</div>
        <div class="get-viewed c-mt-12">
            <div class="loading-wrap load-viewed">
                <span class="modal-loader-spin"></span>
            </div>
        </div>
    </div>
    <input type="hidden" value="0" id="check-type-watched">
   
    <?php 
    require_once("../../public/client/Footer.php");
?>
