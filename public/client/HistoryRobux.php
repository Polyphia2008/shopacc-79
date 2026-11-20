<?php
        require_once("../../config/config.php");
        require_once("../../config/function.php");
        $title = 'LỊCH SỬ | '.$CMSNAV->site('tenweb');
        require_once("../../public/client/Header.php");
        require_once("../../public/client/Nav.php");
        $rateRobux = $CMSNAV->get_row(" SELECT `rate` FROM `raterobux`");
?>
<?php if($CMSNAV->site('theme_web') == 'theme1') { ?>
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
<div class="ws-px-2 ws-py-4 md:ws-py-12 ws-grid ws-grid-cols-12 ws-gap-2 md:ws-max-w-6xl md:ws-mx-auto">
    <div class="md:ws-block ws-col-span-12 md:ws-col-span-3">
        <div class="ws-my-1 md:ws-px-3 md:ws-bg-transparent ws-rounded-none md:ws-rounded">
            <div class="ws-bg-white md:ws-bg-transparent ws-px-3 md:ws-px-0 ws-py-2 md:ws-py-0 ws-flex ws-mb-4 md:ws-rounded ws-rounded-lg">
                <img src="https://<?=check_string($_SERVER['SERVER_NAME']);?>/assets/images/IMG_4738.jpeg" class="ws-h-12 ws-rounded-full">
                <div class="ws-ml-2">
                    <p><?=$getUser['username'];?></p>
                    <p class="ws-text-sm"><b>ID: <?=$getUser['id'];?></b></p>
                </div>
            </div>
            <div class="sidebar ws-text-sm ws-text-zinc-700">
                <div class="ws-bg-white ws-mb-4 md:ws-rounded ws-rounded-lg">
                    <a href="/user/profile" class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-rounded-t ws-transition ws-duration-200">
                    <i class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl bx bxs-user ws-text-zinc-500"></i><span class="ws-ml-10 ws-inline-block">Thông Tin Tài Khoản</span>
                    </a>
                    <a href="/user/recharge" class="ws-text-zinc-800 ws-border-b ws-block ws-cursor-pointer ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-rounded-b ws-transition ws-duration-200">
                    <i class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl bx bxs-dollar-circle ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span class="ws-ml-10 ws-inline-block">Lịch Sử Nạp Thẻ</span>
                    </a>
                                        <a href="/user/robux" class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200">
                    <i class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl bx bxs-navigation ws-text-zinc-500"></i><span class="ws-ml-10 ws-inline-block">Rút Robux (Tự Động)</span>
                    </a>
                    </div>
                    <div class="ws-bg-white ws-mb-4 md:ws-rounded ws-rounded-lg">
                                        <a href="/voucher" class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200">
                    <i class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl bx bxs-joystick ws-text-zinc-500"></i><span class="ws-ml-10 ws-inline-block">Mã Giảm Giá</span>
                    </a>
                    <a href="/user/history/acc" class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200">
                    <i class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl bx bxs-joystick ws-text-zinc-500"></i><span class="ws-ml-10 ws-inline-block">Tài Khoản Đã Mua</span>
                   <a href="/user/history/caythue" class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200">
                    <i class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl bx bxs-joystick ws-text-zinc-500"></i><span class="ws-ml-10 ws-inline-block">Lịch Sử Cày Thuê</span>
                     <a href="/user/history/robux" class="router-link-active router-link-exact-active ws-bg-red-600 ws-text-white ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-rounded-t ws-transition ws-duration-200" aria-current="page">
                    <i class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl bx bxs-joystick ws-text-white ws-border-red-600"></i><span class="ws-ml-10 ws-inline-block">Lịch Sử Mua Robux</span>
                    </a>
                    <a href="/user/history/gamepass" class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200">
                    <i class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl bx bxs-joystick ws-text-zinc-500"></i><span class="ws-ml-10 ws-inline-block">Lịch Sử Mua Vật Phẩm </span>
                   
                    </a>
                </div>
            </div>
        </div>
    </div>
<div class="tw-col-span-12 md:tw-col-span-8">
                        <div class="tw-bg-white tw-rounded tw-p-4 md:tw-py-4 md:tw-px-5 tw-w-full tw-mb-4">
                            <div class="tw-border-b tw-border-gray-200 tw-pb-2 tw-mb-4 tw-text-gray-800">

                            </div>
                            <!-- begin lich su -->
			<div class="tw-p-2 md:tw-p-4 overflow-x-auto">
				  <table id="datatable" class="tw-w-full">
                <thead>
                <tr class="tw-text-md tw-font-semibold tw-tracking-wide tw-text-left tw-text-gray-900 tw-border tw-border-b-0 tw-bg-gray-200">
                <th class="tw-px-2 tw-py-2">Đơn Hàng</th>
                <th class="tw-px-2 tw-py-2">
                <span class="tw-hidden md:tw-block">Tài Khoản/Mật Khẩu</span>
                <span class="tw-block md:tw-hidden">Chi Tiết</span></th>
                <th class="tw-px-2 tw-py-2 tw-hidden md:tw-block">Ghi Chú</th>
                </tr>
                </thead>
                <tbody class="bg-white tw-border tw-border-t-0 tw-rounded">
                    <?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `orders_robux` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){ ?>
                                <tr class="tw-text-gray-700 tw-border-b">
                <td class="tw-px-2 tw-py-1 md:tw-py-2 tw-text-xs"><div>
                <p class="tw-font-bold text-black"><?=$row['dichvu'];?></p>
                <div>
                <p class="tw-font-bold text-black">Giá Tiền: <?=$row['money'];?>đ</p>
                <p class="text-xs text-gray-600 tw-font-semibold"><?=$row['createdate'];?></p>
                <p class="tw-mt-1 text-xs text-gray-600 tw-font-semibold"><span class="tw-text-yellow-600"><?=status($row['status']);?></span></p>
                </div>
                </td>
                <td class="tw-px-2 tw-py-2 tw-text-xs">
                <div class="tw-text-xs md:tw-text-sm">
                <p class="tw-font-bold text-black">Tài khoản: <?=$row['tk'];?></p>
                <p class="tw-font-semibold text-xs">Mật khẩu: <?=$row['mk'];?></p>
                </div>
                <div class="tw-block md:tw-hidden tw-border-t tw-mt-2 tw-pt-2 tw-font-semibold tw-leading-5">
                <p class="tw-text-gray-800"><i class="bx bxs-upvote tw-relative" style="top: 1px;"></i>Note: <?=$row['ghichu'];?></p>
                <p class="tw-text-sm tw-text-yellow-600"><i class="bx bxs-downvote tw-relative" style="top: 1px;"></i>Note Admin: <b> <?=$row['reason'];?></b></p>
                </div>
                </td>
                <td class="tw-px-2 tw-py-1 tw-text-xs tw-hidden md:tw-block">
                <div class="tw-block md:tw-block tw-hidden tw-pt-2 tw-font-semibold tw-leading-5">
               <p class="tw-text-gray-800"><i class="bx bxs-upvote tw-relative" style="top: 1px;"></i>Note: <?=$row['ghichu'];?></p>
                <p class="tw-text-sm tw-text-yellow-600"><i class="bx bxs-downvote tw-relative" style="top: 1px;"></i>Note Admin: <b> <?=$row['reason'];?></b></p>
                </div>
                </td>
                </tr>
                <?php }?>
                                </tbody>
            </table>
			   </div>
			</div>
			<!-- begin lich su -->
                        </div>
