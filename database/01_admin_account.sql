-- =====================================================================
-- 01_admin_account.sql
-- Tạo tài khoản quản trị (admin) và cấp toàn bộ quyền hạn.
--
-- LƯU Ý: Hệ thống này lưu mật khẩu dạng PLAINTEXT
-- (hàm TypePassword() trong config/function.php trả về nguyên chuỗi,
--  đăng nhập so sánh trực tiếp `password` = '$password').
-- => Đây là lỗ hổng nghiêm trọng của source gốc, cần băm mật khẩu
--    (password_hash/password_verify) trước khi dùng thật.
--
-- Quyền hạn trong bảng `users`:
--   level     : 'admin'  -> vào được toàn bộ /cpanel, /Admin/*
--   ctv       : 1        -> cộng tác viên tổng
--   ctvrobux  : 1        -> CTV bán Robux
--   ctvacc    : 1        -> CTV bán tài khoản
--   ctvgpass  : 1        -> CTV bán GamePass
--   banned    : 0        -> không bị khóa
-- Chạy: mysql -u root randomsieuxin_test11 < database/01_admin_account.sql
-- =====================================================================

SET NAMES utf8mb4;

-- Xóa bản ghi cùng tên (nếu có) để file chạy lại nhiều lần vẫn đúng (idempotent)
DELETE FROM `users` WHERE `username` = 'admin';

INSERT INTO `users` (
  `username`, `password`, `token`, `money`, `robux`, `level`, `banned`,
  `email`, `otp`, `ip`, `time`, `total_money`, `money_hoahong`,
  `createdate`, `ref_click`, `ref`, `ctv`, `ctvrobux`, `ctvacc`, `ctvgpass`, `hopqua`
) VALUES (
  'admin',
  'Admin@123456',
  'aDm1nT0k3n2026xZq7PvLmNcRbYtUwEiOsAfGhJkDl',
  1000000000,
  100000,
  'admin',
  0,
  'admin@localhost.local',
  '',
  '127.0.0.1',
  UNIX_TIMESTAMP(),
  0,
  0,
  NOW(),
  0,
  '',
  1,
  1,
  1,
  1,
  NULL
);

-- Tài khoản admin phụ (dự phòng) — cùng mật khẩu
DELETE FROM `users` WHERE `username` = 'superadmin';
INSERT INTO `users` (
  `username`, `password`, `token`, `money`, `robux`, `level`, `banned`,
  `email`, `otp`, `ip`, `time`, `total_money`, `money_hoahong`,
  `createdate`, `ref_click`, `ref`, `ctv`, `ctvrobux`, `ctvacc`, `ctvgpass`, `hopqua`
) VALUES (
  'superadmin',
  'Admin@123456',
  'sUp3rT0k3n2026xZq7PvLmNcRbYtUwEiOsAfGhJkDl',
  1000000000,
  100000,
  'admin',
  0,
  'superadmin@localhost.local',
  '',
  '127.0.0.1',
  UNIX_TIMESTAMP(),
  0,
  0,
  NOW(),
  0,
  '',
  1,
  1,
  1,
  1,
  NULL
);

-- Tắt chế độ bảo trì để xem trước được site.
-- LƯU Ý: logic trong index.php bị ĐẢO NGƯỢC:
--   if($CMSNAV->site('baotri') == 'OFF') { require baotri.php; exit(); }
-- => 'ON' = site HOẠT ĐỘNG, 'OFF' = HIỆN TRANG BẢO TRÌ.
UPDATE `options` SET `value` = 'ON' WHERE `name` = 'baotri';
-- Tắt reCAPTCHA (không có key hợp lệ) để form đăng nhập/đăng ký hoạt động
UPDATE `options` SET `value` = 'OFF' WHERE `name` = 'status_recapcha';
-- Tắt chế độ DEMO để các nút thêm/sửa trong admin hoạt động
UPDATE `options` SET `value` = 'OFF' WHERE `name` = 'status_demo';
-- Bổ sung option session_login mà code có dùng nhưng dump thiếu (1 ngày)
INSERT INTO `options` (`name`, `value`)
SELECT 'session_login', '86400'
WHERE NOT EXISTS (SELECT 1 FROM `options` WHERE `name` = 'session_login');
