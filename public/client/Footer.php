<!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
<!--nHẬN QUÀ -->
<?php if($CMSNAV->site('nhanqua') == 'ON') { ?>
<div class="bonusouter">
    <link rel="stylesheet" href="/assets/frontend1/theme_5/css/modal_home/bonus.css" />
    <?php
    // Kiểm tra session trước
    if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
        $wheel = $CMSNAV->get_row("SELECT * FROM `lichsu_nhanqua` WHERE `username` = '".$_SESSION['username']."' AND `NA_trathuong` = '1'");
    } else {
        $wheel = null;
    }

    if(empty($wheel)){
    ?>
        <a id="bonus" title="Click để nhận thưởng!">
            <img src='<?=$CMSNAV->site('img_bonus');?>'/>
            <img class="remove_gift_bonus" style="width: 24px;height: 24px;position: absolute;top: 0;right: 0" src='/assets/frontend1/theme_5/image/closer-red.png'/>
            
        </a>
    <?php } ?>
</div>

     <div class="modal fade" id="bonusModal" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông
                                báo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="middle nohuthang" style="text-align: center;padding: 15px 0;color: blue"></div>
                        <div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">
                            <p><strong>Chúc mừng bạn đã nhận được&nbsp;</strong></p> <b class="moneyAdd"></b>

                            <p><strong>từ . Chúc bạn năm mới vui vẻ.&nbsp;Mua hàng ủng hộ mình nhé!</strong></p>
                            <style>
                                #bonusModal .modal-body p{display:inline!important}
                            </style>
                        </div>
            <div class="modal-footer">
                <a href="/user/rutvatpham" class="btn primary submit-data-form btnRVP" style="display:none"><a href="#" style="color: #ffffff">Rút vật phẩm</a></button>
                <button style="width: 50%" type="button" class="btn ghost" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
<script>
var roll_check = true;

$(document).on('click', '#bonus', function(){
    if(!roll_check) return;
    roll_check = false;

    $.ajax({
        url: '/assets/ajaxs/nhanqua.php',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id_vongquay: 1
        },
        success: function(res){
            var data = jQuery.parseJSON(res);

            if(data.status == 'login'){
    if($(window).width() > 1200){
        // PC: mở modal desktop
        $('#loginModal').modal('show');
    } else {
        // Mobile: mở giao diện mobile
        $('.mobile-auth-form #formLoginMobile').css('display', 'flex');
        $('.mobile-auth-form #formRegisterMobile').css('display', 'none');
        $('.mobile-auth .head-mobile p').text('Đăng nhập');
        $('.mobile-auth').css('transform', 'translateX(0)');
    }
    roll_check = true;
}
            else if(data.status == 'ok'){
                $(".moneyAdd").html(data.kimcuong);
                $('#bonusModal').modal('show');
                $('#bonus').remove();
            }
            else if(data.status == 'err'){
                $('.modal-body').text(data.msg || 'Có lỗi xảy ra. Vui lòng thử lại!');
                $('#bonusModal').modal('show');
                roll_check = true;
            }
        },
        error: function(xhr){
            console.error(xhr.responseText);
            $('.modal-body').text('Có lỗi xảy ra. Vui lòng thử lại!');
            $('#bonusModal').modal('show');
            roll_check = true;
        }
    });
});
</script>
<script>
$(document).on('click', '.remove_gift_bonus', function(e){
    e.stopPropagation(); // không cho click lan ra thẻ #bonus
    $('.bonusouter').remove(); // hoặc .hide()
});
</script>

<?php } ?>
<!--nHẬN QUÀ-->

