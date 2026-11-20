<?php

    require_once(__DIR__."/../../config/config.php");
    require_once(__DIR__."/../../config/function.php");
    require_once(__DIR__."/../../includes/login-admin.php");
    $title = 'QUẢN LÝ RÚT TIỀN | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
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

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý rút tiền</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH RÚT TIỀN</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ON/OFF Rút Tiền</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status_ruttien" required>
                                        <option value="<?=$CMSNAV->site('status_ruttien');?>">
                                            <?=$CMSNAV->site('status_ruttien');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số tiền rút tối đa</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="max_ruttien"
                                            value="<?=$CMSNAV->site('max_ruttien');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số tiền rút tối thiểu</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="min_ruttien"
                                            value="<?=$CMSNAV->site('min_ruttien');?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phí rút tiền (cố định)</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="number" name="phi_rut_tien" value="<?=$CMSNAV->site('phi_rut_tien');?>" placeholder="VD: 2000" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phí rút tiền (%)</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="phi_rut_tien_ck" value="<?=$CMSNAV->site('phi_rut_tien_ck');?>" placeholder="VD: 0.2" class="form-control">
                                    </div>
                                </div>
                            </div>
                     


                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>
      
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">YÊU CẦU RÚT TIỀN ĐỢI DUYỆT</h3>
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
                                    <th>#</th>
                                        <th>Transid</th>
                                        <th>Username</th>
                                        <th>Số tiền rút</th>
                                        <th>Ngân hàng</th>
                                        <th>Số tài khoản</th>
                                        <th>Tên chủ ví</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian rút</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `ruttien` WHERE `trangthai` = 'xuly' ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['magd'];?></td>
                                        <td><a
                                                href="<?=BASE_URL('Admin/User/Edit/'.getUser($row['username'], 'id'));?>"><?=$row['username'];?></a>
                                        </td>
                                        <td><?=format_cash($row['sotien']);?></td>
                                        <td><?=$row['nganhang'];?></td>
                                        <td><?=$row['sotaikhoan'];?></td>
                                        <td><?=$row['chutaikhoan'];?></td>
                                        <td><textarea class="form-control" readonly><?=$row['noidung'];?></textarea></td>
                                        <td><span class="label label-danger"><?=$row['thoigian'];?></span></td>
                                        <td><?=display_ruttien($row['trangthai']);?></td>
                                        <td><a type="button"
                                                href="<?=BASE_URL('Admin/RutTien/Edit/');?><?=$row['id'];?>"
                                                class="btn btn-primary"><i class="fas fa-edit"></i>
                                                <span>EDIT</span></a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">500 YÊU CẦU RÚT TIỀN GẦN ĐÂY</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Transid</th>
                                        <th>Username</th>
                                        <th>Số tiền rút</th>
                                        <th>Ngân hàng</th>
                                        <th>Số tài khoản</th>
                                        <th>Tên chủ ví</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian rút</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `ruttien` ORDER BY id DESC LIMIT 500 ") as $row){
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['magd'];?></td>
                                        <td><a
                                                href="<?=BASE_URL('Admin/User/Edit/'.getUser($row['username'], 'id'));?>"><?=$row['username'];?></a>
                                        </td>
                                        <td><?=format_cash($row['sotien']);?></td>
                                        <td><?=$row['nganhang'];?></td>
                                        <td><?=$row['sotaikhoan'];?></td>
                                        <td><?=$row['chutaikhoan'];?></td>
                                        <td><textarea class="form-control" readonly><?=$row['noidung'];?></textarea></td>
                                        <td><span class="label label-danger"><?=$row['thoigian'];?></span></td>
                                        <td><?=display_ruttien($row['trangthai']);?></td>
                                        <td><a type="button"
                                                href="<?=BASE_URL('Admin/RutTien/Edit/');?><?=$row['id'];?>"
                                                class="btn btn-primary"><i class="fas fa-edit"></i>
                                                <span>EDIT</span></a></td>
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





<?php 
    require_once("../../public/admin/Footer.php");
?>