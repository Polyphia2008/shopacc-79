<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = 'THÔNG TIN | '.$CMSNAV->site('tenweb');
require_once("../../public/client/Header.php");
require_once("../../public/client/Nav.php");
CheckLogin();
?>

 <div class="layout">
        <div class="content" style="">
                        <div class="container c-container-side background-history">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/thong-tin" class="breadcrumb-link">Thông tin tài khoản</a>
                </li>
            </ul>
            <div class="row">
                <div class="g-history-left">
                    <div class="sidebar">
    <div class="sidebar-section d-flex brs-12 c-mb-16 sidebar-user-profile">
         <div class="sidebar-section-avt brs-100 c-mr-12">
            <img class="brs-100" src="https://ui-avatars.com/api/?background=random&amp;name=<?=$getUser['username'];?>" alt="">
        </div>
        <div class="sidebar-section-info">
            <div class="sidebar-section-title c-mb-4 fz-15 fw-500"> <?=$getUser['username'];?>  </div>
            <div class="sidebar-section-info-text c-mb-4 fz-13 fw-500 sidebar-user-balance">Số dư: <span><?=format_cash($getUser['money']);?>đ</span></div>
            <div class="sidebar-section-info-text c-mb-4 fz-13 fw-500 sidebar-user-balance">Số dư Robux:<span><?=format_cash($getUser['robux']);?></span></div>
       
            <a class="sidebar-section-info-text mb-0 fz-13 fw-500 sidebar-user-id">ID: <span><?=$getUser['id'];?></span></a>
        </div></div>
    </div>
            <!-- Nhóm vào với các item vào với nhau theo parent -->
                                            <!-- Tìm parent trước -->
                                                                                <div class="sidebar-section brs-12 c-mb-16">
                                                                                                                                            <div class="sidebar-item ">
                                                                                                                                                <?php if(isset($_SESSION['username']) && $getUser['level'] == 'admin') { ?>
                                    <a href="/cpanel/home"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Trang quản trị</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    </div>
                                                                    <?php }?>
                                    <div class="sidebar-section brs-12 c-mb-16">
                                                                                                                                            <div class="sidebar-item ">
                                    <a href="/user/profile"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Thông tin tài khoản</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/changepassword"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/doi%20mk.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Đổi mật khẩu</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                                                        </div>
                                         
                                            <!-- Tìm parent trước -->
                                    <div class="sidebar-section brs-12 c-mb-16">
                        <p class="c-mb-16 fz-15 fw-500">Quản lý giao dịch</p>
                        <div class="d-flex justify-content-between transaction-manager">
                                                                                                                                    <div class="sidebar-item sidebar-item-col ">
                                        <a href="/nap-the"
                                            class=" d-flex flex-column align-items-center">
                                            <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/nap%20tien.png)">
                                            </div>
                                            <div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">
                                                Nạp tiền</div>
                                        </a>
                                    </div>
                                                                                                        <div class="sidebar-item sidebar-item-col ">
                                        <a href="/withdrawitem-13"
                                            class=" d-flex flex-column align-items-center">
                                            <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/rut%20vat%20pham.png)">
                                            </div>
                                            <div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">
                                                Rút vật phẩm</div>
                                        </a>
                                    </div>
                                                                                    </div>
                    </div>
                                            <!-- Tìm parent trước -->
                                    <div class="sidebar-section brs-12 c-mb-16">
                                                    <p class="fz-15 fw-500 c-mb-16">LỊCH SỬ GIAO DỊCH</p>
                                                                                                                                            <div class="sidebar-item ">
                                    <a href="/lich-su-giao-dich"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/bien%20dong%20so%20du.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Biến động số dư</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/lich-su-mua-account"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/tk%20hien%20co.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Tài khoản đã mua</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/minigame-log"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/lich%20su%20choi%20minigame.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử chơi minigame</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/deposit-order-list"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/lich%20su%20dat%20coc.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử đặt cọc</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/order-report"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/tk%20hien%20co.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Tài khoản đã mua KT</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/minigame-logacc"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/lich%20su%20trung%20acc%20minigame.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử minigame trúng nick</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/combo-report"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url()">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử mua Combo</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/dich-vu-da-mua"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/dich%20vu%20da%20mua.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Dịch vụ đã mua</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/lich-su-nap-the"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/lich%20su%20nap%20the.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử nạp thẻ</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/order-report"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/tk%20hien%20co.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử mua nick kho tổng</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
                                    <a href="/lich-su-atm-tu-dong"
                                        class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/lich%20su%20ap%20atm%20tu%20dong.png)">
                                        </div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử nạp ATM tự động</p>
                                        <img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg"
                                            alt="sidebar_arrow_right">
                                    </a>
                                </div>
                                                                                                        </div>
                                            <div class="sidebar-section brs-12 c-mb-16">
        <div class="sidebar-item log-out-button">
        </div>
    </div>
</div>
                </div>
            </div>
        </div>

<?php 
require_once("../../public/client/Footer.php");
?>