<div class="modal fade modal-big" id="rechargeModal">
    <div class="modal-dialog modal-dialog-centered modal-custom">
        <div class="modal-content p-0">
            <div class="modal-header c-pl-24 c-pr-24 c-pt-24 c-pb-16" style="border-bottom: 1px solid #E4E5F0">
                <p class="modal-title center">Nạp tiền</p>
                <button type="button" class="close" data-dismiss="modal" style="right: 24px;top: 36px"></button>
            </div>
            <div class="modal-body pl-0 pr-0 c-pt-0 c-pb-24">
                <section class="section-category-tab">
                    <div class="c-mb-16 c-mb-lg-16">
                        <ul class="nav nav-tabs size-auto" role="tablist" style="width: 100%;margin: 0 auto">
                            <li class="nav-item" role="presentation"> <a class="tab active" data-toggle="tab" href="#charge_card_modal" role="tab" aria-selected="true">Nạp thẻ cào</a> </li>
                            <li class="nav-item" role="presentation"> <a class="tab" data-toggle="tab" href="#atm_card_modal" role="tab" aria-selected="false">ATM tự động</a> </li>
                        </ul>
                    </div>
                    <div class="tab-content c-pl-24 c-pl-lg-16 c-pr-24 c-pr-lg-16">
                        <div class="tab-pane fade show active" id="charge_card_modal" role="tabpanel">
                            <form class="w-100" action="" id="chargeCardModalForm">
                                <div id="thongbaonapthe" style="padding-bottom: 13px;"></div>
                                <div class="row content-block">
                                    <div class="col-12 c-pr-8">
                                        <div class="money-form-group c-mb-16">
                                            <label class="text-form fz-13 fw-500 c-mb-4">Nhà cung cấp</label>
                                            <div class="col-md-12 p-0">
                                                <select id="loaithe" class="select-component" required>
                                                                                                            <option value="VIETTEL">Viettel</option>
                                                 <option value="VINAPHONE">Vinaphone</option>
                                                 <option value="MOBIFONE">Mobifone</option>
                                            </select>
                                                                                                    </select>
                                             
                                            </div>
                                        </div>
                                        <div class="money-form-group c-mb-12">
                                            <label class="text-form fz-13 fw-500 c-mb-8">Chọn mệnh giá</label>
                                                
                                                       <div class="col-md-12 p-0">
                                                <select id="menhgia" class="select-component" required>
                                                                                                            <option value="">-- Chọn đúng mệnh giá. Sai mất thẻ --</option>
                                                <option value="10000">
                                                    Thẻ 10,000đ
                                                </option>
                                                <option value="20000">
                                                    Thẻ 20,000đ
                                                </option>
                                                <option value="30000">
                                                    Thẻ 30,000đ
                                                </option>
                                                <option value="50000">
                                                    Thẻ 50,000đ
                                                </option>
                                                <option value="100000">
                                                    Thẻ 100,000đ
                                                </option>
                                                <option value="200000">
                                                    Thẻ 200,000đ
                                                </option>
                                                <option value="300000">
                                                    Thẻ 300,000đ
                                                </option>
                                                <option value="500000">
                                                    Thẻ 500,000đ
                                                </option>
                                                <option value="1000000">
                                                    Thẻ 1,000,000đ
                                                </option>
                                                                                                    </select>
                                             
                                            </div>
                                        </div>
                                        <p style="margin-bottom: 8px;color: #DA4343;font-size: 13px">*Chú ý: Nạp thẻ sai mệnh giá mất 100% giá trị thẻ.</p>
                                        <div class="money-form-group c-mb-8">
                                            <label class="text-form fz-13 fw-500 c-mb-4 d-none d-lg-block">Mã số thẻ</label>
                                            <div class="col-md-12 p-0">
                                                <div class="input-group">
                                                    <input class="input-form w-100 daylamapinmodal" id="pin" type="text" placeholder="Nhập mã số thẻ của bạn">
                                                    <p class="text-error c-mb-0 c-mt-4"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="money-form-group c-mb-8">
                                            <label class="text-form fz-13 fw-500 c-mb-4 d-none d-lg-block">Số sê-ri</label>
                                            <div class="col-md-12 p-0">
                                                <div class="input-group">
                                                    <input class="input-form w-100" id="seri" type="text" placeholder="Nhập mã số sê-ri trên thẻ">
                                                    <p class="text-error c-mb-0 c-mt-4"></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                                   
                                        <div class="group-btn c-mt-24 d-flex">
                                            <button class="btn primary" type="button" id="NapThe" <?php if(empty($_SESSION['username'])) { ?> onclick="openLoginModal();" data-dismiss="modal"
                                                <?php }?>>Nạp ngay</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                        <div class="tab-pane fade" id="atm_card_modal" role="tabpanel">
                            <div class="row content-block">
                                <div class="col-12 col-lg-12">
                                    <div class="atm-recharge-right c-p-16 brs-8">
                                        <?php if(empty($_SESSION['username'])) { ?>                                      
                                        <div class="atm-recharge-content c-p-sm-12 brs-sm-8">
                                            <div class="atm-recharge-attr" style="text-align: center">
                                                <p class="fz-14 fw-600 mb-0" style="color: red; max-width: 100% !important;">Vui lòng đăng nhập để nhận được nội dung chuyển tiền!</p>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="atm-recharge-guide"> <img class="w-100 c-mb-16" src="/assets/frontend1/theme_5/image/phu/atm_recharge_guide.png" alt="">
                                            <p class="fz-13 fw-400">Để hoàn tất đơn nạp, bạn vui lòng chuyển khoản theo cú pháp sau:</p>
                                        </div>
                                        <div class="atm-recharge-content c-p-sm-12 brs-sm-8">
                                            <p style="text-align:center"><strong>*Chú Ý: Chuyển đúng cú pháp, sai nội dung bị chuyển qua ID khác shop không chịu trách nhiệm</strong> </p>
                                            <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th class="text-center" colspan="2">Thông tin nạp
                                                                    tiền
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Nội dung chuyển khoản</strong></td>
                                                                <th><span
                                                                        class="c-mr-4 copy-content-charge icon--coppy"><img
                                                                            alt="copy-black"
                                                                            src="/assets/frontend1/theme_5/image1/icons/copy-black.png" />
                                                                    </span><?=$CMSNAV->site('noidung_naptien').$getUser['id'];?>
                                                                    
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Tên ngân hàng</strong></td>
                                                                <th><span
                                                                        class="c-mr-4 copy-content-charge icon--coppy"><img
                                                                            alt="copy-black"
                                                                            src="/assets/frontend1/theme_5/image1/icons/copy-black.png" /></span><?=$CMSNAV->site('type_bank');?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Số tài khoản</strong></td>
                                                                <th><span
                                                                        class="c-mr-4 copy-content-charge icon--coppy"><img
                                                                            alt="copy-black"
                                                                            src="/assets/frontend1/theme_5/image1/icons/copy-black.png" /></span><?=$CMSNAV->site('stk_bank');?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Tên tài khoản</strong></td>
                                                                <th><span
                                                                        class="c-mr-4 copy-content-charge icon--coppy"><img
                                                                            alt="copy-black"
                                                                            src="/assets/frontend1/theme_5/image1/icons/copy-black.png" /></span><?=$CMSNAV->site('name_bank');?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                              <img style="width: 250px; height: auto; display:block; margin: 0 auto;" src="https://img.vietqr.io/image/<?=$CMSNAV->site('type_bank');?>-<?=$CMSNAV->site('stk_bank');?>-qr_only.png?addInfo=<?=$CMSNAV->site('noidung_naptien').$getUser['id'];?>" />
                                                <div class="atm-child pl-3 pr-3">
                                                                                                            <p>&nbsp;<span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><span style="color:#e74c3c"><strong>LƯU Ý: Vui lòng chuyển ĐÚNG NỘI DUNG BÊN TRÊN để được cộng tiền vào tài khoản.</strong></span></span></span></p>

<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><em>(Trong trường hợp ghi nhầm ID của người khác, Shop sẽ không chịu trách nhiệm! )</em></span></span></p>

<p>- <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Hệ thống sẽ xử lý tự động cộng số dư sau khi chuyển khoản 1-5&nbsp;phút nếu bạn ghi đúng nội dung.</span></span></p>

<p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">- Bạn có thể thao tác chuyển khoản nhanh bằng cách mở ứng dụng ngân hàng và chọn<strong> <span style="color:#e74c3c">quét mã QR</span></strong> để tự động điền đúng nội dung cần chuyển.</span></span></p>
<style type="text/css">

</style>
                                                        <p class="tranfer-mess-cskh font-italic">- Trong trường hợp sau
                                                            <span>
                                                                5 phút</span> không được xử lý
                                                            tự động vui lòng <a class="font-weight-bold "
                                                                href="<?=$CMSNAV->site('facebook');?>"
                                                                target="_blank">
                                                                liên hệ CSKH</a> để được trợ giúp.</p>
                                                                                                    </div>
                                            </div>
                                        <?php }?> 
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script>
 $('.copy-content-charge').on('click', function() {
    let th = $(this).closest('th');

    let text_value = th.contents().filter(function() {
        return this.nodeType === 3; // Node text
    }).text().trim();

    navigator.clipboard.writeText(text_value);
    tippy('.copy-content-charge', {
        trigger: 'click',
        content: "Đã copy",
        placement: 'right',
    });
});
</script>
<div class="step" id="chargeConfirmStep">
    <div class="head-mobile">
        <a href="javascript:void(0) " class="link-back close-step"></a>
        <p class="head-title text-title">Xác nhận thanh toán</p>
        <a href="/" class="home"></a>
    </div>
    <div class="body-mobile">
        <div class="body-mobile-content c-p-16">
            <div class="dialog--content__title fw-700 fz-15 c-mb-12 text-title-theme"> Thông tin nạp thẻ </div>
            <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                    <div class="card--attr__name fw-400 fz-13 text-center text-order"> Nhà mạng </div>
                    <div class="card--attr__value fz-13 fw-500" id="confirmTitleMobile"></div>
                </div>
                <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                    <div class="card--attr__name fw-400 fz-13 text-center text-order"> Mệnh giá </div>
                    <div class="card--attr__value fz-13 fw-500" id="confirmPriceMobile"></div>
                </div>
                <div class="card--attr justify-content-between d-flex text-center">
                    <div class="card--attr__name fw-400 fz-13 text-center text-order"> Chiết khấu </div>
                    <div class="card--attr__value fz-13 fw-500" id="confirmDiscountMobile"></div>
                </div>
            </div>
            <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                <div class="card--attr justify-content-between d-flex text-center">
                    <div class="card--attr__name fw-400 fz-13 text-center text-order"> Phí thanh toán </div>
                    <div class="card--attr__value fz-13 fw-500"> Miễn phí </div>
                </div>
            </div>
            <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 brs-8 c-pr-12 g_mobile-content">
                <div class="card--attr__total justify-content-between d-flex text-center">
                    <div class="card--attr__name fw-400 fz-13 text-center text-order"> Số tiền thực nhận </div>
                    <div class="card--attr__value fz-13 fw-500">
                        <a href="javascript:void(0)" class="c-text-primary" id="totalBillMobile"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-mobile v2">
        <div class="group-btn">
            <button class="btn primary" id="confirmSubmitButtonMobile">Xác nhận</button>
        </div>
    </div>
