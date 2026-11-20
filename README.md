# ShopAcc (TOPIE.NET / CMSNAV) — Source Analysis + Preview

## 1. Mã nguồn này là code gì?

| Thành phần | Chi tiết |
|---|---|
| Ngôn ngữ | **PHP thuần (PHP 8.3)** — không dùng framework MVC |
| Kiến trúc | Flat-file: mỗi trang là 1 file `.php` riêng, include `config/config.php` + `config/function.php` |
| Database | **MySQL / MariaDB** (`mysqli`), dump `database/nick6.sql` — 38 bảng, DB name `randomsieuxin_test11` |
| Frontend | HTML + CSS + jQuery, theme `assets/frontend1/theme_5`, admin theme `public/topie` |
| Thư viện | Composer: `phpmailer`, `mobiledetect`, `gregwar/captcha`, `google/apiclient` |
| Routing | `.htaccess` + `mod_rewrite` (URL đẹp: `/mua-acc`, `/Admin/Users`, `/cpanel/home`…) |
| Tên sản phẩm | Comment gốc: `CMSNT.CO`, `TOPIE.NET`, version 5.0 — shop bán acc Robux / GamePass / Robux / thẻ cào |
| Số file PHP | 257 file (87 trang admin, 54 trang client, 19 ajax endpoint) |

**Nghiệp vụ:** shop bán tài khoản Roblox, Robux, GamePass; nạp thẻ cào / bank auto / MoMo; hệ thống CTV nhiều cấp; minigame vòng quay, lật thẻ, giftcode.

**Điểm cần biết:** đây là **CMS thương mại có bản quyền** (CMSNAV/CMSNT). Source đã bị **bẻ khoá**:
- `includes/checkLicense.php` là file **0 byte** → mọi `require_once` license check đều vô hiệu.
- `config/function.php` còn hàm `checkAddon()` so `purchase_key` với `md5($domain.'|'.$id_addon)`.

---

## 2. Tài khoản admin đã tạo

File: `database/01_admin_account.sql`

| Username | Password | Level | Quyền |
|---|---|---|---|
| `admin` | `Admin@123456` | admin | ctv=1, ctvacc=1, ctvrobux=1, ctvgpass=1, banned=0 |
| `superadmin` | `Admin@123456` | admin | (dự phòng, cùng quyền) |

Số dư: 1.000.000.000 VNĐ · 100.000 Robux.

Đăng nhập: `/Auth/Login` (client) → truy cập quản trị `/cpanel/home`.

> **Mật khẩu lưu PLAINTEXT.** Hàm `TypePassword()` trong `config/function.php:1135` trả về nguyên chuỗi, và login so sánh `password = '$password'` trực tiếp. Đây là lỗ hổng nghiêm trọng — phải đổi sang `password_hash()` / `password_verify()` trước khi dùng thật.

Các option đã được chỉnh để chạy được preview:
- `baotri = 'ON'` — **logic bị đảo ngược**: `if(site('baotri') == 'OFF') { require baotri.php; exit(); }` → `ON` = site hoạt động.
- `status_recapcha = 'OFF'` — không có reCAPTCHA key.
- `status_demo = 'OFF'` — để các nút thêm/sửa trong admin hoạt động.
- Bổ sung `session_login = 86400` (code dùng nhưng dump thiếu → `setcookie` luôn hết hạn ngay).

---

## 3. Kết quả quét bảo mật (.zip)

### 3.1 Không tìm thấy backdoor / webshell / keylogger

Đã quét toàn bộ 28.833 file (`vendor` + `__MACOSX` loại trừ khi xét logic):

