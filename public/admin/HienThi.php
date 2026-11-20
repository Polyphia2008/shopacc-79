<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CẤU HÌNH | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../includes/login-admin.php");
    require_once(__DIR__."/Header.php");
    require_once(__DIR__."/Sidebar.php");
    require_once(__DIR__."/../../includes/checkLicense.php");
?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JS của Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
                           Cấu hình hiển thị website
                        </div>
                    </div>
                            <div class="card-body">   
                        <form action="" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Danh Mục MiniGame</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="minigame" required>
                                        <option value="<?=$CMSNAV->site('minigame');?>"><?=$CMSNAV->site('minigame');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Danh Mục Accounts</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="accounts" required>
                                        <option value="<?=$CMSNAV->site('accounts');?>"><?=$CMSNAV->site('accounts');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Danh Mục Cày Thuê</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="caythue" required>
                                        <option value="<?=$CMSNAV->site('caythue');?>"><?=$CMSNAV->site('caythue');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Danh Mục Robux</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="robux" required>
                                        <option value="<?=$CMSNAV->site('robux');?>"><?=$CMSNAV->site('robux');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Danh Mục Bán Vật Phẩm</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="gamepass" required>
                                        <option value="<?=$CMSNAV->site('gamepass');?>"><?=$CMSNAV->site('gamepass');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>  
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Mục Sale</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status_sale" required>
                                        <option value="<?=$CMSNAV->site('status_sale');?>"><?=$CMSNAV->site('status_sale');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            

                            <button type="submit" name="btnSaveOption" class="btn btn-primary btn-block">
                                <span>LƯU</span></button>
                        </form>
                    </div>

    </section>
</br>
<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CÀI ĐẶT HIỂN THỊ WEBSITE</h3>
                        <div class="card-tools">
                                    
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Giảm Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="giamgia" value="<?=$CMSNAV->site('giamgia');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Nhân Giá</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="nhangiatien" value="<?=$CMSNAV->site('nhangiatien');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>   
                              <div class="form-label row">
    <label class="col-sm-3 col-form-label">Loại bên cạnh nạp thẻ</label>
    <div class="col-sm-9">
        <select class="form-control show-tick" name="loaicanhnapthe" id="loaicanhnapthe" required>
            <option value="youtube" <?= $CMSNAV->site('loaicanhnapthe') == 'youtube' ? 'selected' : '' ?>>YOUTUBE</option>
            <option value="banner" <?= $CMSNAV->site('loaicanhnapthe') == 'banner' ? 'selected' : '' ?>>BANNER</option>
        </select>
    </div>
</div>

<!-- YOUTUBE BOX -->
<div id="box_youtube" style="display:none;">
    <div class="form-label row">
        <label class="col-sm-3 col-form-label">ID Video Youtube</label>
        <div class="col-sm-9">
            <div class="form-line">
                <input type="text" name="id_video_youtube"
                       value="<?= $CMSNAV->site('id_video_youtube'); ?>"
                       class="form-control"
                       placeholder="Ví dụ: Zzn9-ATB9aU">
            </div>
        </div>
    </div>
</div>

<!-- BANNER BOX -->
<div id="box_banner" style="display:none;">
    <div class="form-label row">
        <label class="col-sm-3 col-form-label">Link Banner 1</label>
        <div class="col-sm-9">
            <div class="form-line">
                <input type="text" name="banner1"
                       value="<?= $CMSNAV->site('banner1'); ?>"
                       class="form-control"
                       placeholder="">
            </div>
        </div>
    </div>

    <div class="form-label row">
        <label class="col-sm-3 col-form-label">Link Banner 2</label>
        <div class="col-sm-9">
            <div class="form-line">
                <input type="text" name="banner2"
                       value="<?= $CMSNAV->site('banner2'); ?>"
                       class="form-control"
                       placeholder="">
            </div>
        </div>
    </div>
</div>

<script>
    function updateForm() {
        let type = document.getElementById("loaicanhnapthe").value;

        document.getElementById("box_youtube").style.display = (type === "youtube") ? "block" : "none";
        document.getElementById("box_banner").style.display = (type === "banner") ? "block" : "none";
    }

    // Chạy ngay khi load trang (set đúng theo DB)
    updateForm();

    // Khi người dùng đổi option
    document.getElementById("loaicanhnapthe").addEventListener("change", updateForm);
</script>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Thông Báo Trang Chủ</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status_notification" required>
                                        <option value="<?=$CMSNAV->site('status_notification');?>"><?=$CMSNAV->site('status_notification');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>                        
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Nhận Quà</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="nhanqua" required>
                                        <option value="<?=$CMSNAV->site('nhanqua');?>"><?=$CMSNAV->site('nhanqua');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
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
</br>
<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">CẤU HÌNH NỘI DUNG</h3>
                        <div class="card-tools">
                                    
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="" method="POST">
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Ảnh Nhận Quà</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="img_bonus" value="<?=$CMSNAV->site('img_bonus');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Thông báo trang chủ</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="notification"
                                            rows="6"><?=$CMSNAV->site('notification');?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">Thông báo top nạp</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="motatopnap"
                                            rows="6"><?=$CMSNAV->site('motatopnap');?></textarea>
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
<section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Setting capcha</h3>
                        <div class="card-tools">
                                    
                                </div>
                            </div>
                            <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF capcha</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status_recapcha" required>
                                        <option value="<?=$CMSNAV->site('status_recapcha');?>"><?=$CMSNAV->site('status_recapcha');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>      
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">site key</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="recaptcha_sitekey" value="<?=$CMSNAV->site('recaptcha_sitekey');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">secret key</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="recaptcha_secretkey" value="<?=$CMSNAV->site('recaptcha_secretkey');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>   
                       
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">ON/OFF Login GG</label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick" name="status_google" required>
                                        <option value="<?=$CMSNAV->site('status_google');?>"><?=$CMSNAV->site('status_google');?>
                                        </option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                    </select>
                                </div>
                            </div>                        
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">client_id_gg</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="client_id_gg" value="<?=$CMSNAV->site('client_id_gg');?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-label row">
                                <label class="col-sm-3 col-form-label">client_secret_gg</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="client_secret_gg" value="<?=$CMSNAV->site('client_secret_gg');?>"
                                            class="form-control">
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
CKEDITOR.replace("notification");
CKEDITOR.replace("motatopnap");
</script>
</div></div></div></div>
<?php 
    require_once("../../public/admin/Footer.php");
?>