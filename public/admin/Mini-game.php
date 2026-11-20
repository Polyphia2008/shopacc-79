<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'QUẢN LÝ VÒNG QUAY | ' . $CMSNAV->site('tenweb');
require_once(__DIR__ . "/Header.php");
require_once(__DIR__ . "/Sidebar.php");

if(isset($_GET['delete']) && $getUser['level'] == 'admin')
{
    $delete = check_string($_GET['delete']);
    $CMSNAV->remove("mini_game", " `id` = '$delete' ");
    admin_msg_success("Xóa thành công", BASE_URL("public/admin/Mini-game.php"), 300);
}

if (isset($_POST['ThemVongQuay']) && $getUser['level'] == 'admin') {
    if ($CMSNAV->site('status_demo') == 'ON') {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
    $rand2 = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
    if (check_img('img') == true) {
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['img']['tmp_name'];
        $url_img = "/vongquay" . $rand . ".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir . $url_img);
    }
    if (check_img('thumb') == true) {
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['thumb']['tmp_name'];
        $url_thumb = "/vongquay" . $rand2 . ".png";
        $create = move_uploaded_file($tmp_name, $uploads_dir . $url_thumb);
    }
    // Tạo slug từ tên vòng quay
$slug = to_slug($_POST['tenvongquay']);

$sql = $CMSNAV->insert('mini_game', array(
    'name'   => check_string($_POST['tenvongquay']),
    'slug'   => $slug, // <--- THÊM DÒNG NÀY
    'price'  => check_string($_POST['price']),
    'sudung' => 0,
    'thumb'  => '/assets/storage/images' . $url_thumb,
    'image'  => '/assets/storage/images' . $url_img,
    'status' => check_string($_POST['status']),
    'time'   => time()
));
    if ($sql) {
        $last_id = $CMSNAV->get_row("SELECT * FROM `mini_game` order by `id` desc limit 1");
        $item = 'text_';
        $kimcuong = 'kimcuong_';
        $tyle = 'tyle_';
        for ($i = 1; $i <= 8; $i++) {
            $data[] = array(
                'text' => $_POST[$item . $i],
                'kimcuong' => $_POST[$kimcuong . $i],
                'tyle' => $_POST[$tyle . $i]
            );
        }
        // INSERT GIFT
        $CMSNAV->insert('mini_game_gift', array(
            'id_vongquay' => $last_id['id'],
            'item_1' => json_encode($data[0]),
            'item_2' => json_encode($data[1]),
            'item_3' => json_encode($data[2]),
            'item_4' => json_encode($data[3]),
            'item_5' => json_encode($data[4]),
            'item_6' => json_encode($data[5]),
            'item_7' => json_encode($data[6]),
            'item_8' => json_encode($data[7])
        ));
        admin_msg_success("Thêm vòng quay thành công!", '', 1000);
    } else {
        admin_msg_error("Lỗi truy vấn!", '', 500);
    }
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
                           THÊM VÒNG QUAY
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên vòng quay</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tenvongquay" class="form-control" placeholder="Nhập tên vòng quay" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giá tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="price" class="form-control" placeholder="Nhập giá tiền" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh thumb</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="exampleInputFile" name="thumb" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" id="exampleInputFile" name="img" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Hiển thị</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status" required>
                                        <option value="true">HIỂN THỊ</option>
                                        <option value="false">ẨN</option>
                                    </select>
                                </div>
                            </div>
                            <?php for ($x = 1; $x <= 8; $x++) { ?>
                                <div class="card-body">
                                    <b>Thông tin phần quà số <?php echo $x; ?></b>
                                    <hr>
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" id="text_<?php echo $x; ?>" name="text_<?php echo $x; ?>" class="form-control" placeholder="Text Hiện Khi Quay Trúng">
                                        </div>
                                        <div class="col-4">
                                            <input type="number" id="kimcuong_<?php echo $x; ?>" name="kimcuong_<?php echo $x; ?>" min="0" class="form-control" placeholder="Robux Trúng" required="">
                                        </div>
                                        <div class="col-4">
                                            <input type="number" id="tyle_<?php echo $x; ?>" name="tyle_<?php echo $x; ?>" min="0" max="100" class="form-control" placeholder="Tỷ Lệ Trúng(%)" required="">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <button type="submit" name="ThemVongQuay" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           DANH SÁCH VÒNG QUAY
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>ẢNH THUMB</th>
                                        <th>ẢNH MÔ TẢ</th>
                                        <th>TÊN</th>
                                        <th>GIÁ TIỀN</th>
                                        <th>SỬ DỤNG</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach ($CMSNAV->get_list(" SELECT * FROM `mini_game` ORDER BY id DESC ") as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td width="10%"><img width="100%" src="<?= $row['thumb']; ?>" /></td>
                                            <td width="10%"><img width="100%" src="<?= $row['image']; ?>" /></td>
                                            <td><?= $row['name']; ?></td>
                                            <td><?= number_format($row['price']); ?></td>
                                            <td><?= number_format($row['sudung']); ?></td>
                                            <td>
                                            <a type="button" href="/Admin/EditVQ/<?=$row['id'];?>" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span></a>
                                            <a type="button"
                                                href="<?=BASE_URL('public/admin/Mini-game.php?delete='.$row['id']);?>"
                                                class="btn btn-danger"><i class="fas fa-trash"></i>
                                                <span>DELETE</span></a>
                                        </td>
                                        </tr>
                                    <?php } ?>
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
<?php
if (isset($_POST['Remove']) && $getUser['level'] == 'admin') {
    $CMSNAV->remove('mini_game', " `id` = '" . $_POST['id_vq'] . "' ");
    echo admin_msg_success('Xóa thành công!', '', 500);
}
?>
<?php
require_once(__DIR__ . "/Footer.php");
?>