| Mẫu tấn công | Kết quả |
|---|---|
| `eval(`, `assert(`, `create_function`, `preg_replace /e` | **Không có** |
| `base64_decode` + `gzinflate`/`str_rot13` (mã hoá 2 lớp) | **Không có** — chỉ có `base64_decode($row['chitiet'])` để hiển thị dữ liệu DB |
| `shell_exec`, `system`, `passthru`, `popen`, `proc_open`, `exec` | **Không có** |
| `include/require $_GET` / `extract($_POST)` | **Không có** |
| Telegram bot token, Discord webhook, ngrok, pastebin exfil | **Không có** |
| File PHP ẩn trong thư mục upload (`assets/storage/`) | **Không có** — chỉ có `index.php` rỗng chống list dir |
| Dòng code dài bất thường (obfuscation) | Không có (chỉ `Mobile_Detect.php` và `Users.php` do minify HTML) |
| Mật khẩu / key "ma" trong điều kiện `if` | **Không có** |

**Domain ra ngoài** (đều hợp lệ, không phải C2): `cdn.jsdelivr.net`, `code.jquery.com`, `cdnjs.cloudflare.com`, `i.imgur.com`, `fonts.googleapis.com`, `img.vietqr.io`, các API nạp thẻ `api.web2m.com` / `card24h.com` / `thueapi.pro`, `ipinfo.io` (geo-IP).

### 3.2 NHƯNG có 4 lỗ hổng nghiêm trọng (không phải backdoor nhưng nguy hiểm tương đương)

1. **`topie.php` — xoá file không cần đăng nhập (nguy hiểm nhất)**
   Truy cập `https://site/topie.php` là nó `unlink()` **mọi file `error_log`** trong toàn bộ cây thư mục. Đã xác nhận chạy được (`200 OK`).
   → Kẻ tấn công dùng để **xoá dấu vết** sau khi khai thác. **Nên xoá file này.**

2. **SQL Injection diện rộng** — `check_string()` chỉ `addslashes`, còn nhiều chỗ nối chuỗi trực tiếp:
   `... WHERE id = '".check_string($_GET['id'])."'` trong `public/client/Accounts.php:49`, `Groups.php:12`, `Orders.php:12`, `CayThue.php:12`, `GamePass.php:12`…
   → Có thể khai thác `UNION SELECT` để lấy `users.password` (**plaintext**) của mọi tài khoản.

3. **`assets/ajaxs/admin/showAccounts.php` — lộ tài khoản đã bán, không cần auth**
   Nhận `POST trans_id` rồi trả về toàn bộ account Roblox đã mua. Trả `500` hiện tại chỉ vì bảng `accountsv2` không có trong dump, không phải do chặn quyền.

4. **Mật khẩu plaintext + so sánh chuỗi thô** — xem mục 2.

### 3.3 Lỗi logic khác đáng chú ý

- `getLocation()` (`config/function.php:1228`): `if($ip = '::1')` dùng `=` thay vì `==` → **luôn** trả `country = 'VN'` cho mọi IP. Lớp chặn admin "chỉ IP Việt Nam" hoàn toàn vô dụng.
- `check_img()` chỉ kiểm tra **phần mở rộng** (`png/jpg/gif`), không kiểm tra nội dung → upload `shell.png` chứa PHP. Thư mục `assets/storage/images/` không có `.htaccess` chặn thực thi.
- 20 file còn dùng `$CMSNT` (biến cũ) thay vì `$CMSNAV` → **fatal error** khi gọi (dead code): `assets/ajaxs/RobuxLink.php`, `Withdraw.php`, `getPhiRutTien.php`, `public/admin/DonHangGamepassDangCay.php`…
- `cron/bank.php`, `cron/momo.php`, `cron/tsr.php` không có secret token → ai cũng gọi được (có rate-limit 5 giây).

---

## 4. Preview trên sandbox

**URL:** https://3000-iojvdzoz3nppsvfocd8b4-3c7ff1b5.sandbox.novita.ai

Stack preview: **Apache 2.4 + mod_php 8.4 + MariaDB 11.8** (chạy trực tiếp trong sandbox, không deploy Cloudflare — app này là PHP/MySQL nên **không thể** chạy trên Cloudflare Workers).

### Đã sửa `.htaccess` cho sandbox (giữ bản gốc ở `.htaccess.orig`)
- Comment redirect `HTTP → HTTPS` (sandbox đã đi qua proxy HTTPS).
- Comment `AddHandler application/x-httpd-alt-php74` (handler cPanel, nếu để sẽ tải file thay vì chạy PHP).

