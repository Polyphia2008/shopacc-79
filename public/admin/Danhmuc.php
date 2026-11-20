<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ CHUYÊN MỤC | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_POST['ThemChuyenMuc']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
    if(check_img('img') == true)
    {
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/danh_muc_tai_khoan_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
    }
    $CMSNAV->insert("danh_muc_tai_khoan", array(
        
        'noidung'   => check_string($_POST['chitiet']),
        'name'     => check_string($_POST['title']),
       'danhmuc'     => check_string($_POST['danhmuc']),
        'status'   => check_string($_POST['display'])
    ));
    admin_msg_success("Thêm thành công", '', 500);
}
if(isset($_POST['LuuChuyenMuc']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    if(check_img('img') == true)
    {
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/danh_muc_tai_khoan_".$rand.".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
        $CMSNAV->update("danh_muc_tai_khoan", array(
            'img'       => '/assets/storage/images'.$url_img
        ), " `id` = '".check_string($_POST['id'])."' ");
    }
   $CMSNAV->insert("danh_muc_tai_khoan", array(
       
        'noidung'   => check_string($_POST['chitiet']),
        'name'     => check_string($_POST['title']),
        'danhmuc'     => check_string($_POST['danhmuc']),
        'status'   => check_string($_POST['display'])
    ));
    admin_msg_success("Thêm thành công", '', 500);
} else {
    echo "Lỗi: Không thể thêm dữ liệu.";
}
?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Danh mục
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
                           Thêm danh mục 
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Danh Mục</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="danhmuc" required>
                                        <option value="account">Tài Khoản</option>
                                        <option value="dichvu">Dịch vụ</option>
                                        <option value="vatpham">Vật Phẩm</option>
                                        <option value="robux">Robux</option>
                    
                                    </select>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên danh mục</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="display" required>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                           
                            <button type="submit" name="ThemChuyenMuc" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>

             <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Danh sách danh mục 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>TÊN DANH MỤC</th>
                                        
                                        
                                        <th>TRẠNG THÁI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `danh_muc_tai_khoan` ORDER BY id DESC ") as $row){ ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['name'];?></td>
                                        
                                        
                                        <td><?=$row['status'];?></td>
                                        <td>
                                           

                                            <a class="btn btn-primary"
                                                href="<?=BASE_URL('Admin/Danhmuc/Edit/');?><?=$row['id'];?>"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span></a>


                                            <button class="btn btn-danger delete" data-id="<?=$row['id'];?>"
                                                data-name="<?=$row['title'];?>"><i class="fas fa-trash"></i>
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



<script type="text/javascript">
$('.btnEdit').on('click', function(e) {
    var btn = $(this);
    $("#title").val(btn.attr("data-title"));
    $("#display").val(btn.attr("data-display"));
    $("#id").val(btn.attr("data-id"));
    $("#staticBackdrop").modal();
    return false;
});
</script>
<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
    $("#datatable1").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
    $("#datatable2").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
});
</script>


<script type="text/javascript">
$(".delete").on("click", function() {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Xóa Nhóm",
        message: "Bạn có chắc chắn xóa nhóm (" + $(this).data('name') + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("assets/ajaxs/admin/delete-category.php");?>",
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