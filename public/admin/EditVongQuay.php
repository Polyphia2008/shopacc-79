<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'EDIT VÒNG QUAY | ' . $CMSNAV->site('tenweb');
require_once(__DIR__ . "/Header.php");
require_once(__DIR__ . "/Sidebar.php");
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `mini_game` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}
if (isset($_POST['LuuVongQuay']) && $getUser['level'] == 'admin') {
    if ($CMSNAV->site('status_demo') == 'ON') {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
    $rand2 = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
    if (check_img('img') == true) {
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/cmsnav" . $rand . ".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir . $url_img);
    }
    if (check_img('thumb') == true) {
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['thumb']['tmp_name'];
        $url_thumb = "/cmsnav" . $rand2 . ".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir . $url_thumb);
    }
    // tạo slug từ tên mới khi sửa
$slug = to_slug($_POST['tenvongquay']);

$sql = $CMSNAV->update("mini_game", array(
    'name'   => check_string($_POST['tenvongquay']),
    'slug'   => $slug,   // <--- thêm dòng này
    'price'  => check_string($_POST['price']),
    'sudung' => 0,
    'thumb'  => $_POST['thumb'],
    'image'  => $_POST['image'],
    'status' => check_string($_POST['status']),
    'time'   => time()
), " `id` = '".$row['id']."' ");
    if ($sql) {
        $item = 'text_';
                $kimcuong = 'kimcuong_';
                $tyle = 'tyle_';
        for($i=1;$i<=8;$i++) {
            $data[] = array(
                'text' => $_POST[$item.$i],
                'kimcuong' => $_POST[$kimcuong.$i],
                'tyle' => $_POST[$tyle.$i]
            );
        }

        $CMSNAV->update("mini_game_gift", array(
            'item_1' => json_encode($data[0]),
            'item_2' => json_encode($data[1]),
            'item_3' => json_encode($data[2]),
            'item_4' => json_encode($data[3]),
            'item_5' => json_encode($data[4]),
            'item_6' => json_encode($data[5]),
            'item_7' => json_encode($data[6]),
            'item_8' => json_encode($data[7])
        ), " `id_vongquay` = '".check_string($row['id'])."' ");
        admin_msg_success("Lưu vòng quay thành công!", '', 1000);
    } else {
        admin_msg_error("Lỗi truy vấn!", '', 500);
    }
}
?>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i>Edit Minigame
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
                           EDIT VÒNG QUAY
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tên vòng quay</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tenvongquay" class="form-control" placeholder="Nhập tên vòng quay" value="<?=$row['name'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Giá tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="price" class="form-control" placeholder="Nhập giá tiền"  value="<?=$row['price'];?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh thumb</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="thumb" class="form-control" placeholder="Ảnh thumb" value="<?=$row['thumb'];?>" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh vòng quay</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="image" class="form-control" placeholder="Ảnh mô tả"value="<?=$row['image'];?>"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status" required>
                                        <option value="<?=$row['status'];?>">
                                            <?php if($row['status'] == 'true') { echo 'HIỂN THỊ'; } else { echo 'ẨN'; }?>
                                        </option>
                                        <option value="true">HIỂN THỊ</option>
                                        <option value="false">ẨN</option>
                                    </select>
                                </div>
                            </div>
<?php
$rows = $CMSNAV->get_row(" SELECT * FROM `mini_game_gift` WHERE `id_vongquay` = '".check_string($_GET['id'])."'  ");
$item = 'item_';
for($x=1;$x<=8;$x++) {
$items = $rows[$item.$x];

$json = json_decode($items, true);
 ?>
                                <div class="card-body">
                                    <b>Thông tin phần quà số <?php echo $x; ?></b>
                                    <hr>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" id="text_<?php echo $x; ?>" name="text_<?php echo $x; ?>" class="form-control" placeholder="Text Hiện Khi Quay Trúng" value="<?php echo $json['text'];?>" >
                                        </div>
                                        <div class="col-4">
                                            <input type="number" id="kimcuong_<?php echo $x; ?>" name="kimcuong_<?php echo $x; ?>" min="0" class="form-control" placeholder="Kim Cương Trúng" value="<?php echo $json['kimcuong'];?>" >
                                        </div>
                                        <div class="col-4">
                                            <input type="number" id="tyle_<?php echo $x; ?>" name="tyle_<?php echo $x; ?>" min="0" max="100" class="form-control" placeholder="Tỷ Lệ Trúng(%)" value="<?php echo $json['tyle'];?>" >
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <button type="submit" name="LuuVongQuay" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php
if (isset($_POST['Remove']) && $getUser['level'] == 'admin') {
    $CMSNAV->remove('mini_game', " `id` = '" . $_POST['id_vq'] . "' ");
    echo admin_msg_success('Xóa thành công!', '', 500);
}
?>
<?php
require_once(__DIR__ . "/Footer.php");
?>