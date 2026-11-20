    $(document).ready(function () {
        var modalId = 'noti';
        var cookieName = modalId + '_closed';

        // Check if the modal should be shown
        if (!getCookie(cookieName)) {
            $('#' + modalId).modal('show');
        }

        // Function to set a cookie
        function setCookie(name, value, days) {
            var expires = '';
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = '; expires=' + date.toUTCString();
            }
            document.cookie = name + '=' + (value || '') + expires + '; path=/';
        }

        // Function to get a cookie
        function getCookie(name) {
            var nameEQ = name + '=';
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        // Function to temporarily close the modal
        function closeTemporarily() {
            $('#' + modalId).modal('hide');
        }

        // Bind the "Đóng" button click event
        $('#' + modalId + ' .modal-footer .btn[data-dismiss="modal"]').click(closeTemporarily);
        
        // Bind the "Đóng 24 giờ" button click event
        $('#close24h').click(function() {
            setCookie(cookieName, 'true', 1); // Cookie expires in 1 day
            $('#' + modalId).modal('hide');
        });
    });