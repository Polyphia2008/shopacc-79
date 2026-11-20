<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ NHÓM | '.$CMSNAV->site('tenweb');
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

if(isset($_POST['ThemTaiKhoan']) && $getUser['level'] == 'admin') {

    if($CMSNAV->site('status_demo') == 'ON') {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
    if(check_img('img') == true) {
        $uploads_dir = '../../assets/storage/images/'; // Thư mục trên server
        $file_name = "Accounts_" . $rand . ".png"; // Tên file
        $tmp_name = $_FILES['img']['tmp_name'];

        $create = move_uploaded_file($tmp_name, $uploads_dir . $file_name);
        $url_img = "/assets/storage/images/" . $file_name; }
    $listimg = '';
    foreach($_FILES['listimg']['name'] as $name => $value) {
       $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 6);
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 6);
        $uploads_dir = '../../assets/storage/images';
        $tmp_name = $_FILES['listimg']['tmp_name'][$name];
        $url_listimg = "/account_".$rand.".png";
        move_uploaded_file($tmp_name, $uploads_dir.$url_listimg);
        $listimg = $listimg.PHP_EOL.'assets/storage/images'.$url_listimg;
     }

     $listacc = explode(PHP_EOL, check_string($_POST['listacc']));
    foreach($listacc as $data)
    {
        $CMSNAV->insert("accounts", array(
        'img'       => check_string($_POST['img']),
        'chitiet'       => check_string($_POST['chitiet']),
        'listimg'       => $listimg,
        'account'       => $data,
        'groups'        => check_string($_GET['id']),
        'money'         => check_string($_POST['money']),
        'sale'   => check_string($_POST['display']),
        'createdate'    => gettime()
        ));
    }
    
    admin_msg_success("Thêm tài khoản thành công", '', 500);
}
?>


    <div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Danh sách
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
                           Thêm tài khoản <?=$row['title'];?>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
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
                                <label class="col-sm-3 col-form-label">List tài khoản</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea rows="5" name="listacc"
                                            placeholder="Định dạng: Tài khoản | Mật khẩu (1 dòng 1 nick nếu cần nhập nhiều nick 1 lần)"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Chi tiết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea name="chitiet" rows="5" class="form-control" placeholder="Quân Huy:306
Tướng:20
Skin:30"></textarea>
                                    </div>
                                </div>
                            </div>
                                             <div class="form-label row">
    <label class="col-sm-3 col-form-label">List ảnh mô tả</label>
    <div class="col-sm-9">
        <div class="form-line">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" id="exampleInputFileList"
                        name="listimg[]" multiple>
                </div>
            </div>
            <!-- Preview ảnh nhỏ -->
            <div id="previewListImg" style="margin-top:10px; display:flex; flex-wrap: wrap; gap:10px;"></div>
        </div>
    </div>
</div>

<script>
document.getElementById('exampleInputFileList').addEventListener('change', function(e){
    const preview = document.getElementById('previewListImg');
    preview.innerHTML = ''; // Xóa preview cũ
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
                                        <input type="number" name="money" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Sale</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="display" required>
                                        <option value="HIDE">OFF</option>
                                        <option value="SHOW">ON</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="ThemTaiKhoan" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                                 <a type="button" href="<?=BASE_URL('Admin/Category');?>"
                                class="btn btn-danger btn-block waves-effect">
                                <span>TRỞ LẠI</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
      
             <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Danh sách tài khoản
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ẢNH</th>
                                        <th>TÀI KHOẢN</th>
                                        <th>GIÁ BÁN</th>
                                        <th>THỜI GIAN ĐĂNG</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `accounts` WHERE `groups` = '".check_string($_GET['id'])."'  ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td width="5%">#<?=$row['id'];?></td>
                                        <td width="8%"><img width="100%" src="<?=$row['img'];?>" /></td>
                                        <td><?=explode("|", $row['account'])[0];?></td>
                                        <td><?=$row['money'];?></td>
                                        <td><?=$row['createdate'];?></td>
                                        <td><?=$row['username'] != NULL ? '<b style="color:red;">Đã bán</b>' : '<b style="color:green;">Đang bán</b>';?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="<?=BASE_URL('Admin/Account/Edit/'.$row['id']);?>"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span></a>

                                            <button class="btn btn-danger delete" data-id="<?=$row['id'];?>"
                                                data-name="<?=$row['account'];?>"><i class="fas fa-trash"></i>
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
$(".delete").on("click", function() {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Tài Khoản",
        message: "Bạn có chắc chắn xóa tài khoản (" + $(this).data('name') + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("assets/ajaxs/admin/delete-account.php");?>",
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



<?php 
    require_once(__DIR__."/Footer.php");
?>
