<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA GIỜ SALE | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `giosale` WHERE `id` = '".check_string($_GET['id'])."'  ");
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
    $CMSNAV->update("giosale", array(
        'gio' => check_string($_POST['gio']),
        'status' => check_string($_POST['status']),      
    ), " `id` = '".check_string($row['id'])."' ");

    admin_msg_success("Lưu thành công", '', 500);
    // Bạn có thể thêm redirect sau khi lưu thành công
    // header("Location: sale.php"); exit;
}
?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Giờ Sale
            </h1>
            <nav>
                <ol class="breadcrumb mb-0"></ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Chỉnh sửa Giờ Sale</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-label row">
                                    <label class="col-sm-3 col-form-label">Giờ Sale</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="text" name="gio" id="gio" value="<?=htmlspecialchars($row['gio']);?>" class="form-control" required>                                 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-label row">
                                    <label class="col-sm-3 col-form-label">ON/OFF</label>
                                    <div class="col-sm-9">
                                        <select class="form-control show-tick" name="status" required>
                                            <option <?= $row['status'] == 'ON' ? 'selected' : '';?> value="ON">ON</option>
                                            <option <?= $row['status'] == 'OFF' ? 'selected' : '';?> value="OFF">OFF</option>
                                        </select>                                         
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <button type="submit" name="LuuVoucher" class="btn btn-danger">LƯU NGAY</button>
                                <a class="btn btn-secondary" href="<?=BASE_URL('public/admin/sale.php/');?>">QUAY LẠI</a>
                            </div>
                        </form>
                    </div>
                </div>
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