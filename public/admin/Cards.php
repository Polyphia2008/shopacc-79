<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ NẠP THẺ | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<?php

if(isset($_POST['btnSaveOption']) && $getUser['level'] == 'admin')
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_error("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value)
    {
        $CMSNAV->update("options", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    admin_msg_success('Lưu thành công', '', 500);
}

// Pagination
$limit = isset($_GET['limit']) ? intval(check_string($_GET['limit'])) : 10;
$page = isset($_GET['page']) ? intval(check_string($_GET['page'])) : 1;
$from = ($page - 1) * $limit;

// Filter
$where = " `id` > 0 ";
$username = $pin = $serial = $status = $loaithe = $createdate = '';

if(!empty($_GET['username'])) {
    $username = check_string($_GET['username']);
    $where .= ' AND `username` = "'.$username.'" ';
}
if(!empty($_GET['status'])) {
    $status = check_string($_GET['status']);
    $where .= ' AND `status` = "'.$status.'" ';
}
if(!empty($_GET['pin'])) {
    $pin = check_string($_GET['pin']);
    $where .= ' AND `pin` LIKE "%'.$pin.'%" ';
}
if(!empty($_GET['seri'])) {
    $serial = check_string($_GET['seri']);
    $where .= ' AND `seri` LIKE "%'.$serial.'%" ';
}
if(!empty($_GET['loaithe'])) {
    $loaithe = check_string($_GET['loaithe']);
    $where .= " AND `loaithe` = '$loaithe' ";
}
if(!empty($_GET['createdate'])) {
    $create_date = check_string($_GET['createdate']);
    $createdate = $create_date;
    $dates = explode(' to ', str_replace('-', '/', $create_date));
    if(count($dates) == 2) {
        $from_date = $dates[0].' 00:00:00';
        $to_date = $dates[1].' 23:59:59';
        $where .= " AND `createdate` >= '$from_date' AND `createdate` <= '$to_date' ";
    }
}

// Short by date
$shortByDate = isset($_GET['shortByDate']) ? check_string($_GET['shortByDate']) : '';
$currentDate = date('Y-m-d');
$currentWeek = date("W");
$currentMonth = date('m');
$currentYear = date('Y');

if($shortByDate == 1) $where .= " AND DATE(createdate) = '$currentDate' ";
if($shortByDate == 2) $where .= " AND YEAR(createdate) = $currentYear AND WEEK(createdate, 1) = $currentWeek ";
if($shortByDate == 3) $where .= " AND MONTH(createdate) = '$currentMonth' AND YEAR(createdate) = '$currentYear' ";

// Get data
$listDatatable = $CMSNAV->get_list("SELECT * FROM `cards` WHERE $where ORDER BY `id` DESC LIMIT $from,$limit");
$totalDatatable = $CMSNAV->num_rows("SELECT * FROM `cards` WHERE $where ORDER BY `id` DESC");
$urlDatatable = pagination(BASE_URL("recharge-card&limit=$limit&shortByDate=$shortByDate&create_date=$createdate&pin=$pin&serial=$serial&status=$status&username=$username&"), $from, $totalDatatable, $limit);

// Tổng nạp
$yesterday = date('Y-m-d', strtotime("-1 day"));
$total_yesterday = intval($CMSNAV->get_row("SELECT SUM(menhgia) AS total FROM cards WHERE `status` = 'thanhcong' AND DATE(createdate) = '$yesterday' ")['total']);
$total_today = intval($CMSNAV->get_row("SELECT SUM(menhgia) AS total FROM cards WHERE `status` = 'thanhcong' AND DATE(createdate) = '$currentDate' ")['total']);
$total_all_time = intval($CMSNAV->get_row("SELECT SUM(menhgia) AS total FROM cards WHERE `status` = 'thanhcong'")['total']);

?>


<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Nạp tiền bằng thẻ Điện Thoại, thẻ Game</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                      <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Nạp tiền</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="text-right">
                    <button type="button" id="open-card-config" class="btn btn-primary label-btn mb-3">
                        <i class="ri-settings-4-line label-btn-icon me-2"></i> CẤU HÌNH
                    </button>
                </div>
            </div>
             <div class="col-xl-12" id="card-config" style="display:none;">
                <div class="card custom-card">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Web Đổi Thẻ</label>
                                        <input type="text" class="form-control" name="Sitecard" value="<?=$CMSNAV->site('Webgachthe');?>" placeholder="Nhập tên web card">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Partner ID</label>
                                        <input type="text" class="form-control" name="Partner_ID" value="<?=$CMSNAV->site('partner_id');?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Partner Key</label>
                                        <input type="text" class="form-control" name="Partner_Key" value="<?=$CMSNAV->site('partner_key');?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link Callback</label>
                                        <input type="text" readonly class="form-control" value="https://<?=$_SERVER['SERVER_NAME'];?>/api/card.php">
                                    </div>
                                </div>

                              
                                  <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phí nạp thẻ (%)</label>
                                        <input type="text" class="form-control" name="ck_the" value="<?=$CMSNAV->site('ck_the');?>" placeholder="VD: 10 = 10%">
                                    </div>
<div class="d-grid gap-2 mb-4">

                           <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                    <i class="fa fa-fw fa-save me-1"></i> Lưu cấu hình
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

            <div class="col-xl-5">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <p class="mb-1 fs-5 fw-semibold text-default">
                                            <?=format_cash($total_all_time);?></p>
                                        <p class="mb-0 text-muted">Toàn thời gian</p>
                                    </div>
                                    <div class="ms-2">
                                        <span class="avatar text-bg-danger rounded-circle fs-20"><i
                                                class='bx bxs-wallet-alt'></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <p class="mb-1 fs-5 fw-semibold text-default">
                                            <?=format_cash($CMSNAV->get_row("SELECT SUM(menhgia) AS total FROM cards WHERE `status`='thanhcong' AND MONTH(createdate)='$currentMonth' AND YEAR(createdate)='$currentYear'")['total']);?>
                                        </p>
                                        <p class="mb-0 text-muted">Tháng <?=date('m');?></p>
                                    </div>
                                    <div class="ms-2">
                                        <span class="avatar text-bg-info rounded-circle fs-20"><i
                                                class='bx bxs-wallet-alt'></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <p class="mb-1 fs-5 fw-semibold text-default">
                                            <?=format_cash($CMSNAV->get_row("SELECT SUM(menhgia) AS total FROM cards WHERE `status`='thanhcong' AND YEAR(createdate)='$currentYear' AND WEEK(createdate,1)='$currentWeek'")['total']);?>
                                        </p>
                                        <p class="mb-0 text-muted">Trong tuần</p>
                                    </div>
                                    <div class="ms-2">
                                        <span class="avatar text-bg-warning rounded-circle fs-20"><i
                                                class='bx bxs-wallet-alt'></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-fill">
                                        <p class="mb-1 fs-5 fw-semibold text-default">
                                            <?=format_cash($total_today);?></p>
                                        <p class="mb-0 text-muted">Hôm nay
                                            <?php 
if ($total_yesterday != 0) {
    $revenueGrowth = ($total_today - $total_yesterday) / $total_yesterday * 100;
    if ($revenueGrowth > 0) {
        echo '<span class="fs-12 text-success ms-2"><i class="ti ti-trending-up me-1 d-inline-block"></i>' . round($revenueGrowth, 2) . '% </span>';
    } else if ($revenueGrowth < 0) {
        echo '<span class="fs-12 text-danger ms-2"><i class="ti ti-trending-down me-1 d-inline-block"></i>' . round(abs($revenueGrowth), 2) . '% </span>';
    }
}
?>

                                        </p>
                                    </div>
                                    <div class="ms-2">
                                        <span class="avatar text-bg-primary rounded-circle fs-20"><i
                                                class='bx bxs-wallet-alt'></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">THỐNG KÊ NẠP THẺ THÁNG <?=date('m');?></div>
                    </div>
                    <div class="card-body">
                        <canvas id="chartjs-line" class="chartjs-chart"></canvas>
                         <script>
            (function() {
                Chart.defaults.borderColor = "rgba(142, 156, 173,0.1)";
                Chart.defaults.color = "#8c9097";

                // Lấy tháng và năm hiện tại
                const month = <?=date('m');?>;
                const year = <?=date('Y');?>;
                const numOfDays = new Date(year, month, 0).getDate(); // số ngày trong tháng

                // Labels ngày tháng
                const labels = [];
                for (let day = 1; day <= numOfDays; day++) {
                    labels.push(`${day}/${month}/${year}`);
                }

                // Dữ liệu PHP cho từng ngày
                const dataValues = [
                    <?php
                    $data = [];
                    $month = date('m');
                    $year = date('Y');
                    $numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                    for ($day = 1; $day <= $numOfDays; $day++) {
                        // Đảm bảo ngày tháng 2 chữ số
                        $date = sprintf("%04d-%02d-%02d", $year, $month, $day);
                        $row = $CMSNAV->get_row("SELECT SUM(menhgia) AS total FROM cards WHERE DATE(createdate) = '$date' AND status = 'thanhcong'");
                        $data[$day - 1] = $row['total'] ?? 0;
                    }
                    echo implode(",", $data);
                    ?>
                ];

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Paid',
                        backgroundColor: 'rgb(132, 90, 223)',
                        borderColor: 'rgb(132, 90, 223)',
                        data: dataValues
                    }]
                };

                const config = {
                    type: 'bar',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false
                            }
                        },
                        scales: {
                            x: { title: { display: true, text: 'Ngày' } },
                            y: { title: { display: true, text: 'Mệnh giá' }, beginAtZero: true }
                        }
                    }
                };

                new Chart(document.getElementById('chartjs-line'), config);
            })();
            </script>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            LỊCH SỬ NẠP THẺ CÀO
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" class="align-items-center mb-3" name="formSearch" method="GET">
                            <div class="row row-cols-lg-auto g-3 mb-3">
                                <input type="hidden" name="module" value="admin">
                                <input type="hidden" name="action" value="recharge-card">
                                <div class="col-md-3 col-6">
                                    <input class="form-control form-control-sm" value="<?=$username;?>" name="username"
                                        placeholder="<?=('Search Username');?>">
                                </div>
                                <div class="col-md-3 col-6">
                                    <input class="form-control form-control-sm" value="<?=$pin;?>" name="pin"
                                        placeholder="<?=('Search Pin');?>">
                                </div>
                                <div class="col-md-3 col-6">
                                    <input class="form-control form-control-sm" value="<?=$serial;?>" name="serial"
                                        placeholder="<?=('Search Serial');?>">
                                </div>
                                <div class="col-md-3 col-6">
                                    <select class="form-control form-control-sm mb-1" name="status">
                                        <option value=""><?=('Status');?></option>
                                        <option <?=$status == 'xuly' ? 'selected' : '';?> value="xuly">
                                            <?=('Đang chờ xử lý');?></option>
                                        <option <?=$status == 'thatbai' ? 'selected' : '';?> value="thatbai">
                                            <?=('Thẻ lỗi');?></option>
                                        <option <?=$status == 'thanhcong' ? 'selected' : '';?> value="thanhcong">
                                            <?=('Thành công');?></option>
                                    </select>
                                </div>
                                <div class="col-lg col-md-4 col-6">
                                    <input type="text" name="create_date" class="form-control form-control-sm"
                                        id="daterange" value="<?=$createdate;?>" placeholder="Chọn thời gian">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-search"></i>
                                        <?=('Search');?>
                                    </button>
                                    <a class="btn btn-sm btn-danger" href="<?=BASE_URL('Admin/Cards');?>"><i
                                            class="fa fa-trash"></i>
                                        <?=('Clear filter');?>
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
                                        <option <?=$limit == 1000 ? 'selected' : '';?> value="1000">1000
                                        </option>
                                    </select>
                                </div>
                                <div class="filter-short">
                                    <label class="filter-label"><?=('Short by Date:');?></label>
                                    <select name="shortByDate" onchange="this.form.submit()"
                                        class="form-select filter-select">
                                        <option value=""><?=('Tất cả');?></option>
                                        <option <?=$shortByDate == 1 ? 'selected' : '';?> value="1">
                                            <?=('Hôm nay');?>
                                        </option>
                                        <option <?=$shortByDate == 2 ? 'selected' : '';?> value="2">
                                            <?=('Tuần này');?>
                                        </option>
                                        <option <?=$shortByDate == 3 ? 'selected' : '';?> value="3">
                                            <?=('Tháng này');?>
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive mb-3">
                            <table class="table text-nowrap table-striped table-hover table-bordered">
                                <thead class="table">
                                    <tr>
                                        <th><?=('Username');?></th>
                                        <th class="text-center"><?=('Telco');?></th>
                                        <th class="text-center"><?=('Serial');?></th>
                                        <th class="text-center"><?=('Pin');?></th>
                                        <th class="text-center"><?=('Mệnh giá');?></th>
                                        <th class="text-center"><?=('Thực nhận');?></th>
                                        <th class="text-center"><?=('Trạng thái');?></th>
                                        <th class="text-center"><?=('Create date');?></th>                                    
                                        <th class="text-center"><?=('Lý do');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($listDatatable as $row2): ?>
                                    <tr>
                                        <td class="text-center"><a class="text-primary"
                                                 href="<?=BASE_URL('Admin/User/Edit/'.$CMSNAV->getUser($row2['username'])['id']);?>"><?=$row2['username'];?>[ID <?=$row2['id'];?>]</a>
                                        </td>
                                        <td class="text-center"><?=$row2['code'];?></td>
                                        <td class="text-center"><?=$row2['seri'];?></td>
                                        <td class="text-center"><?=$row2['pin'];?></td>
                                        <td class="text-right"><b
                                                style="color: red;"><?=format_cash($row2['menhgia']);?></b></td>
                                        <td class="text-right"><b
                                                style="color: green;"><?=format_cash($row2['thucnhan']);?></b></td>
                                        <td class="text-center"><?=display_card($row2['status']);?></td>
                                        <td><?=$row2['createdate'];?></td>
                                        <td><?=$row2['note'];?></td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="float-right">
                                                <?=('Tổng nạp:');?>
                                                <strong
                                                    style="color:red;"><?=format_cash($CMSNAV->get_row(" SELECT SUM(`menhgia`) FROM `cards` WHERE $where AND `status` = 'thanhcong' ")['SUM(`menhgia`)']);?></strong>
                                                | <?=('Thực nhận:');?>
                                                <strong
                                                    style="color:blue;"><?=format_cash($CMSNAV->get_row(" SELECT SUM(`thucnhan`) FROM `cards` WHERE $where AND `status` = 'thanhcong' ")['SUM(`thucnhan`)']);?></strong>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <p class="dataTables_info">Showing <?=$limit;?> of
                                    <?=format_cash($totalDatatable);?>
                                    Results</p>
                            </div>
                            <div class="col-sm-12 col-md-7 mb-3">
                                <?=$totalDatatable > $limit ? $urlDatatable : '';?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>
<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var button = document.getElementById('open-card-config');
    var card = document.getElementById('card-config');

    // Thêm sự kiện click cho nút button
    button.addEventListener('click', function() {
        // Kiểm tra nếu card đang hiển thị thì ẩn đi, ngược lại hiển thị
        if (card.style.display === 'none' || card.style.display === '') {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>


<?php 
    require_once("./Footer.php");
?>