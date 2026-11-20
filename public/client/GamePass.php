 <?php
        require_once("../../config/config.php");
        require_once("../../config/function.php");
        $title = 'THANH TOÁN | '.$CMSNAV->site('tenweb');
        require_once("../../public/client/Header.php");
        require_once("../../public/client/Nav.php");
?>
<?php

if(isset($_GET['id']))
{
    $row = $CMSNAV->get_row(" SELECT * FROM `category_gamepass` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 500);
    }
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}

?> 
<style>
    .svelte-scroll {
    overflow-y: hidden !important;
    max-height: 220px;
}

.svelte-scroll:hover {
    overflow-y: scroll !important;
    padding-right: 4px;
}

.svelte-scroll:hover::-webkit-scrollbar{
    width: 8px;
}

.svelte-scroll:hover::-webkit-scrollbar-thumb {
    background: rgba(188, 191, 214, 0.5);
    border-radius: 12px;
}


.svelte-scroll:hover::-webkit-scrollbar-thumb:active {
    background: rgba(188, 191, 214, 1);
}

.stevel_edit{
    padding: 9px 12px;
    font-size: 13px;
    color: #434657;
    border: 1px solid #E4E5F0;
    border-radius: 8px;
}
.history-detail-info-block.active{
    background-color: #F3F3F7!important;
}

.history-detail-info-block-gamepass:hover{
    background-color: #F3F3F7!important;
}
.toggle-gamepass{
    position: relative;
    width: 100%;
}
.loadding_service_hiddent{
    display: none;
}
.loadding_service{
    width: 100%;
    justify-content: center
}
</style>
    <link rel="stylesheet" href="//BLOXVN.NET/assets/frontend/theme_5/css/nick/detail.css">

<form id="logout-form" action="" method="POST" class="d-none">
    <input type="hidden" name="_token" value="4pycfrwh2xcy7REW9gVLGtbCmm8LIHtVlncS7KeG"></form>
    <div class="layout">
        <div class="content" style="">
                        <input type="hidden" id="isVoucher" value="2">
        <input type="hidden" class="image_icon" value="">
        <input type="hidden" class="check_gold_time"
            value="">
        <input type="hidden" class="discount_started_at"
            value="">
        <input type="hidden" class="discount_ended_at"
            value="">
        <div class="container c-container">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Dịch vụ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" class="breadcrumb-link"><?=$row['title'];?></a>
                </li>
            </ul>
            <div class="head-mobile">
                <a href="/" class="link-back"></a>
                <p class="head-title text-title"><?=$row['title'];?></p>
                <a href="/viewed">
        <img src="/assets/frontend1/theme_5/image/DA-XEM.png" alt="DA-XEM"
            style="position: absolute;top: 16px;right: 60px;width:30px; height: 30px">
    </a>
    <a href="/">
        <img src="/assets/frontend1/theme_5/image/nam/cart.svg" alt="cart"
            style="position: absolute;top: 16px;right: 16px;width:30px; height: 30px">
        <p id="num_cart_mob" class=""></p>
    </a>
            </div>
        </div>

        
        <link rel="stylesheet"
        href="//bloxvn.net/assets/frontend/theme_5/css/jirim/banner_sale.css?v=1741152340">
        
                <input type="hidden" value="2" id="gate_id">

                <div class="container c-container" id="minigame-category">
                                                            <input type="hidden" id="count_send_name" value="3">
                    <div class="d-flex flex-column-reverse">
                                                    <div class="c-mb-16 c-mt-16">
                                <div class="card overflow-hidden detailViewBlock">
                                    <div class="card-body c-px-16">
                                        <div class="content-desc hide detailViewBlockContent">
                                            <p><?=$row['luuy'];?></p>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <span class="see-more" data-content="Xem thêm nội dung"></span>
                                    </div>
                                </div>
                            </div>
                                                <section class="listing-service c-mb-16 c-mt-16">
                            <div class="section-header justify-content-between c-pb-20 c-pb-lg-16">
                                <h2 class="section-title fw-700 fz-20 lh-28 "><?=$row['title'];?></h2>
                                <div class="search__service__image" style="display: flex">
                                    <button class="btn ghost btn__clear__all fz-13 c-px-16"
                                        style="margin-right: 8px;">Xoá</button>
                                    <form action="" class="form-search position-relative" style="margin-right: 8px">
                                        <input type="search" placeholder="Tìm kiếm" name="id_data"
                                            class="has-submit input-service-image bor-form-search">
                                        <button type="submit" class="d-none d-lg-block" id="button-service-image"></button>
                                    </form>
                                   
                                </div>
                            </div>
                                                        <hr>
                                                                                            <div id="getshowservice_data">
                                    <div class="j-load">
                                        <div class="list-service c-py-16 c-py-lg-8 list-service-all">
                                                               <?php foreach($CMSNAV->get_list("SELECT * FROM `groups_gamepass` WHERE  `category` = '".$row['id']."' ") as $group) { ?>                                                                                                                                                                                                 <div class="item-service js-service">
                                                            <div class="card card-hover" style="position: relative">
                                                                <div data-gia="<?=$group['money'];?>" value="<?=$group['id'];?>" class="card-body scale-thumb c-p-16 c-p-lg-12 show-confirm dathang1"
                                                                   >
                                                                    <div class="account-thumb c-mb-8">
                                                                                                                                                    <img src="<?=$group['linkanh'];?>"
                                                                                alt="50M Gem"
                                                                                class="account-thumb-image" loading="lazy"
                                                                                onerror="imgError(this)">
                                                                        
                                                                    </div>
                                                                    <div class="account-title">
                                                                        <div
                                                                            class="text-title fw-700 text-limit limit-2 h-title-image name-service">
                                                                            <?=$group['title'];?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="price">
                                                                        <div class="price-current w-100 c-pb-16">
                                                                            <?=format_cash($group['money']);?>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                                                                                                                                                                                                                                                                                </div>
                                                        </div>
                                                              <?php }?>                                                                                                                                                                                                          <div class="item-service js-service">
                                                           
                                                                                                                                                                                          
                                                    </section>
                    </div>
                </div>

                        </div>
                        

