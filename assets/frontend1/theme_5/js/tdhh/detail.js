$(document).ready(function() {
	$('#domainSelect').html('<option value="">Đang tải dữ liệu...</option>');  
  	let originalConfirmText = $('.confirm').html();
    let price = 0;
  	disableButton();
    getDomain();
    $('#domainSelect').on('change', function() {
        setPrice();
    });
    function enableButton() {
        let confirmButton = $('.confirm');
        confirmButton.removeClass('disabled');
        confirmButton.html(originalConfirmText);
    }
    function disableButton() {
        let confirmButton = $('.confirm');
        confirmButton.addClass('disabled');
        confirmButton.html('Vui lòng chờ...');
    }
    function getDomain() {
        let url = '/ajax/domain';
        $.ajax({
            type: "POST",
            async: true,
            cache: false,
            url: url,
            success: function(data) {
                if (data.status == 1) {
                    let html = '';
                    if (data.data.length > 0) {
                        $.each(data.data, function(key, value) {
                            html += '<option value="' + value.key + '">' + value.title + '</option>';
                        });
                    } else {
                        html += '<option value="">Vui lòng chọn đuôi tên miền</option>';
                    }
                    $('#domainSelect').html(html);
                    $('.select-form').niceSelect('update');
                  	setPrice();
                }
            },
            error: function(data) {
                swal({
                    title: "Lỗi !",
                    text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
                    icon: "error",
                    buttons: {
                        cancel: "Đóng",
                    },
                });
            }
        });
    }
 
    function numberFormat(number) {
        let new_numb = number.replace(/\./g, "").toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        return new_numb.split('').reverse().join('').replace(/^[\.]/, '');
    }

    function setPrice() {
        let domainSelect = $('#domainSelect').val();
        $.ajax({
            type: "POST",
            async: true,
            cache: false,
            url: '/ajax/get-price-domain',
            data: {
                domainSelect: domainSelect
            },
            success: function(data) {
                if (data.status === 1) {
                    price = data.price;
                    $('.total__price').text(numberFormat(data.price) + ' VND');
                } else {
                    price = 0;
                    $('.total__price').text('0 VND');
                }
            },
            error: function() {
                price = 0;
                $('.total__price').text('0 VND');
            },
            complete: function() {
                enableButton();
            }
        });
    }

    function checkFormValid() {
        let form = $('#form-service-detail');
        let inputs = form.find('input[type="text"]');
        let $ok = 1;
        Array.from(inputs).forEach(function(elm) {          
            if (!$(elm).val().replace(/\s+/g, '')) {
                $(elm).toggleClass('invalid shake-animate', true);
                $(elm).next().text('Trường này không được để trống !');
                $ok = 0;
            } else {
                $(elm).next().empty();
                $(elm).toggleClass('invalid shake-animate', false);
            }
        });  
        return $ok;
    }
    
    $('.confirm').on('click', function(e) {
        e.preventDefault();
        if (checkFormValid()) {
            let form = $('#form-service-detail');
            let $data = form.serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.name === 'selected' ? item.value.replace('.', '') : item.value;
                return obj;
            }, {});
           	let formData = new FormData(form[0]);
            formData.append('price', price);
            let confirmButton = $(this);
            confirmButton.empty().html('Đang xử lý...');
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {
                    if (res.status * 1 === 1) {
                        $('#modal-success-message').text(res.message);
                        $('#orderSuccses').modal('show');
                    } else {
                        if (res.status === "LOGIN") {
                            openLoginModal();
                        } else {
                            $('#modal-failed-message').text(res.message);
                            $('#orderFailed').modal('show');
                        }
                    }
                },
                complete: function() {
                    confirmButton.empty().html(originalConfirmText); 
                }
            });
        }
    });
});
