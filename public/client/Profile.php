<?php
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    $title = 'THÔNG TIN | '.$CMSNAV->site('tenweb');
    require_once("../../public/client/Header.php");
    require_once("../../public/client/Nav.php");
    CheckLogin();
?>
 <form id="logout-form" action="/ajax/logout" method="POST" class="d-none">
        <input type="hidden" name="_token" value="8617c10730bfca3c878f49c404149dd467e68af06c62176cba2db86c48e88cce"> </form>
    <script>
        $(document).ready(function() {
            const searchInput = $('#searchInput');
            const searchSuggestions = $('#searchSuggestions');

            searchInput.on('input', function() {
                const keyword = $(this).val().trim();
                if (keyword !== '') {
                    fetchSearchSuggestions(keyword);
                } else {
                    searchSuggestions.empty();
                }
            });

            function fetchSearchSuggestions(keyword) {
                $.post('searchsuggestions', { keyword: keyword })
                    .done(function(data) {
                        searchSuggestions.html(data);
                    });
            }

            // Submit the form when a suggestion is clicked
            searchSuggestions.on('click', '.suggestion', function() {
                searchInput.val($(this).text().trim());
                searchSuggestions.empty();
                $('#formSearchHeader').submit();
            });
    </script>
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

 <?php require_once('Sidebar.php');?>
        <div class="c-ml-16 c-ml-lg-0 c-history-right c_history-right">
    <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-block">
        <h1 class="fw-700 fz-20 lh-28 c-my-0">Thông tin tài khoản</h1> </div>
    <div class="g_history-detail-content brs-12 c-p-16 c-mb-16">
        <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
            <p class="fz-13 fw-400 mb-0">ID của bạn</p>
            <div class="fw-500 fz-13">
                <?=$getUser['id'];?>            </div>
        </div>
        <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
            <p class="fz-13 fw-400 mb-0">Tên tài khoản</p>
            <div class="fw-500 fz-13">
                        <?=$getUser['username'];?>          </div>
        </div>
        <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
            <p class="fz-13 fw-400 mb-0">Số dư tài khoản</p>
            <div class="detail-primary fw-500 fz-13">
                <?=format_cash($getUser['money']);?>đ </div>
        </div>
    
    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
            <p class="fz-13 fw-400 mb-0">Số robux</p>
            <div class="detail-primary fw-500 fz-13">
                <?=format_cash($getUser['robux']);?>đ </div>
        </div>
    
    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
            <p class="fz-13 fw-400 mb-0">Ngày tham gia</p>
            <div class="detail-primary fw-500 fz-13">
                <?=$getUser['createdate'];?></div>
        </div>
    </div>
    
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
</div>
</div>
</div>
    
       
               





<?php 
    require_once("../../public/client/Footer.php");
?>
