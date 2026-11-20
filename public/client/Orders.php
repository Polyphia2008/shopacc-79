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
    $row = $CMSNAV->get_row(" SELECT * FROM `accounts` WHERE `id` = '".check_string($_GET['id'])."'  ");
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
<?php
$query = $CMSNAV->get_row(" SELECT * FROM `accounts` WHERE `id` = '".check_string($_GET['id'])."'  ");
$arr_img = explode(PHP_EOL, $query['listimg']) ;
$arr_img_1 = $row['img']; // ảnh ở list_account
?>
<link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/vendor/slick-carousel/slick/slick.css">
<script src="https://transvelo.github.io/electro-html/2.0/assets/vendor/slick-carousel/slick/slick.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<form id="logout-form" action="/ajax/logout" method="POST" class="d-none">
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
    </script><div class="layout">
        <div class="content" style="">
                <div class="container c-container" id="account-detail">
                    <div class="data__menuacc"><ul class="breadcrumb-list">
        <li class="breadcrumb-item">
            <a href="/" class="breadcrumb-link">Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/mua-acc" class="breadcrumb-link">Shop Account</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/" class="breadcrumb-link">
                Danh sách Nick </a>
        </li>
        <li class="breadcrumb-item">
            <a href="" class="breadcrumb-link">Chi tiết nick</a>
        </li>
    </ul>
    <div class="head-mobile">
        <a href="/" class="link-back"></a>
        <h1 class="head-title text-title text-limit limit-1">Danh sách Nick </h1>
       
    </div>
</div>
<div id="showdetailacc">
  
       <section class="acc-detail data-account-detail">
            <div class="section-content row">
                
                <div class="col-12 col-lg-7 c-pr-8 c-pr-lg-15">
                    
                    <div class="card account-thumb">
                        <div class="tab-content">
    <div class="tab-pane fade show active" id="tab-thumb" role="tabpanel">
        <div class="card-body c-p-16 c-p-lg-0 mx-n3 mx-lg-0 d-flex">

            <!-- Main gallery -->
            <div class="swiper gallery-top d-none d-lg-block swiper-container-vertical">
                <div class="swiper-wrapper">
                     <?php for ($i = 1; $i < count($arr_img); $i++) { ?>
                    <div class="swiper-slide" data-swiper-slide-index="<?=$i;?>" style="margin-bottom: 16px;">
                                        <div class="gallery-photo">
                                            <img loading="lazy" onerror="imgError(this)" src="<?= BASE_URL($arr_img[$i]); ?>
" alt="mua-nick">
                                        </div>
                                    </div>   
                                    <?PHP }?>
                                    </div>
            </div>

            <!-- Thumbnail gallery -->
            <div class="swiper gallery-thumbs c-ml-16 c-ml-lg-0 swiper-container-horizontal d-none d-lg-flex">
                <div class="swiper-wrapper">
                    <?php for ($i = 1; $i < count($arr_img); $i++) { ?>
                    <div class="swiper-slide thumbnail-item" data-index="<?=$i;?>">
                                        <div class="gallery-photo" data-target="#tab-thumb">
                                            <img loading="lazy" onerror="imgError(this)" src="<?= BASE_URL($arr_img[$i]); ?>
" alt="mua-nick">
                                        </div>
                                    </div>
                                           <?PHP }?> 
                                    </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const thumbnails = document.querySelectorAll('.thumbnail-item');
        const slides = document.querySelectorAll('.swiper-slide');

        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', function () {
                slides.forEach(slide => slide.classList.remove('active'));

                slides[index].classList.add('active');
            });
        });
    });


    function imgError(image) {
        image.onerror = null;
        image.src = 'fallback-image.jpg'; 
    }
