<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once(__DIR__."/../../includes/login.php");
   $title = 'Rút Tiền Hoa Hồng Qua Giới Thiệu Thành| '.$CMSNAV->site('tenweb');
    if($CMSNAV->site('status_ref') != 'ON')
    { 
        die('Chức năng này đang bảo trì');
    }
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>
<?php   
    if(isset($_POST['timmagd'])){
        if(!empty($_POST['magd'])){
            $nguyenanhvu = " SELECT * FROM `ruttien` WHERE magd = '".$_POST['magd']."' ORDER BY id DESC LIMIT 1 ";
        }
    }
    else {
        $nguyenanhvu = " SELECT * FROM `ruttien` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC LIMIT 50 ";
    }
?>
<?php require_once('Sidebar.php'); ?>
      <script>
    function Tab(id){
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" vactive", "");
        }
        document.getElementById(id).style.display = "block";
        event.currentTarget.className += " vactive";
    }
</script>
<style>
    .vactive{
        --tw-border-opacity: 1;
        border-color: rgba(239,68,68,var(--tw-border-opacity));
        --tw-bg-opacity: 1;
        background-color: rgba(239,68,68,var(--tw-bg-opacity));
        font-weight: 800 !important;
        --tw-text-opacity: 1;
        color: rgba(255,255,255,var(--tw-text-opacity));
    }
        .checkbox-withdraw{
        display: inline-block;
        width: 1.25rem;
        height: 1.25rem;
        border: solid 2px #cd3e3e;
        border-radius: 9999px;
        }

        #xTech-GasForm input[type=radio]{
        display: none;
        }

        #xTech-GasForm input[type=radio]:checked + .checkbox-withdraw{
        background-color: #cd3e3e;
        }