</div>
<div class="modal fade modal-big" id="orderCharge">
    <div class="modal-dialog modal-dialog-centered modal-custom">
        <div class="modal-content c-p-24">
            <div class="modal-header">
                <p class="modal-title center">Xác nhận thanh toán</p>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme"> Thông tin nạp thẻ </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center"> Nhà mạng </div>
                        <div class="card--attr__value fz-13 fw-500" id="confirmTitle"></div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center"> Mệnh giá </div>
                        <div class="card--attr__value fz-13 fw-500" id="confirmPrice"></div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center"> Chiết khấu </div>
                        <div class="card--attr__value fz-13 fw-500" id="confirmDiscount"></div>
                    </div>
                </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fz-13 fw-400 text-center"> Phí thanh toán </div>
                        <div class="card--attr__value fz-13 fw-500"> Miễn phí </div>
                    </div>
                </div>
                <div class="card--gray  c-mb-0 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center"> Số tiền thực nhận </div>
                        <div class="card--attr__value fz-13 fw-500">
                            <a href="javascript:void(0)" class="c-text-primary" id="totalBill"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn primary" type="button" id="confirmSubmitButton">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-small" id="modalSuccessPayment">
    <div class="modal-dialog modal-dialog-centered modal-custom">
        <div class="modal-content">
            <div class="modal-header justify-content-center p-0"> <img class="c-pt-20 c-pb-20" src="/assets/frontend1/theme_5/image/son/success.png" alt=""> </div>
            <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Nạp thẻ thành công</p>
                <p class="fw-400 fz-13 c-mt-10 mb-0" id="successMessage"></p>
            </div>
            <div class="modal-footer c-p-24"> <a href="/" class="btn secondary" data-dismiss="modal">Trang chủ</a>
                <button class="btn primary handle-recharge-modal" data-tab="1" data-dismiss="modal">Nạp thêm </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-small" id="modalFailPayment">
    <div class="modal-dialog modal-dialog-centered modal-custom">
        <div class="modal-content">
            <div class="modal-header justify-content-center p-0"> <img class="c-pt-16 c-pb-16" src="/assets/frontend1/1theme_5/image/son/thatbai.png" alt=""> </div>
            <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Nạp thẻ thất bại</p>
                <p class="fw-400 fz-13 c-mt-10 mb-0" id="failMessage"></p>
            </div>
            <div class="modal-footer c-p-24">
                <button class="btn ghost" data-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>
