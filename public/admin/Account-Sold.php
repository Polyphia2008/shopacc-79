<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'TÀI KHOẢN ĐÃ BÁN | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>

    <div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i>Danh sách
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
                           DANH SÁCH TÀI KHOẢN ĐÃ BÁN
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5px;"><input type="checkbox" name="check_all" id="check_all"
value="option1"></th>
                                        <th>STT</th>
                                        <th>ID</th>
                                        <th>ẢNH</th>
                                        <th>TÀI KHOẢN</th>
                                        <th>NGƯỜI MUA</th>
                                        <th>THANH TOÁN</th>
                                        <th>THỜI GIAN ĐĂNG</th>
                                        <th>THỜI GIAN MUA</th>
                                        <th>TRẠNG THÁI</th>
                                        <th>THAO TÁC</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list(" SELECT * FROM `accounts` WHERE `username` IS NOT NULL ORDER BY id DESC ") as $row){
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" data-id="<?=$row['id'];?>" name="checkbox"
                                        class="checkbox" value="<?=$row['id'];?>" /></td>
                                        <td><?=$i++;?></td>
                                        <td>#<?=$row['id'];?></td>
                                        <td width="10%"><img width="100%" src="<?=BASE_URL($row['img']);?>" /></td>
                                        <td><?=explode("|", $row['account'])[0];?></td>
                                        <td><?=$row['username'];?></td>
                                        <td><?=format_cash($row['money']);?></td>
                                        <td><?=$row['createdate'];?></td>
                                        <td><?=$row['updatedate'];?></td>
                                        <td><?php if($row['username'] != NULL) { echo 'Đã bán';} else { echo 'Đang bán';};?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="<?=BASE_URL('Admin/Account/Edit/'.$row['id']);?>"><i class="fas fa-edit"></i>
                                                <span>EDIT</span></a>

                                                <button class="btn btn-danger delete" data-id="<?=$row['id'];?>"
                                                data-name="<?=$row['account'];?>"><i class="fas fa-trash"></i>
                                                <span>DELETE</span></button>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            <div class="col-sm-6">
                                    <button class="btn btn-danger btn-sm" type="button"
                                        onclick="deleteConfirm()" name="btn_delete"><i
                                            class="fas fa-trash mr-1"></i>Xoá đã chọn</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>




<script type="text/javascript">
function postRemove(id, callback) {
    $.ajax({
        url: "xoaaccountajax.php",
        type: 'POST',
        dataType: "JSON",
        data: { id: id },
        success: function(response) {
            if (response.status == 'success') {
                cuteToast({
                    type: "success",
                    message: "Đã xóa thành công item " + id,
                    timer: 3000
                });
            } else {
                cuteToast({
                    type: "error",
                    message: "Đã xảy ra lỗi khi xoá item " + id,
                    timer: 5000
                });
            }
            if (callback) callback(); // gọi callback khi xong
        }
    });
}

function deleteConfirm() {
    var result = confirm("Bạn có thực sự muốn xóa các bản ghi đã chọn?");
    if (result) {
        var checkbox = document.getElementsByName('checkbox');
        var checkedCount = 0;
        var totalChecked = 0;

        // đếm số checkbox được chọn
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked === true) totalChecked++;
        }

        if (totalChecked === 0) {
            cuteToast({ type: "info", message: "Vui lòng chọn ít nhất 1 bản ghi", timer: 3000 });
            return;
        }

        // xóa từng item và đếm khi nào xong hết thì reload
        for (var i = 0; i < checkbox.length; i++) {
            if (checkbox[i].checked === true) {
                postRemove(checkbox[i].value, function() {
                    checkedCount++;
                    if (checkedCount === totalChecked) {
                        location.reload(); // reload sau khi tất cả xong
                    }
                });
            }
        }
    }
}

</script>
<script type="text/javascript">
function RemoveRow(id) {
cuteAlert({
type: "question",
title: "CẢNH BÁO",
message: "Bạn có chắc chắn muốn xóa thành viên ID " + id + " không ?",
confirmText: "Đồng Ý",
cancelText: "Hủy"
}).then((e) => {
if (e) {
postRemove(id);
location.reload();
}
})
}
</script>
<script type="text/javascript">
$('.btnEdit').on('click', function(e) {
    var btn = $(this);
    $("#title").val(btn.attr("data-title"));
    $("#display").val(btn.attr("data-display"));
    $("#id").val(btn.attr("data-id"));
    $("#staticBackdrop").modal();
    return false;
});
</script>
<script>
$(function() {
    $("#datatable").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $("#datatable1").DataTable({
        "responsive": false,
        "autoWidth": false,
    });
    $("#datatable2").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
});
</script>
<script type="text/javascript">
$(".delete").on("click", function() {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Tài Khoản",
        message: "Bạn có chắc chắn xóa tài khoản (" + $(this).data('name') + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("assets/ajaxs/admin/delete-account.php");?>",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: $(this).data('id')
                },
                success: function(respone) {
                    if (respone.status == 'success') {
                        cuteToast({
                            type: "success",
                            message: respone.msg,
                            timer: 3000
                        });
                        location.reload();
                    } else {
                        cuteAlert({
                            type: "error",
                            title: "Error",
                            message: respone.msg,
                            buttonText: "Okay"
                        });
                    }
                },
                error: function() {
                    alert(html(response));
                    location.reload();
                }
            });
        }
    })
});
</script>


<?php 
    require_once(__DIR__."/Footer.php");
?>
