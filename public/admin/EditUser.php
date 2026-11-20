<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHỈNH SỬA THÀNH VIÊN | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<?php
if(isset($_GET['id']) && $getUser['level'] == 'admin')
{
    $row = $CMSNAV->get_row(" SELECT * FROM `users` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Người dùng này không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

if(isset($_POST['btnCongTien']) && isset($_POST['value']) && isset($row['username']) && $getUser['level'] == 'admin')
{
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if($value <= 0)
    {
        admin_msg_error("Vui lòng nhập số tiền hợp lệ", "", 2000);
    }
    $create = $CMSNAV->insert("dongtien", [
        'sotientruoc' => $row['money'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['money'] + $value,
        'thoigian' => gettime(),
        'noidung' => 'Admin cộng tiền ('.$ghichu.')',
        'username' => $row['username']
    ]);
    if($create)
    {
        $CMSNAV->cong("users", "money", $value, " `username` = '".$row['username']."' ");
        admin_msg_success("Cộng tiền thành công!", "", 2000);
    }
    else
    {
        admin_msg_error("Vui lòng liên hệ kỹ thuật Zalo 0855569336", "", 12000);
    }
    
}

if(isset($_POST['btnTruTien']) && isset($_POST['value']) && isset($row['username']) && $getUser['level'] == 'admin')
{
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if($value <= 0)
    {
        admin_msg_error("Vui lòng nhập số tiền hợp lệ", "", 2000);
    }
    $create = $CMSNAV->insert("dongtien", [
        'sotientruoc' => $row['money'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['money'] - $value,
        'thoigian' => gettime(),
        'noidung' => 'Admin trừ tiền ('.$ghichu.')',
        'username' => $row['username']
    ]);
    if($create)
    {
        $CMSNAV->tru("users", "money", $value, " `username` = '".$row['username']."' ");
        admin_msg_success("Trừ tiền thành công!", "", 2000);
    }
    else
    {
        admin_msg_error("Vui lòng liên hệ kỹ thuật Zalo 0947838128", "", 12000);
    }
    
}
if(isset($_POST['btnCongRobux']) && isset($_POST['value']) && isset($row['username']) && $getUser['level'] == 'admin')
{
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if($value <= 0)
    {
        admin_msg_error("Vui lòng nhập số robux hợp lệ", "", 2000);
    }
    $create = $CMSNAV->insert("dongtien", [
        'sotientruoc' => $row['robux'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['robux'] + $value,
        'thoigian' => gettime(),
        'noidung' => 'Admin cộng robux ('.$ghichu.')',
        'username' => $row['username']
    ]);
    if($create)
    {
        $CMSNAV->cong("users", "robux", $value, " `username` = '".$row['username']."' ");
        admin_msg_success("Cộng robux thành công!", "", 2000);
    }
    else
    {
        admin_msg_error("Vui lòng liên hệ kỹ thuật Zalo 0855569336", "", 12000);
    }
    
}

if(isset($_POST['btnTruRobux']) && isset($_POST['value']) && isset($row['username']) && $getUser['level'] == 'admin')
{
    $value = check_string($_POST['value']);
    $ghichu = check_string($_POST['ghichu']);
    if($value <= 0)
    {
        admin_msg_error("Vui lòng nhập số robux hợp lệ", "", 2000);
    }
    $create = $CMSNAV->insert("dongtien", [
        'sotientruoc' => $row['robux'],
        'sotienthaydoi' => $value,
        'sotiensau' => $row['robux'] - $value,
        'thoigian' => gettime(),
        'noidung' => 'Admin trừ robux ('.$ghichu.')',
        'username' => $row['username']
    ]);
    if($create)
    {
        $CMSNAV->tru("users", "robux", $value, " `username` = '".$row['username']."' ");
        admin_msg_success("Trừ robux thành công!", "", 2000);
    }
    else
    {
        admin_msg_error("Vui lòng liên hệ kỹ thuật Zalo 0947838128", "", 12000);
    }
    
}
if(isset($_POST['btnSaveUser']) && isset($_GET['id']) && $getUser['level'] == 'admin')
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $token = check_string($_POST['token']);
    $otp = check_string($_POST['otp']);
    $money = check_string($_POST['money']);
    $robux = check_string($_POST['robux']);
    $level = check_string($_POST['level']);
    $ctv = check_string($_POST['ctv']);
    $ctvrobux = check_string($_POST['ctvrobux']);
    $ctvgpass = check_string($_POST['ctvgpass']);
    $ctvacc = check_string($_POST['ctvacc']);
    $banned = check_string($_POST['banned']);
    $password = check_string($_POST['password']);
    if($row['money'] != $money)
    {
        $CMSNAV->insert("dongtien", array(
            'sotientruoc'   => $row['money'],
            'sotienthaydoi' => $money - $row['money'],
            'sotiensau'     => $money,
            'thoigian'      => gettime(),
            'noidung'       => 'Admin thay đổi số dư ',
            'username'      => $row['username']
        ));
    }
    $CMSNAV->update("users", array(
        'password'      => TypePassword($password),
        'otp'           => $otp,
        'token'         => $token,
        'money'         => $money,
        'total_money'   => check_string($_POST['total_money']),
        'robux'         => $robux,
        'level'         => $level,
        'ctv'         => $ctv,
        'ctvrobux'         => $ctvrobux,
        'ctvgpass'         => $ctvgpass,
        'ctvacc'         => $ctvacc,
        'banned'        => $banned
    ), " `id` = '".$row['id']."' ");
    admin_msg_success("Thay đổi user thành công", "", 1000);
}
$ref_total = $CMSNAV->num_rows("SELECT * FROM `users` WHERE `ref` = '".$row['id']."' ");
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
                           Chỉnh sửa thành viên
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            value="<?=$row['username'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="password"
                                            value="<?=$row['password'];?>">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="inputEmail3" value="<?=$row['username'];?>"
                                name="username" required>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Token</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="token"
                                            value="<?=$row['token'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Số dư</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="inputPassword3" name="money"
                                            value="<?=$row['money'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Số Lượt Click Vào Link Giới Thiệu</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            value="<?=$row['ref_click'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tổng Số Người Tạo Tài Khoản Từ Link Giới Thiệu</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            value="<?=$ref_total;?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Tổng tiền hoa hồng</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="inputPassword3"
                                            value="<?=$row['money_hoahong'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Tổng tiền nạp</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="inputPassword3" name="total_money"
                                            value="<?=$row['total_money'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Số robux</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="inputPassword3" name="robux"
                                            value="<?=$row['robux'];?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Trạng thái</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="banned">
                                        <option value="<?=$row['banned'];?>">
                                            <?php
                                                if($row['banned'] == "0"){ echo 'Hoạt động';}
                                                if($row['banned'] == "1"){ echo 'Banned';}
                                                ?>
                                        </option>
                                        <option value="0">Hoạt động</option>
                                        <option value="1">Banned</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Cấp bậc</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="level" value="<?=$row['level'];?>"
                                            placeholder="Nếu muốn đưa lên Admin thì ghi: admin">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">CTV BÁN NICK</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="ctvacc">
                                        <option <?=$row['ctvacc'] == 0 ? 'selected' : '';?> value="0">Không</option>
                                        <option <?=$row['ctvacc'] == 1 ? 'selected' : '';?> value="1">Có</option>
                                    </select>
                                </div>
                            </div>
                            <!--<div class="form-label row">-->
                            <!--    <label for="inputPassword3" class="col-sm-2 col-form-label">CTV CÀY THUÊ</label>-->
                            <!--    <div class="col-sm-10">-->
                            <!--        <select class="form-control" name="ctv">-->
                            <!--            <option <?=$row['ctv'] == 0 ? 'selected' : '';?> value="0">Không</option>-->
                            <!--            <option <?=$row['ctv'] == 1 ? 'selected' : '';?> value="1">Có</option>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>                        -->
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ngày đăng ký</label>
                                <div class="col-sm-10">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="inputEmail3"
                                            value="<?=$row['createdate'];?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveUser" class="btn btn-primary btn-block waves-effect">
                                <span>LƯU</span>
                            </button>
                            <a type="button" href="<?=BASE_URL('Admin/Users');?>"
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
                           Cộng tiền
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Số tiền cộng</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="value" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Ghi chú</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <textarea class="form-control" name="ghichu" rows="3"
                                            placeholder="Nhập ghi chú cộng tiền nếu có"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnCongTien" class="btn btn-primary btn-block waves-effect">
                                <span>XÁC NHẬN</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
         <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Trừ tiền
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Số tiền trừ</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="value" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Ghi chú</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <textarea class="form-control" name="ghichu" rows="3"
                                            placeholder="Nhập ghi chú trừ tiền nếu có"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnTruTien" class="btn btn-primary btn-block waves-effect">
                                <span>XÁC NHẬN</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
           <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Cộng robux
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Số robux cộng</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="value" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Ghi chú</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <textarea class="form-control" name="ghichu" rows="3"
                                            placeholder="Nhập ghi chú cộng robux nếu có"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnCongRobux" class="btn btn-primary btn-block waves-effect">
                                <span>XÁC NHẬN</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Trừ robux
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Số robux trừ</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="value" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Ghi chú</label>
                                <div class="col-sm-8">
                                    <div class="form-line">
                                        <textarea class="form-control" name="ghichu" rows="3"
                                            placeholder="Nhập ghi chú trừ robux nếu có"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnTruRobux" class="btn btn-primary btn-block waves-effect">
                                <span>XÁC NHẬN</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Dòng tiền
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>SỐ TIỀN TRƯỚC</th>
                                        <th>SỐ TIỀN THAY ĐỔI</th>
                                        <th>SỐ TIỀN HIỆN TẠI</th>
                                        <th>THỜI GIAN</th>
                                        <th>NỘI DUNG</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `dongtien` WHERE `username` = '".$row['username']."' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=format_cash($row['sotientruoc']);?></td>
                                        <td><?=format_cash($row['sotienthaydoi']);?></td>
                                        <td><?=format_cash($row['sotiensau']);?></td>
                                        <td><span class="badge badge-dark px-3"><?=$row['thoigian'];?></span></td>
                                        <td><?=$row['noidung'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>SỐ TIỀN TRƯỚC</th>
                                        <th>SỐ TIỀN THAY ĐỔI</th>
                                        <th>SỐ TIỀN HIỆN TẠI</th>
                                        <th>THỜI GIAN</th>
                                        <th>NỘI DUNG</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    require_once("../../public/admin/Footer.php");
?>