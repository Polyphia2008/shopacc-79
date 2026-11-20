<?php
        require_once("../../config/config.php");
        require_once("../../config/function.php");
        $title = 'THANH TOÁN | '.$CMSNAV->site('tenweb');
        require_once("../../public/client/Header.php");
        require_once("../../public/client/Nav.php");
        CheckLogin();
?>
<?php require_once('Sidebar.php');?>


        <div class="tw-col-span-12 md:tw-col-span-8">
		   <div class="tw-mt-4 tw-bg-white tw-rounded tw-w-full" style="background: rgba(0,0,0,0.8) !important;">
			  <div class="tw-border-b tw-border-gray-200 tw-pb-2 tw-text-gray-800 tw-p-3 md:tw-py-3 md:tw-px-5">
				 <h2 class="tw-text-lg tw-font-semibold">Nhận Giftcode</h2>
			  </div>
			  
			      <div id="thongbao">
				<div class="container-fluid">
				<div class="col-md-6 offset-3 pt-4">
				    
																				<form class="tw-max-w-sm js-member-topup">
										<div class="tw-mb-4">
							
						<div class="tw-mb-4">
							<label class="tw-text-gray-700 tw-text-sm"> Nhập Giftcode</label> 
							<input type="text" id="code" placeholder="Nhập giftcode tại đây" class="tw-text-gray-800 tw-border tw-border-gray-300 tw-h-10 tw-px-3 tw-w-full tw-rounded focus:tw-outline-none">
						</div>
						
						<button type="submit" id="nhancode" class="tw-text-center tw-h-10 tw-bg-red-500 tw-w-32 hover:tw-bg-red-600 tw-text-white tw-font-semibold tw-rounded">Nhận code</button>
					</form>
				</div>
			</div>
			  </div>
		   </div>
		</div>
		
    </div>
</div>

<script type="text/javascript">
$("#nhancode").on("click", function() {
    $('#nhancode').html('<i class="fa fa-spinner fa-spin"></i> ĐANG XỬ LÝ').prop('disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL("assets/ajaxs/Giftcode.php");?>",
        method: "POST",
        data: {
            type: 'nhangiftcode',
            code: $("#code").val()
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#nhancode').html(
                    'Nhận code')
                .prop('disabled', false);
        }
    });
});
</script>

<?php 
    require_once("../../public/client/Footer.php");
?>