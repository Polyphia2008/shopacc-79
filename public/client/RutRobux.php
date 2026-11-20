<?php
        require_once("../../config/config.php");
        require_once("../../config/function.php");
        $title = 'RÚT ROBUX'.$NGUYENANHVU->site('tenweb');
        require_once("../../public/client/Header.php");
        require_once('Sidebar.php');
?>






<div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0" >




<div class="gap-2 grid-cols-1 sm:grid-cols-2"> 
    
<div class="">
    
<div class="grid grid-cols-1 sm:grid-cols-2 gap-2 my-4"><h2 class="text-left"><span class=" py-0.5 rounded-full font-medium text-lg text-gray-100"><span class="material-icons text-red-600" style="vertical-align: -6px;">dashboard</span>
            Rút robux
          </span></h2> <h2 class="text-right"><span class="px-3 py-0.5 rounded-full font-medium bg-main-500 text-gray-100"><span class="material-icons" style="vertical-align: -6px;">attach_money</span> <b id="thanhtoan" class="text-danger">0</b> <b>VND</b>
          </span></h2></div>
          <form  id="card-charing"  method="post">

         <div class="mb-2 col-span-2">
  
      <div class="px-4 py-5 rounded-xl">
        <select id="action" class="w-full px-4 py-2 text-base text-gray-700 placeholder-gray-500 bg-gray-300 border border-transparent rounded-lg shadow-md appearance-none focus:outline-none focus:ring-2 focus:ring-main-400 focus:border-transparent">
                                <option value="NULL">Chọn Gói Robux Muốn Rút</option>
                                            <option value="50">50 Robux</option>
                                            <option value="100">100 Robux</option>
                                            <option value="200">200 Robux</option>
                                            <option value="300">300 Robux</option>
                                            <option value="500">500 Robux</option>
                                            <option value="600">600 Robux</option>
                                            <option value="700">700 Robux</option>
                                            <option value="800">800 Robux</option>
                                            <option value="900">900 Robux</option>
                                            <option value="1000">1000 Robux</option>
                            </select>

          <div class="grid grid-cols-1 gap-2 mt-3 sm:grid-cols-2">

            <div class="mb-2">
              <input placeholder="Tên đăng nhập tài khoản roblox" id="id_game"
                class="w-full px-4 py-2 text-base text-gray-700 placeholder-gray-500 bg-gray-300 border border-transparent rounded-lg shadow-md appearance-none focus:outline-none focus:ring-2 focus:ring-main-400 focus:border-transparent">
            </div>
            <div class="mb-2"><input placeholder="Mật Khẩu" id="mk"
                class="w-full px-4 py-2 text-base text-gray-700 placeholder-gray-500 bg-gray-300 border border-transparent rounded-lg shadow-md appearance-none focus:outline-none focus:ring-2 focus:ring-main-400 focus:border-transparent">
            </div>
          <div class="mb-2">
            <input placeholder="Ghi chú của bạn" id="ghichu"
              class="w-full px-4 py-2 text-base text-gray-700 placeholder-gray-500 bg-gray-300 border border-transparent rounded-lg shadow-md appearance-none focus:outline-none focus:ring-2 focus:ring-main-400 focus:border-transparent">
          </div>
</div>
          <p class="text-sm text-red-600">
            <?=$row['luuy'];?>
          </p>

          <div class="mt-2">
            <button type="button" id="RutVatPham" class="w-full px-3 py-2 mt-1 text-white transition duration-500 ease-in-out shadow-lg bg-main-500 rounded-xl hover:-translate-y-1 hover:bg-main-400 shadow-main-500/50">
             Rút Ngay
            </button>
          </div>
        </form>
      </div>

  </div>
<div class="v-bg w-full mb-2 px-2">
                <h2
                    class="v-title border-l-4 border-red-800 px-3 select-none text-white text-xl md:text-2xl font-bold">
                    LỊCH SỬ RÚT ROBUX
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
                                        TÀI KHOẢN
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        MẬT KHẨU
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        SỐ LƯỢNG
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        TRẠNG THÁI
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-white text-left px-1">
                                        RÚT LÚC
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-semibold">
                                <?php $i = 0;
                                foreach ($NGUYENANHVU->get_list("SELECT * FROM `orders_withdraw` WHERE `username` = '" . $getUser['username'] . "'") as $rows) { ?>
                                    <tr>
                                        <td class="text-sm text-black text-left px-1 py-1 border-b"><?= $i++; ?></td>
                                        <td class="text-sm text-black text-left px-1 py-1 border-b"><?= $rows['id_game']; ?></td>
                                        <td class="text-sm text-black text-left px-1 py-1 border-b"><?= $rows['mk']; ?></td>
                                        <td class="text-sm text-black text-left px-1 py-1 border-b"><?= format_cash($rows['action']); ?></td>
                                        <td class="text-sm text-black text-left px-1 py-1 border-b"><?=status($rows['status']);?></td>
                                        <td class="text-sm text-black text-left px-1 py-1 border-b"><?= date('d/m/Y - H:i', $rows['time']); ?></td>
                                    </tr>
                                <?php } ?>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script type="text/javascript">
    $("#RutVatPham").on("click", function() {
        $('#RutVatPham').html('ĐANG XỬ LÝ').prop('disabled',
            true);
        $.ajax({
            url: "<?= BASE_URL("assets/ajaxs/RutRobux.php"); ?>",
            method: "POST",
            data: {
                type: 'RUTROBUX',
                action: $("#action").val(),
                id_game: $("#id_game").val(),
                mk: $("#mk").val()
            },
            success: function(response) {
                $("#thongbao").html(response);
                $('#RutVatPham').html('Rút Ngay').prop('disabled', false);
            }
        });
    });
</script>


<?php 
    require_once("../../public/client/Footer.php");
?>