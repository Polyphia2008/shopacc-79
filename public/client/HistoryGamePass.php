<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'LỊCH SỬ | '.$CMSNAV->site('tenweb');
require_once("../../public/client/Header.php");
require_once("../../public/client/Nav.php");
require_once("../../public/client/Sidebar.php");

$orders = $CMSNAV->get_list("SELECT * FROM `orders_gamepass` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC");
?>
<style>
.custom-table {
    border-collapse: collapse;
    overflow-x: auto;
}

.custom-table th, 
.custom-table td {
    padding: 8px 12px;
    border: 0.5px solid #2C3930;
    font-size: 15px;
}

.custom-table thead {
    background-color: #577BC1;
    color: #111827;
    font-weight: bold;
}

.custom-table tbody tr:hover {
    background-color: #09122C;
    color: white;
}

</style>
<div class="c-ml-16 c-ml-lg-0 c-history-right">
    <div class="c-history-right-body brs-12 c-p-16">
        <div class="c-history-title c-pb-16 media-web">
            <h3 class="fw-700 fz-20">Lịch sử vật phẩm</h3>
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
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

<div class="history-content c-pt-16 mr-n2"><div class="text-title-bold fw-500 c-mb-12">Tháng  <?=date('m')?></div>
 
<ul class="trans-list">
    <?php $i=0; foreach ($orders as $row): $i++; ?>

                        <li class="trans-item" data-money="<?= number_format($row['money']); ?>" data-dichvu="<?=$row['dichvu'];?>" data-tk="<?=$row['tk'];?>" data-mk="<?=$row['mk'];?>" data-status="<?=$row['status'];?>" data-reason="<?=$row['reason'];?>" data-ghichu="<?=$row['ghichu'];?>" data-createdate="<?=$row['createdate'];?>">
                <a href="javascript:void(0);">
                    <div class="text-left">
                        <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                            <?=$row['tk'];?> <br> <?=$row['mk'];?>
                        </span>
                        <span class="t-body-1 link-color">
                            <?=$row['createdate'];?>                        </span>
                    </div>
                    <div class="text-right">
                        <span class="fw-500 d-block c-mb-0">
                          Giá :<?= number_format($row['money']); ?>đ
                        </span>
                        <span class="invalid-color c-mb-0"><span class="badge"><?=status($row['status']);?></span></span>
                    </div>
                </a>
            </li>
                   <?php endforeach?>
            </ul>
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-customs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Lịch sử cày thuê</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   
                </button>
            </div>
            <div class="modal-body">
                <div id="ndvmedia">
                    <!-- Get id -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->
<!--Code thuộc bản quyền ndv media và website dichvubox.vn-->

<script>
    document.querySelectorAll('.trans-item').forEach(item => {
        item.addEventListener('click', function() {
            var dichvu = this.getAttribute('data-dichvu');
            var tk = this.getAttribute('data-tk');
            var mk = this.getAttribute('data-mk');
            var money = this.getAttribute('data-money');
            var ghichu = this.getAttribute('data-ghichu');
            var reason = this.getAttribute('data-reason');
            var createdate = this.getAttribute('data-createdate');
            
            
            document.getElementById('ndvmedia').innerHTML = `
                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Dịch vụ:</p>
                    <div class="fw-500 fz-13">${dichvu} </div>
                </div>
                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Tài Khoản:</p>
                    <div class="fw-500 fz-13">${tk} </div>
                </div>
                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Mật khẩu:</p>
                    <div class="fw-500 fz-13">${mk} </div>
                </div>
                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Giá:</p>
                    <div class="fw-500 fz-13">${money} </div>
                </div>
                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Ghi chú:</p>
                    <div class="fw-500 fz-13">${ghichu} </div>
                </div>
                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Thông báo admin:</p>
                    <div class="fw-500 fz-13">${reason} </div>
                </div>
                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Trạng thái</p>
                    <div class="fw-500 fz-13">${status} </div>
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
        
        
        
        
        
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        "paging": true,       // Phân trang
        "searching": true,    // Cho phép tìm kiếm
        "ordering": true,     // Sắp xếp cột
        "info": true,         // Hiển thị thông tin tổng số dòng
        "lengthMenu": [5, 25, 50, 100] // Tùy chọn số dòng hiển thị
    });
});

</script>
<?php require_once("../../public/client/Footer.php"); ?>

