<?php
    require_once(__DIR__."/../../config/config.php");
    require_once(__DIR__."/../../config/function.php");
    require_once(__DIR__."/../../includes/login-admin.php");
    $title = 'Hướng Dẫn | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
?>
<?php
if(isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin')
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value)
    {
        $CMSNAV->update("options", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    admin_msg_success('Lưu thành công', '', 500);
}
?>
<?php
if(isset($_POST['btnCreate']) && $getUser['level'] == 'admin')
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
    }
    $CMSNAV->insert("blogs", [
        'title'     => $title,
        'content'   => $content,
        'display'   => $display,
        'img'       => BASE_URL('assets/storage/images/'.$title."_".$random_code.".png"),
        'view'      => 0,
        'time'      => gettime(),
        'thoigian'  => time()
    ]);
    admin_msg_success("Thêm bài viết thành công !", "", 2000);

}
?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Thêm Tin Tức 
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
                           Thêm Tin Tức 
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tiêu đề bài viết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" placeholder="Nhập tiêu đề bài viết"
                                            class="form-control" require>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input class="form-control" type="file" name="img" multiple require>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Nội dung bài viết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="display" required>
                                        <option value="SHOW">SHOW</option>
                                        <option value="HIDE">HIDE</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="btnCreate" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH BÀI VIẾT</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>TITLE</th>
                                        <th>IMG</th>
                                        <th>THỜI GIAN</th>
                                        <th>HIỂN THỊ</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `blogs` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['title'];?></td>
                                        <td><img src="<?=$row['img'];?>" width="200px"></td>
                                        <td><span class="badge badge-danger"><?=$row['time'];?></span></td>
                                        <td><?=display($row['display']);?></td>
                                        <td><a type="button" href="<?=BASE_URL('Admin/Blog/Edit/');?><?=$row['id'];?>"
                                                class="btn btn-primary"><i class="fas fa-edit"></i>
                                                <span>EDIT</span></a>
                                                <button class="btn btn-danger delete" data-id="<?=$row['id'];?>"
                                                data-name="<?=$row['title'];?>"><i class="fas fa-trash"></i>
                                                <span>DELETE</span></button>
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
CKEDITOR.replace("content");
</script>

<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>
<script>
$(function() {
    $("#datatable").DataTable({
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
                url: "<?=BASE_URL("assets/ajaxs/admin/delete-blogs.php");?>",
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
    require_once("../../public/admin/Footer.php");
?>
