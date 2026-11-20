

   $(document).ready(function () {
    let content_history = $('.loadjs_flashsale_nick');
    let wrap_history = content_history.length ? content_history.parent() : '';
    function updateCountdown(){
        var endTime  = $('.bottom-banner-countdown').data('ended_at');
        var startTime  = $('.bottom-banner-countdown').data('started_at');
        var currentTime = new Date().getTime();

        if(endTime > 0){
            //thời gian đang chạy
            if (currentTime >= endTime) {
                $('.result-countdown').children().first().remove();
                var length_result_countdown = $('.result-countdown').children();
                if (length_result_countdown.length >= 1) {
                    endTime  = $('.banner-config-active').data('ended_at');
                    startTime  = $('.banner-config-active').data('started_at');
                    $('.result-countdown').children().first().addClass('banner-config-active bottom-banner-countdown');
                    var noSelectElement = $('.banner-config-active .noselect_text');
                    if(currentTime >= endTime){
                        $('.banner-config-active').attr('data-cacheload','0')
                        if (!noSelectElement.hasClass('countdown')) {
                            noSelectElement.addClass('countdown justify-content-center');
                            let html = `<img src="/assets/frontend/theme_5/image/banner_sale/fire-flash-sale.png" alt="" class="c-mr-4">
                        <p class="c-mb-0 text-nowrap take-place fw-500 lh-20">Đang diễn ra</p>`;
                            noSelectElement.html(html);
                        }
                        $('.secondary_flashsale').html('Mua ngay')
                    }

                    if(length_result_countdown.length > 5){
                        $(".click-banner-active").eq(6).removeClass('d-none');
                    }
                    updateCountdown();
                    loadNickFlashSale()

                }else {
                    $('.banner-flashsale').addClass('d-none');
                }

            } else
                // Thời gian sắp bắt đầu
            {
                var noSelectElement = $('.banner-config-active .noselect_text');
                if(currentTime >= startTime){
                    $('.banner-config-active').attr('data-cacheload','0')
                    if (!noSelectElement.hasClass('countdown')) {
                        noSelectElement.addClass('countdown justify-content-center');
                        let html = `<img src="/assets/frontend/theme_5/image/banner_sale/fire-flash-sale.png" alt="" class="c-mr-4">
                        <p class="c-mb-0 text-nowrap take-place fw-500 lh-20">Đang diễn ra</p>`;
                        noSelectElement.html(html);
                    }
                    $('.secondary_flashsale').html('Mua ngay')
                    var timeRemaining = endTime - currentTime;
                    let html_textend = '';
                    html_textend += 'Kết thúc trong';
                    $('.text-end').html(html_textend)
                }
                else{
                    var timeRemaining = startTime - currentTime;
                    let html_textend = '';
                        html_textend += 'Bắt đầu sau';
                        $('.text-end').html(html_textend)
                    let html = `<p class="c-mb-0 text-nowrap take-place fw-500 lh-20">Sắp diễn ra</p>`;
                    noSelectElement.html(html);
                }
                var daysRemaining = Math.floor(timeRemaining / (3600000*24)); // Một ngayf có 3600000 mili giây
                var hoursRemaining = Math.floor(timeRemaining %(3600000 * 24) / 3600000); // Một giờ có 3600000 mili giây
                var minutesRemaining = Math.floor((timeRemaining % 3600000) / 60000); // Một phút có 60000 mili giây
                var secondsRemaining = Math.floor((timeRemaining % 60000) / 1000); // Một giây có 1000 mili giây

                if(daysRemaining > 0){
                    let html = '';
                        html += '<div class="box-timer-coundown">'
                        html += '<div class="day_config fw-700 fz-15 lh-10 fw-lg-500 fz-lg-12 lh-lg-10">';
                        html += daysRemaining < 10 ? "0" + daysRemaining : daysRemaining;
                        html += '</div>'
                        html += `<div class="text-banner-sale fw-700 fz-8 lh-5 fw-lg-500 fz-lg-7 " >
                                     DAYS
                                </div>`;
                        html += '</div>';
                    $('.check_countdownt_days').html(html);
                }else {
                    $('.check_countdownt_days').html('');
                }
                // $(".day_config").html(daysRemaining < 10 ? "0" + daysRemaining : daysRemaining);
                $(".hour_config").html(hoursRemaining < 10 ? "0" + hoursRemaining : hoursRemaining);
                $(".minute_config").html( minutesRemaining < 10 ? "0" + minutesRemaining : minutesRemaining);
                $(".second_config").html( secondsRemaining < 10 ? "0" + secondsRemaining : secondsRemaining);
            }
        }else{
            $(".hour_config").html('00');
            $(".minute_config").html('00');
            $(".second_config").html('00');
        }
    }
    updateCountdown();
    var intervalId = setInterval(updateCountdown, 1000);
    $('.click-banner-active').click(function(){
        $('.click-banner-active').removeClass('bottom-banner-countdown')
        $(this).addClass('bottom-banner-countdown')

        updateCountdown();

        loadNickFlashSale()

    })



    function loadNickFlashSale(){
        let id = $('.bottom-banner-countdown').data('id')
        let is_cache = $('.bottom-banner-countdown').data('cacheload')
        // let intervalId;

        // intervalId = setInterval(function() {
        $.ajax({
            type: 'GET',
            async: true,
            cache: false,
            url: '/get-product-flash-sale/' + id,
            data: {
                is_cache: is_cache,
            },
            beforeSend: function (xhr) {
                /*Thêm loading khi tải*/
                if (!wrap_history.hasClass('is-load')) {
                    wrap_history.addClass('is-load');
                    let loading = '<div class="loading-wrap"><span class="modal-loader-spin"></span></div>';
                    wrap_history.prepend(loading);
                }
            },
            success: (res) => {
                if (res.status == 1) {
                    if (swiper_config_related_service && swiper_config_related_service.update) {
                        swiper_config_related_service.update();
                    }
                    $('.loadjs_flashsale_nick').html(res.htmlloadnick)
                    // clearInterval(intervalId);
                } else if (res.status == 0) {
                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + res.message + '</span></div></div>';

                    $('.loadjs_flashsale_nick').html('')
                    $('.loadjs_flashsale_nick').html(html)
                }
                $('.bottom-banner-countdown').addClass('load_nick_countdown')
            },
            complete: function (res) {
                wrap_history.removeClass('is-load')
                wrap_history.find('.loading-wrap').remove();
            }
        });
        // },180000);
    }
    loadNickFlashSale()

});