<?php if($CMSNAV->site('status_notification') == 'ON') { ?>
 <div class="modal fade modal__buyacount modal-big" id="topChargModal">
        <div class="modal-dialog modal-dialog-centered modal-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"
                        style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="font-family: helvetica, arial, sans-serif;" id="noticeImage">
                    
                </div>
                <div class="modal-footer c-p-24">
                    <button class="btn secondary" type="button" style="width: calc(40% - 6px);"
                        data-dismiss="modal">Đóng</button>
                    <button class="btn primary openModalNoti" style="width: calc(60% - 6px);" data-dismiss="modal">Tắt
                        trong 1h</button>
                </div>
            </div>
        </div>
    </div>

            <div class="modal fade modal__buyacount c-pt-16" id="noticeModal">
            <div class="modal-dialog modal-dialog-centered modal-customs" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body c-pt-16 c-pb-0 c-px-0" style="font-family: helvetica, arial, sans-serif;"
                        id="noticeImage">
                      <?= $CMSNAV->site("notification")?>
                    </div>
                    <div class="modal-footer">
                        <button class="btn secondary" type="button" style="width: calc(40% - 6px);"
                            data-dismiss="modal">Đóng</button>
                        <button class="btn primary openModalNoti" style="width: calc(60% - 6px);"
                            data-dismiss="modal">Tắt trong 1h</button>
                    </div>
                </div>
            </div>
        </div>
<?php }?>
<!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
<div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-lg modal-dialog-centered animated">
        <div class="modal-content">
            <div class="modal-login-container" id="modal-login-container">
                <div class="modal-login-form-container sign-up-container"> <img class="close-login-modal" src="/assets/frontend1/theme_5/image/son/close.svg" alt="">
                    <form class="modal-login-form formRegister">
                        <div class="tw-mb-4" id="thongbaoreg"></div>
                        <input type="hidden" name="_token" value="">
                        <p class="fw-700 fz-24 fz-lg-24 fz-md-18 fz-sm-16 color-pink lh-24">Đăng ký</p> <small class="fz-13 fz-md-12 fz-sm-10 fw-400 c-mb-12">Vui lòng đăng nhập để sử dụng dịch vụ của chúng tôi</small>
                        <p class="modal-login-error text-center registError" id="registError"></p> <span class="input-group w-100 ">
                            <input class="input-primary c-mt-12" type="text" id="usernamereg" placeholder="Nhập tên tài khoản" autocomplete="off" required>
                            <span class="text-error c-mt-4"></span> </span>
                        <div class="w-100 input-group">
                            <div class="password-input-container c-mt-8">
                                <input class="input-primary" type="password" id="passwordreg" placeholder="Nhập mật khẩu của bạn" autocomplete="off" required> <img class="password-input-hide" src="/assets/frontend1/theme_5/image/son/eye-show.svg" alt="" style="display: none"> <img class="password-input-show" src="/assets/frontend1/theme_5/image/son/eye-hide.svg" alt=""> </div> <span class="text-error c-mt-4"></span> </div>
                        <div class="w-100 input-group">
                            <div class="password-input-container c-mt-8">
                                <input class="input-primary" type="password" id="repasswordreg" placeholder="Nhập lại mật khẩu của bạn" autocomplete="off" required> <img class="password-input-hide" src="/assets/frontend1/theme_5/image/son/eye-show.svg" alt="" style="display: none"> <img class="password-input-show" src="/assets/frontend1/theme_5/image/son/eye-hide.svg" alt=""> </div> <span class="text-error c-mt-4"></span> </div>
                                <?php if ($CMSNAV->site('status_recapcha') == 'ON'): ?>
    <div class="g-recaptcha c-mt-12"
         data-sitekey="<?= $CMSNAV->site('recaptcha_sitekey'); ?>">
    </div>
<?php endif; ?>
                        <button type="button" id="Register" class="btn pink btn-pink-default c-mt-16">Đăng ký</button>
                    </form>
                </div>
                <div class="modal-login-form-container sign-in-container">
                    <form class="modal-login-form formLogin">
                        <div class="tw-mb-4" id="thongbaolog"></div>
                        <input type="hidden" name="_token" value="">
                        <p class="fw-700 fz-24 fz-lg-24 fz-md-18 fz-sm-16 lh-32">Đăng nhập</p> <small class="fz-13 fz-md-12 fz-sm-10 fw-400 c-mb-12">Vui lòng đăng ký để sử dụng dịch vụ của chúng tôi</small>
                        <p class="modal-login-error text-center LoginError"></p> <span class="input-group w-100 ">
                            <input class="input-primary c-mt-12" type="text" id="usernamelog" placeholder="Nhập tên tài khoản" autocomplete="off" required>
                            <span class="text-error c-mt-4"></span> </span>
                        <div class="w-100 input-group">
                            <div class="password-input-container c-mt-8 ">
                                <input class="input-primary" type="password" id="passwordlog" placeholder="Nhập mật khẩu" autocomplete="off" required>
                                <img class="password-input-hide" src="/assets/frontend1/theme_5/image/son/eye-show.svg" alt="" style="display: none" required>
                                <img class="password-input-show" src="/assets/frontend1/theme_5/image/son/eye-hide.svg" alt=""> </div> <span class="text-error c-mt-4"></span>
                                </div>
                                <?php if ($CMSNAV->site('status_recapcha') == 'ON'): ?>
    <div class="g-recaptcha c-mt-12"
         data-sitekey="<?= $CMSNAV->site('recaptcha_sitekey'); ?>">
    </div>
