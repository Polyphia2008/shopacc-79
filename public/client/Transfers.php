<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'CHUYỂN TIỀN | '.$CMSNT->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
    CheckLogin();
?>
<div class="w-full max-w-6xl mx-auto pt-6 md:pt-8 pb-8">
    <div class="grid grid-cols-8 gap-4 md:p-4 chino-card-ovf chino-card">
        <?php require_once('Sidebar.php');?>
        <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="w-full mb-2">
                <div class="rounded w-full">
                    <span>
                        <form method="POST" class="w-full">
                            <h2
                                class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                                Chuyển Quỹ Shop
                            </h2>
                            <div class="py-3 px-5">
                                <span class="mb-2 block">
                                    <div class="flex items-center relative">
                                        <select class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                                <option value="">Số dư - <?=format_cash($getUser['money']);?>đ</option>
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
                                    <div class="flex items-center relative">
                                        <select class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                                <option value="">Phí cố định: <?=$CMSNT->site('phi_chuyentien');?> VND</option>
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
                                    <div class="flex items-center relative">
                                        <select class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                                <option value=""><td>Số tiền chuyển tối thiểu: </td><td>10,000 VND</td></option>
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
                                    <div class="flex items-center relative">
                                        <select class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                                <option value=""><td>Số tiền chuyển tối đa: </td><td>20,000,000 VND</td></option>
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
                                <td><span style="color:white">Tài khoản nhận:</td>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative"><tr>
                                        <td><input id="nguoinhan" type="text" placeholder="Nhập tài khoản người nhận"
                                                class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none" />
                                        </td>
                                    </tr>
                                    </div>
                                </span>
                                <td><span style="color:white">Số tiền chuyển:</td>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative"><tr>
                                        <td><input type="number" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none" id="sotien"
                                                placeholder="Nhập số tiền cần chuyển">
                                        </td>
                                    </tr>
                                    </div>
                                </span>
                                <td><span style="color:white">Nội dung:</td>
                                <span class="mb-2 block">
                                    <div class="flex items-center relative"><tr>
                                        <td><input id="lydo" type="text" placeholder="Nội dung chuyển nếu có"
                                                class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none" />
                                        </td>
                                    </tr>
                                    </div>
                                </span>
                                <div class="mt-4 text-center">
                                    <button type="button" id="ChuyenTien"
                                        class="uppercase flex w-40 font-semibold rounded items-center justify-center h-10 text-white text-xl rounded-none focus:outline-none px-4 text-center bg-red-500 hover:bg-red-600 ">
                                        Chuyển ngay</button>
                                    </button>
                                </div>
                                <div class="mt-2 text-red-500 font-semibold text-sm">
                                </div>
                            </div>
                        </form>
                    </span>
                    <!---->
                </div>
            </div>
            <div class="v-bg w-full mb-2 px-2">
                <h2
                    class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                    LỊCH SỬ CHUYỂN TIỀN
                </h2>
                <div class="pb-10">
        <div class="v-card w-full max-w-6xl mx-auto">
            <div class="md:mx-0">
                <div class="py-2">
                    <div class="mb-16">
                        <div class="mb-4 py-4 md:p-4 chino-card-ovf chino-card">
                                        <div class="">
                                                <span class="chino-t" style="color: #B799FF;text-shadow: 1px 1px 10px #a489e5;"><i class="fa-solid fa-gem"></i> VUI LÒNG QUA TAB BIẾN ĐỘNG SỐ DƯ ĐỂ XEM <i class="fa-solid fa-gem"></i></span> </option>
                                            </div>
                                            <div class="chino-t" style="color: #99FFB8;text-shadow: 1px 1px 10px #89e5a5;"><a target="_blank"
                    href="<?=BASE_URL('bien-dong-so-du/');?>">----------------------------> ẤN VÀO ĐÂY ĐỂ XEM <----------------------------  
                        
            </p>
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
        
        </div>
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
</div>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$("#ChuyenTien").on("click", function() {
    $('#ChuyenTien').html('ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/Transfers.php");?>",
        method: "POST",
        data: {
            type: 'ChuyenTien',
            sotien: $("#sotien").val(),
            lydo: $("#lydo").val(),
            nguoinhan: $("#nguoinhan").val()
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#ChuyenTien').html(
                    'Chuyển tiền ngay')
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