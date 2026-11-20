<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA Ô | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `boxtype` WHERE `id` = '".check_string($_GET['id'])."'  ");
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
    $CMSNAV->update("boxtype", array(
        'link' => check_string($_POST['link']),
        'image_url' => check_string($_POST['image_url']),
        'description' => check_string($_POST['description'])     
    ), " `id` = '".check_string($row['id'])."' ");

    admin_msg_success("Lưu thành công", '', 500);
    // Bạn có thể thêm redirect sau khi lưu thành công
    // header("Location: sale.php"); exit;
}
?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Chỉnh Sửa Ô
            </h1>
            <nav>
                <ol class="breadcrumb mb-0"></ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Chỉnh sửa Ô</div>
                    </div>                  
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-label row">
                                    <label class="col-sm-3 col-form-label">Link Chuyển Tiếp</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="text" name="link" id="link" value="<?=htmlspecialchars($row['link']);?>" class="form-control" required>                                 
                                        </div>
                                    </div>
                                </div>                              
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-label row">
                                    <label class="col-sm-3 col-form-label">Link Ảnh</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="text" name="image_url" id="image_url" value="<?=htmlspecialchars($row['image_url']);?>" class="form-control" required>                                 
                                        </div>
                                    </div>
                                </div>                              
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-label row">
                                    <label class="col-sm-3 col-form-label">Nội Dung</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="text" name="description" id="description" value="<?=htmlspecialchars($row['description']);?>" class="form-control" required>                                 
                                        </div>
                                    </div>
                                </div>                             
                          <div class="footer">
                                <button type="submit" name="LuuVoucher" class="btn btn-danger">LƯU NGAY</button>
                                <a class="btn btn-secondary" href="<?=BASE_URL('public/admin/boxtype.php/');?>">QUAY LẠI</a>
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