<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ CHUYÊN MỤC ROBUX | '.$CMSNAV->site('tenweb');
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
    
    $slug = to_slug($_POST['title']);
    
    $CMSNAV->insert("setting_latthe", array(
        'slug' => $slug, // 🔥 thêm tại đây
        // TỈ LỆ TRÚNG ROBUX
        'item_1' => check_string($_POST['item_1']),
        'item_2' => check_string($_POST['item_2']),
        'item_3' => check_string($_POST['item_3']),
        'item_4' => check_string($_POST['item_4']),
        'item_5' => check_string($_POST['item_5']),
        'item_6' => check_string($_POST['item_6']),
        'item_7' => check_string($_POST['item_7']),
        'item_8' => check_string($_POST['item_8']),
        'item_9' => check_string($_POST['item_9']),
        'item_10' => check_string($_POST['item_10']),
        'item_11' => check_string($_POST['item_11']),
        'item_12' => check_string($_POST['item_12']),
        'item_13' => check_string($_POST['item_13']),
        'item_14' => check_string($_POST['item_14']),
        'giatien' => check_string($_POST['giatien']),
        'title' => check_string($_POST['title']),
        'display' => check_string($_POST['display']),
        // IMG LẬT THẺ
        'imglatthe_1' => check_string($_POST['imglatthe_1']),
        'imglatthe_2' => check_string($_POST['imglatthe_2']),
        'imglatthe_3' => check_string($_POST['imglatthe_3']),
        'imglatthe_4' => check_string($_POST['imglatthe_4']),
        'imglatthe_5' => check_string($_POST['imglatthe_5']),
        'imglatthe_6' => check_string($_POST['imglatthe_6']),
        'imglatthe_7' => check_string($_POST['imglatthe_7']),
        'imglatthe_8' => check_string($_POST['imglatthe_8']),
        'imglatthe_9' => check_string($_POST['imglatthe_9']),
        'imglatthe_10' => check_string($_POST['imglatthe_10']),
        'imglatthe_11' => check_string($_POST['imglatthe_11']),
        'imglatthe_12' => check_string($_POST['imglatthe_12']),
        'imglatthe_13' => check_string($_POST['imglatthe_13']),
        'imglatthe_14' => check_string($_POST['imglatthe_14']),
        'imglatthe_thumb' => check_string($_POST['imglatthe_thumb']),
        'imglatthe_upthe' => check_string($_POST['imglatthe_upthe']),
        'imglatthe_button' => check_string($_POST['imglatthe_button']),
        // TEXT LẬT THẺ
        'textlatthe_1' => check_string($_POST['textlatthe_1']),
        'textlatthe_2' => check_string($_POST['textlatthe_2']),
        'textlatthe_3' => check_string($_POST['textlatthe_3']),
        'textlatthe_4' => check_string($_POST['textlatthe_4']),
        'textlatthe_5' => check_string($_POST['textlatthe_5']),
        'textlatthe_6' => check_string($_POST['textlatthe_6']),
        'textlatthe_7' => check_string($_POST['textlatthe_7']),
        'textlatthe_8' => check_string($_POST['textlatthe_8']),
        'textlatthe_9' => check_string($_POST['textlatthe_9']),
        'textlatthe_10' => check_string($_POST['textlatthe_10']),
        'textlatthe_11' => check_string($_POST['textlatthe_11']),
        'textlatthe_12' => check_string($_POST['textlatthe_12']),
        'textlatthe_13' => check_string($_POST['textlatthe_13']),
        'textlatthe_14' => check_string($_POST['textlatthe_14']),
        // ROBUX TRÚNG KHI LẬT THẺ
        'robuxlatthe_1' => check_string($_POST['robuxlatthe_1']),
        'robuxlatthe_2' => check_string($_POST['robuxlatthe_2']),
        'robuxlatthe_3' => check_string($_POST['robuxlatthe_3']),
        'robuxlatthe_4' => check_string($_POST['robuxlatthe_4']),
        'robuxlatthe_5' => check_string($_POST['robuxlatthe_5']),
        'robuxlatthe_6' => check_string($_POST['robuxlatthe_6']),
        'robuxlatthe_7' => check_string($_POST['robuxlatthe_7']),
        'robuxlatthe_8' => check_string($_POST['robuxlatthe_8']),
        'robuxlatthe_9' => check_string($_POST['robuxlatthe_9']),
        'robuxlatthe_10' => check_string($_POST['robuxlatthe_10']),
        'robuxlatthe_11' => check_string($_POST['robuxlatthe_11']),
        'robuxlatthe_12' => check_string($_POST['robuxlatthe_12']),
        'robuxlatthe_13' => check_string($_POST['robuxlatthe_13']),
        'robuxlatthe_14' => check_string($_POST['robuxlatthe_14']),
    ));
    admin_msg_success("Thêm thành công", '', 500);
}

?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i>Minigame
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
                           THÊM LẬT THẺ HOẶC MỞ RƯƠNG
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên Trò Chơi</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" placeholder="Nhập tên trò chơi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giá tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="giatien" class="form-control" placeholder="Nhập giá tiền" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh Thumb</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="imglatthe_thumb" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh Khi Úp Thẻ</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="imglatthe_upthe" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh Nút Lật Thẻ</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="imglatthe_button" class="form-control">
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
                            <hr>
                            <?php for ($x = 1; $x <= 14; $x++) { ?>
                                <div class="card-body">
                                    <b>Thông tin phần quà số <?php echo $x; ?></b>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3">
                                            <input type="text" name="imglatthe_<?php echo $x; ?>" class="form-control" placeholder="Ảnh Lật Thẻ <?php echo $x; ?>">
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="textlatthe_<?php echo $x; ?>" class="form-control" placeholder="Text Thông Báo Hiện Khi Quay Trúng">
                                        </div>
                                        <div class="col-3">
                                            <input type="number" name="robuxlatthe_<?php echo $x; ?>" min="0" class="form-control" placeholder="Robux Trúng" required="">
                                        </div>
                                        <div class="col-3">
                                            <input type="number" name="item_<?php echo $x; ?>" min="0" max="100" class="form-control" placeholder="Tỷ Lệ Trúng(%)" required="">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            
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
                           Danh sách game
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ẢNH</th>
                                        <th>TÊN GAME</th>
                                        <th>HIỂN THỊ</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `setting_latthe` ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td width="10%"><img width="100%" src="<?=$row['imglatthe_thumb'];?>" /></td>
                                        <td><?=$row['title'];?></td>
                                        <td><?=display($row['display']);?></td>
                                        <td>
                                            <a class="btn btn-primary" href="<?=BASE_URL('public/admin/EditLatThe.php?id=');?><?=$row['id'];?>"><i
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
        title: "Xác Nhận Xóa Chuyên Mục",
        message: "Bạn có chắc chắn xóa chuyên mục (" + $(this).data('name') + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("assets/ajaxs/admin/delete-latthe.php");?>",
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