<div class="modal fade modal-big" id="orderModal" style="padding-right: 15px;" aria-modal="true">
                    <div id="dathang" class="modal-dialog modal-dialog-centered modal-custom">
                        <div class="modal-content c-p-24">
                           <form id="form-DichVu" method="POST" style="width: 100%" data-id="<?=$group['id'];?>" data-amount="<?=$group['money'];?>">
                               <div id="thongbao"></div>
                                <input type="hidden" name="_token" value="fc9u9PabQ6sdZNlU58AUzJaC6wC4jKafNVVjKDk7">                                <input type="hidden" id="service_id" name="service_id">
                                <input type="hidden" id="service_index" name="index" value="1">
                                <div class="modal-header">
                                    <p class="modal-title center">Xác nhận thanh toán</p>
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                </div>
                                <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                                    <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                                        Thông tin yêu cầu
                                    </div>
                                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                            <div class="card--attr__name fz-13 fw-400 text-center">
                                                Gói
                                            </div>
                                            <select class="" name="type" id="dichvu" id="packages_id"
											name="packages_id">
               <option data-amount="0" value="">Chọn gói</option>
											<?php foreach($CMSNAV->get_list("SELECT * FROM `groups_gamepass` WHERE `category` = '".$row['id']."' ") as $group) {?>
                                            <option data-amount="<?=$group['money'];?>" value="<?=$group['id'];?>" class=""><?=$group['title'];?></option>
                                            <?php }?>
																							
																					</select>
                                           
                                        </div>
                                    </div>
                                                                        <div class="data_km" style="width: 100%">
            <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                    <div class="card--attr__name fz-13 fw-400 text-center">Nhập mã giảm giá</div>
                    <div class="card--attr__value fz-13 fw-500">

                    </div>
                </div>

                <div class="card--attr justify-content-between c-mb-16 text-center">
                    <div class="card--attr__name fw-400 fz-13 text-center discount_code_data_input" style="min-width: 100%;display: flex"><input class="input-form w-100 discount_code" type="text" id="magiamgia" placeholder="Nhập mã giảm giá"><button class="refresh-captcha refresh_discount brs-8" type="button" style="padding: 0 12px;margin-left: 8px;min-width: 48px" id="magiamgia">Áp dụng</button>
                    </div>
                    <div class="error__text" style="margin-top: 4px;text-align: left;color: #DA4343"></div>
                    <div class="sussess__text" style="margin-top: 4px;text-align: left;color: #00a651"></div>
                    <div class="card--attr__value fz-13 fw-500">

                    </div>
                </div>
            </div></div>
                                    <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                                        <div class="card--attr__total justify-content-between d-flex c-mb-16 text-center">
                                            <div class="card--attr__name fw-400 fz-13 text-center">
                                                Tổng thanh toán
                                            </div>
                                            <div class="card--attr__value fz-13 fw-500">
                                                <input name="totalAmount" id="totalAmount" readonly class="text-title-bold secondary d-inline-block total__price" style="border: none; outline: none;">
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="data_params_note">

                                    </div>

                                    <p class="text-title fw-700 title-color-lg c-py-16  c-py-lg-20 text-cl-custom">
                                        Thông tin người dùng
                                    </p>
                                    <div class="card unset-lg">
                                        <div class="card-body c-p-16 c-p-lg-0 d-flex flex-wrap mx-n2">
                                                                                                                                                                                                            <div class="input-group c-px-8
                                                                                                                     align-content-end" style="display: block">
                                                                <div class="form-label">
                                                                    Tài khoản Roblox:
                                                                </div>
                                                                <div class="toggle-id c-pt-8">
                                                                    <input type="text" id="tk" placeholder="Tài khoản Roblox" required="" >
                                                                    <div class="t-sub-3 invalid-color ">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                                                                                                                                                                                            <div class="input-group c-px-8
                                                                                                                     align-content-end" style="display: block">
                                                                <div class="form-label">
                                                                    Mật khẩu Roblox:
                                                                </div>
                                                                <div class="toggle-password c-pt-8">
                                                                    <input type="password" id="mk" placeholder="Mật khẩu Roblox" required="">
                                                                    <div class="t-sub-3 invalid-color">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                                                                                                                                                                                        
                                                                                                                                                                            <div class="input-group c-px-8
                                                                                                                     align-content-end" style="display: block">
                                                                <div class="form-label">
                                                                   Ghi Chú:
                                                                </div>
                                                                <div class="toggle-id c-pt-8">
                                                                    <input type="text" id="ghichu" placeholder="Nhập ghi chú nếu có..." required="">
                                                                    <div class="t-sub-3 invalid-color ">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                                                                                                                                                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        
                    
                                                                                <button style="width: 100%" class="btn primary submit-data-form-image google_buy_service" type="button" id="Submit">Xác nhận
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                  <br>                   
                        
