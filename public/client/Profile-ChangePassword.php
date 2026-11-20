<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'THAY ĐỔI MẬT KHẨU | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
    CheckLogin();
?>
        <?php require_once('Sidebar.php');?>
		 <div class="c-ml-16 c-ml-lg-0 c-history-right c_history-right">
		<div class="card unset-lg withdraw-items" style="margin-bottom: 92px">
        <div class="card-header d-none d-lg-block">
            <h1 class="text-title-bold fz-20 lh-28">
                                Đổi mật khẩu
                            </h1> </div>
        <div class="head-mobile">
            <a href="/thong-tin" class="link-back"></a>
            <h1 class="head-title text-title">Thông tin tài khoản</h1>
            <a href="/" class="home"></a>
        </div>
       
        <div class="card-body c-px-16 c-px-lg-0 c-py-0 loadding-content">
            <div class="c-pt-16 c-pb-lg-50 c-mb-lg-50" id="tab-1" role="tabpanel">
                 <div id="thongbao"></div>
                <form action="" method="POST" id="form-changePassword">
                    <input type="hidden" name="_token" value="">
                    
                    <div class="input-group"> <span class="form-label">
                                    Mật khẩu mới
                                </span>
                        <div class="toggle-password">
                            <input class="password" id="password" name="password" type="password" placeholder="Vui lòng nhập mật khẩu mới"> </div> <span class="text-error c-mt-4"></span> </div>
                    <div class="input-group"> <span class="form-label">
                                    Xác nhận
                                </span>
                        <div class="toggle-password">
                            <input class="password-confirm" type="password" id="repassword" name="repassword" placeholder="Vui lòng xác nhận mật khẩu mới"> </div> <span class="text-error c-mt-4"></span> </div>
                     <div class="footer-mobile v2 group-btn c-my-24 c-my-lg-0 c-px-lg-16 c-pt-lg-16 button-password" style="--data-between:12px">
                        <button class="btn primary btn-data" type="button" id="DoiMatKhau" onclick="changePassword()" style="position: relative"> Đổi mật khẩu </button>
                    </div>
			</div>
				<!-- end change password -->
			  </div>
		   </div>
		</div>
		
    </div>
</div>

<script type="text/javascript">
$("#DoiMatKhau").on("click", function() {
    $('#DoiMatKhau').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/Auth.php");?>",
        method: "POST",
        data: {
            type: 'DoiMatKhau',
            password: $("#password").val(),
            repassword: $("#repassword").val()
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#DoiMatKhau').html(
                    'Cập nhật')
                .prop('disabled', false);
        }
    });
});
</script>
<?php 
    require_once("../../public/client/Footer.php");
?>