</script>

                        <div class="nav-controller c-px-lg-0 c-my-lg-12">
                            <div class="swiper-pagination d-none d-lg-flex">
                                <div class="navigation slider-prev v2 c-mr-8"></div>
                                <div class="navigation slider-next v2"></div>
                            </div>
                            <ul class="nav nav-tabs size-auto" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="tab-show-acc active count-thumb swiper-pagination-fraction" data-toggle="tab" href="#tab-thumb" role="tab" aria-selected="true"><span class="swiper-pagination-current">1</span> / <span class="swiper-pagination-total"><?=$i;?></span></a>
                                </li>
                                <li class="c-mx-4"></li>
                            </ul>
                        </div>
                             <div  class="modal-login-error text-center LoginError" id="thongbaoacc"></div>
                        <div class="group-btn c-mb-16 mobile-buy-acc d-lg-none row" style="--data-between: 12px">
                            
                            <div class="w-100">
                                                                    <div class="col-12 mt-3">
                    
                                        <button class="btn secondary c-px-xl-20 c-px-34 c-mr-16 w-100 btn_add_to_cart" onclick="handleAddToCart(itemData,img )"><i class="fa-solid fa-cart-plus" aria-hidden="true"></i></button>
                                    </div>
                                <!--mobile-->
                                <div class="col-12 mt-3">
                                    <button class="btn primary js-step buyacc google_buy_account h-auto w-100" id="btnThanhToan">Mua Ngay</button>
                                </div>
                            </div>
                        </div>
                                                    
                        <div class="d-block d-lg-none c-pt-28 c-pb-16">
                            <hr>
                        </div><div class="text-title c-py-8 d-block d-lg-none">
    Thông tin acc
</div>
<table class="table-acc-info c-mb-24 d-table d-block d-lg-none">
    <tbody>
  <?php 
if (!empty($row['chitiet'])) {  
    $a = preg_split('/\r\n|\r|\n/', $row['chitiet']); // tách mọi loại xuống dòng
    $i = 0; 
    foreach ($a as $b) {  
        $b = trim($b);
        if ($b === '') continue;
        $c = explode(":", $b, 2);
        $i++; 
        if ($i >= 5) break;
?>
        <tr class="d-block d-lg-none"> <!-- Chỉ hiện trên mobile -->
            <td>
                <p>
                    <?php if (isset($c[1])) { ?>
                        <?= htmlspecialchars($c[0]); ?><br>
                        <?= htmlspecialchars($c[1]); ?>
                    <?php } else { ?>
                        <?= htmlspecialchars($c[0]); ?>
                    <?php } ?>
                </p>
            </td>
        </tr>
<?php 
    } 
} else {
?>
    <tr class="d-block d-lg-none"><td><p>Không có thông tin chi tiết</p></td></tr>
<?php 
} 
?>




            </tbody>
