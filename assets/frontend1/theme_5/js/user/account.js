$('.formLogin').submit(function(e) {
        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        let url2 = new URL(window.location.href);
        $('.modal-loader-container').css('display', 'flex')
        var return_url = url2.searchParams.get('return_url');
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function(xhr) {

            },
            success: function(data) {

                if (data.status == 1) {
                    if (return_url == null || return_url == '' || return_url == undefined) {
                        if (data.return_url == null || data.return_url == '' || data.return_url == undefined) {
                            window.location.reload();

                        } else {
                            window.location.href = data.return_url;
                        }
                    } else {
                        window.location.href = return_url;

                    }

                } else {
                    $('.LoginError').html(data.message)

                }

            },
            error: function(data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Đăng nhập');
            },
            complete: function(data) {
                $('#form-login').trigger("reset");
                $('.modal-loader-container').css('display', 'none')
            }
        });
    });
    $('.formRegister').submit(function(e) {
        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        let url2 = new URL(window.location.href);
        $('.modal-loader-container').css('display', 'flex')
        var return_url = url2.searchParams.get('return_url');
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function(xhr) {

            },
            success: function(data) {

                if (data.status == 1) {
                    if (return_url == null || return_url == '' || return_url == undefined) {
                        if (data.return_url == null || data.return_url == '' || data.return_url == undefined) {
                            window.location.reload();

                        } else {
                            window.location.href = data.return_url;
                        }
                    } else {
                        window.location.href = return_url;

                    }

                } else {
                    $('.registError').html(data.message)

                }

            },
            error: function(data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Đăng ký');
            },
            complete: function(data) {
                $('#reload').trigger('click');
                $('#form-regist').trigger("reset");
                $('.modal-loader-container').css('display', 'none')
            }
        });
    });