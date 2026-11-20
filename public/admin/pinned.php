<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'Chỉnh Sửa Ô | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_POST['ThemVoucher']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $CMSNAV->insert("boxtype", array(
        'id' => check_string($_POST['id']),
        'link' => check_string($_POST['link']),
        'image_url' => check_string($_POST['image_url']),
        'description' => check_string($_POST['description'])
    ));
    admin_msg_success("Thêm thành công", '', 500);
}

?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Thêm Ô
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
                           Thêm Dánh Sách Ghim
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Link Chuyển Tiếp</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="link" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Link Ảnh Ô</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="image_url" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Nội Dung</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="description" class="form-control" required>
                                    </div>
                                </div>
                            </div>                          
                            <button type="submit" name="ThemVoucher" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Danh sách Ghim
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Link</th>
                                        <th>Link Ảnh</th>
                                        <th>Nội Dung</th>                                       
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `boxtype` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['link'];?></td>
                                        <td><?=$row['image_url'];?></td>
                                        <td><?=$row['description'];?></td>                                      
                                        <td>
                                            <a class="btn btn-primary" href="<?=BASE_URL('public/admin/Editboxtype.php?id=');?><?=$row['id'];?>"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span></a>
                                            <button class="btn btn-danger delete" data-id="<?=$row['id'];?>"                                              
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
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



 
<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable1").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
    $("#datatable2").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
<script type="text/javascript">
$(".delete").on("click", function() {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Xóa Chuyên Mục",
        message: "Bạn có chắc chắn xóa chuyên mục (" + $(this).data('name') + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("assets/ajaxs/admin/delete-boxtype.php");?>",
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


<?php 
    require_once(__DIR__."/Footer.php");
?>