</table>

                    </div>
                                 
                                    </div>

                <div class="col-12 col-lg-5 c-pl-8 c-pl-lg-15">
                    <div class="js_sticky" data-top="140">
                        <div class="card account-detail-info">
                            <div class="card-body c-p-16 mx-n3 mx-lg-0">
                                <div class="text-title fw-700 c-mb-6 title-color fz-lg-18 lh-lg-24">
                                    <?=$CMSNAV->get_row(" SELECT * FROM `groups` WHERE `id` = '".$row['groups']."'  ")['title'];?>                               </div>
                                <div class="text-title fw-700 c-mb-6 d-none d-lg-block">Mã số: #AC<?=($row['id']);?>                               </div>
                                <span class="d-block d-lg-none link-color c-mb-8">
                                    Mã số: AC<?=($row['id']);?>                            </span>
                                <hr>
                                <div class="d-block d-lg-none c-pb-12"></div>

                                <div class="text-title c-py-8 d-none d-lg-block">
                                    Thông tin acc
                                </div>
                                <div class="row marginauto ">
                                    <div class="col-md-12 pr-0 scroll-default " style="padding-left: 0">
                                        <table class="table-acc-info c-mb-24 d-block d-lg-none d-lg-table">
                                          <?php if(!empty($row['chitiet'])) { ?>
                    <?php $a = explode(PHP_EOL, $row['chitiet']); $i=0; foreach($a as $b) {  $c = explode(":", $b); $i++; if($i >= 5){break;} ;?>      
                               <div class=" d-none d-lg-block tw-grid tw-grid-cols-12 tw-gap-2 tw-border-b tw-p-2">
                                <div class="tw-col-span-12">
                                    <p>
                                       <i class="tw-relative bx bx-caret-right" style="top: 1px;"></i>
<?=$c[0];?><?php if(isset($c[1])) echo '<br>'.$c[1]; ?>
                                        <b class="tw-text-gray-800">  </b>
                                    </p>
                                </div>
                            </div>
                           <?php }}?>
                           
                             
                           
                           
                             </table>
                                    </div>
                                </div>

                                                                <div class="card disabled-color">
                                    <div class="card-body text-center c-p-0">
                                        
                                   <div class="price-acc">
    <div class="price-old fz-lg-12 lh-lg-16">
        <?=format_cash($row['money']*3);?>
    </div>

            <div class="price-current fz-lg-20 lh-lg-28 c-mx-8">
            <?=format_cash($row['money']);?>đ
        </div>

        <div class="discount">
           30%
        </div>
    </div>

                                        <span>
                                            Rẻ vô đối, giá tốt nhất thị trường
                                        </span>
                                    </div>
                                </div>
                                <div  class="modal-login-error text-center LoginError" id="thongbao"></div>
                                <div class="c-py-24 d-none d-lg-block">
                                    <hr>
                                </div>
      <style>
      
        .swiper-container {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

      
        .swiper-wrapper {
            display: flex;
        }

        .swiper-slide {
            flex-shrink: 0;
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            max-width: 100%;
            height: auto;
            display: block;
            object-fit: contain;
        }

        @media screen and (max-width: 768px) {
            .swiper-container {
       
                border-radius: 10px;
            }

            .swiper-pagination-bullet {
                background-color: #007bff;
            }

            .swiper-button-next,
            .swiper-button-prev {
                
            }
        }       /* CSS mặc định cho mọi thiết bị */
        .cardducapi {
            display: none; /* Mặc định ẩn thẻ card */
        }

        /* Hiển thị chỉ trên mobile */
        @media screen and (max-width: 768px) {
            .cardducapi {
                display: block; /* Chỉ hiện trên màn hình nhỏ hơn 768px */
                background-color: #f8f9fa;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }
        }
    </style>

    <div class="cardducapi disabled-color  ">
        <div class="card-body text-center c-p-0">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                     <?php for ($i = 1; $i < count($arr_img); $i++) { ?>
                    <div class="swiper-slide">
                                        <img loading="lazy" onerror="imgError(this)" src="<?= BASE_URL($arr_img[$i]); ?>
" alt="mua-nick">
                                    </div>     <?PHP }?>       </div>
                <!-- Nút điều hướng -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 5000, 
                disableOnInteraction: false, 
            },
            slidesPerView: 1,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });

    // Xử lý ảnh lỗi
    function imgError(image) {
        image.src = 'default-image.jpg'; 
        image.onerror = null; 
    }
    </script>                                              
         <div class="group-btn c-mb-16 d-none d-lg-flex " style="--data-between: 12px">
                                            
                                        <div class="col-6">
<?php if (isset($getUser['id'])) { ?>
    <!-- Nếu đã đăng nhập thì mở modal -->
    <button class="btn primary btn-muangay buyacc google_buy_account h-auto" 
            type="button" 
            data-toggle="modal" 
            data-target="#buyModal">
        Mua ngay
    </button>
<?php } else { ?>
    <!-- Nếu chưa đăng nhập thì chỉ hiển thị thông báo -->
    <button class="btn primary btn-muangay h-auto" 
            type="button" 
            id="btnYeuCauDangNhap">
        Mua ngay
    </button>
<?php } ?>
</div>


                                            
                                        </div>                                                 </div>
                        </div>
                                            </div>
                </div>
            </div>


            
                    </section>
    




