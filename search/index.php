<?php
define("IN_SITE", true);
require_once("../config/config.php");
require_once("../config/function.php");
require_once("../public/client/Header.php");
require_once("../public/client/Nav.php");

$query = isset($_GET['query']) ? addslashes($_GET['query']) : '';
?>

<div class="container py-4">

    <h5 class="mb-4">Tìm kiếm sản phẩm: <b><?= $query ?></b></h5>

    <?php if ($query == "") { ?>
        <p>Vui lòng nhập từ khóa tìm kiếm.</p>
    <?php } else { ?>

        <?php
        // Lấy dữ liệu từng nhóm
        $groups        = $CMSNAV->get_list("SELECT * FROM groups WHERE title LIKE '%$query%'");
        $cate_caythue  = $CMSNAV->get_list("SELECT * FROM category_caythue WHERE title LIKE '%$query%'");
        $cate_gamepass = $CMSNAV->get_list("SELECT * FROM category_gamepass WHERE title LIKE '%$query%'");
        $cate_robux    = $CMSNAV->get_list("SELECT * FROM category_robux WHERE title LIKE '%$query%'");

        // Vòng quay
        $vongquay = $CMSNAV->get_list("SELECT * FROM mini_game WHERE name LIKE '%$query%'");

        // Lật thẻ
        $latthe   = $CMSNAV->get_list("SELECT * FROM setting_latthe WHERE title LIKE '%$query%'");

       function renderBlock($title, $icon, $list, $linkPrefix, $type = "default", $linkAll = "") {
    if (!$list || count($list) == 0) return;

    $linkAll = $linkAll ?: $linkPrefix; // Nếu không truyền thì dùng link mặc định

    echo '
    <section class="acc-game-v2 c-pt-lg-6 c-mb-24 w-100">
        <div class="section-header c-mb-24 c-mb-lg-20 d-flex justify-content-between align-items-center">
            <h2 class="section-title fz-lg-20 lh-lg-24 d-flex align-items-center">
                <i class="icon-title c-mr-8" style="--path:url(' . $icon . ')"></i>
                '.$title.'
            </h2>
            <a href="'.$linkAll.'" class="link arr-right">Xem tất cả</a>
        </div>

        <div class="list-category row">
    ';

    foreach ($list as $item) {
        $img = $item['img'] ?? "";
        $text = $item['title'] ?? "";

        if ($type == "vongquay") {
            $img  = $item['thumb'];
            $text = $item['name'];
        }

        if ($type == "latthe") {
            $img  = $item['imglatthe_thumb'];
            $text = $item['title'];
        }

        echo '
        <div class="item-category c-px-8 c-mb-12 col-lg-3 col-md-4 col-6">
            <div class="card">
                <div class="card-body c-p-16 scale-thumb">
                    <a href="'.$linkPrefix.'/'.$item['id'].'">
                        <div class="card-thumb c-mb-8">
                            <img src="'.$img.'" class="card-thumb-image" loading="lazy">
                        </div>
                        <div class="card-attr">
                            <div class="text-title text-limit limit-1 fw-700">'.$text.'</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>';
    }

    echo '
        </div>
    </section>';
}


        renderBlock("Tài Khoản", "/assets/frontend1/theme_5/image/acc-game.png", $groups, "/Accounts", "default", "/mua-acc");

renderBlock("Dịch Vụ", "/assets/frontend1/theme_5/image/acc-game.png", $cate_caythue, "/dich-vu", "default", "/dich-vu");

renderBlock("Vật Phẩm", "/assets/frontend1/theme_5/image/acc-game.png", $cate_gamepass, "/vat-pham", "default", "/vat-pham");

renderBlock("Robux", "/assets/frontend1/theme_5/image/acc-game.png", $cate_robux, "/Robux", "default", "/Ro-bux");

renderBlock("Lật Thẻ", "/assets/frontend1/theme_5/image/acc-game.png", $latthe, "/LatThe", "latthe", "/mini-game");

renderBlock("Vòng Quay", "/assets/frontend1/theme_5/image/acc-game.png", $vongquay, "/VongQuay", "vongquay", "/mini-game");

        // Thông báo không có kết quả
        if (
            count($groups) == 0 &&
            count($cate_caythue) == 0 &&
            count($cate_gamepass) == 0 &&
            count($cate_robux) == 0 &&
            count($vongquay) == 0 &&
            count($latthe) == 0
        ) {
            echo '<p style="color:red;font-size:16px;">
           Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật thường xuyên bạn vui lòng theo dõi web trong thời gian tới!.
            </p>';
        }
        ?>

    <?php } ?>
</div>

<?php require_once("../public/client/Footer.php"); ?>
