$(document).ready(function () {
    var slug = $('.slug').val();
    var slug_category = $('.slug_category').val();
    getShowDetail(slug, slug_category);
    function getShowDetail(slug, slug_category) {
        var url = '/detail/'+ slug + '/show';
        request = $.ajax({
            type: 'POST',
            url: url,
            async:true,
            cache:false,
            data: {
                slug: slug,
                slug_category: slug_category
            },
            beforeSend: function (xhr) {
            },
            success: (data) => {
                if (data.status == 1){
                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(data.data);
                    $('.loading-data__buyacc').html('');
                    $('.data__menuacc').html('');
                    $('.data__menuacc').html(data.datamenu);
                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';
                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(html);
                    var htmlform = '';
                    htmlform += '<label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">Bạn phải đăng nhập mới có thể mua tài khoản tự động.</label>';
                    $('.form__data__buyacc').html('');
                    $('.form__data__buyacc').html(htmlform);
                }
            },
            error: function (data) {
            },
            complete: function (data) {
                initSwiperGallery();
            }
        });
    }
    getDichVu(slug_category)
    function getDichVu(slug_category) {
        var url = '/related';
        request = $.ajax({
            type: 'POST',
            async:true,
            cache:false,
            url: url,
            data: {
                slug_category :slug_category
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {
                if (data.status == 1){
                    $('#showslideracc').html('');
                    $('#showslideracc').html(data.dataslider);
                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';
                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(html);
                }
            },
            error: function (data) {
            },
            complete: function (data) {
                initSwiperNick();
            }
        });
    }
    getDaXem();
    function getDaXem() {
        var url = '/watched';
        request = $.ajax({
            type: 'POST',
            url: url,
            async:true,
            cache:false,            
            beforeSend: function (xhr) {
            },
            success: (data) => {
                if (data.status == 1){
                    $('#showswatched').html('');
                    $('#showswatched').html(data.datawatched);
                }else if (data.status == 0){
                    $('#showswatched').html('');
                    // var html = '';
                    // html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';
                    //
                    // $('#showdetailacc').html('');
                    // $('#showdetailacc').html(html);
                }else if (data.status == 2){
                    $('#showswatched').html('');                   
                }
            },
            error: function (data) {
            },
            complete: function (data) {
                initSwiperNick();
            }
        });
    }
})