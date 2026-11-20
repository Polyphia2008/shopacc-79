  // Thời gian chờ (đơn vị: millisecond)
  var waitTime = 3000; // 3 giây

  // Ẩn hiển thị sau khoảng thời gian chờ
  setTimeout(function() {
    var loadingBox = document.querySelector('.box-loading');
    if (loadingBox) {
      loadingBox.style.display = 'none';
      var accountBox = document.querySelector('.box-account');
      if (accountBox) {
        accountBox.classList.add('d-md-block');
        var rechargeBtn = document.getElementById('recharge-btn');
        if (rechargeBtn) {
          rechargeBtn.classList.add('d-lg-block');
        }
      }
    }
  }, waitTime);