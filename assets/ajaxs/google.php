<?php
session_start();

require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../config/function.php";
require_once __DIR__ . "/../../vendor/autoload.php";

if (
    $CMSNAV->site('client_id_gg') == '' ||
    $CMSNAV->site('client_secret_gg') == ''
) {
    die('Google OAuth chưa cấu hình');
}

$client = new Google\Client();
$client->setClientId($CMSNAV->site('client_id_gg'));
$client->setClientSecret($CMSNAV->site('client_secret_gg'));
$client->setRedirectUri('http://' . $_SERVER['SERVER_NAME'] . '/login/google');
$client->addScope(['email', 'profile']);

$service = new Google\Service\Oauth2($client);

/* CALLBACK */
if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (isset($token['error'])) {
        die('Google login failed');
    }

    $client->setAccessToken($token);
    $user = $service->userinfo->get();

    $email = $user->email;
    $google_id = $user->id;
    $name = $user->name;

    $CheckUser = $CMSNAV->get_row(
        "SELECT * FROM users WHERE email = '".addslashes($email)."'"
    );

    if ($CheckUser) {
        $_SESSION['username'] = $email;
    } else {
        $create = $CMSNAV->insert("users", [
            'username'    => $email,
            'email'       => $email,
            'password'    => md5($google_id.$email),
            'token'         => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
            'level'         => 'thanhvien',
            'money'       => 0,
            'total_money' => 0,
            'banned'      => 0,
            'ip'          => myip(),
            'time'        => time(),
            'createdate'  => gettime()
        ]);

        if ($create) {
            $_SESSION['username'] = $email;
        } else {
            die('Không tạo được user');
        }
    }

    header("Location: /");
    exit;
}

/* CHƯA LOGIN → ĐẨY QUA GOOGLE */
$authUrl = $client->createAuthUrl();
header("Location: $authUrl");
exit;

