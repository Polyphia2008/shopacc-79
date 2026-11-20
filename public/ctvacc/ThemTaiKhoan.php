<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once(__DIR__."/../../includes/login-ctvacc.php");
    $title = 'THÊM TÀI KHOẢN | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_POST['ThemTaiKhoan']) && $getUser['ctvacc'] == 1 && isset($_GET['group']))
{

   
    $listimg = '';
   
   
    $listacc = explode(PHP_EOL, check_string($_POST['listacc']));
    foreach($listacc as $data)
    {
        $CMSNAV->insert("accounts", array(
         'img'       => check_string($_POST['img']),
        'chitiet'       => check_string($_POST['chitiet']),
        'listimg'       => check_string($_POST['listimg']),
        'account'       => check_string($_POST['listacc']),
        'groups'        => check_string($_GET['group']),
        'money'         => check_string($_POST['money']),
        'createdate'    => gettime(),
        'receiver'      => $getUser['username']
        ));
    }
    
    admin_msg_success("Thêm tài khoản thành công", '', 500);
}
?>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>THÊM TÀI KHOẢN</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">CHỌN NHÓM TÀI KHOẢN</h3>
                       
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ẢNH</th>
                                        <th>TÊN NHÓM</th>
                                        <th>TÀI KHOẢN CỦA BẠN</th>
                                        <th>HIỂN THỊ</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($CMSNAV->get_list("SELECT * FROM `groups` WHERE `display` = 'SHOW' ") as $row) { ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td width="10%"><img width="100%" src="<?=($row['img']);?>" /></td>
                                        <td><?=$row['title'];?></td>
                                        <td><?=format_cash($CMSNAV->num_rows(" SELECT * FROM `accounts` WHERE `groups` = '".$row['id']."' AND `receiver` = '".$getUser['username']."' "));?>
                                        </td>
                                        <td><?=display($row['display']);?></td>
                                        <td>
                                            <a type="button"
                                                href="<?=BASE_URL('public/ctvacc/ThemTaiKhoan.php?group=');?><?=$row['id'];?>"
                                                class="btn btn-info"><i class="fas fa-file-medical"></i>
                                                <span>THÊM TÀI KHOẢN</span></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
            <?php if(isset($_GET['group'])) { ?>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title text-uppercase">THÊM TÀI KHOẢN</h3>
                       
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="img" placeholder="nhập Link ảnh" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">List tài khoản</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea rows="5" name="listacc"
                                            placeholder="Định dạng: Tài khoản | Mật khẩu (1 dòng 1 nick nếu cần nhập nhiều nick 1 lần)"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Chi tiết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="chitiet" rows="5" class="form-control" placeholder="Quân Huy:306
Tướng:20
Skin:30"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">List ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="listimg" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giá bán</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="money" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="ThemTaiKhoan" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH TÀI KHOẢN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ẢNH</th>
                                        <th>TÀI KHOẢN</th>
                                        <th>THỜI GIAN ĐĂNG</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `accounts` WHERE `groups` = '".check_string($_GET['group'])."' AND `receiver` = '".$getUser['username']."'  ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td width="5%">#<?=$row['id'];?></td>
                                        <td width="8%"><img width="100%" src="<?=($row['img']);?>" /></td>
                                        <td><?=explode("|", $row['account'])[0];?></td>
                                        <td><?=$row['createdate'];?></td>
                                        <td><?=$row['username'] != NULL ? '<b style="color:red;">Đã bán</b>' : '<b style="color:green;">Đang bán</b>';?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="<?=BASE_URL('public/ctvacc/EditAccount.php?id='.$row['id']);?>"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span></a>

                                            <button class="btn btn-danger delete" type="button" data-id="<?=$row['id'];?>"
                                                data-name="<?=$row['account'];?>"><i class="fas fa-trash"></i>
                                                <span>DELETE</span></button>


                                    
            
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>


        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

 </div>
                </div>
                 </div>
                </div>

<script type="text/javascript">
$(".delete").on("click", function() {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Tài Khoản",
        message: "Bạn có chắc chắn xóa tài khoản (" + $(this).data('name') + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("assets/ajaxs/ctv/delete-account.php");?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: $(this).data('id')
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.msg,
                            timer: 3000
                        });
                        location.reload();
                    } else {
                        cuteAlert({
                            type: "error",
                            title: "Error",
                            message: respone.msg,
                            buttonText: "Okay"
                        });
                    }
                },
                error: function() {
                    alert(html(response));
                    location.reload();
                }
            });
        }
    })
});
</script>
<script>
$(function() {
    $("#datatable1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
<?php 
    require_once(__DIR__."/Footer.php");
?>
