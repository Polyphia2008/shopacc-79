<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hệ thống đang bảo trì</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(-45deg, #1e1e2f, #2e1f46, #1a2238, #2c5364);
      background-size: 400% 400%;
      animation: gradientMove 10s ease infinite;
      color: #fff;
      overflow: hidden;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .glass-box {
      position: relative;
      text-align: center;
      padding: 50px 30px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(15px);
      border-radius: 25px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
      width: 90%;
      max-width: 550px;
      animation: fadeUp 1.5s ease;
    }

    @keyframes fadeUp {
      from { transform: translateY(40px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .glow-text {
      font-size: 2.4rem;
      font-weight: 700;
      background: linear-gradient(90deg, #00e0ff, #ff6ec7);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 0 0 15px rgba(255,255,255,0.2);
      letter-spacing: 1px;
      margin-bottom: 10px;
    }

    .sub-text {
      font-size: 1.1rem;
      color: rgba(255,255,255,0.85);
      margin-bottom: 35px;
      line-height: 1.6;
    }

    .btn-home {
      display: inline-block;
      text-decoration: none;
      padding: 14px 32px;
      font-weight: 600;
      color: #fff;
      border-radius: 30px;
      background: linear-gradient(90deg, #00e0ff, #ff8a00);
      box-shadow: 0 5px 20px rgba(0,0,0,0.4);
      transition: all 0.3s ease;
    }

    .btn-home:hover {
      transform: translateY(-3px) scale(1.03);
      box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    }

    .floating-lights span {
      position: absolute;
      border-radius: 50%;
      opacity: 0.4;
      animation: floatLight 10s linear infinite;
    }

    @keyframes floatLight {
      from { transform: translateY(0) scale(1); opacity: 0.3; }
      50% { transform: translateY(-80px) scale(1.3); opacity: 0.8; }
      to { transform: translateY(0) scale(1); opacity: 0.3; }
    }

    .floating-lights span:nth-child(1) {
      width: 80px; height: 80px; background: #00e0ff; top: 10%; left: 15%; animation-delay: 0s;
    }
    .floating-lights span:nth-child(2) {
      width: 120px; height: 120px; background: #ff8a00; top: 70%; left: 60%; animation-delay: 2s;
    }
    .floating-lights span:nth-child(3) {
      width: 100px; height: 100px; background: #ff6ec7; top: 40%; left: 80%; animation-delay: 4s;
    }

    footer {
      position: absolute;
      bottom: 20px;
      width: 100%;
      text-align: center;
      font-size: 0.9rem;
      opacity: 0.5;
    }

    img.logo {
      width: 120px;
      margin-bottom: 15px;
      filter: drop-shadow(0 0 10px rgba(255,255,255,0.3));
    }

    @media(max-width: 600px){
      .glow-text { font-size: 1.8rem; }
      .sub-text { font-size: 1rem; }
      .glass-box { padding: 40px 20px; }
    }
  </style>
</head>
<body>
  <div class="floating-lights">
    <span></span><span></span><span></span>
  </div>

  <div class="glass-box">
    <img src="<?=$CMSNAV->site('logo_dark');?>" alt="Logo" class="logo">
    <h1 class="glow-text">Hệ thống đang bảo trì</h1>
    <p class="sub-text">
      Chúng tôi đang nâng cấp và tối ưu hệ thống.<br>
      Trải nghiệm của bạn sẽ sớm trở lại tốt hơn bao giờ hết.
    </p>
  </div>

  <footer>© <?=date('Y');?> TOPIE.NET — All rights reserved.</footer>
</body>
</html>
