<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'NHẬT KÍ HOẠT ĐỘNG | '.$CMSNAV->site('tenweb');
require_once(__DIR__."/../../includes/login-admin.php");
require_once(__DIR__."/Header.php");
require_once(__DIR__."/Sidebar.php");
require_once(__DIR__."/../../includes/checkLicense.php");

// Pagination
$limit = isset($_GET['limit']) ? intval(check_string($_GET['limit'])) : 20;
$page  = isset($_GET['page']) ? intval(check_string($_GET['page'])) : 1;
$from  = ($page - 1) * $limit;

// Filters
$where = " logs.id > 0 ";
$username = '';
$content = '';
$createdate = '';
$ip = '';
$device = '';
$shortByDate = '';

// Filter: username
if (!empty($_GET['username'])) {
    $username = check_string($_GET['username']);
    $where .= " AND users.username LIKE '%$username%' ";
}

// Filter: IP
if (!empty($_GET['ip'])) {
    $ip = check_string($_GET['ip']);
    $where .= ' AND logs.ip LIKE "%'.$ip.'%" ';
}

// Filter: device
if (!empty($_GET['device'])) {
    $device = check_string($_GET['device']);
    $where .= ' AND logs.device LIKE "%'.$device.'%" ';
}

// Filter: content/action
if (!empty($_GET['content'])) {
    $content = check_string($_GET['content']);
    $where .= ' AND logs.action LIKE "%'.$content.'%" ';
}

// Filter: create_date
if (!empty($_GET['create_date'])) {
    $create_date = check_string($_GET['create_date']);
    $createdate = $create_date;
    $dates = explode(' to ', str_replace('-', '/', $create_date));
    if(count($dates) == 2) {
        $start = $dates[0] . ' 00:00:00';
        $end   = $dates[1] . ' 23:59:59';
        $where .= " AND logs.create_date >= '$start' AND logs.create_date <= '$end' ";
    }
}

// Filter: shortByDate
if (isset($_GET['shortByDate'])) {
    $shortByDate = check_string($_GET['shortByDate']);
    $currentDate = date("Y-m-d");
    $currentWeek = date("W");
    $currentMonth = date('m');
    $currentYear = date('Y');

    if($shortByDate == 1){
        $where .= " AND logs.create_date LIKE '%$currentDate%' ";
    }
    if($shortByDate == 2){
        $where .= " AND YEAR(logs.create_date) = $currentYear AND WEEK(logs.create_date, 1) = $currentWeek ";
    }
    if($shortByDate == 3){
        $where .= " AND MONTH(logs.create_date) = '$currentMonth' AND YEAR(logs.create_date) = '$currentYear' ";
    }
}

// Lấy dữ liệu với JOIN users
$listDatatable = $CMSNAV->get_list("
    SELECT logs.*, users.username AS username
    FROM logs
    LEFT JOIN users ON users.id = logs.user_id
    WHERE $where
    ORDER BY logs.id DESC
    LIMIT $from, $limit
");

$totalDatatable = $CMSNAV->num_rows("
    SELECT logs.*
    FROM logs
    LEFT JOIN users ON users.id = logs.user_id
    WHERE $where
");
?>

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0"><i class="fa-solid fa-clock-rotate-left"></i> Nhật ký hoạt động</h1>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            NHẬT KÝ HOẠT ĐỘNG
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" class="align-items-center mb-3" name="formSearch" method="GET">
                            <div class="row row-cols-lg-auto g-3 mb-3">
                                <input type="hidden" name="module" value="admin">
                                <input type="hidden" name="action" value="logs">
                                
                                <div class="col-lg col-md-4 col-6">
                                    <input class="form-control form-control-sm" value="<?=$username;?>" name="username" placeholder="<?=('Username');?>">
                                </div>
                                <div class="col-lg col-md-4 col-6">
                                    <input class="form-control form-control-sm" value="<?=$content;?>" name="content" placeholder="<?=('Hành động');?>">
                                </div>
                                <div class="col-lg col-md-4 col-6">
                                    <input class="form-control form-control-sm" value="<?=$ip;?>" name="ip" placeholder="<?=('Địa chỉ IP');?>">
                                </div>
                                <div class="col-lg col-md-4 col-6">
                                    <input class="form-control form-control-sm" value="<?=$device;?>" name="device" placeholder="<?=('Thiết bị');?>">
                                </div>
                                <div class="col-lg col-md-4 col-6">
                                    <input type="text" name="createdate" class="form-control form-control-sm" id="daterange" value="<?=$createdate;?>" placeholder="Chọn thời gian">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-hero btn-sm btn-primary"><i class="fa fa-search"></i> <?=('Search');?></button>
                                    <a class="btn btn-hero btn-sm btn-danger" href="<?=BASE_URL('logs');?>"><i class="fa fa-trash"></i> <?=('Clear filter');?></a>
                                </div>
                            </div>

                            <div class="top-filter">
                                <div class="filter-show">
                                    <label class="filter-label">Show :</label>
                                    <select name="limit" onchange="this.form.submit()" class="form-select filter-select">
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
                                    <select name="shortByDate" onchange="this.form.submit()" class="form-select filter-select">
                                        <option value=""><?=('Tất cả');?></option>
                                        <option <?=$shortByDate == 1 ? 'selected' : '';?> value="1"><?=('Hôm nay');?></option>
                                        <option <?=$shortByDate == 2 ? 'selected' : '';?> value="2"><?=('Tuần này');?></option>
                                        <option <?=$shortByDate == 3 ? 'selected' : '';?> value="3"><?=('Tháng này');?></option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive table-wrapper mb-3">
                            <table class="table text-nowrap table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th><?=('Username');?></th>
                                        <th><?=('Hành động');?></th>
                                        <th><?=('Thời gian');?></th>
                                        <th><?=('Địa chỉ IP');?></th>
                                        <th><?=('Thiết bị');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($listDatatable as $row): ?>
                                <tr>
                                    <td><?= $row['username'] ?? '<span class="text-muted">Unknown</span>'; ?></td>
                                    <td><?= $row['action']; ?></td>
                                    <td>
                                        <span class="badge bg-light text-dark" data-toggle="tooltip" data-placement="bottom" title="<?=timeAgo(strtotime($row['create_date']));?>">
                                            <?= $row['create_date']; ?>
                                        </span>
                                    </td>
                                    <td><span class="badge bg-danger-transparent"><?= $row['ip']; ?></span></td>
                                    <td><small><?= $row['device']; ?></small></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <p class="dataTables_info">Showing <?=$limit;?> of <?=format_cash($totalDatatable);?> Results</p>
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

<?php
require_once(__DIR__.'/Footer.php');
?>
