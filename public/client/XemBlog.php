<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'XEM BÀI VIẾT | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
?>
<?php
if(isset($_GET['id']))
{
    $row = $CMSNAV->get_row(" SELECT * FROM `blogs` WHERE `id` = '".check_string($_GET['id'])."'  ");
    if(!$row)
    {
        admin_msg_error("Bài viết không tồn tại", BASE_URL(''), 500);
    }
    $CMSNAV->cong("blogs", "view", 1, " `id` = '".$row['id']."' ");
}
else
{
    admin_msg_error("Liên kết không tồn tại", BASE_URL(''), 0);
}
?>
<form id="logout-form" action="https://shopsheep.net/ajax/logout" method="POST" class="d-none">
    <input type="hidden" name="_token" value="opRTRuXjTgzzZNtaMa8j8MUM6HzOZY5elyz0KoQa"></form>
    <div class="layout">
        <div class="content" style="">
                
    <div class="container container-fix">
        
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/tin-tuc" class="breadcrumb-link">Tin tức</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="breadcrumb-link">Chi tiết tin tức</a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/tin-tuc" class="link-back"></a>

            <p class="head-title text-title">Chi tiết tin tức</p>
            <a href="/viewed">
        <img src="/assets/frontend/theme_5/image/DA-XEM.png" alt="DA-XEM"
            style="position: absolute;top: 16px;right: 60px;width:30px; height: 30px">
    </a>
    <a href="/cart">
        <img src="/assets/frontend/theme_5/image/nam/cart.svg" alt="cart"
            style="position: absolute;top: 16px;right: 16px;width:30px; height: 30px">
        <p id="num_cart_mob" class="">0</p>
    </a>
        </div>
        
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class=" --custom p-3 mb-3 content-detail">
                    <article id="article--detail">
                        <h1 class="article--title">
                           <?=$row['title'];?>
                        </h1>
                        <div class="article--info">
                            <img src="/assets/frontend1/theme_5/image/duong/time.svg"
                                class="c-mr-6"><span><?=$row['time'];?></span>
                            <img src="/assets/frontend1/theme_5/image/duong/group.svg"
                                class="c-mr-6 c-ml-6"><span>admin</span>
                        </div>
                                                    <div class="py-4">
                                
                            </div>
                                                <div class="article--content pb-3">
                            <div class="article--content__text pb-2">
                               

<p><?=$row['content'];?></p>


                                    <div class="sheet-footer">
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                    </article>
                </div>
            </div>
	<?php foreach($CMSNAV->get_list("SELECT * FROM `danh_muc_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = 'dichvu'") as $row) { ?>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="sub-article-block">
        <div class="sub-article-block-header d-flex justify-content-between align-items-center c-px-16 c-py-12">
            <h2 class="fw-700 fz-24 lh-32">
                Dịch vụ liên quan
            </h2>
            <a href="/" class="link arr-right">Xem tất cả</a>
        </div>
       
          <?php foreach($CMSNAV->get_list("SELECT * FROM `category_caythue` WHERE `display` = 'SHOW' AND `danhmuc` = '".$row['id']."'") as $category) { ?>
                            <div class="sub-article c-px-16">
            <div class="row">
                <div class="col-6 sub-article--thumbnail-container">
                    <div class="sub-article--thumbnail">
                        <a href="<?=BASE_URL('dich-vu/'.$category['id']);?>">
                            <img onerror="imgError(this)" src="<?=$category['img'];?>"
                                alt="Bán Item Death Ball" class="sub-article--thumbnail__image" loading="lazy">
                        </a>
                    </div>
                </div>
                <div class="col-6 sub-article--info">
                    <a href="<?=BASE_URL('dich-vu/'.$category['id']);?>" class="sub-article--title__link">
                       <?=$category['title'];?>
                    </a>
                </div>
            </div>
        </div>
                        <?php }?>
                         
                            </div>
                            <?php }?>
                <div class="sub-article-block">
        <div class="sub-article-block-header d-flex justify-content-between align-items-center c-px-16 c-py-12">
            <h2 class="fw-700 fz-24 lh-32">
                Tài khoản liên quan
            </h2>
            <a href="/" class="link arr-right">Xem tất cả</a>
        </div>
                                
                                        </div>
            </div>
        </div>
        
        <div class="c-pb-24">
            <section class="related-posts">
        <div class="section-header c-mb-16">
            <div class="section-title title-color">Bài viết cùng chủ đề</div>
        </div>
        <div class="section-content">
            <div class="article-list mx-n2">
                 <?php foreach($CMSNAV->get_list("SELECT * FROM `blogs` WHERE `display` = 'SHOW' ") as $row) { ?>
                                                                                                    <div class="article-item">
                                                    <a href="<?=BASE_URL('Blog/'.$row['id']);?>" class="scale-thumb">
                                <div class="card">
                                    <div class="card-body c-p-16 c-p-lg-8">
                                        <div class="article-thumb c-mb-16 c-mb-lg-0">
                                                                                            <img onerror="imgError(this)"
                                                    src="<?=$row['img'];?>"
                                                    class="article-thumb-image" loading="lazy" width="175"
                                                    height="128" alt="<?=$row['title'];?>">
                                                                                    </div>
                                        <div class="article-body">
                                            <div class="article-title text-limit limit-2 limit-lg-3 fz-lg-13 lh-lg-20">
                                              <?=$row['title'];?>
                                            </div>
                                            <div class="article-info c-mt-16 c-mt-lg-4">
                                                <div class="datetime"><?=$row['time'];?>
                                                </div>
                                                <div class="author c-ml-4 bread-word text-limit limit-1">
                                                    admin</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                                            </div>
                                            <?php }?>
                                                        
                            </div>
        </div>
    </section>
        </div>
    </div>




            


<?php 
    require_once("../../public/client/Footer.php");
?>
