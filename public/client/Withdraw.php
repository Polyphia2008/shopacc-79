<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'RÚT VẬT PHẨM | ' . $CMSNAV->site('tenweb');
require_once("../../public/client/Header.php");
require_once("../../public/client/Nav.php");
$rateRobux = $CMSNAV->get_row(" SELECT `rate` FROM `raterobux`");
CheckLogin();
?>
 <?php require_once('Sidebar.php');?>
<div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="card unset-lg withdraw-items">
                        <div class="card-header d-none d-lg-flex justify-content-between align-items-center">
                            <h1 class="text-title-bold fz-20 lh-28">
                                Rút vật phẩm
                            </h1>
                            <span class="reload-page" onclick="window.location.reload()"><i class="fas fa-redo"></i>Làm
                                mới</span>
                        </div>
                        <div class="card-body c-px-16 c-py-0">
                            <ul class="nav nav-tabs size-auto c-pb-16" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="tab active" data-toggle="tab" href="#tab-1" role="tab" aria-selected="true">Rút vật phẩm</a>
                                </li>
                                <li class="nav-item history-withdraw-tab" role="presentation">
                                    <a class="tab" data-toggle="tab" href="#tab-2" role="tab" aria-selected="false">Lịch
                                        sử</a>
                                </li>
                            </ul>
                                                                                                                    <div class="tab-content withdraw-body">
                                    <div class="tab-pane fade c-pt-16 c-pb-lg-50 c-mb-lg-50 active show" id="tab-1" role="tabpanel">
                                                                                   <ul style="padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; outline: 0px; border: 0px; list-style-position: inside; color: rgb(51, 51, 51); font-family: roboto, Arial, Tahoma, sans-serif, arial, Helvetica; font-size: 14px;"><p style="font-size: 13px; line-height: 20px; color: rgb(67, 70, 87); font-family: Roboto, sans-serif;"><span style="font-size: 16px; line-height: 20px; color: var(--text-color);">- Quý khách chú ý <span style="font-weight: bolder;">Tạo Đúng Server</span> hoặc <span style="font-weight: bolder;">Gamepass</span> với gói rút mình chọn.</span></p><p style="font-size: 13px; line-height: 20px; color: rgb(67, 70, 87); font-family: Roboto, sans-serif;"><span style="font-size: 16px; line-height: 20px; color: var(--text-color);">- <span style="font-weight: bolder;">Mỗi 1 Gamepass</span> hoặc <span style="font-weight: bolder;">Server</span> <span style="font-weight: bolder;">chỉ áp dụng cho 1 lần rút</span>, nếu <span style="font-weight: bolder;">rút nhiều lần phải tạo nhiều</span> gamepass hoặc server.</span></p><p style="font-size: 13px; line-height: 20px; color: rgb(67, 70, 87); font-family: Roboto, sans-serif;"><span style="font-size: 16px; line-height: 20px; color: var(--text-color);">- Nếu rút bằng tên tài khoản <span style="font-weight: bolder;">thất bại</span> hãy thử rút bằng link server.</span></p></li></ul>                                                                     <div  class="modal-login-error text-center LoginError" id="thongbaoWithdraw"></div>                                    <form class="form-horizontal form-withdraw" method="POST" action="" id="withDrawItem">
                                                                  <div class="input-group c-mb-10" id="rutkc">
                                            <span class="form-label">
                                                RÚT VẬT PHẨM GAME Roblox
                                            </span>
                                            <select class="select-primary withdraw-select" id="game_type" name="game_type" >
                                                                                                                    
<option value="robux" selected > Rút Robux</option>

                                                   <div class="alert alert-danger" role="thongbao" id="thongbao" style="padding: 5px 10px; margin-top: 10px;display:none"></div>                                                                                  </select>
                                        </div>
                                        <div class="group-info c-mb-16" id="main_kimcuong">
                                            <span class="text-primary-color item_number">Số vật phẩm hiện có:<?=format_cash($getUser['robux']);?> RB </span> <br>
                                            <span class="text-primary-color item_number">GIÁ SERVER VIP CẦN ĐẶT:<b id="countRoblox1" class="tw-text-red-500">0</b></span>
                                        </div>
                                   
                                            <div class="input-group">
                                                    <span class="form-label">
                                                       Nhập số robux :
                                                    </span>
                                                    <input type="text" id="amount" name="amount" value="0" required="required" 
										autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3" 
										class="" 
										aria-invalid="false">
										<input type="hidden" id="real_amount">
                                                </div>
                                                                                                                                      
                                                                                                                                                                                                                                                                       <div class="input-group">
                                                    <span class="form-label">
                                                        Nhập Link Cài Giá Sever :
                                                    </span>
                                                    <input type="text" name="tk" id="tk" placeholder="Nhập Link Cài Giá Sever :" required="">
                                                </div>
                                                                                                                                        <div class="input-group">
                                                    <span class="form-label">
                                                     Ghi chú
                                                    </span>
                                                    <input type="text" name="ghichu" placeholder="Ghi chú" required="">
                                                </div>
                                                                                                             
                                                                                                                                    
                                            <div class="group-btn c-mt-24 c-mb-24 media-web" style="justify-content: end;">
                                                <button type="submit" id="Submit" class="btn primary btn-withdraw-submit" style="width: 266px">Rút
                                                    ngay</button>
                                            </div>