<style>
    .body_tt_nickauto {
        display: none;
    }

    .scroll-default {
        padding-right: 4px;
        max-height: 132px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .scroll-default:hover::-webkit-scrollbar-thumb {
        background-color: #DCDEE9;
    }

    .scroll-default::-webkit-scrollbar-track {
        position: absolute;
        top: 100px;
        left: -60px;
        background-color: #ffffff;
        border: none;
    }

    .scroll-default::-webkit-scrollbar {
        width: 8px;
        border: none;
    }

    .scroll-default::-webkit-scrollbar-thumb {
        /*Màu thanh sroll*/
        background: #BCBFD6;
        border-radius: 100px;
        border: none;
        margin-left: 20px;
        height: 20px;
    }
</style>
























<!--bắt đầu modaL-->

<div class="modal fade modal-big" id="buyModal" style="padding-right: 15px;" aria-modal="true">
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
                                   
                                   
                                     <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">ID:</p>
                    <div class="fw-500 fz-13"><?=($row['id']);?> </div>
                </div>
                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Số Dư Tài Khoản:</p>
                    <div class="fw-500 fz-13"><?=format_cash($getUser['money']);?>đ </div>
                </div>
                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Mô Tả:</p>
                   <?php 
if (!empty($row['chitiet'])) {  
    $a = explode(PHP_EOL, $row['chitiet']); 
    foreach ($a as $b) { 
        if (!empty(trim($b))) {  
            // Chỉ tách 2 phần để tránh lỗi nếu có nhiều dấu ":"
            $c = explode(":", $b, 2); 
?>
            <div class="fw-500 fz-13">
                <?= htmlspecialchars($c[0]); ?><br>
                <?= isset($c[1]) ? htmlspecialchars($c[1]) : ''; ?>
            </div>
<?php 
        } 
    } 
} 
?>  
                </div>
                                                                        <div class="data_km" style="width: 100%">
            <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                    <div class="card--attr__name fz-13 fw-400 text-center">Nhập mã giảm giá</div>
                    <div class="card--attr__value fz-13 fw-500">

                    </div>
                </div>

                <div class="card--attr justify-content-between c-mb-16 text-center">
                    <div class="card--attr__name fw-400 fz-13 text-center discount_code_data_input" style="min-width: 100%;display: flex"><input class="input-form w-100 discount_code" type="text" id="magiamgia" placeholder="Nhập mã giảm giá(nếu có)">
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
                                                <input value="<?=format_cash($row['money']);?>đ" readonly class="text-title-bold secondary d-inline-block total__price" style="">
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="data_params_note">

                                    </div>

                                             
                                    </div>
                                    <div class="modal-footer">
                                        
                    
                                                                                <button style="width: 100%" class="btn primary submit-data-form-image google_buy_service" type="button" id="btnThanhToan">Mua Ngay
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

             <!--end modal-->

    </div>
</div> 
 </br>    
  <script>
        var hscheck = false;
      	$(document).ready(()=>{
          	$.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');
        	$("#sliderSyncingNav .js-slide img").on("click", function(){
            	$("#viewModal").modal("show");
              	if(hscheck != 1){
                  	$.HSCore.components.HSSlickCarousel.init('.js-slick-carousel2');
                  	hscheck = true;
                }
              	
            })
        })
        
    </script>
    <script>
            $("#form-Login input").keyup(function(e){
            if(e.keyCode == 13){
                Login();
            } 
        });
        $("#form-Register input").keyup(function(e){
            if(e.keyCode == 13){
                Register();
            }
        });
    </script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('.js-slick-carousel').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            asNavFor: '.js-slick-carousel2'
        });

        $('.js-slick-carousel2').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.js-slick-carousel',
            focusOnSelect: true
        });
    });
</script>
<script type="text/javascript">
$(document).on("click", "#btnThanhToan", function() {
    $('#btnThanhToan').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ')
        .prop('disabled', true);

    $.ajax({
        url: "<?=BASE_URL('assets/ajaxs/Orders.php');?>",
        method: "POST",
        data: {
            id: <?=$row['id'];?>,
            magiamgia: $("#magiamgia").val(),
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#btnThanhToan').html('THANH TOÁN').prop('disabled', false);
        },
        error: function() {
            $("#thongbao").html('<div class="text-danger">Lỗi kết nối!</div>');
            $('#btnThanhToan').html('THANH TOÁN').prop('disabled', false);
        }
    });
});
</script>
<script>
$("#btnYeuCauDangNhap").on("click", function() {
    $.ajax({
        url: "<?=BASE_URL('assets/ajaxs/Orders.php');?>",
        method: "POST",
        data: {
            id: <?=$row['id'];?>,
            magiamgia: $("#magiamgia").val(),
        },
        success: function(response) {
            // ✅ Hiển thị nội dung trả về từ server (ví dụ <div class="msg_error2">Vui lòng đăng nhập...</div>)
            $("#thongbao").html(response);
        },
        error: function() {
             $("#thongbao").html(response);
        }
    });
});
</script>


<?php 
    require_once("../../public/client/Footer.php");
?>
