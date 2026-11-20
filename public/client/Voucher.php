<?php
        require_once("../../config/config.php");
        require_once("../../config/function.php");
        $title = 'MÃ GIẢM GIÁ | '.$CMSNAV->site('tenweb');
        require_once("../../public/client/Header.php");
        require_once("../../public/client/Nav.php");
?>


<?php require_once("../../public/client/Sidebar.php");?>

                            <!-- MÃ GIẢM GIÁ -->
      <div class="c-ml-16 c-ml-lg-0 c-history-right">

                    <div class="c-history-right-body brs-12 brs-lg-0 c-p-16">
                        <div class="c-history-title c-pb-16 c-pb-lg-12 media-web">
                            <h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">VOUCHER KHUYẾN MÃI</h3>
                            <span class="reload-page" onclick="window.location.reload()"><i class="fas fa-redo"></i>Làm mới</span>
                        </div>
  <div class="justify-content-between align-items-center c-pt-16 c-pb-16 c-mb-12 d-none d-lg-flex">
<form action="" class="form-search history">
<input type="search" placeholder="Tìm kiếm" name="serial" class=" has-submit">
<button type="submit"></button>
</form>
<div class="value-filter">
<div class="show-modal-filter noselect" data-toggle="modal" data-target="#modal-filter">Bộ lọc</div>
</div>
</div>
<div class="tags d-none d-lg-flex justify-content-end" id="params-filter"></div>
<div class="justify-content-between align-items-center c-pt-lg-16 c-pb-16 c-mb-16 d-flex d-lg-none">
<form action="" class="form-search history">
<input type="search" placeholder="Tìm kiếm" name="serial" class="search">
<button type="submit"></button>
</form>
<div class="value-filter c-ml-16">
<button type="button" class="filter-history open-sheet" data-target="#sheet-filter" data-notify="0"></button>
</div>
</div>
<div class="mr-n1 pb-3">


<div class="history-content c-pt-16 mr-n2"><div class="text-title-bold fw-500 c-mb-12">Tháng  <?=date('m')?></div>
 
<ul class="trans-list">
    <?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `magiamgia` ORDER BY id DESC ") as $row){ ?>

                        <li class="trans-item">
                <a href="javascript:void(0);">
                    <div class="text-left">
                       <span class="t-body-2 title-color c-mb-0   bread-word">
                            <?=$row['code'];?></br> Số Lần Sử Dụng Còn Lại: <?=$row['solan'];?>
                        </span>
                        <span class="t-body-1 link-color">
                            Được Giảm :<?=$row['giam'];?>   %                     </span>
                    </div>
                    <div class="text-right">
                        <span class="fw-500 d-block c-mb-0">
                          <?=displayvoucher($row['dichvu']);?>
                        </span>
                        <span class="invalid-color c-mb-0"><span class="badge"><?=$i++;?></span></span>
                    </div>
                </a>
            </li>
                   <?php }?> 
            </ul>
</div>
</div>
</div>
</div>                                                          
                            
                            
          
    
<?php 
    require_once("../../public/client/Footer.php");
?>
