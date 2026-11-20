$(document).ready(function () {
    $(document).on('click', '.buyacc', function (e) {
        var htmlloading = '<div class="loading"></div>';
        $('.loading-data__buyacc').html(htmlloading);
        width > 992 ? $('.loadModal__acount').modal('show') : '';
        $('.loading-data__buyacc').html('');
    });
    $(document).on('submit', '.formDonhangAccount', function (e) {
        e.preventDefault();
        var htmlloading = '<div class="loading"></div>';
        $('.loading-data__muangay').html(htmlloading);
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        btnSubmit.prop('disabled', true);
        $.ajax({
            type: "POST",
            url: url,
            data: formSubmit.serialize(),
            beforeSend: function (xhr) {
            },
            success: function (response) {
                if (response.status == 1) {
                    $('.loadModal__acount').modal('hide');
                    $('#successPurchase').modal('show');
                    $('.MessPurchase').html(response.message);
                } else if (response.status == 2) {
                    $('.loadModal__acount').modal('hide');
                    $('#errorPurchase').modal('show');
                    $('.MessPurchase').html(response.message);
                } else {
                    $('.loadModal__acount').modal('hide');
                    $('#errorPurchase').modal('show');
                    $('.MessPurchase').html(response.message);
                }
                $('.loading-data__muangay').html('');
            },
            error: function (xhr, status, error) {
                if (xhr.status === 0) {
                    $('.loadModal__acount').modal('hide');
                    $('#errorPurchase').modal('show');
                    $('.MessPurchase').text('Kết nối mạng bị gián đoạn. Xin vui lòng kiểm tra kết nối và thử lại');
                } else if (xhr.status === 500) {
                    $('.loadModal__acount').modal('hide');
                    $('#errorPurchase').modal('show');
                    $('.MessPurchase').text('Lỗi máy chủ. Xin vui lòng thử lại sau');
                } else {
                    $('.loadModal__acount').modal('hide');
                    $('#errorPurchase').modal('show');
                    $('.MessPurchase').text('Lỗi không xác định. Xin vui lòng thử lại');
                }
            },
            complete: function (data) {
                btnSubmit.prop('disabled', false);
            }
        });
    });
    $(document).on('click', '.tinhnang', function (e) {
        $('#notInbox').modal('show');
    });
});