<?php
require_once("../../config/config.php");
require_once("../../config/function.php");

$title = 'Shop dịch vụ all game giá rẻ, uy tín, tự động. | '.$CMSNAV->site('tenweb');
require_once("../../public/client/Header.php");
require_once("../../public/client/Nav.php");
?>

<div class="layout">
    <div class="content">
        <link rel="stylesheet" href="/assets/frontend/theme_5/css/jirim/news.css">


    <div class="c-container container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item"><a href="/" class="breadcrumb-link">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)" class="breadcrumb-link">Tin tức</a></li>
        </ul>

        <div class="head-mobile">
            <a href="/" class="link-back"></a>
            <h1 class="head-title text-title">Tin tức</h1>
            <a href="/viewed"><img src="/assets/frontend1/theme_5/image/DA-XEM.png" alt="DA-XEM" style="position: absolute;top: 16px;right: 60px;width:30px; height: 30px"></a>
          
        </div>

        <!-- Banner tin tức -->
        <div class="row f_box-product" id="c_slider_banner">
            <?php
            $banner_result = $CMSNAV->get_list("SELECT * FROM blogs WHERE display='SHOW' ORDER BY time DESC LIMIT 2");
            if(count($banner_result) >= 1){
                $first = $banner_result[0];
            ?>
                <div class="col-lg-6 col-md-12 top_box-product">
                    <div class="fix_ads-banner-fecond fix_ads-banner-second_top fix_ads-banner-ffist brs-12 h-100">
                        <a href="/tin-tuc/<?php echo $first['id']; ?>"><img onerror="imgError(this)" loading="lazy" src="<?php echo $first['img']; ?>" alt=""></a>
                        <div class="item-article-content">
                            <div class="item-article-name text-limit limit-1"><?php echo $first['title']; ?></div>
                            <div class="item-article-user text-limit limit-1"><?php echo substr(strip_tags($first['content']),0,200); ?>...</div>
                        </div>
                    </div>
                </div>
            <?php } 
            if(count($banner_result) >= 2){
                $second = $banner_result[1];
            ?>
                <div class="col-lg-3 col-6 d-lg-flex flex-column justify-content-between center_swiper-general_right" style="min-height: 100%">
                    <div class="fix_ads-banner-second fix_ads-banner-fist brs-12">
                        <a href="/tin-tuc/<?php echo $second['id']; ?>"><img onerror="imgError(this)" loading="lazy" src="<?php echo $second['img']; ?>" alt=""></a>
                        <div class="item-article-content-secon">
                            <div class="item-article-name text-limit limit-1"><?php echo $second['title']; ?></div>
                            <div class="item-article-user text-limit limit-1"><?php echo substr(strip_tags($second['content']),0,100); ?>...</div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-lg-3 col-6 d-lg-flex flex-column justify-content-between end_swiper-general_right" style="min-height: 100%"></div>
        </div>

        <!-- Danh sách tin tức -->
        <div class="row">
            <div class="col-12 col-lg-8" id="list-article">
                <div class="card--mobile__title c-pt-16 d-flex justify-content-between j-flex-sm-wrap">
                    <h4>Tin mới cập nhật</h4>
                    <form action="" class="form-search c-pt-sm-16" id="formSearchHeaderr">
                        <input type="search" placeholder="Tìm kiếm" class="has-submit" name="querry">
                        <button type="submit"></button>
                    </form>
                </div>

                <div class="row flex-column-reverse" id="card--body__news">
                    <div class="px-0 mt-lg-0" style="max-width: 100%">
                        <div class="--custom p-3" id="new-article-update">
                            <div class="tab-content-title mt-4">
                                <div class="card--body">
                                    <?php
                                    $news_list = $CMSNAV->get_list("SELECT * FROM blogs WHERE display='SHOW' ORDER BY time DESC");
                                    foreach($news_list as $row){
                                    ?>
                                        <div class="item-article c-mt-16">
                                            <a href="/tin-tuc/<?php echo $row['id']; ?>">
                                                <div class="card">
                                                    <div class="card-body c-p-16 c-p-lg-8">
                                                        <div class="article-thumb c-mb-lg-0">
                                                            <img onerror="imgError(this)" loading="lazy"
                                                                 src="<?php echo $row['img']; ?>"
                                                                 class="article-thumb-image" alt="article-thumbnail">
                                                        </div>
                                                        <div class="article-body" style="flex: 1">
                                                            <div class="article-title text-limit limit-2 limit-lg-3 fz-lg-13 lh-lg-20 c-ml-12">
                                                                <?php echo $row['title']; ?>
                                                            </div>
                                                            <div class="article--description d-none d-lg-block c-pt-16 c-ml-12" style="height: 96px; overflow: hidden">
                                                                <?php echo substr(strip_tags($row['content']),0,300); ?>...
                                                            </div>
                                                            <div class="article-info c-mt-16 c-mt-lg-6 c-ml-12">
                                                                <div class="datetime"><?php echo $row['thoigian']; ?></div>
                                                                <div class="author c-ml-4 bread-word text-limit limit-1"><?php echo $row['author'] ?? 'Admin'; ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block"></div>
        </div>
    </div>
</div>

</div>

<?php
require_once("../../public/client/Footer.php");
?>
