<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'LỊCH SỬ NẠP THẺ | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Lịch sử
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
                           Danh sách thẻ cào 
                        </div>
                    </div>
                        <div class="card-body">
                            <table id="datatable1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                      <th width="5%">#</th>
                                        <th>Username</th>
                                        <th>Nhà mạng</th>
                                        <th>Serial</th>
                                        <th>Pin</th>
                                        <th>Mệnh giá</th>
                                        <th>Thực nhận</th>
                                        <th>Trạng thái</th>
                                        <th>Createdate</th>
                                        <th>Lý do</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0; foreach ($CMSNAV->get_list("SELECT * FROM `cards` ORDER BY `id` DESC ") as $row) {?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><a
                                                href="<?=BASE_URL('Admin/User/Edit/'.$CMSNAV->getUser($row['username'])['id']);?>"><?=$row['username'];?> [ID <?=$row['id'];?>] </a>
                                        </td>
                                        <td><?=$row['loaithe'];?>
                                        </td>
                                        <td><?=$row['seri'];?></td>
                                        <td><?=$row['pin'];?></td>
                                        <td><b style="color: red;"><?=format_cash($row['menhgia']);?></b></td>
                                        <td><b style="color: green;"><?=format_cash($row['thucnhan']);?></b></td>
                                        <td><?=display_card($row['status']);?></td>
                                        <td><?=$row['createdate'];?></td>
                                        <td><?=$row['note'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script>
$(function() {
    $("#datatable1").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
});
</script>



<?php 
    require_once("./Footer.php");
?>