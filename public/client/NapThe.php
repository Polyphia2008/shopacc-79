<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'NẠP THẺ CÀO | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
    CheckLogin();
?>

 <script>
    document.addEventListener('DOMContentLoaded', function() {
      var loadingWrap = document.querySelector('.loading-wrap');
      loadingWrap.style.display = 'none';

      var layout = document.querySelector('.layout');
      layout.style.display = 'block';
    });
  </script>
       <div class="layout" style="display: block;">
    <div class="content" style="">
        <div class="container c-container">
            <div class="d-none d-lg-block">
                <div class="banner-slide swiper-general">
                    <div class="swiper swiper-banner brs-12 swiper-container-horizontal" style="cursor: grab;">
                        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);"> </div>
                        <div class="navigation slider-next "></div>
                        <div class="navigation slider-prev "></div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"></div>
                </div>
            </div>
            <h2 class="section-title c-mt-24  c-mb-lg-8 d-none d-lg-flex">
            <i class="icon-title c-mr-8" style="--path:url(https://shop.dichvugiare.net/assets/assets/frontend/theme_5/image/son/naptien.svg)"></i>
            Nạp tiền
        </h2>
            <div class="row c-mt-16 c-mb-24 c-mt-lg-50 c-mt-md-0">
                <div class="col-12 col-lg-8 c-pr-8 c-px-sm-0 ">
                    <div class="recharge-money-container brs-12 brs-sm-0 c-pt-lg-4">
                        <div class="recharge-money-tab c-px-16">
                            <ul class="nav justify-content-between row" role="tablist">
                                <li class="nav-item col-6 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13 active" data-toggle="tab" href="#charge_card" role="tab" aria-selected="true">Nạp thẻ cào </p>
                                </li>
                                <li class="nav-item col-6 p-0" role="presentation">
                                    <p class="nav-link text-center mb-0 fw-400 fz-13" data-toggle="tab" href="#atm_card" role="tab" aria-selected="false"> ATM tự động </p>
                                </li>
                            </ul>
                            
                        </div>
                         
                        <div class="tab-content">
                            
                            <div class="tab-pane fade c-p-16 active show" id="charge_card" role="tabpanel">
                                <div  class="modal-login-error text-center LoginError" id="thongbaonapthe"></div>
                                <form class="w-100" action="" method="POST" >
                                    <div class="row content-block">
                                        <div class="col-12 col-lg-6 c-pr-8">
                                            <div class="money-form-group c-mb-16">
                                                <label class="text-form fz-13 fw-500 c-mb-4">Nhà cung cấp</label>
                                                <div class="col-md-12 p-0">
                                                    <select class="nice-select select-form w-100" name="loaithe" id="loaithe" >
                                                         <option value="VIETTEL">VIETTEL</option>
                                                        <option value="VINAPHONE">VINAPHONE</option>
                                                   
                                                    <option value="MOBIFONE">MOBIFONE</option>
                                                    <option value="VNMOBI">VNMOBI</option>
                                                    <option value="GARENA">GARENA</option>
                                                   </select>
                                                    
                                                </div>
                                            </div>
                <div class="money-form-group c-mb-12 d-block d-lg-none">
    <label class="text-form fz-13 fw-500 c-mb-8">Chọn mệnh giá</label>
    
    <div class="col-md-12 p-0">
        <div class="row m-0 c-mx-n4 d-lg-none" id="cardAmountMobile">
            <!-- 10,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="recharge_amount_mobile_0"  value="10000" hidden>
                <label for="recharge_amount_mobile_0" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                   <p class="fw-500 fs-15 mb-0">10.000đ</p>
                </label>
            </div>
            <!-- 20,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="recharge_amount_mobile_1"  value="20000" hidden>
                <label for="recharge_amount_mobile_1" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">20.000đ</p>
                    
                </label>
            </div>
            <!-- 50,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="recharge_amount_mobile_2"  value="50000" hidden>
                <label for="recharge_amount_mobile_2" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">50.000đ</p>
                   
                </label>
            </div>
            <!-- 100,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="recharge_amount_mobile_3"  value="100000" hidden>
                <label for="recharge_amount_mobile_3" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">100.000đ</p>
                   
                </label>
            </div>
            <!-- 200,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="recharge_amount_mobile_4"  value="200000" hidden>
                <label for="recharge_amount_mobile_4" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">200.000đ</p>
                    
                </label>
            </div>
            <!-- 500,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="recharge_amount_mobile_5"  value="500000" hidden>
                <label for="recharge_amount_mobile_5" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">500.000đ</p>
                    
                </label>
            </div>
        </div>
    </div>
