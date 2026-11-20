<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'LỊCH SỬ HOA HỒNG | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lịch Sử Hoa Hồng</h1>
                </div>
            </div>
        </div>
    </section>
   

            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DANH SÁCH CHUYÊN MỤC</h3>
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
                                                <th width="10%">#</th>
                                                <th>USERNAME</th>
                                                <th>TỔNG NẠP</th>
                                                <th>THỜI GIAN THAM GIA</th>
                                            </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `users` WHERE `ref` = '".$getUser['id']."' ORDER BY id DESC ") as $row){
                                    ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$row['username'];?></td>
                                                <td><?=format_cash($row['total_money']);?></td>
                                                <td><span class="label label-danger"><?=$row['createdate'];?></span>
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
<?php 
    require_once(__DIR__."/Footer.php");
?>