</style>
                    <div class="tw-col-span-12 md:tw-col-span-8">
                        <h2 class="tw-mb-2 tw-font-bold tw-text-xl">RÚT TIỀN TỪ HOA HỒNG</h2>
                        <div class="tw-grid tw-grid-cols-12 tw-mb-4 tw-bg-white">
                            <button class="tablinks tw-col-span-4 tw-py-2 tw-font-semibold tw-border-b-2 tw-relative tw-rounded-tl focus:tw-outline-none hover:tw-border-red-500 vactive" onclick="Tab('rb')">
                                <img class="tw-hidden md:tw-block tw-h-12 tw-absolute tw-left-2" style="top: 6px;" src="/assets/images/icon_roblox1.png" />
                                <span>Rút <span class="tw-hidden md:tw-inline-block">Robux</span><span class="tw-inline-block md:tw-hidden">Robux</span></span>
                                <p class="tw-text-xs md:tw-text-sm tw-font-semibold">
                                    (Roblox)
                                </p>
                             </button>
                        </div>
     <div class="tw-bg-white tw-rounded tw-p-2 md:tw-py-4 md:tw-px-5 tw-w-full tw-mb-4">
					 <!---->
					 <?php if(!$CMSNAV->get_row(" SELECT * FROM `listbank` WHERE `username` = '".$_SESSION['username']."' ")) { ?>
                    <div id="thongbao">
                    <div class="tw-py-2 tw-px-3 tw-border tw-rounded tw-text-sm tw-w-full tw-block tw-font-semibold tw-bg-red-100 tw-border-red-300 tw-text-red-500 relative">
                    Chưa có ngân hàng khả dụng, vui lòng thêm mới thông tin rút tiền</div></div>
                    <?php } ?>
					 <div id="thongbao" style="padding-bottom: 13px;"></div>
					 <div class="tw-form-withdraw" id="main_kimcuong">
						<div>
						   <div class="tw-pb-2 tw-mb-2 tw-border-b tw-border-gray-200 tw-font-bold">
							  Hiện có:
							  <b class="tw-text-red-500 tw-uppercase">
							  <?=format_cash($getUser['ref_money']);?>đ 
							  </b> | </b>GIÁ SERVER VIP CẦN ĐẶT: <b id="countRoblox1" class="tw-text-red-500">0</b>
							  <br/>
							  
						   </div>
						   <div class="tw-grid tw-grid-cols-12 tw-gap-4">
							  <div class="tw-col-span-12 md:tw-col-span-6">
									<div class="alert alert-success" role="alert" id="success_group" style="padding: 5px 10px; margin-top: 10px;display:none"></div>
									
									<div class="tw-mb-2">
									   <label class="tw-text-gray-700 tw-text-sm"> Chọn ngân hàng (<a class="tw-text-red-500"
                                        href="/Localbank">Thêm ngân hàng</a>)<span class="text-danger">*</span> </label>
									   
									   <select id="listbank" class="tw-border tw-border-gray-300 tw-h-10 tw-px-3 tw-w-full tw-rounded focus:tw-outline-none">
                                            <?php foreach($CMSNAV->get_list(" SELECT * FROM `listbank` WHERE `username` = '".$getUser['username']."' ") as $bank) { ?>
                                            <option value="<?=$bank['id'];?>" class="tw-font-medium tw-text-red-600"><?=$bank['nganhang'];?> |
                                                <?=$bank['sotaikhoan'];?>
                                            </option>
                                            <?php }?>
                                        </select>
									</div>
									
									<div class="tw-mb-4">
										<label class="tw-text-gray-700 tw-text-sm"> Số tiền rút<span class="text-danger"></span> <br/> </label> 
										<input id="sotien" name="sotien" value="0" required="required" 
										autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3" 
										class="tw-border tw-border-gray-300 tw-h-10 tw-px-3 tw-w-full tw-rounded focus:tw-outline-none valid" 
										aria-invalid="false">
										<input type="hidden" id="real_amount">
									</div>
									<div class="col-md-9">
                            </div>
									
									<div class="alert alert-danger" role="thongbao1" id="thongbao1" style="padding: 5px 10px; margin-top: 10px;display:none">
									</div>
									
									
									<div>
									   <button type="button" class="tw-h-10 tw-px-3 tw-text-center tw-font-semibold tw-bg-red-500 tw-text-white tw-w-full tw-rounded focus:tw-outline-none" id="Withdraw">
									   RÚT NGAY
									   </button>
									</div>
								 </form>
								 <a href="#" class="tw-mt-4 tw-block md:tw-hidden tw-px-1 tw-font-semibold hover:tw-text-red-600">#Xem Danh sách rút vật phẩm</a>
							  </div>
							 
									  
									   
									 
						   </div>
						</div>
						<div></div>
						<div></div>
					 </div>
				  </div>
                       
                        <script type="text/javascript">
                        $("#Withdraw").on("click", function() {
                            $("#loading_box").show();
                            $('#Withdraw').html('Đang yêu cầu rút tiền').prop('disabled',
                                true);
                            $.ajax({
                                url: "<?=BASE_URL("assets/ajaxs/RutTien.php");?>",
                                method: "POST",
                                data: {
                                    type: 'Withdraw',
                                    password2: $("#password2").val(),
                                    sotien: $("#sotien").val(),
                                    listbank: $("#listbank").val()
                                },
                                success: function(response) {
                                    $("#loading_box").hide();
                                    $("#thongbao").html(response);
                                    $('#Withdraw').html(
                                            'RÚT TIỀN'
                                        )
                                        .prop('disabled', false);
                                }
                            });
                        });
                        </script>
       
                       <!-- begin lich su cay thue -->
			<div class="tw-mt-4 tw-bg-white tw-rounded tw-w-full">
			   <div class="tw-border-b tw-border-gray-200 tw-pb-2 tw-text-gray-800 tw-p-3 md:tw-py-3 md:tw-px-5">
				  <h2 class="tw-text-lg tw-font-semibold">Lịch sử rút tiền</h2>
			   </div>
			   <div class="tw-p-2 md:tw-p-4 overflow-x-auto">
				  <table id="datatable" class="tw-w-full tw-rounded-t ">
					 <thead>
						<tr class="tw-text-md tw-font-semibold tw-tracking-wide tw-text-left tw-text-gray-900 tw-border tw-border-b-0 tw-bg-gray-200">
							<td class="tw-px-2 tw-py-2">G.D</td>
							<td class="tw-px-2 tw-py-2">Số tiền</td>
							<td class="tw-px-2 tw-py-2">Trạng thái</td>
							<td class="tw-px-2 tw-py-2">Ngân hàng</td>
							<td class="tw-px-2 tw-py-2">Chủ tài khoản</td>
							<td class="tw-px-2 tw-py-2">Số tài khoản</td>
							<td class="tw-px-2 tw-py-2">Thời gian</td>
						</tr>
					 </thead>
					 <tbody class="bg-white tw-border tw-border-t-0 tw-rounded">
					      <?php
                                    $i = 0;
                                    foreach($CMSNAV->get_list($nguyenanhvu) as $row){
                                    ?>
                                    <tr>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['magd'];?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span class="text-danger"><?=format_cash($row['sotien']);?>đ</td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span class="text-success"><?=display_ruttien_user($row['trangthai']);?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span class="text-danger"><?=$row['nganhang'];?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span class="text-warning"><?=$row['chutaikhoan'];?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span class="text-primary"><?=$row['sotaikhoan'];?></td>
                                        <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['thoigian'];?>
                                        </td>
                                        </tr>
                                         <?php }?>
                                         
											 </tbody>
				  </table>
			   </div>
			</div>
			<!-- begin lich su cay thue -->
                        </div>
<script>
$(function() {
    $("#datatable").DataTable({
        "autoWidth": false,
    });
});
</script>


<?php 
    require_once("../../public/client/Footer.php");
?>