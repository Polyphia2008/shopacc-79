<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ NGÂN HÀNG | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<?php
if(isset($_GET['delete']) && $getUser['level'] == 'admin')
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $delete = check_string($_GET['delete']);
    $CMSNAV->remove("bank", " `id` = '$delete' ");
    admin_msg_success("Xóa thành công", BASE_URL("Admin/Bank"), 300);
}

if(isset($_POST['btnThemNganHang']) && $getUser['level'] == 'admin') 
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $CMSNAV->insert("bank", array(
        'name' => check_string($_POST['name']),
        'stk' => check_string($_POST['stk']),
        'logo' => check_string($_POST['logo']),
        'bank_name' => check_string($_POST['bank_name']),
        'ghichu' => check_string($_POST['ghichu'])
    ));
    admin_msg_success("Thêm thành công", '', 1000);
}

if(isset($_POST['btnSave']) && $getUser['level'] == 'admin') 
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    $CMSNAV->update("bank", array(
        'name' => check_string($_POST['name']),
        'stk' => check_string($_POST['stk']),
        'logo' => check_string($_POST['logo']),
        'bank_name' => check_string($_POST['bank_name']),
        'ghichu' => check_string($_POST['ghichu'])
    ), " `id` = '".check_string($_POST['id'])."' ");
    admin_msg_success('Lưu thành công', '', 1000);
}

if(isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin')
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value)
    {
        if(!$CMSNAV->get_row("SELECT * FROM `options` WHERE `name` = '$key' "))
        {
            $CMSNAV->insert("options", [
                'name'  => $key,
                'value' => $value
            ]);
        }
        $CMSNAV->update("options", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    admin_msg_success('Lưu thành công', '', 500);
}
?>



<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Ngân Hàng
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
                           Cáu hình nạp bank auto
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Token Bank Auto</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_bank" placeholder="VD: B02A9706-65B3-65BB-7C3B-C3B8E523D5D0" value="<?=$CMSNAV->site('api_bank');?>"
                                            class="form-control">
                                    </div>
                                    <i>Cách lấy token xem hướng dẫn ở liên kết phía dưới.</i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên chủ ví Ngân Hàng</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="name_bank" placeholder="VD: NGUYEN ANH VU"
                                            value="<?=$CMSNAV->site('name_bank');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">STK Bank Auto</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="stk_bank" value="<?=$CMSNAV->site('stk_bank');?>"
                                            class="form-control">
                                    </div>
                                    <i></i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Password Bank Auto</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="mk_bank" value="<?=$CMSNAV->site('mk_bank');?>"
                                            class="form-control">
                                    </div>
                                    <i></i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Ngân Hàng</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="type_bank">
                                        <option value="<?=$CMSNAV->site('type_bank');?>"><?=$CMSNAV->site('type_bank');?></option>
                                        <option value="VCB">Vietcombank</option>
                                        <option value="TCB">Techcombank</option>
                                        <option value="ACB">ACB</option>
                                        <option value="MB">MBBank</option>
                                        <option value="TPB">TPBank</option>
                                    </select>
                                    <i></i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">ON/OFF Auto Bank</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status_cron_bank">
                                        <option value="ON" <?=$CMSNAV->site('status_cron_bank') == 'ON' ? 'selected' : '';?> >ON</option>
                                        <option value="OFF" <?=$CMSNAV->site('status_cron_bank') == 'OFF' ? 'selected' : '';?> >OFF</option>
                                    </select>
                                    <i>Khi bạn chọn OFF, hệ thống sẽ tạm dừng quá trình Auto Bank, chỉ áp dụng cho WEB2M</i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Số tiền nạp tối thiểu</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="recharge_min" placeholder="VD: 1000"
                                            value="<?=$CMSNAV->site('recharge_min');?>" class="form-control">
                                    </div>
                                    <i>Nếu người dùng nạp bé hơn số tiền tối thiểu, hệ thống sẽ không cộng tiền cho user đó.</i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Nội dung nạp tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="noidung_naptien" placeholder="VD: NAPTIEN"
                                            value="<?=$CMSNAV->site('noidung_naptien');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                             <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Chiết Khấu Khuyến Mãi %</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="ck_bank" placeholder="VD: 10"
                                            value="<?=$CMSNAV->site('ck_bank');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
          
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           Cáu hình nạp THESIEURE auto
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Token ví THESIEURE </label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="api_bank_tsr" placeholder="VD: 78A76A10-6DA98-B4BA-6079-07953B4D1F74" value="<?=$CMSNAV->site('api_bank_tsr');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Số điện thoại ví THESIEURE</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="stk_bank_tsr" placeholder="VD: 0855569336"
                                            value="<?=$CMSNAV->site('stk_bank_tsr');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên chủ ví THESIEURE</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="name_bank_tsr" placeholder="VD: NGUYEN ANH VU"
                                            value="<?=$CMSNAV->site('name_bank_tsr');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">ON/OFF Auto THESIEURE</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status_naptsr">
                                        <option value="ON" <?=$CMSNAV->site('status_naptsr') == 'ON' ? 'selected' : '';?> >ON</option>
                                        <option value="OFF" <?=$CMSNAV->site('status_naptsr') == 'OFF' ? 'selected' : '';?> >OFF</option>
                                    </select>
                                    <i>Khi bạn chọn OFF, hệ thống sẽ tạm dừng quá trình Auto THESIEURE.</i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Số tiền nạp tối thiểu</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="recharge_min" placeholder="VD: 1000"
                                            value="<?=$CMSNAV->site('recharge_min');?>" class="form-control">
                                    </div>
                                    <i>Nếu người dùng nạp bé hơn số tiền tối thiểu, hệ thống sẽ không cộng tiền cho user đó.</i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Nội dung nạp tiền</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="noidung_naptien" placeholder="VD: NAPTIEN"
                                            value="<?=$CMSNAV->site('noidung_naptien');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                           100 giao dịch bank gần đây
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>USERNAME</th>
                                        <th>MÃ GD</th>
                                        <th>MONEY</th>
                                        <th>NỘI DUNG</th>
                                        <th>THỜI GIAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `bank_auto` WHERE `username` IS NOT NULL ORDER BY id DESC LIMIT 100 ") as $row){ ?>
                                    <tr>
                                        <td width="5%"><?=$i++;?></td>
                                        <td><a href="<?=BASE_URL('Admin/User/Edit/'.$CMSNAV->getUser($row['username'])['id']);?>"><?=$row['username'];?></a></td>
                                        <td><?=$row['tid'];?></td>
                                        <td><?=$row['amount'];?></td>
                                        <td><?=$row['description'];?></td>
                                        <td><?=$row['time'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable2").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>



<?php 
    require_once("../../public/admin/Footer.php");
?>