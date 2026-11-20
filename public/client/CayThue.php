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
    $row = $CMSNAV->get_row(" SELECT * FROM `category_caythue` WHERE `id` = '".check_string($_GET['id'])."'  ");
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
<form class="d-none">
        <input type="hidden" name="_token" value="8617c10730bfca3c878f49c404149dd467e68af06c62176cba2db86c48e88cce"> </form>
    <script>
        $(document).ready(function() {
            const searchInput = $('#searchInput');
            const searchSuggestions = $('#searchSuggestions');

            searchInput.on('input', function() {
                const keyword = $(this).val().trim();
                if (keyword !== '') {
                    fetchSearchSuggestions(keyword);
                } else {
                    searchSuggestions.empty();
                }
            });

            function fetchSearchSuggestions(keyword) {
                $.post('searchsuggestions', { keyword: keyword })
                    .done(function(data) {
                        searchSuggestions.html(data);
                    });
            }

            // Submit the form when a suggestion is clicked
            searchSuggestions.on('click', '.suggestion', function() {
                searchInput.val($(this).text().trim());
                searchSuggestions.empty();
                $('#formSearchHeader').submit();
            });
    </script>
     
    
    <div class="layout">
<div class="content" style="">

<div class="container c-container">
<ul class="breadcrumb-list">
<li class="breadcrumb-item">
<a href="/" class="breadcrumb-link">Trang chủ</a>
</li>
<li class="breadcrumb-item">
<a href="" class="breadcrumb-link">Dịch vụ</a>
</li>
<li class="breadcrumb-item">
<a href="/" class="breadcrumb-link"><?=$row['title'];?> </a>
</li>
</ul>
<div class="head-mobile">
<a href="/" class="link-back"></a>
<p class="head-title text-title"><?=$row['title'];?> </p>
<a href="/" class="home"></a>
</div>
</div>

<div class="container c-container" id="service-detail">
<section class="service-detail">
<div class="banner-slide swiper-general c-mt-lg-0">
<div class="swiper swiper-banner brs-12 swiper-container-horizontal" style="cursor: grab;">
<div class="swiper-wrapper" style="transition-duration: 0ms;">
</div>
<div class="navigation slider-next"></div>
<div class="navigation slider-prev"></div>
</div>
<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
</div>
<div class="section-header d-none d-lg-block">
<h1 class="section-title">
<?=$row['title'];?> </h1>
</div>
<hr>
<form  id="form-service-detail" method="POST" data-gtm-form-interact-id="0">


<div class="row">
<div class="col-12 col-lg-8 c-pr-8 c-pr-lg-16">
    
<div class="text-title fw-700 title-color-lg c-py-16 c-py-lg-20">
Vui lòng chọn thông tin
</div>

   <div  class=" text-center d-lg-none" id="CMSNAV"></div>
<div class="card unset-lg">
<div class="card-body c-p-16 c-p-lg-0 d-flex flex-wrap mx-n2">

<div class="input-group c-px-8 align-content-start">
<div class="form-label">
Chọn dịch vụ
</div>
<select name="type" id="dichvu" >
  <option data-amount="0" value="">Chọn gói</option>
  <?php foreach($CMSNAV->get_list("SELECT * FROM `groups_caythue` WHERE `category` = '".$row['id']."' ") as $group) {?>
                                            <option data-amount="<?=$group['money'];?>" value="<?=$group['id'];?>"><?=$group['title'];?></option>
                                            <?php }?>
                                        </select>
</div>
</div>
</div>




<p class="text-title fw-700 title-color-lg c-py-16  c-py-lg-20">
Thông tin người dùng
</p>
<div class="card unset-lg">
<div class="card-body c-p-16 c-p-lg-0 d-flex flex-wrap mx-n2">
<div class="input-group c-px-8 align-content-end">
<div class="form-label">
Tài Khoản Game
</div>
<input type="text" id="tk" name="tk" class="customer_data0" placeholder="Tài Khoản Game" data-gtm-form-interact-field-id="0"/>
<div class="t-sub-3 invalid-color"></div>
</div>
<div class="input-group c-px-8 align-content-end">
<div class="form-label">
Mật Khẩu Game
</div>
<div class="toggle-password" name="toggleIcon">
<input type="text" id="mk" name="mk" class="customer_data1" placeholder="Mật Khẩu Game" data-gtm-form-interact-field-id="1"/>
<div class="t-sub-3 invalid-color"></div>
</div>
</div>
<div class="input-group c-px-8 align-content-end">
<div class="form-label">
Ghi chú
</div>
<input  type="text" id="ghichu"  class="customer_data2" placeholder="Ghi chú nếu có"/>
<div class="t-sub-3 invalid-color"></div>
</div>



</div>
</div>
<div class="d-lg-none c-pb-22 c-pt-8">
<div class="card service-select c-py-12 c-pr-8">
<div class="card-body c-px-16">
<h5 class="text-title-bold  c-mb-24 detailViewBlockTitle">Chi
tiết
dịch vụ</h5>
<div class="content-desc detailViewBlockContent ">
<div class="data-content">
  
   
<p><?=$row['luuy'];?>     </p>
</div>
</div>
</div>
</div>
</div>


<div id="table-bot">
</div>

</div>
<div class="col-lg-4 c-pl-8 d-none d-lg-block">
<div class="js_sticky" data-top="140" style="top: 0px;">

<h2 class="text-title fw-700 title-color-lg c-py-16">Chi tiết dịch vụ
</h2>
<div class="card service-select c-py-12 c-pr-8">
<div class="card-body c-px-16">
<h2 class="text-title-bold d-none d-lg-block c-mb-24 detailViewBlockTitle">Chi
tiết
dịch vụ</h2>
<div class="content-desc detailViewBlockContent ">
<div class="data-content">
<p><?=$row['luuy'];?>     </p>
</div>
</div>
</div>
</div>
<div class="t-sub-3 invalid-color error-selected"></div>
   <div  class=" text-center " id="CMSNAV"></div>
<div class="card section-pay c-mt-16">
<div class="card-body c-p-16">

<div class="text-title-bold">
    Báo giá: 
    <input name="totalAmount1" id="totalAmount1" readonly class="text-title-bold secondary d-inline-block total__price" style="border: none; outline: none;">
</div>

<div class="c-py-12">
<hr>
</div>
<div class="row">
<div class="col-12">

  <button type="button"  id="Submit1"  class="btn primary show-confirm w-100">Thanh toán
                                </button>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="footer-mobile c-p-20">
    
<span class="fw-lg-500 d-inline-block">Báo giá:</span>
<input name="totalAmount" id="totalAmount" readonly class="text-title-bold secondary d-inline-block total__price" style="border: none; outline: none;">
<div class="d-flex"  style="top: 20px !important;">

<button style="top: 20px !important;" type="button" id="Submit" class="btn primary show-confirm">Thanh toán</button><!-- mobile-->
</div>
</div>
</form>
</section>
<?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'dichvu'") as $row) { ?>
<section class="section-related-service related-service">
<div class="section-header c-mb-16 c-mb-lg-8 justify-content-between">
<h2 class="section-title fz-15 fz-lg-20 lh-lg-24">
Dịch vụ liên quan
</h2>
<a href="" class="link arr-right">Xem tất cả</a>
</div>
<div class="swiper swiper-related-service card-list swiper-container-horizontal">
<div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
    
   
  
   <?php foreach($CMSNAV->get_list("SELECT * FROM `category_caythue` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
<div class="swiper-slide swiper-slide-active" style="width: 143.111px; margin-right: 12px;">
<div class="card">
<div class="card-body c-p-16 c-p-lg-8 scale-thumb">
<a href="<?=BASE_URL('dich-vu/'.$category['id']);?>">
<div class="card-thumb c-mb-8">
<img src="<?=$category['img'];?>" alt="<?=$category['title'];?>" class="card-thumb-image" loading="lazy">
</div>
<div class="card-attr">
<div class="text-title fw-700 text-limit limit-1">
<?=$category['title'];?></div>
<div class="info-attr">
 <?=$CMSNAV->site('giamgia');?></div>
</div>
</a>
</div>
</div>
</div>
<?PHP }?>
 </div>
 <?PHP }?>
<div class="navigation slider-next"></div>
<div class="navigation slider-prev swiper-button-disabled"></div>
</div>
</section>
</div>

</div>
</div>

<script>
function openModal(e){
    var username = $(e).data('username');
    var password = $(e).data('password');
    var note = $(e).data('note');
    $("#dataItems").modal('show');
    $("#taikhoan").val(username);
    $("#matkhau").val(password);
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
    $("#anh").show();
    $("#thanhtoan").html(ketqua);
}
$("#Submit").on("click", function() {

    $('#Submit').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/OdersGame.php");?>",
        method: "POST",
        data: {
            type: 'OrderCayThue',
            tk: $("#tk").val(),
            mk: $("#mk").val(),
            magiamgia: $("#magiamgia").val(),
            ghichu: $("#ghichu").val(),
            dichvu: $("#dichvu").val()
        },
        success: function(response) {
            $("#CMSNAV").html(response);
            $('#Submit').html(
                    'Đặt ngay')
                .prop('disabled', false);
        }
    });
});
</script>
<!-- ajax mobile -->
<script>
function openModal(e){
    var username = $(e).data('username');
    var password = $(e).data('password');
    var note = $(e).data('note');
    $("#dataItems").modal('show');
    $("#taikhoan").val(username);
    $("#matkhau").val(password);
    $("#ghichu").val(note);
}
$("#dichvu").on('change', function(e){
    var amount = e.target.options[e.target.selectedIndex].dataset.amount;
    $("#anh").show();
    $("#totalAmount1").val(formatNumber(amount));
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
function showPrice() {
    var ketqua = $('#dichvu').children('option:selected').attr('data-money').replace(/(.)(?=(\d{3})+$)/g, '$1.');
    $("#anh").show();
    $("#thanhtoan").html(ketqua);
}
$("#Submit1").on("click", function() {

    $('#Submit1').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/OdersGame.php");?>",
        method: "POST",
        data: {
            type: 'OrderCayThue',
            tk: $("#tk").val(),
            mk: $("#mk").val(),
            magiamgia: $("#magiamgia").val(),
            ghichu: $("#ghichu").val(),
            dichvu: $("#dichvu").val()
        },
        success: function(response) {
            $("#CMSNAV").html(response);
            $('#Submit1').html(
                    'Đặt ngay')
                .prop('disabled', false);
        }
    });
});
</script>
    
<?php 
    require_once("../../public/client/Footer.php");
?>
