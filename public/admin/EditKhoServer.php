<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA TÀI KHOẢN | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
?>
<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `khoserver` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}
if(isset($_POST['LuuKhoServer']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $CMSNAV->update("khoserver", array(
        'PlayerName' => check_string($_POST['PlayerName']),
        'Cookie' => check_string($_POST['Cookie']),
        'XSS' => check_string($_POST['XSS']),
        'Status' => check_string($_POST['Status'])
    ), " `id` = '".$row['id']."' ");
    admin_msg_success("Lưu thành công", '', 500);
}
?>



<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa tài khoản</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CHỈNH SỬA TÀI NGUYÊN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                         <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">PlayerName</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="PlayerName" value="<?=$row['PlayerName'];?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Cookie</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="Cookie" class="form-control"><?=$row['Cookie'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">XSS</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="XSS" class="form-control"><?=$row['XSS'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="Status" required>
                                        <option <?=$row['XSS'] == 0 ? "selected" : '';?> value="0">0</option>
                                        <option <?=$row['XSS'] == 1 ? "selected" : '';?>value="1">1</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="LuuKhoServer" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                            <a type="button" href="<?=BASE_URL('public/admin/khoserver.php');?>" class="btn btn-danger btn-block">
                                <span>QUAY LẠI</span></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>


<?php 
    require_once(__DIR__."/Footer.php");
?>