</div>


                                            <div class="money-form-group c-mb-8">
                                                <label class="text-form fz-13 fw-500 c-mb-4">Mã số thẻ</label>
                                                <div class="col-md-12 p-0">
                                                    <div class="input-group">
                                                        <input class="input-form w-100 daylamapin" id="pin" type="text" placeholder="Nhập mã số thẻ của bạn">
                                                        <p class="text-error c-mb-0 c-mt-4"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="money-form-group c-mb-8">
                                                <label class="text-form fz-13 fw-500 c-mb-4">Số sê-ri</label>
                                                <div class="col-md-12 p-0">
                                                    <div class="input-group">
                                                        <input class="input-form w-100" id="seri" type="text" placeholder="Nhập mã số sê-ri trên thẻ">
                                                        <p class="text-error c-mb-0 c-mt-4"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="c-mt-24 d-lg-none">
                                                <p style="margin-bottom: 4px;color: #DA4343;font-size: 12px">*Chú ý: Quý khách chú ý chọn đúng mệnh giá thẻ nạp, chọn sai mệnh giá sẽ bị mất thẻ.</p>
                                                <button class="btn primary d-block d-lg-none" style="width: 100%" type="button" id="NapThe">Nạp ngay</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 c-pl-8 d-none d-lg-flex flex-column justify-content-between">
                  <div class="money-form-group c-mb-16">
    <label class="text-form fz-13 fw-500 c-mb-4">Chọn mệnh giá</label>
    <div class="col-md-12 p-0">
        <div class="row m-0" id="cardAmount">
            <!-- 10,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="menhgia10k" value="10000" hidden>
                <label for="menhgia10k" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">10.000đ</p>
                </label>
            </div>
            <!-- 20,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="menhgia20k" value="20000" hidden>
                <label for="menhgia20k" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">20.000đ</p>
                  
                </label>
            </div>
            <!-- 50,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="menhgia50k" value="50000" hidden>
                <label for="menhgia50k" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">50.000đ</p>
                  
                </label>
            </div>
            <!-- 100,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="menhgia100k" value="100000" hidden>
                <label for="menhgia100k" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">100.000đ</p>
                   
                </label>
            </div>
            <!-- 200,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="menhgia200k" value="200000" hidden>
                <label for="menhgia200k" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">200.000đ</p>
                    
                </label>
            </div>
            <!-- 500,000 -->
            <div class="col-4 c-px-4 money-radio-form">
                <input name="amount" type="radio" id="menhgia500k" value="500000" hidden>
                <label for="menhgia500k" class="c-py-16 c-px-8 c-mb-8 brs-8 p_recharge_amount">
                    <p class="fw-500 fs-15 mb-0">500.000đ</p>
                    
                </label>
            </div>
        </div>
    </div>
</div>