<div id="thongbao"></div>
<div id="thongbao1"></div>
                                            <div class="footer-mobile">
                                                <div class="group-btn">
                                                    <button type="submit" id="Submit1" class="btn primary btn-withdraw-submit">Rút
                                                        ngay</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="c-history-title c-pb-16 c-pb-lg-12 media-web">
                                            <h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">Lịch sử rút vật phẩm</h3>
                                        </div>
                                     

                                        <div class="history-content c-pt-16 mr-n2">
 
<ul class="trans-list">
    <?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `orders_withdraw` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){ ?>
                        <li class="trans-item" data-id="<?=$i++;?>" data-tk=" <?=$row['tk'];?>" data-reason=" <?=$row['reason'];?>" data-dichvu=" <?=$row['dichvu'];?>" data-createdate="<?=$row['createdate'];?>">
                <a href="javascript:void(0);">
                    <div class="text-left">
                        <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                           Robux                        </span>
                        <span class="t-body-1 link-color">
                            <?=$row['createdate'];?>                        </span>
                    </div>
                    <div class="text-right">
                        <span class="fw-500 d-block c-mb-0">
                            <?=format_cash($row['robux']);?> R$                      </span>
                        <span class="invalid-color c-mb-0"><?=status($row['status']);?> </span>
                    </div>
                </a>
            </li>
            <?php }?>
            </ul>

<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-customs">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Lịch sử rút vật phẩm </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   
                </button>
            </div>
            <div class="modal-body">
                <div id="CMSNAV">
                    <!-- Get id -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.trans-item').forEach(item => {
        item.addEventListener('click', function() {
            var dichvu = this.getAttribute('data-dichvu');
            var reason = this.getAttribute('data-reason');
            var createdate = this.getAttribute('data-createdate');
            var status = this.getAttribute('data-status');

            document.getElementById('CMSNAV').innerHTML = `
                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Số rút</p>
                    <div class="fw-500 fz-13"><?=format_cash($row['robux']);?> R$ </div>
                </div>
                 <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Lời Nhắc</p>
                    <div class="fw-500 fz-13">${reason}</div>
                </div>
              
                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Thời Gian</p>
                    <div class="fw-500 fz-13">${createdate} đ</div>
                </div>
              
                   <div class="history-detail-attr d-flex justify-content-between align-items-center">
                    <p class="fz-13 fw-400 mb-0">Trạng thái</p>
                    <div class="fw-500 fz-13"><?=status($row['status']);?></div>
                </div>
               
            `;

            $('#transactionModal').modal('show');
        });
    });
</script>
                                      
                                    </div>
                                </div>
                                                    </div>
                    </div>
                    <input type="text" class="check-click-tab-history" value="0" hidden="">
                </div>



     

					 
    </div>
</div> 
<script type="text/javascript">

let rate = <?=$rateRobux['rate'];?>;

$("#amount").on('input', function (e) {
    
    var val = $("#amount").val();
    btMoney = Math.round((+val * 70) / rate);
    if(btMoney < 0) {
        btMoney = 0;
    }
    
    $("#show_price").html(btMoney.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.'));
    btRobux = val;
    var inputRobux = Math.round(+btRobux / 0.7);
    $("#countRoblox1").html(inputRobux.toString().replace(/(.)(?=(\d{3})+$)/g, '$1.')+ ' R$');


});


$("#Submit").on("click", function() {
   


    $('#Submit').html('ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        
        url: "<?=BASE_URL("assets/ajaxs/RutRobux.php");?>",
        method: "POST",
        data: {
            type: 'Order',
            tk: $("#tk").val(),
            mk: ' . ',
            ghichu: $("#ghichu").val(),
            sorb: $("#amount").val(),
            robux: Math.round((+$("#amount").val() * 100) / rate)

        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#Submit').html(
                    'Rút Tiếp')
                .prop('disabled', false);
        }
    });
});

</script>




<script type="text/javascript">
$("#Submit1").on("click", function() {
   


    $('#Submit1').html('ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        
        url: "<?=BASE_URL("assets/ajaxs/RutRobux.php");?>",
        method: "POST",
        data: {
            type: 'Order',
            tk: $("#tk").val(),
            mk: ' . ',
            ghichu: $("#ghichu").val(),
            sorb: $("#amount").val(),
            robux: Math.round((+$("#amount").val() * 100) / rate)

        },
        success: function(response) {
            $("#thongbao1").html(response);
            $('#Submit1').html(
                    'Rút Tiếp')
                .prop('disabled', false);
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