<script>

function tat_thong(){


    $("#dathang").hide();

}
$("body").on('click',".dathang1",function(){




    var id = $(this).data('id');

    console.log(id + 'XIn chafo');

    $("#dichvu").val(id).change();


$("#orderModal").modal("show");
    


});

        $(function(){

                $( "#dichvu" ).on('change',function(e) {

       var selected = $(this).find('option:selected');
       var extra = selected.data('amount'); 

        $("#totalAmount").val(formatNumber(extra));
        $("#anh").show();

        });

        });


</script>

<script>
    
    function dat_don(idne, name, price) {
        
        // Chuyển đổi giá trị price thành chuỗi được định dạng số với dấu phân cách hàng nghìn
        var formattedPrice = parseFloat(price).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
        
        document.getElementById("datdonmodal").style.display = ""; // Đây là dòng chưa hoàn chỉnh, bạn có thể muốn đặt nó thành "block" hoặc "inline-block"
        document.getElementById('idne').value = idne;
        document.getElementById('id_don').innerHTML = "#" + idne;
        document.getElementById('name').value = name;
        document.getElementById('name_don').innerHTML = name + '<p class="ws-font-bold ws-text-white">' + formattedPrice + '</p>';
        document.getElementById('price').value = price;
        document.getElementById('price_don').innerHTML = formattedPrice;
    }

    function tat_datdon() {
        var x = document.getElementById("datdonmodal");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";

        }
    }
</script>
<script>
function openModal(e){
    var username = $(e).data('username');
    var mk = $(e).data('mk');
    var note = $(e).data('note');
    $("#dataItems").modal('show');
    $("#taikhoan").val(username);
    $("#matkhau").val(mk);
    $("#ghichu").val(note);
}
$("#dichvu").on('change', function(e){
    var amount = e.target.options[e.target.selectedIndex].dataset.amount;
    $("#anh").show();
    $("#totalAmount").val(formatNumber(amount));
})
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')+' đ';
}
function SubmitPay(){
   var data = $("#formSubmit").serialize();
   $.ajax({
   url: '/Model/BuyItems',
   data: data,
   dataType: "json",
   type: "POST",
   success: function(data) {
       if (data.status == 'success') {
            $('#msgCard').html('<div class="tw-py-2 tw-px-3 tw-border tw-rounded tw-text-sm tw-w-full tw-block tw-font-semibold tw-bg-green-100 tw-border-green-300 tw-text-green-500"><div class="relative">'+data.msg+'</div>');
            setTimeout(function(){window.location.reload();}, 2000);
        } else {
            $('#msgCard').html('<div class="tw-py-2 tw-px-3 tw-border tw-rounded tw-text-sm tw-w-full tw-block tw-font-semibold tw-bg-red-100 tw-border-red-300 tw-text-red-500"><div class="relative">'+data.msg+'</div>');
        }
   }
});
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>

<script type="text/javascript">
function showPrice() {
    var ketqua = $('#dichvu').children('option:selected').attr('data-money').replace(/(.)(?=(\d{3})+$)/g, '$1.');
    $("#thanhtoan").html(ketqua);
}
$("#Submit").on("click", function() {

    $('#Submit').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/OdersGame.php");?>",
        method: "POST",
        data: {
            type: 'OrderGpass',
            tk: $("#tk").val(),
            mk: $("#mk").val(),
            magiamgia: $("#magiamgia").val(),
            ghichu: $("#ghichu").val(),
            dichvu: $("#dichvu").val()
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#Submit').html(
                    '<i class="fa fa-cart-plus mr-1" aria-hidden="true"></i>THANH TOÁN')
                .prop('disabled', false);
        }
    });
});
</script>


<?php 
    require_once("../../public/client/Footer.php");
?>
