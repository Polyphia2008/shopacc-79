<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA NHÓM | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `groups` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}


if(isset($_POST['LuuChuyenMuc']) && $getUser['level'] == 'admin' )
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
    $CMSNAV->update("groups", array(
       'img'       => $url_img,
        'title'     => check_string($_POST['title']),
        'chitiet'   => base64_encode($_POST['chitiet']),
         'giatiengoc'     => check_string($_POST['giatiengoc']),
        'giamgia'     => check_string($_POST['giamgia']),
        'display'   => check_string($_POST['display'])
    ), " `id` = '".$row['id']."' ");
    admin_msg_success("Lưu thành công", '', 500);
}

?>

 <div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Chỉnh sửa nhóm <?=$row['title'];?>
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
                       Chỉnh Sửa
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên nhóm</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" value="<?=$row['title'];?>" class="form-control"
                                            required>
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
                                                    name="img" value="<?=$row['img'];?>">
                                            </div>
                                        </div>
                                        <?php
            if(!empty($row['img'])) {
                echo '<div style="margin-top:10px;">';
                echo '<img src="'.BASE_URL($row['img']).'" style="max-width:150px; max-height:100px; border:1px solid #ddd; padding:2px;">';
                echo '</div>';
            }
            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Chi tiết nhóm</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="chitiet" class="textarea"><?=base64_decode($row['chitiet']);?></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="display" required>
                                        <option value="<?=$row['display'];?>"><?=$row['display'];?></option>
                                        <option value="SHOW">SHOW</option>
                                        <option value="HIDE">HIDE</option>
                                    </select>
                                </div>
                            </div>
                                                        <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giá Tiền Chưa Giảm Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="giatiengoc" value="<?=$row['giatiengoc'];?>" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                                                        <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giá Tiền Giảm Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="giamgia" value="<?=$row['giamgia'];?>" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="LuuChuyenMuc" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                            <a type="button" href="<?=BASE_URL('Admin/Groups/'.$row['category']);?>"
                                class="btn btn-danger btn-block waves-effect">
                                <span>TRỞ LẠI</span>
                            </a>
                        </form>
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






<?php 
    require_once(__DIR__."/Footer.php");
?>