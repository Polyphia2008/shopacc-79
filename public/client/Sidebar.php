<div class="layout">
<div class="content" style>
    

<style>
        .btn-submit {
            background-color: #2579f2;
            border-color: transparent;
            border-width: 1px;
            color: #fff;
            border-radius: 0.375rem;
            font-weight: 500;
            height: 2.5rem;
            padding-left: 1rem;
            padding-right: 1rem;
            margin-left: 16px;
            cursor: pointer;
        }
    </style>
<div class="background-history">
<div class="container c-container-side c-mb-4 c-mb-lg-0">
<ul class="breadcrumb-list">
<li class="breadcrumb-item">
<a href="/" class="breadcrumb-link">Trang chủ</a>
</li>
<li class="breadcrumb-item">
<a href="/" class="breadcrumb-link">Thông tin tài khoản</a>
</li>
</ul>
<div class="head-mobile">
<a href="/thong-tin" class="link-back"></a>
<h1 class="head-title text-title">Thông tin tài khoản</h1>
<a href="/voucher">
<img src="/assets/frontend1/theme_5/image/nam/sale.svg" alt="DA-XEM" style="position: absolute;top: 16px;right: 60px;width:25px; height: 25px">
</a>
<a href="/">
<img src="https://cdn3.upanh.info/upload/server-sw3/images/home.png" alt="cart" style="position: absolute;top: 16px;right: 16px;width:25px; height: 25px">
<p id="num_cart_mob" class></p>
</a>
</div>
<div class="row">
<div class="c-history-left media-web">
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


<div class="sidebar-section brs-12 c-mb-16">
<div class="sidebar-item active">
<a href="/user/profile" class="d-block align-items-center d-flex">
<div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/thongtintaikhoan.svg)"></div>
<p class="sidebar-item-text fw-400 fz-12 mb-0">Thông tin tài khoản</p>
<img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt="sidebar_arrow_right">
</a>
    </div>
<div class="sidebar-item-partition d-flex c-my-8"></div>
                                                                                                                            <div class="sidebar-item ">
<a href="/changepassword" class="d-block align-items-center d-flex">
<div class="icon-sidebar" style="--path:url(https://cdn3.upanh.info/upload/server-sw3/images/Icon/doi%20mk.png)"></div>
<p class="sidebar-item-text fw-400 fz-12 mb-0">Đổi mật khẩu</p>
<img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt="sidebar_arrow_right">
</a>
</div>





</div>

<div class="sidebar-section brs-12 c-mb-16 ">
<p class="sidebar-section-title c-mb-16 fz-15 fw-500">Quản lý giao dịch</p>
<div class="d-flex justify-content-between transaction-manager">
<div class="sidebar-item sidebar-item-col  ">
<a href="/user/recharge" class=" d-flex flex-column align-items-center">
<div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/naptien.svg)"></div>
<div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">Nạp tiền</div>
</a>
</div>
<div class="sidebar-item sidebar-item-col ">
<a href="/user/rutvatpham" class=" d-flex flex-column align-items-center">
<div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/rutvatpham.svg)"></div>
<div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">Rút vật phẩm</div>
</a>
</div>
</div>
</div>

<div class="sidebar-section brs-12 c-mb-16 ">
<p class="sidebar-section-title fz-15 fw-500 c-mb-16">LỊCH SỬ GIAO DỊCH</p>

<div class="sidebar-item ">
<a href="/user/history/acc" class="d-block align-items-center d-flex">
<div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/taikhoandamua.svg)"></div>
<p class="sidebar-item-text fw-400 fz-12 mb-0">Tài khoản đã mua</p>
<img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt="sidebar_arrow_right">
</a>
</div>

<div class="sidebar-item-partition d-flex c-my-8"></div>
<div class="sidebar-item  ">
<a href="/user/history/caythue" class="d-block align-items-center d-flex">
<div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/dichvudamua.svg)"></div>
<p class="sidebar-item-text fw-400 fz-12 mb-0">Dịch vụ cày thuê</p>
<img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt="sidebar_arrow_right">
</a>
</div>
<div class="sidebar-item-partition d-flex c-my-8"></div>
<div class="sidebar-item ">
<a href="/user/history/vatpham" class="d-block align-items-center d-flex">
<div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/dichvudamua.svg)"></div>
<p class="sidebar-item-text fw-400 fz-12 mb-0">Dịch vụ vật phẩm</p>
<img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt="sidebar_arrow_right">
</a>
</div>
<div class="sidebar-item-partition d-flex c-my-8"></div>
<div class="sidebar-item ">
<a href="/lichsunapthe" class="d-block align-items-center d-flex">
<div class="icon-sidebar" style="--path:url(/assets/frontend1/theme_5/image/svg/lichsunapthe.svg)"></div>
<p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử nạp thẻ</p>
<img src="/assets/frontend1/theme_5/image/svg/sidebar_arrow_right.svg" alt="sidebar_arrow_right">
</a>
</div>


</div>
<div class="sidebar-section brs-12 c-mb-16">
<div class="sidebar-item log-out-button">
        <a href="/Auth/Logout" class="d-block align-items-center d-flex">
            <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                <img src="/assets/frontend1/theme_5/image/svg/log-out.svg" alt="" style="width: 24px;height: 24px">
            </div>
            <p class="sidebar-item-text fw-400 fz-12 mb-0">Đăng xuất</p>
        </a></div>
</div>
</div>
</div>
<script>
    const currentUrl = window.location.pathname;
    const sidebarItems = document.querySelectorAll('.sidebar-item');

    sidebarItems.forEach(item => {
        const link = item.querySelector('a');

        if (link && link.getAttribute('href') === currentUrl) {
            sidebarItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        }
    });
</script>








                   