<!--buy bank-->
                                            <div class="d-none d-lg-block">
                                                <p style="margin-bottom: 8px;color: #DA4343;font-size: 13px">*Chú ý: Quý khách chú ý chọn đúng mệnh giá thẻ nạp, chọn sai mệnh giá sẽ bị mất thẻ.</p>
                                                <button class="btn primary " style="width: 100%" type="button" id="NapThe2">Nạp ngay</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                           
                           </div>
                    <div class="tab-pane fade c-p-16" id="atm_card" role="tabpanel">
                                                                    <div class="row content-block">
                                                <div class="col-12 col-lg-12">
                                                                                                        <div class="atm-recharge-right brs-8">
                                                                                                            <?php if(empty($_SESSION['username'])) { ?>                                      
                                        <div class="atm-recharge-content c-p-sm-12 brs-sm-8">
                                            <div class="atm-recharge-attr" style="text-align: center">
                                                <p class="fz-14 fw-600 mb-0" style="color: red; max-width: 100% !important;">Vui lòng đăng nhập để nhận được nội dung chuyển tiền!</p>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                                        <div class="border-default c-p-sm-12 brs-sm-8">
                                                            <h6 class="mb-3">Để nạp tiền, bạn có thể quét mã QR để tự động hoàn tất giao
                                                                dịch hoặc sao chép số tài khoản và tên ngân hàng dưới đây để chuyển tiền thủ
                                                                công.</h6>

                                                            <div class="main-atm-qr mb-3">
                                                                                                                                                                                                            <div class="img-qr ">
                                                                            <div class="qr-card ">
                                                                                <div class="position-relative mt-5">
                                                                                    <div class="position-absolute modal- mt-5"
                                                                                        style="left: 41%;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" noidung-ck">
                                                                            <table align="left" border="1" cellpadding="1" cellspacing="1" class="table table-bordered mb-0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                         <td><strong>Nội dung chuyển khoản</strong></td>
                                                                <th><span
                                                                        class="c-mr-4 copy-content-charge icon--coppy"><img
                                                                            alt="copy-black"
                                                                            src="https://bloxvn.net/assets/frontend/image/icons/copy-black.png" />
                                                                    </span><?=$CMSNAV->site('noidung_naptien').$getUser['id'];?>
                                                                    <span class=" transactionContent">
                                                                        <span class="loading m-0 mt-2 ml-5 "></span>
                                                                    </span>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Tên ngân hàng</strong></td>
                                                                <th><span
                                                                        class="c-mr-4 copy-content-charge icon--coppy"><img
                                                                            alt="copy-black"
                                                                            src="https://bloxvn.net/assets/frontend/image/icons/copy-black.png" /></span><?=$CMSNAV->site('type_bank');?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Số tài khoản</strong></td>
                                                                <th><span
                                                                        class="c-mr-4 copy-content-charge icon--coppy"><img
                                                                            alt="copy-black"
                                                                            src="https://bloxvn.net/assets/frontend/image/icons/copy-black.png" /></span><?=$CMSNAV->site('stk_bank');?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Tên tài khoản</strong></td>
                                                                <th><span
                                                                        class="c-mr-4 copy-content-charge icon--coppy"><img
                                                                            alt="copy-black"
                                                                            src="https://bloxvn.net/assets/frontend/image/icons/copy-black.png" /></span><?=$CMSNAV->site('name_bank');?>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                              <img style="width:120" src="https://img.vietqr.io/image/<?=$CMSNAV->site('type_bank');?>-<?=$CMSNAV->site('stk_bank');?>-qr_only.png?addInfo=<?=$CMSNAV->site('noidung_naptien').$getUser['id'];?>" />
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
              
                                            </div>
                </div>
            </div>
        </div>
        <div class="col-4 c-pl-8 d-none d-lg-flex">
            <a href="javascript:void(0);" class="money-recharge-coupon d-block brs-12" style="height: 100%">
                <img class="brs-12" src="https://bloxvn.net//assets/frontend/theme_5/image/phu/recharge-coupon.png"
                    alt="">
            </a>
        </div>
    </div>

    
    <link rel="stylesheet" href="https://bloxvn.net/assets/frontend/theme_5/css/charge/faq.css?v=1736654577">
    <div class="c-pb-24">
        <div class="max-w-[900px] mx-auto c-pt-8 px-4 relative z-10">
            <h2 class="text-center c-pb-24 text-4xl fw-500 text-blue-600">Câu hỏi thường gặp</h2>
            <div class="accordion d-flex flex-column">
                                                                                                        <div class="accordion-item bg-white brs-16 border border-slate-300 overflow-hidden">
                                <button type="button"
                                    class="accordion-header d-flex c-px-24 c-py-16 justify-content-between gap-4 align-items-center w-full group/accordion transition-all duration-300 ease-in-out [&.active]:bg-slate-200 brs-16 bg-white border-faq cursor-pointer">
                                    <span class="fw-500">
                                        Tôi nạp nhầm số tiền hoặc nạp không thành công, tôi phải làm gì?
                                    </span>
                                    <span
                                        class="shrink-0 text-2xl leading-none transition-all duration-300 ease-in-out group-[.active]/accordion:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon d-block">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-collapse">
                                    <div class="accordion-content">
                                        <div class="p-6">
                                            <p class="c-mb-0"><p>
<style type="text/css"><!--br {mso-data-placement:same-cell;}-->
</style>
Nếu bạn nạp nhầm số tiền hoặc nạp không thành công, vui lòng liên hệ ngay với bộ phận Chăm Sóc Khách Hàng. Để chúng tôi hỗ trợ bạn nhanh chóng, hãy cung cấp ID tài khoản web, ảnh chụp màn hình giao dịch chuyển khoản, và mô tả cụ thể về lỗi mà bạn gặp phải</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="accordion-item bg-white brs-16 border border-slate-300 overflow-hidden">
                                <button type="button"
                                    class="accordion-header d-flex c-px-24 c-py-16 justify-content-between gap-4 align-items-center w-full group/accordion transition-all duration-300 ease-in-out [&.active]:bg-slate-200 brs-16 bg-white border-faq cursor-pointer">
                                    <span class="fw-500">
                                        Tôi không thấy tiền vào tài khoản, tôi cần kiểm tra lại như thế nào?
                                    </span>
                                    <span
                                        class="shrink-0 text-2xl leading-none transition-all duration-300 ease-in-out group-[.active]/accordion:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon d-block">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-collapse">
                                    <div class="accordion-content">
                                        <div class="p-6">
                                            <p class="c-mb-0"><p>
<style type="text/css"><!--br {mso-data-placement:same-cell;}-->
</style>
Thời gian xử lý giao dịch có thể mất 1-5 phút để hệ thống xác nhận và cộng tiền vào tài khoản. Nếu sau 15 phút bạn chưa thấy tiền vào tài khoản, vui lòng liên hệ CSKH để được trợ giúp. Để chúng tôi hỗ trợ bạn nhanh chóng, hãy cung cấp ID tài khoản web, ảnh chụp màn hình giao dịch chuyển khoản, và mô tả cụ thể về lỗi mà bạn gặp phải.</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="accordion-item bg-white brs-16 border border-slate-300 overflow-hidden">
                                <button type="button"
                                    class="accordion-header d-flex c-px-24 c-py-16 justify-content-between gap-4 align-items-center w-full group/accordion transition-all duration-300 ease-in-out [&.active]:bg-slate-200 brs-16 bg-white border-faq cursor-pointer">
                                    <span class="fw-500">
                                        Làm thế nào để nạp tiền qua ATM/thẻ cào trên website này?
                                    </span>
                                    <span
                                        class="shrink-0 text-2xl leading-none transition-all duration-300 ease-in-out group-[.active]/accordion:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon d-block">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-collapse">
                                    <div class="accordion-content">
                                        <div class="p-6">
                                            <p class="c-mb-0"><p>
<style type="text/css"><!--br {mso-data-placement:same-cell;}-->
</style>
Để nạp tiền vào tài khoản Shop, bạn có thể chọn 1 trong 2 hình thức &quot;Nạp thẻ hoặc ATM Tự động&quot;<br />
<strong>Trường hợp: Nạp thẻ cào</strong><br />
Bước 1: Đăng nhập website -&gt; Chọn &quot;Nạp tiền&quot;-&gt; Chọn hình thức &quot;Nạp thẻ cào&quot;<br />
Bước 2: Chọn nhà cung cấp Viettel/Mobiphone/.....<br />
Bước 3: Chọn mệnh giá thẻ<br />
Lưu ý: Nạp sai mệnh giá thẻ mất 100% giá trị thẻ, shop không chịu trách nhiệm<br />
Bước 4: Điền Mã số thẻ, Số seri, và Mã bảo vệ<br />
Bước 5: Chọn &quot;Nạp ngay&quot; và hoàn tất kiểm tra tài khoản Shop<br />
<strong>Trường hợp: Nạp ATM tự động</strong><br />
Bước 1: Đăng nhập website -&gt; Chọn &quot;Nạp tiền&quot;-&gt; Chọn hình thức &quot;ATM Tự động&quot;<br />
Bước 2: Copy nội dung chuyển khoản hiển thị trên màn hình<br />
Bước 3: Thanh toán và điền nội dung chuyển khoản<br />
Bước 4: Hoàn tất và kiểm tra tài khoản Shop</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="accordion-item bg-white brs-16 border border-slate-300 overflow-hidden">
                                <button type="button"
                                    class="accordion-header d-flex c-px-24 c-py-16 justify-content-between gap-4 align-items-center w-full group/accordion transition-all duration-300 ease-in-out [&.active]:bg-slate-200 brs-16 bg-white border-faq cursor-pointer">
                                    <span class="fw-500">
                                        Số tiền tối thiểu/tối đa tôi có thể nạp là bao nhiêu?
                                    </span>
                                    <span
                                        class="shrink-0 text-2xl leading-none transition-all duration-300 ease-in-out group-[.active]/accordion:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon d-block">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-collapse">
                                    <div class="accordion-content">
                                        <div class="p-6">
                                            <p class="c-mb-0"><p>
<style type="text/css"><!--br {mso-data-placement:same-cell;}-->
</style>
Số tiền nạp vào tài khoản Shop là<strong> không giới hạn</strong>, bạn có thể lựa chọn theo nhu cầu của mình.</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="accordion-item bg-white brs-16 border border-slate-300 overflow-hidden">
                                <button type="button"
                                    class="accordion-header d-flex c-px-24 c-py-16 justify-content-between gap-4 align-items-center w-full group/accordion transition-all duration-300 ease-in-out [&.active]:bg-slate-200 brs-16 bg-white border-faq cursor-pointer">
                                    <span class="fw-500">
                                        Nạp tiền qua ATM/thẻ cào có mất phí không?
                                    </span>
                                    <span
                                        class="shrink-0 text-2xl leading-none transition-all duration-300 ease-in-out group-[.active]/accordion:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon d-block">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-collapse">
                                    <div class="accordion-content">
                                        <div class="p-6">
                                            <p class="c-mb-0"><p>
<style type="text/css"><!--br {mso-data-placement:same-cell;}-->
</style>
Phí nạp tiền sẽ phụ thuộc vào nhà cung cấp dịch vụ và ngân hàng mà bạn sử dụng. Vui lòng kiểm tra chính sách phí của ngân hàng hoặc nhà mạng để biết thêm chi tiết.</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="accordion-item bg-white brs-16 border border-slate-300 overflow-hidden">
                                <button type="button"
                                    class="accordion-header d-flex c-px-24 c-py-16 justify-content-between gap-4 align-items-center w-full group/accordion transition-all duration-300 ease-in-out [&.active]:bg-slate-200 brs-16 bg-white border-faq cursor-pointer">
                                    <span class="fw-500">
                                        Sau khi nạp tiền, bao lâu thì tiền sẽ vào tài khoản của tôi?
                                    </span>
                                    <span
                                        class="shrink-0 text-2xl leading-none transition-all duration-300 ease-in-out group-[.active]/accordion:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon d-block">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-collapse">
                                    <div class="accordion-content">
                                        <div class="p-6">
                                            <p class="c-mb-0"><p>
<style type="text/css"><!--br {mso-data-placement:same-cell;}-->
</style>
Thời gian xử lý giao dịch: Giao dịch có thể mất một khoảng thời gian ngắn để hệ thống xác nhận và cộng tiền vào tài khoản. Nếu sau 15 phút bạn chưa thấy tiền vào tài khoản, vui lòng liên hệ với bộ phận hỗ trợ hoặc liên hệ hotline 0395.342.442</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="accordion-item bg-white brs-16 border border-slate-300 overflow-hidden">
                                <button type="button"
                                    class="accordion-header d-flex c-px-24 c-py-16 justify-content-between gap-4 align-items-center w-full group/accordion transition-all duration-300 ease-in-out [&.active]:bg-slate-200 brs-16 bg-white border-faq cursor-pointer">
                                    <span class="fw-500">
                                        Thông tin thẻ ATM/thẻ cào của tôi có được bảo mật không?
                                    </span>
                                    <span
                                        class="shrink-0 text-2xl leading-none transition-all duration-300 ease-in-out group-[.active]/accordion:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon d-block">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-collapse">
                                    <div class="accordion-content">
                                        <div class="p-6">
                                            <p class="c-mb-0"><p>
<style type="text/css"><!--br {mso-data-placement:same-cell;}-->
</style>
Chúng tôi luôn coi trọng việc bảo mật thông tin của khách hàng. Thông tin thẻ ATM/thẻ cào của bạn được bảo mật hoàn toàn thông qua các hệ thống mã hóa tiên tiến và tuân thủ nghiêm ngặt các quy định bảo mật. Bạn có thể yên tâm khi thực hiện các giao dịch trên website của chúng tôi.</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                                                <div class="accordion-item bg-white brs-16 border border-slate-300 overflow-hidden">
                                <button type="button"
                                    class="accordion-header d-flex c-px-24 c-py-16 justify-content-between gap-4 align-items-center w-full group/accordion transition-all duration-300 ease-in-out [&.active]:bg-slate-200 brs-16 bg-white border-faq cursor-pointer">
                                    <span class="fw-500">
                                        Làm thế nào để kiểm tra lịch sử các lần nạp tiền của tôi?
                                    </span>
                                    <span
                                        class="shrink-0 text-2xl leading-none transition-all duration-300 ease-in-out group-[.active]/accordion:rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="icon d-block">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 9l6 6l6 -6" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="accordion-collapse">
                                    <div class="accordion-content">
                                        <div class="p-6">
                                            <p class="c-mb-0"><p>
<style type="text/css"><!--br {mso-data-placement:same-cell;}-->
</style>
Để kiểm tra lịch sử các lần nạp tiền, bạn có thể đăng nhập vào tài khoản của mình trên website,<br />
Bước 1: Vào mục &quot;Tài khoản&quot;<br />
Bước 2: Chọn &quot;Thông tin tài khoản&quot;<br />
Bước 3: Chọn &quot;Lịch sử nạp thẻ&quot; hoặc &quot;Lịch sử ATM tự động&quot;<br />
Tại đây, bạn sẽ thấy danh sách chi tiết các giao dịch đã thực hiện, bao gồm cả thời gian và số tiền đã nạp.</p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                                        </div>
        </div>
    </div>
    <script src="https://bloxvn.net/assets/frontend/theme_5/js/charge/faq.js?v=1736654577"></script>
<script type="text/javascript">
$("#NapThe").on("click", function() {
  $('#NapThe').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled', true);
  
  // Get the selected radio button value
  var menhgia = $('input[name="amount"]:checked').val();
  
  $.ajax({
    url: "<?=BASE_URL("assets/ajaxs/NapThe.php");?>",
    method: "POST",
    data: {
      menhgia: menhgia, 
      loaithe: $("#loaithe").val(),
      seri: $("#seri").val(),
      pin: $("#pin").val()
    },
    success: function(response) {
      $("#thongbaonapthe").html(response);
      $('#NapThe').html('Nạp Thẻ').prop('disabled', false);
    }
  });
});
</script>
  <script type="text/javascript">
$("#NapThe2").on("click", function() {
  $('#NapThe2').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled', true);
  
  // Get the selected radio button value
  var menhgia = $('input[name="amount"]:checked').val();
  
  $.ajax({
    url: "<?=BASE_URL("assets/ajaxs/NapThe.php");?>",
    method: "POST",
    data: {
      menhgia: menhgia, 
      loaithe: $("#loaithe").val(),
      seri: $("#seri").val(),
      pin: $("#pin").val()
    },
    success: function(response) {
      $("#thongbaonapthe").html(response);
      $('#NapThe2').html('Nạp Thẻ').prop('disabled', false);
    }
  });
});
</script>
 
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<?php 
    require_once("../../public/client/Footer.php");
?>
