<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'DASHBROAD | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
        
        
$sotin1trang = 10;
if(isset($_GET['page'])){
    $page = check_string(intval($_GET['page']));
}
else{
    $page = 1;
}
$from = ($page - 1) * $sotin1trang;
$where = " `id` > 0 ";
$username = '';
$noidung = '';
$create_date = '';


if(!empty($_GET['username'])){
    $username = check_string($_GET['username']);
    $where .= ' AND `username` = "'.$username.'" ';
}
if(!empty($_GET['noidung'])){
    $noidung = check_string($_GET['noidung']);
    $where .= ' AND `noidung` LIKE "%'.$noidung.'%" ';
}
if(!empty($_GET['create_date'])){
    $create_date = check_string($_GET['create_date']);
    $create_date_1 = $create_date;
    $create_date_1 = explode(' - ', $create_date_1);
    if($create_date_1[0] != $create_date_1[1]){
        $create_date_1 = [$create_date_1[0].' 00:00:00', $create_date_1[1].' 23:59:59'];
        $where .= " AND `thoigian` >= '".$create_date_1[0]."' AND `thoigian` <= '".$create_date_1[1]."' ";
    }
}
$listDatatable = $CMSNAV->get_list(" SELECT * FROM `dongtien` WHERE $where ORDER BY `id` DESC LIMIT $from,$sotin1trang ");
?>





   <div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-money-bill-transfer"></i> Biến động số dư
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
                           NHẬT KÝ THAY ĐỔI SỐ DƯ
                        </div>
                    </div>
 <di class="card-body">
                        <form action="" class="align-items-center mb-3" name="formSearch" method="GET">
                            <div class="row row-cols-lg-auto g-3 mb-3">
                                <input type="hidden" name="module" value="admin">
                                <input type="hidden" name="action" value="dong-tien">
                                
                                <div class="col-lg col-md-4 col-6">
                                    <input class="form-control form-control-sm" value="<?=$username;?>" name="username"
                                        placeholder="<?=('Username');?>">
                                </div>
                                <div class="col-lg col-md-4 col-6">
                                    <input class="form-control form-control-sm" value="<?=$noidung;?>" name="noidung"
                                        placeholder="<?=('Lý do');?>">
                                </div>
                                <div class="col-lg col-md-4 col-6">
                                    <input type="text" name="createdate" class="form-control form-control-sm"
                                        id="daterange" value="<?=$create_date;?>" placeholder="Chọn thời gian">
                                </div>
                                <div class="col-lg col-md-4 col-6">
                                    <select class="form-control form-control-sm" name="transactiontype">
                                        <option value=""><?=('Tất cả giao dịch');?></option>
                                        <option value="plus" <?=isset($GET['transactiontype']) && $GET['transactiontype'] == 'plus' ? 'selected' : '';?>><?=('Cộng tiền');?></option>
                                        <option value="minus" <?=isset($GET['transactiontype']) && $GET['transactiontype'] == 'minus' ? 'selected' : '';?>><?=('Trừ tiền');?></option>
                                    </select>
                                </div>
                                 <div class="col-sm-4 mb-2">
                                                <button type="submit" name="submit" value="filter"
                                                    class="btn btn-hero btn-sm btn-primary"><i class="fa fa-search"></i>
                                                    Tìm kiếm
                                                </button>
                                                <a class="btn btn-hero btn-sm btn-danger"
                                                    href="<?=BASE_URL('public/admin/dong-tien.php');?>"><i
                                                        class="fa fa-trash"></i>
                                                    Bỏ lọc
                                                </a>

                                </div>
                            </div>
                            <div class="top-filter">
                                <div class="filter-show">
                                    <label class="filter-label">Show :</label>
                                    <select name="limit" onchange="this.form.submit()"
                                        class="form-select filter-select">
                                        <option <?=$limit == 5 ? 'selected' : '';?> value="5">5</option>
                                        <option <?=$limit == 10 ? 'selected' : '';?> value="10">10</option>
                                        <option <?=$limit == 20 ? 'selected' : '';?> value="20">20</option>
                                        <option <?=$limit == 50 ? 'selected' : '';?> value="50">50</option>
                                        <option <?=$limit == 100 ? 'selected' : '';?> value="100">100</option>
                                        <option <?=$limit == 500 ? 'selected' : '';?> value="500">500</option>
                                        <option <?=$limit == 1000 ? 'selected' : '';?> value="1000">1.000</option>
                                        <option <?=$limit == 5000 ? 'selected' : '';?> value="5000">5.000</option>
                                        <option <?=$limit == 10000 ? 'selected' : '';?> value="10000">10.000</option>
                                    </select>
                                </div>
                                <div class="filter-short">
                                    <label class="filter-label"><?=('Short by Date:');?></label>
                                    <select name="shortByDate" onchange="this.form.submit()"
                                        class="form-select filter-select">
                                        <option value=""><?=('Tất cả');?></option>
                                        <option <?=$shortByDate == 1 ? 'selected' : '';?> value="1"><?=('Hôm nay');?>
                                        </option>
                                        <option <?=$shortByDate == 2 ? 'selected' : '';?> value="2"><?=('Tuần này');?>
                                        </option>
                                        <option <?=$shortByDate == 3 ? 'selected' : '';?> value="3">
                                            <?=('Tháng này');?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </form>


                            <div class="table-responsive p-0">
                            <table class="table table-bordered table-striped table-hover">
                                <thead> 
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Số tiền trước</th>
                                            <th>Số tiền thay đổi</th>
                                            <th>Số tiền hiện tại</th>
                                            <th>Thời gian</th>
                                            <th>Nội dung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listDatatable as $row) {?>
                                        <tr>
                                            <td><?=$row['id'];?></td>
                                            <td class="text-primary"><a
                                                    href="<?=BASE_URL('Admin/User/Edit/'.$CMSNAV->getUser($row['username'])['id']);?>"><?=$row['username'];?>[ID <?=$row['id'];?>]</a>
                                            </td>
                                        <td class="text-right">
                                            <span><?=format_cash($row['sotientruoc']);?></span>
                                        </td>
                                        <?php if(($row['sotiensau'] - $row['sotientruoc']) > 0):?>
                                        <td class="text-right"><b
                                                style="color:green;">+<?=format_cash($row['sotienthaydoi']);?></b>
                                        </td>
                                        <?php elseif(($row['sotientruoc'] - $row['sotiensau']) > 0):?>
                                        <td class="text-right"><b
                                                style="color:red;">-<?=format_cash($row['sotienthaydoi']);?></b>
                                        </td>
                                        <?php else:?>
                                        <td class="text-right"><b><?=format_cash($row['sotienthaydoi']);?></b>
                                        </td>
                                        <?php endif?>
                                        <td class="text-right"><b style="color:blue;"><?=format_cash($row['sotiensau']);?></b>
                                        </td>
                                        <td><span class="badge bg-light text-dark" data-toggle="tooltip" data-placement="bottom"
                                                title="<?=timeAgo(strtotime($row['thoigian']));?>"><?=$row['thoigian'];?></span></td>
                                        <td><i><?=$row['noidung'];?></i></td>
                                    </tr>
                                    <?php }?>

                                    </tbody>
                               </table>
                            </div>
                            <br>
                             <?php
                            $total = $CMSNAV->num_rows(" SELECT * FROM `dongtien` WHERE $where ORDER BY id DESC ");?>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                               <p class="dataTables_info">Showing <?=$page;?> of <?=format_cash($total);?> Results</p>

                                </div>
                               <div class="col-sm-12 col-md-7 mb-3">

                                   
                                 <?php
                                if ($total > $sotin1trang){echo '<center>' . pagination($base_url.'public/admin/dong-tien.php?id='.check_string($_GET['id']).'&noidung='.$noidung.'&username='.$username.'&', $from, $total, $sotin1trang) . '</center>';}?>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<script>
$(function() {
    $("#reservationtime").daterangepicker({
        locale: {
            format: "YYYY/MM/DD/"
        }
    })
    //Date picker
    $("#reservationdate").datetimepicker({
        format: "L"
    });
});
</script>







<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>

<?php 
    require_once("../../public/admin/Footer.php");
?>