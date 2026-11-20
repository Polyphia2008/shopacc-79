<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA TÀI KHOẢN | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `accounts` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}
if(isset($_POST['LuuTaiKhoan']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
     $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);

    // Xử lý ảnh mô tả chính
    $url_img = $row['img']; // giữ ảnh cũ nếu không upload mới
    if(check_img('img') == true) {
        $uploads_dir = '../../assets/storage/images/'; 
        $file_name = "Accounts_" . $rand . ".png";
        $tmp_name = $_FILES['img']['tmp_name'];
        move_uploaded_file($tmp_name, $uploads_dir . $file_name);
        $url_img = "/assets/storage/images/" . $file_name;
    }

   $listimg = $row['listimg']; // giữ list ảnh cũ làm cơ sở
if(isset($_FILES['listimg']) && !empty($_FILES['listimg']['name'][0])) { // <-- chỉ khi có file thật sự
    foreach($_FILES['listimg']['name'] as $name => $value) {
        if(empty($value) || $_FILES['listimg']['error'][$name] !== 0) continue; // bỏ file rỗng hoặc lỗi
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 6);
        $uploads_dir = '../../assets/storage/images/';
        $tmp_name = $_FILES['listimg']['tmp_name'][$name];
        $file_name = "account_".$rand.".png";
        move_uploaded_file($tmp_name, $uploads_dir . $file_name);

        $listimg .= PHP_EOL . '/assets/storage/images/' . $file_name;
    }
    $listimg = trim($listimg);
}

   
    $CMSNAV->update("accounts", array(
        'chitiet'       => check_string($_POST['chitiet']),
        'img'     => $url_img,
    'listimg' => $listimg,
        'account'       => check_string($_POST['listacc']),
        'money'         => check_string($_POST['money'])
    ), " `id` = '".$row['id']."' ");
    admin_msg_success("Lưu tài khoản thành công", '', 500);
}
?>




<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Chỉnh sửa
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
                           Chỉnh sửa tài khoản
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Người mua</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['username'];?>" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Thời gian mua</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" value="<?=$row['updatedate'];?>" class="form-control"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                             <div class="form-label row">
    <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
    <div class="col-sm-9">
        <div class="form-line">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" id="exampleInputFile" name="img">
                </div>
            </div>
            <!-- Preview ảnh mô tả -->
            <div id="previewImg" style="margin-top:10px;">
                <?php if(!empty($row['img'])): ?>
                    <img src="<?=$row['img'];?>" style="width:100px; height:100px; object-fit:cover; border:1px solid #ccc; border-radius:4px;">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">List tài khoản</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea rows="5" name="listacc"
                                            placeholder="Định dạng: Tài khoản | Mật khẩu (1 dòng 1 nick nếu cần nhập nhiều nick 1 lần)"
                                            class="form-control"><?=$row['account'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Chi tiết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="chitiet" rows="6" class="form-control" placeholder="Quân Huy:306
Tướng:20
Skin:30"
                                            ><?=$row['chitiet'];?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
    <label class="col-sm-3 col-form-label">List ảnh mô tả</label>
    <div class="col-sm-9">
        <div class="form-line">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" id="exampleInputFileList" name="listimg[]" multiple>
                </div>
            </div>
            <!-- Preview list ảnh -->
            <div id="previewListImg" style="margin-top:10px; display:flex; flex-wrap: wrap; gap:10px;">
                <?php
                if(!empty($row['listimg'])) {
                    $listImages = explode(PHP_EOL, $row['listimg']);
                    foreach($listImages as $imgPath) {
                        if(!empty($imgPath)) {
                            echo '<img src="'.$imgPath.'" style="width:80px; height:80px; object-fit:cover; border:1px solid #ccc; border-radius:4px;">';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Preview ảnh mô tả chính
    document.getElementById('exampleInputFile').addEventListener('change', function(e){
        const preview = document.getElementById('previewImg');
        preview.innerHTML = '';
        const file = e.target.files[0];
        if(file && file.type.startsWith('image/')){
            const reader = new FileReader();
            reader.onload = function(event){
                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                img.style.border = '1px solid #ccc';
                img.style.borderRadius = '4px';
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    });

    // Preview list ảnh
    document.getElementById('exampleInputFileList').addEventListener('change', function(e){
        const preview = document.getElementById('previewListImg');
        preview.innerHTML = '';
        const files = e.target.files;
        Array.from(files).forEach(file => {
            if(!file.type.startsWith('image/')) return;
            const reader = new FileReader();
            reader.onload = function(event){
                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.width = '80px';
                img.style.height = '80px';
                img.style.objectFit = 'cover';
                img.style.border = '1px solid #ccc';
                img.style.borderRadius = '4px';
                preview.appendChild(img);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giá bán</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="money" value="<?=$row['money'];?>"
                                            class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="LuuTaiKhoan" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>

                            <a type="button" href="<?=BASE_URL('Admin/Accounts/'.$row['groups']);?>"
                                class="btn btn-danger btn-block waves-effect">
                                <span>TRỞ LẠI</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
             


<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
});
</script>






<?php 
    require_once(__DIR__."/Footer.php");
?>