### Khởi động lại preview

```bash
sudo service mariadb start
sudo apache2ctl start
```

Hoặc chạy `bash scripts/start-preview.sh`.

### Dựng lại DB từ đầu

```bash
sudo mariadb -e "DROP DATABASE IF EXISTS randomsieuxin_test11;
  CREATE DATABASE randomsieuxin_test11 CHARACTER SET utf8mb4;
  CREATE USER IF NOT EXISTS 'randomsieuxin_test11'@'localhost' IDENTIFIED BY 'randomsieuxin_test11';
  GRANT ALL ON randomsieuxin_test11.* TO 'randomsieuxin_test11'@'localhost';"
sudo mariadb randomsieuxin_test11 < database/nick6.sql
sudo mariadb randomsieuxin_test11 < database/01_admin_account.sql
```

### Đã kiểm tra

| Route | Kết quả |
|---|---|
| `/` | 200 — trang chủ |
| `/Auth/Login` | 200 — form đăng nhập |
| `/mua-acc`, `/ro-bux`, `/vat-pham`, `/mini-game`, `/tin-tuc` | 200 |
| `/cpanel/home` (admin) | 200 — Dashboard |
| `/Admin/Users`, `/Admin/Setting`, `/Admin/Blogs`, `/cpanel/transactions` | 200 |
| `/cpanel/home` (user thường) | 302 → chặn đúng |
| Đăng nhập `admin` / `Admin@123456` | ✅ ghi log `logs` id=50 |

---

## 5. Việc chưa làm / khuyến nghị

**Bắt buộc trước khi đưa lên production:**
1. **Xoá `topie.php`** hoặc thêm `CheckAdmin()`.
2. Băm mật khẩu: thay `TypePassword()` + câu query login bằng `password_hash`/`password_verify`.
3. Chuyển toàn bộ query sang **prepared statement** (`mysqli_prepare`) — có ~200 điểm nối chuỗi.
4. Sửa `if($ip = '::1')` → `==`.
5. Thêm `assets/storage/.htaccess` với `php_flag engine off` + kiểm tra MIME thật khi upload.
6. Thêm secret token cho `cron/*.php`, và `checkLicense()` cho `assets/ajaxs/admin/showAccounts.php`.
7. Đổi mật khẩu admin mặc định, xoá `superadmin`.

**Chưa có:**
- Chưa cấu hình API nạp thẻ / bank thật (các option `api_card`, `api_bank`, `api_momo` đang rỗng).
- Google OAuth chưa cấu hình (`client_id_gg`, `client_secret_gg` rỗng).
- reCAPTCHA đang tắt.
- Một số trang trả 404 do thiếu file hoặc thiếu bảng: `/LatThe`, `/Logs`, `/Admin/Accounts`.

---

## 6. Cấu trúc thư mục

```
webapp/
├── index.php              # Trang chủ
├── .htaccess              # Routing (đã patch cho sandbox)
├── .htaccess.orig         # Bản gốc
├── config/
│   ├── config.php         # Kết nối DB + class CMSNAV + CheckAdmin()
│   └── function.php       # ~1600 dòng helper
├── includes/              # login-admin.php, login-ctv*.php, checkLicense.php (rỗng)
├── public/
│   ├── admin/             # 87 trang quản trị
│   ├── client/            # 54 trang người dùng
│   ├── ctv/ ctvacc/       # Khu cộng tác viên
│   ├── topie/             # Theme admin
│   └── ckeditor/
├── assets/
│   ├── ajaxs/             # 19 endpoint AJAX
│   ├── storage/images/    # Upload (47MB)
│   └── frontend1/theme_5/ # Theme client
├── api/                   # Callback thẻ cào
├── cron/                  # bank / momo / tsr
├── class/                 # Mobile_Detect, PHPMailer, GoogleAuthenticator
├── database/
│   ├── nick6.sql          # Dump gốc
│   └── 01_admin_account.sql  # Tạo admin + cấu hình
├── scripts/start-preview.sh
└── vendor/                # Composer
```