<?php endif; ?>

                        <button type="button" id="Login" class="btn primary c-mt-16 c-mt-md-14 c-mt-sm-14 btn-primary-default">Đăng nhập</button> 
                        <span class="login-via fw-400 fz-13 fz-md-12 fz-sm-10 c-mt-24 c-mt-lg-20 c-mt-md-16 c-mt-sm-8">Hoặc đăng nhập qua</span>
                        <div class="social-container c-mt-24 c-mt-lg-20 c-mt-md-16">
                           <?php if($CMSNAV->site('status_google') == 'ON') { ?>
                             <a href="/login/google" class="social"> <img src="https://bloxvn.net/assets/frontend/theme_5/image/google.png" alt=""> </a><?php }?>
                        </div>
                    </form>
                </div>
                <div class="modal-login-overlay-container">
                    <div class="modal-login-overlay">
                        <div class="modal-login-overlay-panel modal-login-overlay-left" style="background-image: url('/assets/frontend1/theme_5/image/son/bglogin.png')">
                            <p class="modal-login-suggestion fw-700 fz-24 fz-lg-20 fz-md-18 fz-sm-16 c-mt-24 c-mt-lg-20 c-mt-md-16 c-mt-sm-8 mb-0 lh-36"> <span class="fz-24 " style="color: var(--primary-color);"><?=$_SERVER['SERVER_NAME'];?></span> xin chào</p>
                            <p class="fw-400 fz-13 fz-md-12 fz-sm-10 c-mb-24 c-mb-lg-20 c-mb-md-16 c-md-sm-8">Bạn đã có tài khoản, vui lòng đăng nhập tại đây</p>
                            <button class="btn primary btn-primary-default" id="signIn">Đăng nhập</button>
                        </div>
                        <div class="modal-login-overlay-panel modal-login-overlay-right" style="background-image: url('/assets/frontend1/theme_5/image/son/bglogin.png')"> <img class="close-login-modal" src="/assets/frontend1/theme_5/image/son/close.svg" alt="">
                            <p class="modal-login-suggestion fw-700 fz-24 fz-lg-20 fz-md-18 fz-sm-16 c-mt-24 c-mt-lg-20 c-mt-md-16 c-mt-sm-8 mb-0 lh-36"> <span class="fz-24" style="color: var(--primary-color);"><?=$_SERVER['SERVER_NAME'];?></span> xin chào</p>
                            <p class="fw-400 fz-13 fz-md-12 fz-sm-10 c-mb-32 c-mb-lg-20 c-mb-md-16 c-md-sm-8">Vui lòng đăng ký ngay tại đây</p>
                            <button class="btn pink btn-pink-default" id="signUp">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-auth step">
    <div class="head-mobile">
        <a href="javascript:void(0);" class="link-back close-step"></a>
        <p class="head-title text-title">Đăng nhập</p>
    </div> <small class="fz-13 fz-md-12 fz-sm-10 fw-400 c-mb-12">Vui lòng đăng ký để sử dụng dịch vụ của chúng tôi</small>
    <div class="mobile-auth-form c-px-16 c-pt-50">
        <form action="" method="POST" id="formRegisterMobile" class="flex-column justify-content-center aligin-items-center text-center formRegister">
             <input type="hidden" name="_token" value="">
                <div class="tw-mb-4" id="thongbaoreg2"></div>
            <div class="c-mt-40"> <img src="<?=BASE_URL($CMSNAV->site('logo_dark'));?>" alt="" class="d-lg-block d-none" style="width: 100px"> <img src="<?=BASE_URL($CMSNAV->site('logo_dark'));?>" alt="" class="d-lg-none" style="width: 100px"> </div>
            <p class="fw-500 fz-15 lh-24 c-mt-24 c-mb-20">Đăng ký để trải nghiệm tốt nhất
                <br> dịch vụ của chúng tôi!</p>
            <p class="text-error c-mb-20 registError"></p> <span class="input-group w-100 c-mb-16">
                <input class="" type="text" id="usernamereg2" placeholder="Nhập tên tài khoản" autocomplete="off">
                <span class="text-error c-mt-4"></span> </span> <span class="input-group w-100 c-mb-16">
                <span class="toggle-password w-100">
                    <input class="" type="password" id="passwordreg2" placeholder="Nhập mật khẩu của bạn" autocomplete="off">
                </span> <span class="text-error c-mt-4"></span> </span> <span class="input-group w-100 c-mb-16">
                <span class="toggle-password w-100">
                    <input class="" type="password" id="repasswordreg2" placeholder="Nhập lại mật khẩu của bạn" autocomplete="off">
                </span> <span class="text-error c-mt-4"></span>
              </span>
                <?php if ($CMSNAV->site('status_recapcha') == 'ON'): ?>
    <div class="g-recaptcha c-mt-12"
         data-sitekey="<?= $CMSNAV->site('recaptcha_sitekey'); ?>">
    </div>
<?php endif; ?>
            <button type="button" id="Register2" class="btn primary">Đăng ký</button>
            <p class="mobile-auth-change-form fw-400 fz-12 lh-16 c-mt-24">Bạn đã có tài khoản? <span class="changeFormLogin">Đăng nhập tại đây</span> </p>
        </form>
        <form action="/ajax/login" id="formLoginMobile" class="flex-column justify-content-center aligin-items-center text-center formLogin">
            <input type="hidden" name="_token" value="">
                <div class="tw-mb-4" id="thongbaolog1"></div>
            <div class="c-mt-40"> <img src="<?=BASE_URL($CMSNAV->site('logo_dark'));?>" alt="" class="d-lg-block d-none" style="width: 100px"> <img src="<?=BASE_URL($CMSNAV->site('logo_dark'));?>" alt="" class="d-lg-none" style="width: 100px"> </div>
            <p class="fw-500 fz-15 lh-24 c-mt-24 c-mb-20">Đăng nhập để tiến hành giao dịch! </p> <span class="LoginError text-error c-mb-20"></span> <span class="input-group w-100 c-mb-16">
                <input class="" type="text" id="usernamelog1" placeholder="Nhập tên tài khoản" autocomplete="off">
                <span class="text-error c-mt-4"></span> </span> <span class="input-group w-100 c-mb-16">
                <span class="toggle-password w-100">
                    <input class="" type="password" id="passwordlog1" placeholder="Nhập mật khẩu của bạn" autocomplete="off">
                </span> <span class="text-error c-mt-4"></span> </span>
                  <?php if ($CMSNAV->site('status_recapcha') == 'ON'): ?>
    <div class="g-recaptcha c-mt-12"
         data-sitekey="<?= $CMSNAV->site('recaptcha_sitekey'); ?>">
    </div>
