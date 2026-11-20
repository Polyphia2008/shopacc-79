<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA CATEGORY CÀY THUÊ | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `giftcode` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['LuuGiftCode']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $CMSNAV->update("giftcode", array(
        'code'        => check_string($_POST['code']),
        'dieukien'    => check_string($_POST['dieukien']),
        'soluong'     => check_string($_POST['soluong']),
        'sovatpham'   => check_string($_POST['sovatpham']),
        'loai'        => check_string($_POST['loai'])
    ), " `id` = '".check_string($row['id'])."' ");
    admin_msg_success("Lưu thành công", '', 500);
}

?>
                       <div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Gift Code
            </h1>
            <nav>
                <ol class="breadcrumb mb-0"></ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Chỉnh sửa Gift Code</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mã GiftCode</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="code" value="<?=$row['code'];?>" class="form-control" placeholder="Nhập giftcode cần tạo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Điều Kiện Tổng Nạp Để Sử Dụng GiftCode</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="dieukien" value="<?=$row['dieukien'];?>" class="form-control" placeholder="Nhập điều kiện tổng nạp để sử dụng giftcode" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số Lượng Sử Dụng GiftCode</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="soluong" value="<?=$row['soluong'];?>" class="form-control" placeholder="Số lượng sử dụng cho mã giftcode" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số Lượng Vật Phẩm Nhận Được (Vd: Muốn Khách Nhận Được 50 Robux Thì Nhập 50)</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="sovatpham" value="<?=$row['sovatpham'];?>" class="form-control" placeholder="Số lượng vật phẩm nhận được" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Loại Vật Phẩm Nhận Được</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="loai" required>
                                        <option value="<?=$row['loai'];?>"><?=$row['loai'];?></option>
                                        <option value="robux">robux</option>
                                        <option value="money">money</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="LuuGiftCode" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                            <a type="button" href="<?=BASE_URL('public/admin/GiftCode.php');?>"
                                class="btn btn-danger btn-block waves-effect">
                                <span>TRỞ LẠI</span>
                            </a>
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