<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'DASHBROAD | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>


 
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-2">Dashboard</h1>
            <div class="float-right">
                <a class="btn btn-primary shadow-primary btn-wave btn-sm" type="button"
                    href="https://www.facebook.com/thanhsangtopie" target="_blank"><i
                        class="fa-solid fa-magnifying-glass"></i> KIỂM TRA BẢN QUYỀN</a>
            </div>
        </div>
                <div class="alert alert-secondary alert-dismissible fade show custom-alert-icon shadow-sm" role="alert">
            <h5>SHOPROBLOX Version: <strong style="color:blue;">5.0</strong></h5>                      
           
           
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                    class="bi bi-x"></i></button>
        </div>
                        <div class="row">
                        <div class="col-12">
                <div class="text-right mb-3">
                    <img src="https://zshopclone7.cmsnt.net/mod/img/gif-live.gif" width="60px">
                </div>
            </div>
            <!-- Thành viên đăng ký toàn thời gian -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card primary">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-primary">
                                    <i class="fa-solid fa-users fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Thành viên đăng ký</span>
                                <h5 class="fw-semibold mb-2" id="total_users_all">
                                    <?=$CMSNAV->num_rows("SELECT * FROM `users` ");?> <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-primary-transparent">Toàn thời gian</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Đơn hàng đã bán toàn thời gian -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card secondary">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-info">
                                    <i class="fa-solid fa-cart-shopping fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Tài khoản đã bán</span>
                                <h5 class="fw-semibold mb-2" id="total_orders_all">
                                    <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `username` IS NOT NULL "));?>
                                    <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-info-transparent">Toàn thời gian</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doanh thu đơn hàng toàn thời gian -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card warning">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-warning">
                                    <i class="fa-solid fa-chart-simple fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Doanh thu tài khoản</span>
                                <h5 class="fw-semibold mb-2" id="total_pay_all">
                                    <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `username` IS NOT NULL ")['SUM(`money`)']);?>
                                   <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-warning-transparent">Toàn thời gian</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doanh thu dịch vụ toàn thời gian -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card danger">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-danger">
                                    <i class="fa-solid fa-money-bill-trend-up fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Doanh thu dịch vụ</span>
                                <h5 class="fw-semibold mb-2" id="profit_all">
                                     <?=format_cash(
                            $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `status` = 'hoantat' ")['SUM(`money`)'] +
                            $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_gamepass` WHERE `status` = 'hoantat' ")['SUM(`money`)'] +
                            $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_robux` WHERE `status` = 'hoantat' ")['SUM(`money`)'] 
                            );?><div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-danger-transparent">Toàn thời gian</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Thành viên đăng ký tháng này -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card primary">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-primary">
                                    <i class="fa-solid fa-users fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Thành viên đăng ký</span>
                                <h5 class="fw-semibold mb-2" id="new_users_month">
                                     <?=format_cash($CMSNAV->num_rows("SELECT * FROM `users` WHERE `createdate` AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                                     <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-primary-transparent">Tháng <?=date('m', time());?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Đơn hàng đã bán tháng này -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card secondary">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-info">
                                    <i class="fa-solid fa-cart-shopping fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Tài khoản đã bán</span>
                                <h5 class="fw-semibold mb-2" id="total_orders_month">
                                    <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `updatedate` AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                                    <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-info-transparent">Tháng <?=date('m', time());?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Doanh thu đơn hàng tháng này -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card warning">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-warning">
                                    <i class="fa-solid fa-chart-simple fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Doanh thu tài khoản</span>
                                <h5 class="fw-semibold mb-2" id="total_pay_month">
                                      <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `username` IS NOT NULL AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." ")['SUM(`money`)']);?>
                                      <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-warning-transparent">Tháng <?=date('m', time());?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doanh thu dịch vụ tháng này -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card danger">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-danger">
                                    <i class="fa-solid fa-money-bill-trend-up fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Doanh thu dịch vụ</span>
                                <h5 class="fw-semibold mb-2" id="profit_month">
                                       <?=format_cash( 
                                        $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `status` = 'hoantat' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." ")['SUM(`money`)'] + 
                                        $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_gamepass` WHERE `status` = 'hoantat' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." ")['SUM(`money`)'] + 
                                        $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_robux` WHERE `status` = 'hoantat' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." ")['SUM(`money`)'] 
                                        );?><div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-danger-transparent">Tháng <?=date('m', time());?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Thành viên đăng ký hôm nay -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card primary">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-primary">
                                    <i class="fa-solid fa-users fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Thành viên đăng ký</span>
                                <h5 class="fw-semibold mb-2" id="new_users_today">
                                     <?=format_cash($CMSNAV->num_rows("SELECT * FROM `users` WHERE `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                                     <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-primary-transparent">Hôm nay</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Đơn hàng đã bán hôm nay -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card secondary">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-info">
                                    <i class="fa-solid fa-cart-shopping fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Tài khoản đã bán</span>
                                <h5 class="fw-semibold mb-2" id="total_orders_today">
                                   <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                                   <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-info-transparent">Hôm nay</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doanh thu đơn hàng hôm nay -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card warning">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-warning">
                                    <i class="fa-solid fa-chart-simple fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Doanh thu tài khoản</span>
                                <h5 class="fw-semibold mb-2" id="total_pay_today">
                                                                       <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `username` IS NOT NULL AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`money`)']);?>
                                                                       <div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-warning-transparent">Hôm nay</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doanh thu dịch vụ hôm nay -->
            <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card custom-card hrm-main-card danger">
                    <div class="card-body">
                        <div class="d-flex align-items-top">
                            <div class="me-3">
                                <span class="avatar bg-danger">
                                    <i class="fa-solid fa-money-bill-trend-up fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">Doanh thu dịch vụ</span>
                                <h5 class="fw-semibold mb-2" id="profit_today">
                                      <?=format_cash( 
                                        $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `status` = 'hoantat' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`money`)'] + 
                                        $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_gamepass` WHERE `status` = 'hoantat' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`money`)'] + 
                                        $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_robux` WHERE `status` = 'hoantat' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`money`)'] 
                                        );?><div class="spinner" style="display: none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </div>
                                </h5>
                                <p class="mb-0">
                                    <span class="badge bg-danger-transparent">Hôm nay</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            

              <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">THỐNG KÊ TOÀN THỜI GIAN</div>
                    </div>
                    <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-refresh-empty"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                       <?=format_cash(
                                            $CMSNAV->get_row("SELECT SUM(`robux`) FROM `orders_robux` WHERE `status` = 'xuly' ")['SUM(`robux`)'] + 
                                            $CMSNAV->get_row("SELECT SUM(`robux`) FROM `orders_gamepass` WHERE `status` = 'xuly' ")['SUM(`robux`)']
                                );?>
                                    </span>
                                    <span class="text-muted">TỔNG SỐ ROBUX CẦN DUYỆT</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `updatedate` AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                                    </span>
                                    <span class="text-muted">TÀI KHOẢN ĐÃ BÁN</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?=format_cash($CMSNAV->num_rows("SELECT * FROM `users` WHERE `createdate` AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                                    </span>
                                    <span class="text-muted">THÀNH VIÊN MỚI</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>
                
              <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">THỐNG KÊ THÁNG <?=date('m', time());?></div>
                    </div>
                    <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-refresh-empty"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                       <?=format_cash(
                                                $CMSNAV->get_row("SELECT SUM(`amount`) FROM `bank_auto` WHERE `time` IS NULL AND YEAR(time) = ".date('Y')." AND MONTH(time) = ".date('m')." ")['SUM(`amount`)'] + 
                                              
                                                $CMSNAV->get_row("SELECT SUM(`thucnhan`) FROM `cards` WHERE `deletedate` IS NULL AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." ")['SUM(`thucnhan`)']
                                            );?>
                                    </span>
                                    <span class="text-muted">TỔNG TIỀN NẠP THÁNG</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `updatedate` AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                                    </span>
                                    <span class="text-muted">TÀI KHOẢN ĐÃ BÁN</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?=format_cash($CMSNAV->num_rows("SELECT * FROM `users` WHERE `createdate` AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                                    </span>
                                    <span class="text-muted">THÀNH VIÊN MỚI</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>
                   <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">THỐNG KÊ TUẦN</div>
                    </div>
                    <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-refresh-empty"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                       <?=format_cash(
                                            $CMSNAV->get_row("SELECT SUM(`amount`) FROM `bank_auto` WHERE `time` IS NULL AND WEEK(time, 1) = WEEK(CURDATE(), 1) ")['SUM(`amount`)'] + 
                                           
                                            $CMSNAV->get_row("SELECT SUM(`thucnhan`) FROM `cards` WHERE `deletedate` IS NULL AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) ")['SUM(`thucnhan`)']
                                );?>
                                    </span>
                                    <span class="text-muted">TỔNG TIỀN NẠP TUẦN</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `updatedate` AND WEEK(updatedate, 1) = WEEK(CURDATE(), 1) "));?>
                                        
                                    </span>
                                    <span class="text-muted">TÀI KHOẢN ĐÃ BÁN</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?=format_cash($CMSNAV->num_rows("SELECT * FROM `users` WHERE `createdate` AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) "));?>
                                    </span>
                                    <span class="text-muted">THÀNH VIÊN MỚI</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>
                   <div class="col-xl-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">THỐNG KÊ HÔM NAY</div>
                    </div>
                    <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-success text-xl">
                                    <i class="ion ion-ios-refresh-empty"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                      <?=format_cash(
                                        $CMSNAV->get_row("SELECT SUM(`amount`) FROM `bank_auto` WHERE `time` IS NULL AND `time` >= DATE(NOW()) AND `time` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`amount`)'] + 
                                        
                                        $CMSNAV->get_row("SELECT SUM(`thucnhan`) FROM `cards` WHERE `deletedate` IS NULL AND `status` = 'thanhcong' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`thucnhan`)']
                                        );?>
                                    </span>
                                    <span class="text-muted">TỔNG TIỀN NẠP HÔM NAY</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                                <p class="text-warning text-xl">
                                    <i class="ion ion-ios-cart-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                                    </span>
                                    <span class="text-muted">TÀI KHOẢN ĐÃ BÁN</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                            <div class="d-flex justify-content-between align-items-center mb-0">
                                <p class="text-danger text-xl">
                                    <i class="ion ion-ios-people-outline"></i>
                                </p>
                                <p class="d-flex flex-column text-right">
                                    <span class="font-weight-bold">
                                        <?=format_cash($CMSNAV->num_rows("SELECT * FROM `users` WHERE `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                                    </span>
                                    <span class="text-muted">THÀNH VIÊN MỚI</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->
                        </div>
                    </div>
                </div>
                
   <div class="col-xl-6">
    <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">THỐNG KÊ DOANH THU TÀI KHOẢN THÁNG <?=date('m', time());?></div>
        </div>
        <div class="card-body">
            <canvas id="chartAccount"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctxAccount = document.getElementById('chartAccount');

                new Chart(ctxAccount, {
                    type: 'bar',
                    data: {
                        labels: [<?php
                            $month = date('m');
                            $year = date('Y');
                            $numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                            for ($day = 1; $day <= $numOfDays; $day++) {
                                echo "\"$day/$month/$year\",";
                            }
                        ?>],
                        datasets: [
                            {
                                label: 'DOANH THU TÀI KHOẢN',
                                type: 'bar',
                                data: [
                                    <?php
                                    $data = [];
                                    for ($day = 1; $day <= $numOfDays; $day++) {
                                        $date = "$year-$month-$day";
                                        $row = $CMSNAV->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `id` > 0 AND DATE(updatedate) = '$date'");
                                        $data[$day - 1] = $row['SUM(`money`)'] ?? 0;
                                    }
                                    for ($i = 0; $i < $numOfDays; $i++) {
                                        echo "$data[$i],";
                                    }
                                    ?>
                                ],
                                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 2,
                                hoverBackgroundColor: 'rgba(75, 192, 192, 0.8)',
                            },
                            {
                                label: 'DOANH THU TÀI KHOẢN (Đường)',
                                type: 'line',
                                data: [
                                    <?php
                                    $data = [];
                                    for ($day = 1; $day <= $numOfDays; $day++) {
                                        $date = "$year-$month-$day";
                                        $row = $CMSNAV->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `id` > 0 AND DATE(updatedate) = '$date'");
                                        $data[$day - 1] = $row['SUM(`money`)'] ?? 0;
                                    }
                                    for ($i = 0; $i < $numOfDays; $i++) {
                                        echo "$data[$i],";
                                    }
                                    ?>
                                ],
                                borderColor: 'rgba(255, 99, 132, 1)',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderWidth: 2,
                                tension: 0.1, // Độ cong của đường
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(200, 200, 200, 0.2)',
                                },
                                ticks: {
                                    color: '#4a4a4a',
                                }
                            },
                            x: {
                                grid: {
                                    display: false,
                                },
                                ticks: {
                                    color: '#4a4a4a',
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#4a4a4a',
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>


<div class="col-xl-6">
    <div class="card custom-card">
        <div class="card-header">
            <div class="card-title">THỐNG KÊ DOANH THU DỊCH VỤ THÁNG <?=date('m', time());?></div>
        </div>
        <div class="card-body">
            <canvas id="chartService"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctxService = document.getElementById('chartService');

                new Chart(ctxService, {
                    type: 'bar',
                    data: {
                        labels: [<?php
                            $month = date('m');
                            $year = date('Y');
                            $numOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                            for ($day = 1; $day <= $numOfDays; $day++) {
                                echo "\"$day/$month/$year\",";
                            }
                        ?>],
                        datasets: [
                            {
                                label: 'DOANH THU DỊCH VỤ',
                                type: 'bar',
                                data: [
                                    <?php
                                    $data = [];
                                    for ($day = 1; $day <= $numOfDays; $day++) {
                                        $date = "$year-$month-$day";
                                        $row_gamepass = $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_gamepass` WHERE `id` > 0 AND DATE(updatedate) = '$date'");
                                        $row_robux = $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_robux` WHERE `id` > 0 AND DATE(updatedate) = '$date'");
                                        $row_caythue = $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `id` > 0 AND DATE(updatedate) = '$date'");
                                        $total_money = ($row_gamepass['SUM(`money`)'] ?? 0) + ($row_robux['SUM(`money`)'] ?? 0) + ($row_caythue['SUM(`money`)'] ?? 0);
                                        $data[$day - 1] = $total_money;
                                    }
                                    for ($i = 0; $i < $numOfDays; $i++) {
                                        echo "$data[$i],";
                                    }
                                    ?>
                                ],
                                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 2,
                                hoverBackgroundColor: 'rgba(153, 102, 255, 0.8)',
                            },
                            {
                                label: 'DOANH THU DỊCH VỤ (Đường)',
                                type: 'line',
                                data: [
                                    <?php
                                    $data = [];
                                    for ($day = 1; $day <= $numOfDays; $day++) {
                                        $date = "$year-$month-$day";
                                        $row_gamepass = $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_gamepass` WHERE `id` > 0 AND DATE(updatedate) = '$date'");
                                        $row_robux = $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_robux` WHERE `id` > 0 AND DATE(updatedate) = '$date'");
                                        $row_caythue = $CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `id` > 0 AND DATE(updatedate) = '$date'");
                                        $total_money = ($row_gamepass['SUM(`money`)'] ?? 0) + ($row_robux['SUM(`money`)'] ?? 0) + ($row_caythue['SUM(`money`)'] ?? 0);
                                        $data[$day - 1] = $total_money;
                                    }
                                    for ($i = 0; $i < $numOfDays; $i++) {
                                        echo "$data[$i],";
                                    }
                                    ?>
                                ],
                                borderColor: 'rgba(255, 159, 64, 1)',
                                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                                borderWidth: 2,
                                tension: 0.1, // Độ cong của đường
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(200, 200, 200, 0.2)',
                                },
                                ticks: {
                                    color: '#4a4a4a',
                                }
                            },
                            x: {
                                grid: {
                                    display: false,
                                },
                                ticks: {
                                    color: '#4a4a4a',
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: '#4a4a4a',
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.7)',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>

</div>
    </div>
</div>
            
<?php 
    require_once("../../public/admin/Footer.php");
?>
