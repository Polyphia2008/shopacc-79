<?php
        require_once("../../config/config.php");
        require_once("../../config/function.php");
        $title = 'THANH TOÁN | '.$CMSNT->site('tenweb');
        require_once("../../public/client/Header.php");
        require_once("../../public/client/Nav.php");
?>
<?php
/* BẢN QUYỀN THUỘC VỀ CMSNT.CO | NTTHANH LEADER NT TEAM */
if(isset($_GET['id']))
{
    $row = $CMSNT->get_row(" SELECT * FROM `category_rblink` WHERE `id` = '".check_string($_GET['id'])."'  ");
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

<div class="mt-12 relative w-full max-w-6xl mx-auto text-gray-800 pb-8 px-2 md:px-0 ">
    
    <div class="col-span-12 color-grant gap-2 grid grid-cols-10 px-2 py-2 select-none text-xl tomrobux-box tomrobux-text" style="
    text-transform: uppercase;border: solid 1px <?=$CMSNT->site('theme_color');?>;box-shadow: 0 0 15px <?=$CMSNT->site('theme_color');?>, inset 0 0 15px <?=$CMSNT->site('theme_color');?>;
"><div class="col-span-12 md:col-span-12 text-center"><i class="fa-solid fa-cart-flatbed"></i> <?=$row['title'];?> <i class="fa-solid fa-cart-flatbed fa-flip-horizontal"></i></span>
        </div>
    </div>
    
    <br>
   <div class="col-span-12 color-grant gap-2 grid grid-cols-10 px-2 py-2 select-none text-xl tomrobux-box tomrobux-text" style="
    text-transform: uppercase;border: solid 1px <?=$CMSNT->site('theme_color');?>;box-shadow: 0 0 15px <?=$CMSNT->site('theme_color');?>, inset 0 0 15px <?=$CMSNT->site('theme_color');?>;
">
        <div class="col-span-12 md:col-span-12 text-center">SỐ TIỀN CẦN THANH TOÁN: <b id="thanhtoan">0</b>đ  </div>
        </div>
    <br>
        <div class="mb-4 py-4 md:p-4 tomrobux-box" style="border: solid 1px <?=$CMSNT->site('theme_color');?>;box-shadow: 0 0 15px <?=$CMSNT->site('theme_color');?>, inset 0 0 8px <?=$CMSNT->site('theme_color');?>;">
      
        <div class="mb-6">
        </div>
       
        <div class="v-account-detail p-2 md:px-0 mt-5">
            <div class="v-infomations ">
                <div class="py-3 px-5">
                    <span class="mb-2 block">
                        <div class="flex items-center relative">
                            <select id="dichvu" onchange="showPrice()"
                               class="focus:outline-none appearance-none bg-trueGray-900 block leading-tight px-3 py-2 rounded text-white tomrobux-box w-full tomrobux-text" style="     border: solid 1px <?=$CMSNT->site('theme_color');?>;box-shadow: 0 0 15px <?=$CMSNT->site('theme_color');?>, inset 0 0 8px <?=$CMSNT->site('theme_color');?>; ">
                                <option data-money="0" value="">* Chọn gói cần mua</option>
                                <?php foreach($CMSNT->get_list("SELECT * FROM `groups_rblink` WHERE `category` = '".$row['id']."' ") as $group) {?>
                                <option data-money="<?=$group['money'];?>" value="<?=$group['id'];?>">
                                    <?=$group['title'];?></option>
                                <?php }?>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    class="fill-current h-4 w-4">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </span>
                    <span class="mb-2 block">
                        <div class="flex items-center relative"><input placeholder="Nhập link svv, gamepass đã set robux tại đây" id="tk"
                               class="focus:outline-none appearance-none bg-trueGray-900 block leading-tight px-3 py-2 rounded text-white tomrobux-box w-full tomrobux-text" style="     border: solid 1px <?=$CMSNT->site('theme_color');?>;box-shadow: 0 0 15px <?=$CMSNT->site('theme_color');?>, inset 0 0 8px <?=$CMSNT->site('theme_color');?>; ">
                        </div>
                    </span>
                    <span class="mb-2 block">
                        <div class="flex items-center relative"><textarea placeholder="Nhập ghi chú nếu có" id="ghichu"
                               class="focus:outline-none appearance-none bg-trueGray-900 block leading-tight px-3 py-2 rounded text-white tomrobux-box w-full tomrobux-text" style="     border: solid 1px <?=$CMSNT->site('theme_color');?>;box-shadow: 0 0 15px <?=$CMSNT->site('theme_color');?>, inset 0 0 8px <?=$CMSNT->site('theme_color');?>; "></textarea>
                        </div>
                    </span>
                    <center class="mt-4">
                        <button type="button" id="Submit" class="flex focus:outline-none font-semibold h-10 items-center justify-center px-4 rounded rounded-none text-center text-white text-xl uppercase buy-button tomrobux-text w-50" style="border: solid 1px <?=$CMSNT->site('theme_color');?>;box-shadow: 0 0 15px <?=$CMSNT->site('theme_color');?>, inset 0 0 8px <?=$CMSNT->site('theme_color');?>;">
                         THANH TOÁN
                        </button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="alert-info chino-card-ovf chino-card" role="alert">
            <?=$row['luuy'];?>
        </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
function showPrice() {
    var ketqua = $('#dichvu').children('option:selected').attr('data-money').replace(/(.)(?=(\d{3})+$)/g, '$1.');
    $("#thanhtoan").html(ketqua);
}
$("#Submit").on("click", function() {

    $('#Submit').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/RobuxLink.php");?>",
        method: "POST",
        data: {
            type: 'Order',
            tk: $("#tk").val(),
            mk: $("#mk").val(),
            ghichu: $("#ghichu").val(),
            dichvu: $("#dichvu").val()
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#Submit').html(
                    'THANH TOÁN')
                .prop('disabled', false);
        }
    });
});
</script>

<?php 
    require_once("../../public/client/Footer.php");
?>