<?php endif; ?>
            <button type="button" id="Login1" class="btn primary">Đăng nhập</button>
            <div class="login-line d-flex align-items-center c-mt-24 c-px-25"> <span class="d-block"></span>
                <p class="c-mb-0 fz-13 fw-400 c-mx-8">Hoặc đăng nhập qua</p> <span class="d-block"></span> </div>
            <div class="social-container c-mt-16">
                
                <?php if($CMSNAV->site('status_google') == 'ON') { ?>
                 <a href="/login/google" class="d-inline-flex justify-content-center aligin-items-center c-mx-10"> <img src="https://bloxvn.net/assets/frontend/theme_5/image/google.png" alt=""> </a><?php }?>
            </div>
            <p class="mobile-auth-change-form fw-400 fz-12 lh-16 c-mt-16">Bạn chưa có tài khoản? <span class="changeFormRegister">Đăng ký tại đây</span> </p>
        </form>
    </div>
</div>
<script src="/assets/frontend1/theme_5/js/notification.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/user/account.js?v=<?=time();?>"></script>
</div>
</div>
<div id="menu-bottom-tabs" class="tabs">
    <ul class="d-flex justify-content-between px-0 c-mb-8 flex-grow-1 flex-shrink-0 ">
        <li class="menu-bottom-item menu-bottom-item-0 px-0">
            <a href="/" class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center"> <span class="menu-bottom_icon menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24"><i class="__icon__profile --sm__profile --link__profile" style="--path : url(https://cdn3.upanh.info/upload/server-sw3/images/Icon1/Home%20-%20pink.png)"></i></span> <span class="menu-bottom_text fz-12">Home</span> </a>
        </li>
       
        <li class="menu-bottom-item menu-bottom-item-2 px-0"> <a <?php if(empty($_SESSION['username'])) { ?> href="javascript:void(0);" onclick="openLoginModal();" <?php }else{?> href="/user/recharge" <?php }?> class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                <span class="menu-bottom_icon menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(https://cdn3.upanh.info/upload/server-sw3/images/Icon1/N%E1%BA%A1p%20th%E1%BA%BB%20-%20pink.png)"></i>
                    </span>
                <span class="menu-bottom_text fz-12">Nạp tiền</span>
            </a> </li>
            <li class="menu-bottom-item menu-bottom-item-2 px-0"> <a <?php if(empty($_SESSION['username'])) { ?> href="javascript:void(0);" onclick="openLoginModal();" <?php }else{?> href="/voucher" <?php }?> class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                <span class="menu-bottom_icon menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(https://cdn3.upanh.info/upload/server-sw3/images/Icon1/N%E1%BA%A1p%20th%E1%BA%BB%20-%20pink.png)"></i>
                    </span>
                <span class="menu-bottom_text fz-12">Khuyến Mãi</span>
            </a> </li>
        <li class="menu-bottom-item menu-bottom-item-4 px-0"> <a <?php if(empty($_SESSION['username'])) { ?> href="javascript:void(0);" onclick="openLoginModal();" <?php }else{?> href="/thong-tin" <?php }?> class="d-flex justify-content-center c-p-5 fz-13 fw-400 flex-column align-items-center">
                <span class="menu-bottom_icon menu-bottom_icon c-pt-6 c-pb-2 text-center  c-mb-4 brs-24">
                            <i class="__icon__profile --sm__profile --link__profile" style="--path : url(https://cdn3.upanh.info/upload/server-sw3/images/Icon1/D%E1%BB%8Bch%20v%E1%BB%A5%20-%20pink.png)"></i>
                    </span>
                <span class="menu-bottom_text fz-12">Tài khoản</span>
            </a> </li>
    </ul>
</div>
<div class="modal-loader-container">
    <div class="modal-loader-content"> <span class="modal-loader-spin"></span> </div>
</div>

    <div class="footer-default media-web " id="footer">
    <div class="c-container container">
<div class="c-pl-lg-0 c-pr-lg-0 mobile-default-footer row">
<div class="c-pt-32 footer-default-body-row footer-default-col">
<div class="col-auto left-right media-footer-order-one text-left">
<div class="footer-default-body-row marginauto row">
<div class="col-md-12 footer-default-body-col left-right">
    <a href="/"></a>
    <img alt="" src="<?=BASE_URL($CMSNAV->site('logo_dark'));?>" width="300" />
</div>
</div>

<div class="col-md-14 footer-default-body-col left-right"><span style="font-size:16px"><small><?=$CMSNAV->site('mota');?> .</small></span></div>
</div>
</div>

<div class="c-pl-16 c-pr-16 footer-default-col footer-default-information">
<div class="c-pb-16 c-pt-22 col-md-12 left-right">
<h4>THÔNG TIN CHUNG</h4>
</div>

<div class="col-md-12 footer-default-two left-right">
<ul>
	<li class="c-pb-8 c-pt-8"><span style="font-size:16px"><a href="/" rel="follow" target="_blank">Về chúng tôi</a></span></li>
	<li class="c-pb-8 c-pt-8"><span style="font-size:16px"><a href="/" rel="follow" target="_blank">Chính sách bảo mật</a></span></li>
	<li class="c-pb-8 c-pt-8"><span style="font-size:16px"><a href="/" rel="follow" target="_blank">Ðiều khoản sử dụng</a></span></li>
	<li class="c-pb-8 c-pt-8"><span style="font-size:16px"><a href="/" rel="follow" target="_blank">Chính sách bán hàng</a></span></li>
	<li class="c-pb-8 c-pt-8"><span style="font-size:16px"><a href="/" rel="follow" target="_blank">Chính sách đổi trả</a></span></li>
	<li class="c-pb-8 c-pt-8"><span style="font-size:16px"><a href="/" rel="follow" target="_blank">Hướng dẫn nạp tiền vào web</a></span></li>
</ul>
</div>
</div>

<div class="c-pl-16 c-pr-16 footer-default-col footer-default-information">
<div class="c-pb-16 c-pt-22 col-md-12 left-right">
<h4>SẢN PHẨM</h4>
</div>
	<?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'dichvu'") as $row) { ?><?php }?> 
<div class="col-md-12 footer-default-two left-right">
<ul>
    
   
   <?php foreach($CMSNAV->get_list("SELECT * FROM `category_caythue` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
	<li class="c-pb-8 c-pt-8"><span style="font-size:16px"><a href="<?=BASE_URL('dich-vu/'.$category['id']);?>"><?=$category['title'];?></a></span></li>
	<?php }?> 
    
	
</ul>
</div>
</div>

<div class="c-pl-16 footer-default-col footer-default-information">
<div class="c-pb-16 c-pt-22 col-md-12 left-right">
<h4>HỖ TRỢ KHÁCH HÀNG</h4>
</div>

<div class="col-md-12 left-right">
<ul style="list-style:none; padding-left:0">
	<li class="link-footer"><img alt="phone" src="/assets/frontend1/theme_5/image/duong/phone.svg" /><span style="font-size:16px"><span class="c-pl-8">Chăm sóc hàng:&nbsp;</span></span> <?=$CMSNAV->site('hotline');?></li>
	<li class="link-footer"><span style="font-size:16px"><img alt="facebook" src="/assets/frontend1/theme_5/image/duong/facebook.svg" /><span class="c-pl-8">Facebook</span></span>:<?=$CMSNAV->site('facebook');?></li>
</ul>

<div id="c-fb-page">&nbsp;</div>

</div>
</div>
</div>
</div>
<div class="col-md-12 footer-copyright c-pt-8 c-pb-8"> <span class="fz-md-12 white-color">© Copyright <?=date('Y');?> - <a class="fz-md-12 white-color" href="" target="_blank">Privacy Policy</a> - <a class="fz-md-12 white-color" target="_blank" href="">Terms of Service</a></span>
    <div> <span class="fz-md-12 white-color">Operated by <a href="//facebook.com/topie08" target="_blank" class=" fweight-500 text-secondary-color">TOPIE.NET </a><i class="fa fa-check-circle" style="color:rgb(17, 143, 249)" title="Verified Author"></i>, All Rights Reserved</span> </div>
</div>
</div>





   
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	
<script src="/assets/frontend1/theme_5/lib/jirim-lazyload/lazyload.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/bootstrap/bootstrap.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/wnumb-1.2.0/wNumb.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/toastr/toastr.min.js?v=<?=time();?>"></script>
 <script type="text/javascript" src="/assets/frontend1/theme_5/js/charge/charge.js?v=<?=time()?>"></script>
    <script type="text/javascript" src="/assets/frontend1/theme_5/js/tdhh/loading.js?v=<?=time()?>"></script>
    <script type="text/javascript" src="/assets/frontend1/theme_5/js/tdhh/noti.js?v=<?=time()?>"></script>
    <script src="/assets/frontend1/theme_5/js/search_header/search.js?v=<?=time()?>"></script>
<script src="/assets/frontend1/theme_5/lib/select-nice/select-nice.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/popper/popper.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/popper/tippy-bundle.umd.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/steps/jquery-steps.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/easeJquery/easing.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/login/login_modal.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/nouislider/nouislider.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/fancybox/fancybox.umd.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/fancybox/jquery.fancybox.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/OwlCarousel2/OwlCarousel2.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/slick/slick.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/swiper/swiper.min.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/config/swiper-slider-conf.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/date-picker/moment.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/date-picker/bootstrap-datetimepicker.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/validate-form/validate.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/config/form-validate.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/date-picker/i18n/vi.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/custom/main.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/nam/header.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/main.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/nam/swiper-banner.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/bottom-sheet/main.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/lib/history-filter/handle.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/trung/notify.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/js_duong/style.js?v=<?=time();?>"></script>
<!--<script src="/assets/frontend1/theme_5/lib/select2/select2.min.js?v=<?=time();?>"></script>-->
<script src="/assets/frontend1/theme_5/lib/easy-navigate-toc/public/js/toctoc.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/user/change-password.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/transfer/transfer.js?v=<?=time();?>"></script>
<script src="/assets/frontend1/theme_5/js/js_jirim/get_viewed.js?v=<?=time()?>"></script>
<?php if ($CMSNAV->site('status_recapcha') == 'ON'): ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>
 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var lazyImages = document.querySelectorAll('.lazy');

        lazyImages.forEach(function(img) {
            img.addEventListener('load', function() {
                img.removeAttribute('data-src'); // Xóa thuộc tính data-src để tránh việc tải hình ảnh lại khi scroll
            });

            img.setAttribute('src', img.getAttribute('data-src'));
        });
    });
