<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CẤU HÌNH | '.$CMSNAV->site('tenweb');
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


<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Cấu hình
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
                           Cấu hình thông tin website
                        </div>
                    </div>
                    <div class="card-body">                        <form action="" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Tên website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tenweb" value="<?=$CMSNAV->site('tenweb');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Mô tả website</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="mota" value="<?=$CMSNAV->site('mota');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Từ khóa tìm kiếm</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="tukhoa" value="<?=$CMSNAV->site('tukhoa');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Số Điện Thoại</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="hotline" value="<?=$CMSNAV->site('hotline');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Facebook</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="facebook" value="<?=$CMSNAV->site('facebook');?>"
                                            class="form-control">
                                            </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Zalo</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="zalo" value="<?=$CMSNAV->site('zalo');?>"
                                            class="form-control">
                                   
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Website</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="baotri" required>
                                        <option value="<?=$CMSNAV->site('baotri');?>"><?=$CMSNAV->site('baotri');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                    <i>Nếu bạn OFF, website sẽ bật chế độ bảo trì.</i>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">HTML-JS Footer</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="form-control" rows="10"
                                            style="background-color: #000;color:#00d230;" name="html_footer"
                                            placeholder="Chèn JS trang trí hay chèn code gì vô cũng được nếu muốn"
                                            rows="6"><?=$CMSNAV->site('html_footer');?></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(function() {
    // Summernote
    $('.textarea').summernote()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
})
</script>
</div></div></div></div>
<?php 
    require_once("../../public/admin/Footer.php");
?>