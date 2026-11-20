<?php
    require_once(__DIR__."/../../config/config.php");
    require_once(__DIR__."/../../config/function.php");
    require_once(__DIR__."/../../includes/login-admin.php");
    $title = 'CHỈNH SỬA BÀI VIẾT | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");

?>
<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `blogs` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Bài viết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['btnSave']) && $getUser['level'] == 'admin')
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $title = check_string($_POST['title']);
    $content = $_POST['content'];
    $display = check_string($_POST['display']);
    $random_code = rand(0,1000);
    if(check_img('img') == true)
    {
        $uploads_dir = '../../assets/storage/images/';
        $tmp_name = $_FILES['img']['tmp_name'];
        $create = move_uploaded_file($tmp_name, $uploads_dir."/".$title."_".$random_code.".png");
        $CMSNAV->update("blogs", [
            'img'       => BASE_URL('assets/storage/images/'.$title."_".$random_code.".png")
        ], " `id` = '".$row['id']."' ");
    }
    $CMSNAV->update("blogs", [
        'title'     => $title,
        'content'   => $content,
        'display'   => $display
    ], " `id` = '".$row['id']."' ");
    admin_msg_success("Lưu bài viết thành công !", "", 1000);
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
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tiêu đề bài viết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" value="<?=$row['title'];?>"
                                            placeholder="Nhập tiêu đề bài viết" class="form-control" require>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input class="form-control" type="file" value="<?=$row['img'];?>" name="img"
                                            multiple require>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Nội dung bài viết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="content"><?=$row['content'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="display" required>
                                        <option value="<?=$row['display'];?>"><?=$row['display'];?></option>
                                        <option value="SHOW">SHOW</option>
                                        <option value="HIDE">HIDE</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="btnSave" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                            <a type="button" href="<?=BASE_URL('Admin/Blogs');?>"
                                class="btn btn-danger btn-block waves-effect">
                                <span>TRỞ LẠI</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
           


<script>
CKEDITOR.replace("content");
</script>
<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>






<?php 
    require_once("../../public/admin/Footer.php");
?>