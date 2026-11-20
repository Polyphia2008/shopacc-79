<?php
    require_once(__DIR__."/../../config/config.php");
    require_once(__DIR__."/../../config/function.php");
    $title = 'LỊCH SỬ MUA NICK | '.$CMSNAV->site('tenweb');
    require_once(__DIR__."/../../public/client/Header.php");
    require_once(__DIR__."/../../public/client/Nav.php");
    require_once(__DIR__."/../../includes/login.php");
?>
        <?php require_once('Sidebar.php');?>
        <div class="tw-col-span-12 md:tw-col-span-8">
            <div class="tw-mt-4 tw-bg-white tw-rounded tw-w-full">
                
                </div>
                <div class="tw-bg-white tw-rounded tw-p-2 md:tw-py-4 md:tw-px-5 tw-w-full">
                            <div class="tw-border-b tw-border-gray-200 tw-pb-2 tw-mb-2 tw-flex tw-items-center tw-justify-between md:tw-mb-4 tw-text-gray-800">
                                <div class="tw-inline-block">
                                    <h2 class="tw-text-lg tw-font-semibold">
                                        Lịch Sử Mua Nick
                                    </h2>
                                    <p class="tw-text-sm"></p>
                                </div>
                                <a href="?reload=true">
                                <button type="button" class="tw-relative tw-ml-2 block tw-px-1 py-1 tw-text-white tw-bg-red-500 text-sm tw-font-semibold tw-rounded focus:tw-outline-none" style="top: -1px;">
                                    <i class="relative bx bx-revision mr-1" style="top: 1px;"></i>
                                    Làm mới
                                </button>
                                </a>
                            </div>
                            <!---->
                            <div>
                                <table id="datatable" class="tw-w-full tw-rounded-t ">
					 <thead>
						<tr class="tw-text-md tw-font-semibold tw-tracking-wide tw-text-left tw-text-gray-900 tw-border tw-border-b-0 tw-bg-gray-200">
							<td class="tw-px-2 tw-py-2">STT</td>
							<td class="tw-px-2 tw-py-2">Id Acc</td>
							<td class="tw-px-2 tw-py-2">Số Tiền</td>
							<td class="tw-px-2 tw-py-2">Tài Khoản|Mật Khẩu</td>
							<td class="tw-px-2 tw-py-2">Thời gian</td>
						</tr>
					 </thead>
					 <tbody class="bg-white tw-border tw-border-t-0 tw-rounded">
							<?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `accountsv2` WHERE `buyer` = '".$getUser['id']."' ORDER BY id DESC ") as $accounts){ ?>
                                <tr>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$i++;?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$accounts['id'];?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=format_cash($accounts['money']);?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                    <div>
                                    <p class="tw-font-bold text-black">
                                    Tài khoản:  <?=explode("|", $accounts['account'])[0];?></p><p class="tw-font-semibold text-xs">Mật khẩu:  <?=explode("|", $accounts['account'])[1];?> </p>
                                    </div></td>
                                    
                                    
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$accounts['create_date'];?></td>
                                </tr>
                            <?php }?>
											 </tbody>
				  </table>
                                                            </div>
                        </div>
                    </div>
            <!--- here -->
        </div>
    </div>
</div>




<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>


<?php 
    require_once("../../public/client/Footer.php");
?>