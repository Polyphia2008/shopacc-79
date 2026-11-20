<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once(__DIR__."/../../includes/login-ctv.php");
    $title = 'DASHBROAD | '.$CMSNAV->site('tenweb');
    require_once("../../public/ctv/Header.php");
    require_once("../../public/ctv/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>





<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Đơn cày thuê của bạn</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Đơn cày thuê đang cày</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'dangcay' "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
           <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng Đơn cày thuê hoàn tất</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'hoantat' "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng tiền Đơn cày thuê đã hoàn thành</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status`= 'hoantat' ")['SUM(`money`)']);?>đ
                        </span>
                    </div>
                </div>
            </div>
            
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tháng này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tháng này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'dangcay' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
           <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn tất tháng này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'hoantat' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn thành tháng này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status`= 'hoantat' AND YEAR(createdate) = ".date('Y')." AND MONTH(createdate) = ".date('m')." ")['SUM(`money`)']);?>đ
                        </span>
                    </div>
                </div>
            </div>
            
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tuần này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tuần này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'dangcay' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
           <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn tất tuần này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'hoantat' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn thành tuần này</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status`= 'hoantat' AND WEEK(createdate, 1) = WEEK(CURDATE(), 1) ")['SUM(`money`)']);?>đ
                        </span>
                    </div>
                </div>
            </div>
            
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê tuần hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'dangcay' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
           <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn tất hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->num_rows("SELECT * FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status` = 'hoantat' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY "));?>
                            
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-check-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn cày thuê hoàn thành hôm nay</span>
                        <span class="info-box-number">
                            <?=format_cash($CMSNAV->get_row("SELECT SUM(`money`) FROM `orders_caythue` WHERE `receiver` = '".$getUser['username']."' AND `status`= 'hoantat' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ")['SUM(`money`)']);?>đ
                        </span>
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
    require_once("../../public/ctv/Footer.php");
?>