<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once(__DIR__."/../../includes/login.php");
   $title = 'Giới Thiệu Thành Viên Nhận Tiền | '.$CMSNAV->site('tenweb');
    
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>
<?php
//$ref_yesterday = $CMSNAV->num_rows("SELECT * FROM `users` WHERE `ref` = '".$getUser['id']."' AND `createdate` < DATE(NOW()) AND `createdate` >= DATE(NOW()) + INTERVAL -1 DAY ");
$ref_today = $CMSNAV->num_rows("SELECT * FROM `users` WHERE `ref` = '".$getUser['id']."' AND `createdate` >= DATE(NOW()) AND `createdate` < DATE(NOW()) + INTERVAL 1 DAY ");
//$progress = $ref_today / $ref_yesterday * 100;
$ref_total = $CMSNAV->num_rows("SELECT * FROM `users` WHERE `ref` = '".$getUser['id']."' ");
$total_hoahong = $CMSNAV->get_row("SELECT SUM(`money_hoahong`) FROM `users` WHERE `ref` = '".$getUser['id']."' ")['SUM(`money_hoahong`)'];
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
                        <h2 class="tw-mb-2 tw-font-bold tw-text-xl">CỘNG TÁC VIÊN</h2>
                        <div class="tw-grid tw-grid-cols-12 tw-mb-4 tw-bg-white">
                            
                        </div>
                         <div class="tw-bg-white tw-rounded tw-p-2 md:tw-py-4 md:tw-px-5 tw-w-full tw-mb-4">
                             <div class="tw-form-withdraw">
                                 <div class="tabcontent" id="tongquan">
                             <button class="tablinks tw-col-span-4 tw-py-2 tw-font-semibold tw-border-b-2 tw-relative tw-rounded-tl focus:tw-outline-none hover:tw-border-red-500 " >
                                <img class="tw-hidden md:tw-block tw-h-12 tw-absolute tw-left-2" style="top: 6px;" />
                                <span>Bạn bè giới thiệu hôm nay <span class="tw-hidden md:tw-inline-block"></span><span class="tw-inline-block md:tw-hidden"></span></span>
                                <p class="tw-text-xs md:tw-text-sm tw-font-semibold">
                                    <?=format_cash($ref_today);?>
                                </p>
                             </button>
                             <button class="tablinks tw-col-span-4 tw-py-2 tw-font-semibold tw-border-b-2 tw-relative tw-rounded-tl focus:tw-outline-none hover:tw-border-red-500 " >
                                <img class="tw-hidden md:tw-block tw-h-12 tw-absolute tw-left-2" style="top: 6px;" />
                                <span>Tổng bạn bè giới thiệu <span class="tw-hidden md:tw-inline-block"></span><span class="tw-inline-block md:tw-hidden"></span></span>
                                <p class="tw-text-xs md:tw-text-sm tw-font-semibold">
                                    <?=format_cash($ref_total);?>
                                </p>
                             </button>
                             <button class="tablinks tw-col-span-4 tw-py-2 tw-font-semibold tw-border-b-2 tw-relative tw-rounded-tl focus:tw-outline-none hover:tw-border-red-500 " >
                                <img class="tw-hidden md:tw-block tw-h-12 tw-absolute tw-left-2" style="top: 6px;" />
                                <span>Số Dư Hoa hồng <span class="tw-hidden md:tw-inline-block"></span><span class="tw-inline-block md:tw-hidden"></span></span>
                                <p class="tw-text-xs md:tw-text-sm tw-font-semibold">
                                    <?=format_cash($total_hoahong);?>
                                </p>
                             </button>
					 <!---->
					 <div id="thongbao" style="padding-bottom: 13px;"></div>
					 <div class="tw-form-withdraw" id="main_kimcuong">
						<div>

							  
						   </div>
						   <div class="tw-grid tw-grid-cols-12 tw-gap-4">
							  <div class="tw-col-span-12 md:tw-col-span-6">
									<div class="alert alert-success" role="alert" id="success_group" style="padding: 5px 10px; margin-top: 10px;display:none"></div>
									<div class="tw-mb-4">
										<label class="tw-text-gray-700 tw-text-sm"> Link Giới Thiệu Của Bạn <span class="text-danger">*</span> <br/> </label> 
										
										<div class="tw-relative">
                    <input id="urlRef" value="<?=BASE_URL('?ref='.$getUser['id']);?>" readonly class="tw-h-10 tw-px-3 tw-border-2 tw-border-red-500 tw-text-lg tw-border-dashed tw-rounded tw-w-full tw-text-red-600 tw-font-extrabold focus:tw-outline-none" />
                    <button onclick="copy('<?=BASE_URL('?ref='.$getUser['id']);?>')" class="tw-bg-red-600 hover:tw-bg-red-500 tw-px-4 tw-h-6 tw-text-white tw-flex tw-items-center tw-py-1 tw-absolute tw-text-sm tw-font-semibold tw-rounded" style="top: 8px; right: 8px;">
                        COPY
                    </button>
                </div>
									   
									</div>
								 </form>
								 <a href="#" class="tw-mt-4 tw-block md:tw-hidden tw-px-1 tw-font-semibold hover:tw-text-red-600">#Xem Danh sách rút vật phẩm</a>
							  </div>
							  <div class="tw-col-span-12 md:tw-col-span-6 tw-text-sm">
								 <div class="tw-border-2 tw-border-amber-300 tw-bg-white tw-rounded tw-text-sm tw-leading-7 tw-px-3 tw-py-1 tw-my-2" style="overflow-y: auto; height: 26.9rem;">
									<div class="relative">
									   
									   <div  id="ytb-gamepass">
										  <div class="embed-container">
										     <p> Giới thiệu khách hàng sử dụng dịch vụ của chúng tôi nhận ngay hoa hồng <?=$CMSNAV->site('ck_ref');?>%</p>
											<p>Những tài khoản được hệ thống xác định là tài khoản sao chép của các tài khoản khác sẽ không được dùng để tính hoa hồng.	</p>
                        <p>Hoa hồng chỉ được tính khi người dùng mua tài nguyên trên web.	</p>
                        <p>Việc xác định xem ai là người giới thiệu của một người dùng phụ thuộc hoàn toàn vào link giới thiệu. Nếu một người dùng nhấp vào nhiều link ref khác nhau thì chỉ có link ref cuối cùng họ nhấp vào trước khi tạo tài khoản là có hiệu lực.	</p>
										  </div>
									   </div>
									   <div style="display: none" id="ytb-svvip">
										  <div class="embed-container"></div>
									   </div>
									</div>
								 </div>
							  </div>
						   </div>
						</div>
						
				  
       <div class="col-sm-12 pt-5">
                <div class="element-wrapper">
                    <div class="element-header"> BẠN BÈ ĐƯỢC BẠN GIỚI THIỆU	</div>
                    <div class="element-box">
                        <div class="table-responsive">
                            <table id="datatable" width="100%" class="table table-striped table-lightfont">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TÊN ĐĂNG NHẬP</th>
                                        <th>THỜI GIAN THAM GIA	</th>
                                        <th>TỔNG TIỀN NẠP</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $i=0;foreach($CMSNAV->get_list("SELECT * FROM `users` WHERE `ref` = '".$getUser['id']."' ") as $row) { ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><strong class=""><?=$row['username'];?></strong></td>
                                        <td><strong class=""><?=$row['createdate'];?></strong></td>
                                        <td><b style="color: blue;"><?=format_cash($row['total_money']);?></b></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
    $(function() {
        $("#datatable").DataTable();
    });
    </script>

    <?php 
    require_once("../../public/client/Footer.php");
?>