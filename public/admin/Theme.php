<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'GIAO DIỆN | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
 

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <?php
    if (isset($_POST['SaveSettings'])) {
        if ($CMSNAV->site('status_demo') == 'ON') {
            admin_msg_warning("Chức năng này không khả dụng trên trang web DEMO!", "", 2000);
        }

        $fields = ['logo', 'logo_dark', 'favicon', 'anhbia', 'background'];

        foreach ($fields as $field) {
            if (isset($_FILES[$field]) && $_FILES[$field]['error'] == UPLOAD_ERR_OK) {
                $rand = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', 3);
                $uploads_dir = "../../assets/storage/theme/";
                $tmp_name = $_FILES[$field]['tmp_name'];
                $url_img = "/{$field}_{$rand}.png";

                if (move_uploaded_file($tmp_name, $uploads_dir . $url_img)) {
                    $CMSNAV->update('options', [
                        'value' => 'assets/storage/theme/' . $url_img
                    ], " `name` = '{$field}' ");
                } else {
                    echo "<script>alert('Lỗi khi di chuyển tập tin {$field}');</script>";
                }
            }
        }

        echo '<script type="text/javascript">alert("Lưu thành công!"); window.location.href = "";</script>';
    }
    ?>
    <!-- Main content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                <h1 class="page-name fw-semibold fs-18 mb-0"><i class="fa-solid fa-layer-group"></i> Cấu hình</h1>
                <nav>
                    <ol class="breadcrumb mb-0"></ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Cấu hình ảnh website
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="row">
                                <?php
                                $labels = [
                                    'logo' => 'Logo Light',
                                    'logo_dark' => 'Logo Dark',
                                    'favicon' => 'Favicon',
                                    'anhbia' => 'Ảnh Share Lên Mxh',                                  
                                ];

                                foreach ($labels as $key => $label) {
                                    echo '<div class="col-6">';
                                    echo '<div class="form-label">';
                                    echo "<label for=\"{$key}\">{$label}</label>";
                                    echo '<div class="input-group">';
                                    echo '<div class="custom-file">';
                                    echo "<input type=\"file\" class=\"custom-file-input\" name=\"{$key}\" id=\"{$key}\">";
                                    echo "<label class=\"custom-file-label\" for=\"{$key}\">Choose file</label>";
                                    echo '</div>';
                                    echo '<div class="input-group-append">';
                                    echo '<span class="input-group-text">Upload</span>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="col-6">';
                                    echo "<img width=\"500px\" src=\"" . BASE_URL($CMSNAV->site($key)) . "\"/><hr>";
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <div class="card-footer clearfix">
                                <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10" type="submit">
                                    <i class="fas fa-save mr-1"></i>Lưu Ngay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-wrapper -->

<!-- bs-custom-file-input -->
<script src="<?=BASE_URL('template/AdminLTE3/');?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>  
<?php 
    require_once("../../public/admin/Footer.php");
?>
