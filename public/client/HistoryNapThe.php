<?php
        require_once("../../config/config.php");
        require_once("../../config/function.php");
        $title = 'Lịch sử nạp thẻ | '.$CMSNAV->site('tenweb');
        require_once("../../public/client/Header.php");
        require_once("../../public/client/Nav.php");
        $rateRobux = $CMSNAV->get_row(" SELECT `rate` FROM `raterobux`");
?>
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

<?php require_once("../../public/client/Sidebar.php");?>
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

<div class="c-ml-16 c-ml-lg-0 c-history-right">
<div class="c-history-right-body brs-12 brs-lg-0 c-p-16">
<div class="c-history-title c-pb-16 c-pb-lg-12 media-web">
<h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">Lịch sử nạp thẻ</h3>
<span class="reload-page" onclick="window.location.reload()"><i class="fas fa-redo" aria-hidden="true"></i>Làm mới</span>
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
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

<div class="history-content c-pt-16 mr-n2"><div class="text-title-bold fw-500 c-mb-12">Tháng  <?=date('m')?></div>
 
<ul class="trans-list">
    <?php $i = 0; foreach($CMSNAV->get_list("SELECT * FROM `cards` WHERE `username` = '".$getUser['username']."' ") as $cards) { ?> 

                        <li class="trans-item" data-id="9" data-loaithe="<?=$cards['loaithe'];?>" data-menhgia="<?=format_cash($cards['menhgia']);?>" data-thucnhan="<?=$cards['thucnhan'];?>" data-seri="<?=$cards['seri'];?>" data-pin="<?=$cards['pin'];?>" data-createdate="<?=$cards['createdate'];?>">
                <a href="javascript:void(0);">
                    <div class="text-left">
                        <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                            <?=$cards['loaithe'];?> / <?=format_cash($cards['menhgia']);?>đ
                        </span>
                        <span class="t-body-1 link-color">
                            <?=$cards['createdate'];?>                        </span>
                    </div>
                    <div class="text-right">
                        <span class="fw-500 d-block c-mb-0">
                           Nhận <?=$cards['thucnhan'];?>đ
                        </span>
                        <span class="invalid-color c-mb-0"><span class="badge"><?=status($cards['status']);?></span></span>
                    </div>
                </a>
            </li>
                   <?php }?> 
            </ul>
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-customs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Lịch sử nạp thẻ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   
                </button>
            </div>
            <div class="modal-body">
                <div id="CMSNAV">
                    <!-- Get id -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!--Code thuộc bản quyền ndv media và website dichvubox.vn-->


<script>
    document.querySelectorAll('.trans-item').forEach(item => {
        item.addEventListener('click', function() {
            var loaithe = this.getAttribute('data-loaithe');
            var menhgia = this.getAttribute('data-menhgia');
            var thucnhan = this.getAttribute('data-thucnhan');
            var seri = this.getAttribute('data-seri');
            var pin = this.getAttribute('data-pin');
            var createdate = this.getAttribute('data-createdate');
            
            
            document.getElementById('CMSNAV').innerHTML = `
                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Loại Thẻ</p>
                    <div class="fw-500 fz-13">${loaithe} </div>
                </div>
                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Mệnh Giá</p>
                    <div class="fw-500 fz-13">${menhgia} đ</div>
                </div>
                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Thực Nhận</p>
                    <div class="fw-500 fz-13">${thucnhan} đ</div>
                </div>
                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Seri</p>
                    <div class="fw-500 fz-13">${seri} </div>
                </div>
                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Mã Thẻ</p>
                    <div class="fw-500 fz-13">${pin} </div>
                </div>
                   <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Thời Gian</p>
                    <div class="fw-500 fz-13">${createdate}</div>
                </div>

            `;

            $('#transactionModal').modal('show');
        });
    });
</script>
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>

<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

<?php 
    require_once("../../public/client/Footer.php");
?>
