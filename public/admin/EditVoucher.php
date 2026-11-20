<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA MÃ GIẢM GIÁ | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `magiamgia` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['LuuVoucher']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $CMSNAV->update("magiamgia", array(
        'code' => check_string($_POST['code']),
        'solan' => check_string($_POST['solan']),
        'giam' => check_string($_POST['giam']),
        'dichvu' => check_string($_POST['dichvu'])
    ), " `id` = '".check_string($row['id'])."' ");
    admin_msg_success("Lưu thành công", '', 500);
}

?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Mã giảm giá
            </h1>
        
                <nav>
                    <ol class="breadcrumb mb-0">
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Chỉn sửa mã giảm giá
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Mã giảm giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="code" id="code" value="<?=$row['code'];?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Số lần sử dụng</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="solan" id="solan" value="<?=$row['solan'];?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">% Giảm giá </label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="giam" id="giam" value="<?=$row['giam'];?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Dịch vụ</label>
                                <div class="col-sm-9">
                                        <select class="form-control show-tick" id="dichvu" name="dichvu" required>
                                            <option <?=$row['dichvu'] == 'caythue' ? 'selected' : '';?> value="caythue">Cày Thuê</option>
                                            <option <?=$row['dichvu'] == 'robux' ? 'selected' : '';?> value="robux">Robux</option>
                                            <option <?=$row['dichvu'] == 'gamepass' ? 'selected' : '';?> value="gamepass">GamePass</option>
                                            <option <?=$row['dichvu'] == 'muaacc' ? 'selected' : '';?> value="muaacc">Tài Khoản|Mua Acc</option>
                                        </select>
                                    </div>
                                </div>
                            
                            <div class="footer">
                                <button type="submit" name="LuuVoucher" class="btn btn-danger">LƯU NGAY</button>
                                <a type="button" class="btn btn-secondary"
                                    href="<?=BASE_URL('public/admin/Voucher.php/');?>">QUAY LẠI</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>




<?php 
    require_once(__DIR__."/Footer.php");
?>