<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once(__DIR__."/../../includes/login-ctvacc.php");
    $title = 'DASHBROAD | '.$CMSNAV->site('tenweb');
    require_once("../../public/ctvacc/Header.php");
    require_once("../../public/ctvacc/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>









<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-2">Dashboard</h1>
            <div class="float-right">
                
            </div>
        </div>
                
                        <div class="row">
                        <div class="col-12">
                <div class="text-right mb-3">
                    <img src="https://zshopclone7.cmsnt.net/mod/img/gif-live.gif" width="60px">
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
                                <span class="fw-semibold text-muted d-block mb-2">TỔNG SỐ TIỀN TÀI KHOẢN ĐÃ BÁN</span>
                                <h5 class="fw-semibold mb-2" id="total_orders_all">
                                   <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `username` IS NOT NULL AND `receiver` = '".$getUser['username']."' ")['SUM(`money`)']);?>
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
                                    <i class="fa-solid fa-cart-shopping fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">TÀI KHOẢN BẠN ĐĂNG ĐANG BÁN</span>
                                <h5 class="fw-semibold mb-2" id="total_pay_all">
                                      <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `username` IS NULL AND `receiver` = '".$getUser['username']."' "));?>
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
                                    <i class="fa-solid fa-cart-shopping fs-18"></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">TÀI KHOẢN BẠN ĐĂNG ĐÃ BÁN</span>
                                <h5 class="fw-semibold mb-2" id="profit_all">
                                     <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `username` IS NOT NULL AND `receiver` = '".$getUser['username']."' "));?><div class="spinner" style="display: none;">
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
                                    <i class="fa-solid fa-money-bill-trend-up fs-18 "></i>
                                </span>
                            </div>
                            <div class="flex-fill">
                                <span class="fw-semibold text-muted d-block mb-2">DOANH THU BÁN TÀI KHOẢN HÔM NAY</span>
                                <h5 class="fw-semibold mb-2" id="new_users_month">
                                     <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY AND `receiver` = '".$getUser['username']."' ")['SUM(`money`)']);?>
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
                                <span class="fw-semibold text-muted d-block mb-2">TÀI KHOẢN BẠN ĐÃ BÁN ĐƯỢC HÔM NAY</span>
                                <h5 class="fw-semibold mb-2" id="total_orders_month">
                                    <?=format_cash($CMSNAV->num_rows("SELECT * FROM `accounts` WHERE `updatedate` >= DATE(NOW()) AND `updatedate` < DATE(NOW()) + INTERVAL 1 DAY AND `receiver` = '".$getUser['username']."' "));?>
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
                 </div>
                </div>
            </div>
            
            
<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>

<?php 
    require_once("../../public/ctvacc/Footer.php");
?>