<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$size = 0;
$deletedCount = 0;

$directory = '../'; // Có thể đổi thành './' nếu bạn muốn quét trong thư mục hiện tại trở đi
$di = new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS);

foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    if (preg_match("/error_log$/i", $filename)) {
        $fileSize = $file->getSize();
        $size += $fileSize;

        echo $filename . ' - ' . round($fileSize / 1024 / 1024, 2) . ' MB';

        if (is_writable($filename) && unlink($filename)) {
            echo ' <span style="color:green">(Đã xoá)</span><br>';
            $deletedCount++;
        } else {
            echo ' <span style="color:red">(Không thể xoá - kiểm tra quyền)</span><br>';
        }
    }
}

echo '<br><b>Tổng file đã xoá: ' . $deletedCount . '</b><br>';
echo '<b>Tổng dung lượng đã xoá: ' . round($size / 1024 / 1024, 2) . ' MB</b>';
?>
