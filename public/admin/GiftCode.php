<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'QUẢN LÝ CHUYÊN MỤC | '.$CMSNAV->site('tenweb');
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
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
    foreach ($_POST as $key => $value)
    {
        $CMSNAV->update("options", array(
            'value' => $value
        ), " `name` = '$key' ");
    }
    admin_msg_success('Lưu thành công', '', 500);
}
?>
<?php
if(isset($_POST['ThemGiftCode']) && $getUser['level'] == 'admin' )
{
    if($CMSNAV->site('status_demo') == 'ON')
    {
        admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
    }
   
    $CMSNAV->insert("giftcode", array(
        'code'        => check_string($_POST['code']),
        'dieukien'    => check_string($_POST['dieukien']),
        'soluong'     => check_string($_POST['soluong']),
        'sovatpham'   => check_string($_POST['sovatpham']),
        'loai'        => check_string($_POST['loai']),
        'createdate'    => gettime()
    ));
    admin_msg_success("Thêm thành công", '', 500);
}
?>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i>GIFTCODE
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
                          ON/OFF GIFTCODE
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF GiftCode</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="giftcode" required>
                                        <option <?=$CMSNAV->site('giftcode') == 'ON' ? 'selected' : '';?> value="ON">
                                            ON</option>
                                        <option <?=$CMSNAV->site('giftcode') == 'OFF' ? 'selected' : '';?>
                                            value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </section>
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                          THÊM GIFTCODE
                        </div>
                    </div>
                    
                    
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Mã GiftCode</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="code" class="form-control" placeholder="Nhập giftcode cần tạo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Điều Kiện Tổng Nạp Để Sử Dụng GiftCode</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="dieukien" class="form-control" placeholder="Nhập điều kiện tổng nạp để sử dụng giftcode" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Số Lượng Sử Dụng GiftCode</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="soluong" class="form-control" placeholder="Số lượng sử dụng cho mã giftcode" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Số Lượng Vật Phẩm Nhận Được (Vd: Muốn Khách Nhận Được 50 Robux Thì Nhập 50)</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="sovatpham" class="form-control" placeholder="Số lượng vật phẩm nhận được" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Loại Vật Phẩm Nhận Được</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="loai" required>
                                        <option value="robux">robux</option>
                                        <option value="money">money</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="ThemGiftCode" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                          DANH SÁCH GIFTCODE
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>MÃ GIFTCODE</th>
                                        <th>Điều Kiện Tổng Nạp</th>
                                        <th>Số Lượng Sử Dụng</th>
                                        <th>Số Lần Đã Sử Dụng</th>
                                        <th>Số Vật Phẩm Nhận Được</th>
                                        <th>Loại</th>
                                        <th>Ngày Tạo</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `giftcode` ORDER BY id DESC ") as $row){ ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$row['code'];?></td>
                                        <td><?=format_cash($row['dieukien']);?>đ</td>
                                        <td><?=format_cash($row['soluong']);?></td>
                                        <td><?=format_cash($row['sudung']);?></td>
                                        <td><?=format_cash($row['sovatpham']);?></td>
                                        <td><?=$row['loai'];?></td>
                                        <td><?=$row['createdate	'];?></td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="<?=BASE_URL('Admin/GiftCode/Edit/');?><?=$row['id'];?>"><i
                                                    class="fas fa-edit"></i>
                                                <span>EDIT</span></a>


                                            <button class="btn btn-danger delete" data-id="<?=$row['id'];?>"
                                                data-name="<?=$row['title'];?>"><i class="fas fa-trash"></i>
                                                <span>DELETE</span></button>
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



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">EDIT CHUYÊN MỤC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-label row">
                        <label class="col-sm-4 col-form-label">Tên chuyên mục</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <input type="hidden" name="id" id="id" class="form-control" required>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-label row">
                        <label class="col-sm-4 col-form-label">Ảnh mô tả</label>
                        <div class="col-sm-8">
                            <div class="form-line">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-label row">
                        <label class="col-sm-4 col-form-label">Hiển thị</label>
                        <div class="col-sm-8">
                            <select class="form-control show-tick" id="display" name="display" required>
                                <option value="SHOW">SHOW</option>
                                <option value="HIDE">HIDE</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="LuuChuyenMuc" class="btn btn-danger">Lưu ngay</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->

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


<script type="text/javascript">
$(".delete").on("click", function() {
    cuteAlert({
        type: "question",
        title: "Xác Nhận Xóa",
        message: "Bạn có chắc chắn xóa (" + $(this).data('name') + ") không ?",
        confirmText: "Đồng Ý",
        cancelText: "Hủy"
    }).then((e) => {
        if (e) {
            $.ajax({
                url: "<?=BASE_URL("assets/ajaxs/admin/delete-code.php");?>",
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