<?php }?>

<!--THEME 2-->

<?php if($CMSNAV->site('theme_web') == 'theme2') { ?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4 md:p-4 bg-box-dark">
        <?php require_once('Sidebar.php');?>
        <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="w-full mb-10">
                <h2 class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                    LỊCH SỬ MUA GAMEPASS
                </h2>
                <div class="v-table-content select-text">
                    <div class="py-2 overflow-x-auto scrolling-touch max-w-400">
                        <table id="datatable" class="table-auto w-full scrolling-touch min-w-850">
                            <thead>
                                <tr class="v-border-hr select-none border-b-2 border-gray-300">
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        STT
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        DỊCH VỤ
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        TÀI KHOẢN
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        MẬT KHẨU
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        GIÁ
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        THỜI GIAN TẠO
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        CẬP NHẬT
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        TRẠNG THÁI
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        LÝ DO
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-semibold">
                                <?php $i = 0; foreach($CMSNAV->get_list(" SELECT * FROM `orders_robux` WHERE `username` = '".$getUser['username']."' ORDER BY id DESC ") as $row){ ?>
                                <tr>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$i++;?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['dichvu'];?>
                                    </td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['tk'];?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?=$row['mk'];?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?=format_cash($row['money']);?> VNĐ</td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span
                                            class="badge badge-danger"><?=$row['createdate'];?></span></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><span
                                            class="badge badge-danger"><?=$row['updatedate'];?></span></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?=status($row['status']);?></td>
                                    <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">
                                        <?=$row['reason'];?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="v-table-note mt-1 py-1 font-semibold text-white text-sm">
                        Dùng điện thoại <i class="bx bxs-mobile"></i>, hãy vuốt bảng từ phải qua trái (<i
                            class="bx bxs-arrow-from-right"></i>) để xem đầy đủ thông tin!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php }?>
<script type="text/javascript">
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<?php 
    require_once("../../public/client/Footer.php");
?>