</script>

   <script>
    document.addEventListener('DOMContentLoaded', function() {
      var loadingWrap = document.querySelector('.loading-wrap');
      loadingWrap.style.display = 'none';

      var layout = document.querySelector('.layout');
      layout.style.display = 'block';
    });
  </script> 
    <script>
<script>
function fixToastToTopRight() {
    const toastContainers = document.querySelectorAll('.toast-container');
    toastContainers.forEach(container => {
        // nếu chưa nằm trong body thì move ra body
        if (container.parentElement !== document.body) {
            document.body.appendChild(container);
        }

        // ép style cố định lại
        container.style.position = 'fixed';
        container.style.top = '20px';
        container.style.right = '20px';
        container.style.zIndex = '999999';
    });
}

// kiểm tra liên tục 2 giây đầu (khi form đăng ký render)
let i = 0;
const toastFixTimer = setInterval(() => {
    fixToastToTopRight();
    i++;
    if (i > 20) clearInterval(toastFixTimer); // dừng sau 3 giây
}, 100);

// nếu có Ajax hoặc form load lại => vẫn reposition
document.addEventListener('ajaxComplete', fixToastToTopRight);
document.addEventListener('DOMContentLoaded', fixToastToTopRight);
window.addEventListener('load', fixToastToTopRight);
</script>
<style>
    .main-lay-out {
        background: #000 url(/assets/frontend1/theme_5/images/background_image.jpg);
        background-attachment: fixed;
        background-size: 100%;
        padding-bottom: 40px;
    }
