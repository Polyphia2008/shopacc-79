<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ NHÓM CÀY THUÊ | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<style>
.badge-success {
    color: #000; /* Màu chữ đen */
}
</style>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Minigame
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
                           Thêm trò chơi
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="datatable1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable1_length"><label>Show <select name="datatable1_length" aria-controls="datatable1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatable1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable1"></label></div></div></div><div class="row"><div class="col-sm-12"><table  class="table table-bordered table-striped table-hover dataTable no-footer" role="grid" aria-describedby="datatable1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" aria-label="TÊN CHUYÊN MỤC: activate to sort column ascending">GAME</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable1" rowspan="1" colspan="1" aria-label="THAO TÁC: activate to sort column ascending">THAO TÁC</th></tr>
                                </thead>
                                <tbody>
                                <tr role="row" class="odd">
                                    <td><span class="badge badge-success">Vòng Quay</span></td>
                                        <td>
                                            <a type="button" href="/Admin/VongQuay" class="btn btn-info"><i class="fas fa-file-medical"></i>
                                                <span>Thêm Vòng Quay</span></a>
                                        </td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td><span class="badge badge-success">Lật Thẻ</span></td>
                                        <td>
                                            <a type="button" href="/public/admin/ThemLatThe.php" class="btn btn-info"><i class="fas fa-file-medical"></i>
                                                <span>Thêm Lật Thẻ</span></a>
                                        </td>
                                </tr>
                                </tbody>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable1_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable1_previous"><a href="#" aria-controls="datatable1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="datatable1_next"><a href="#" aria-controls="datatable1" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                        </div>
                    </div>
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
</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>


<?php 
    require_once(__DIR__."/Footer.php");
?>