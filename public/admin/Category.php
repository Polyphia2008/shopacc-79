<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ CHUYÊN MỤC | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<!-- CSS của Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JS của Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<?php
if(isset($_POST['ThemChuyenMuc']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
    if(check_img('img') == true) {
    $uploads_dir = '../../assets/storage/images/'; // Thư mục trên server
    $file_name = "categories_" . $rand . ".png";   // Tên file
    $tmp_name = $_FILES['img']['tmp_name'];

    // Move file vào thư mục đúng
    $create = move_uploaded_file($tmp_name, $uploads_dir . $file_name);

    // URL dùng để lưu vào DB / hiển thị
    $url_img = "/assets/storage/images/" . $file_name;
}
    $CMSNAV->insert("groups", array(
          'img'       => $url_img,
        'chitiet'   => base64_encode($_POST['chitiet']),
        'title'     => check_string($_POST['title']),
        'giatiengoc'     => check_string($_POST['giatiengoc']),
        'giamgia'     => check_string($_POST['giamgia']),
        'danhmuc'   => check_string($_POST['danhmuc']),
        'display'   => check_string($_POST['display'])
    ));
    admin_msg_success("Thêm thành công", '', 500);
}
?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Chuyên mục
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
                           Thêm chuyên mục accounts
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Danh Mục</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="danhmuc" required>
                                       <?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `danhmuc` = 'account'  ") as $group) {?>
                                            <option value="<?=$group['id'];?>" class="tw-front-medium "><?=$group['name'];?></option>
                                            <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên chuyên mục</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                           <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="exampleInputFile"
                                                    name="img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <div class="form-label row">
    <label class="col-sm-3 col-form-label">Chi tiết nhóm</label>
    <div class="col-sm-9">
        <div class="form-line">
            <textarea name="chitiet" class="textarea"></textarea>
        </div>
    </div>
</div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="display" required>
                                        <option value="SHOW">SHOW</option>
                                        <option value="HIDE">HIDE</option>
                                    </select>
                                </div>
                            </div>
                             
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giá Tiền Chưa Giảm Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="giatiengoc" 
                                        placeholder="Nhập Giá Tiền"
                                        class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giá Tiền Giảm Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="giamgia" 
                                        placeholder="Nhập Giá Tiền"
                                        class="form-control" required>
                                    </div> 
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
                           Danh sách chuyên mục 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ẢNH</th>
                                        <th>TÊN CHUYÊN MỤC</th>
                                        <th>TÀI KHOẢN</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `groups` WHERE `view` IS NULL ORDER BY id DESC ") as $row){ ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td width="10%"><img width="100%" src="<?=$row['img'];?>" /></td>
                                        <td><?=$row['title'];?></td>
                                        <td><?=format_cash($CMSNAV->num_rows(" SELECT * FROM `accounts` WHERE `groups` = '".$row['id']."' "));?></td>
                                        <td><?=display($row['display']);?></td>
                                        <td>
                                            <a type="button" href="<?=BASE_URL('Admin/Accounts/');?><?=$row['id'];?>"
                                                class="btn btn-info"><i class="fas fa-file-medical"></i>
                                                <span>DANH SÁCH ACCOUNT</span></a>

                                            <a class="btn btn-primary"
                                                href="<?=BASE_URL('Admin/Group/Edit/');?><?=$row['id'];?>"><i
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
<script>

CKEDITOR.replace("chitiet");
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
                url: "<?=BASE_URL("assets/ajaxs/admin/delete-group.php");?>",
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