</style>
<!--Register-->
 <script type="text/javascript">
     $("#Login").on("click", function() {
    $('#Login').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);

    // kiểm tra nếu reCAPTCHA tồn tại
    let captchaResponse = '';
    if (typeof grecaptcha !== "undefined" && grecaptcha.getResponse) {
        captchaResponse = grecaptcha.getResponse();
    }

    $.ajax({
        url: "<?= BASE_URL('assets/ajaxs/Auth.php'); ?>",
        method: "POST",
        data: {
            type: 'Login',
            username: $("#usernamelog").val(),
            password: $("#passwordlog").val(),
            'g-recaptcha-response': captchaResponse
        },
        success: function(response) {
            $("#thongbaolog").html(response);
            if (typeof grecaptcha !== "undefined" && grecaptcha.reset) {
                grecaptcha.reset();
            }
            $('#Login').html('Đăng Nhập').prop('disabled', false);
        },
        error: function() {
            $('#Login').html('Đăng Nhập').prop('disabled', false);
        }
    });
});


    </script>



<!--Login-->

 <script type="text/javascript">
 $("#Register2").on("click", function() {
    $('#Register2').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
// kiểm tra nếu reCAPTCHA tồn tại
    let captchaResponse = '';
    if (typeof grecaptcha !== "undefined" && grecaptcha.getResponse) {
        captchaResponse = grecaptcha.getResponse();
    }
    $.ajax({
        url: "<?=BASE_URL('assets/ajaxs/Auth.php');?>",
        method: "POST",
        data: {
            type: 'Registermb',
            username: $("#usernamereg2").val(),
            password: $("#passwordreg2").val(),
            repassword: $("#repasswordreg2").val(),
        },
        success: function(response) {
    $("body").append(response);
    if (typeof grecaptcha !== "undefined" && grecaptcha.reset) {
                grecaptcha.reset();
            }
    $('#Register2').html('Đăng Ký').prop('disabled', false);
        }
    });
});
</script>
<!--mobile log reg  -->
<!--Register-->
<script type="text/javascript">
$("#Login1").on("click", function() {

    $('#Login1').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled',
        true);
        // kiểm tra nếu reCAPTCHA tồn tại
    let captchaResponse = '';
    if (typeof grecaptcha !== "undefined" && grecaptcha.getResponse) {
        captchaResponse = grecaptcha.getResponse();
    }
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/Auth.php");?>",
        method: "POST",
        data: {
            type: 'Login',
            username: $("#usernamelog1").val(),
            password: $("#passwordlog1").val()
        },
        success: function(response) {
            $("#thongbaolog1").html(response);
            if (typeof grecaptcha !== "undefined" && grecaptcha.reset) {
                grecaptcha.reset();
            }
            $('#Login1').html(
                    'Đăng Nhập ')
                .prop('disabled', false);
        }
    });
});
</script>
<!--Login-->
<!-- Developer By TOPIE.NET | ZALO.ME/0355861031 -->
<!--Register-->
<script type="text/javascript">
$("#Register").on("click", function() {
   

    $('#Register').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop('disabled', true);
// kiểm tra nếu reCAPTCHA tồn tại
    let captchaResponse = '';
    if (typeof grecaptcha !== "undefined" && grecaptcha.getResponse) {
        captchaResponse = grecaptcha.getResponse();
    }
    $.ajax({
        url: "<?=BASE_URL('assets/ajaxs/Auth.php');?>",
        method: "POST",
        data: {
            type: 'Register',
            username: $("#usernamereg").val(),
            password: $("#passwordreg").val(),
            repassword: $("#repasswordreg").val()
            
        },
        success: function(response) {
            $("#thongbaoreg").html(response);
            if (typeof grecaptcha !== "undefined" && grecaptcha.reset) {
                grecaptcha.reset();
            }
            $('#Register').html('Đăng Ký').prop('disabled', false);
          
        }
    });
});
</script>
        <script type="text/javascript">
    $("#NapThe").on("click", function() {
        $('#NapThe').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled',
            true);
        $.ajax({
            url: "<?=BASE_URL("assets/ajaxs/NapThe.php");?>",
            method: "POST",
            data: {
                loaithe: $("#loaithe").val(),
                menhgia: $("#menhgia").val(),
                seri: $("#seri").val(),
                pin: $("#pin").val()
            },
            success: function(response) {
                $("#thongbaonapthe").html(response);
                $('#NapThe').html(
                        'NẠP NGAY')
                    .prop('disabled', false);
            }
        });
    });
    </script>
</body>
</html>
