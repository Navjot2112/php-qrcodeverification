<?php
// Include the PHP QR Code library
include('phpqrcode/qrlib.php');

// Define the URL for the user to scan and input their credentials
$qrUrl = 'http://192.168.31.153/qr_code_verification/attendance.php';
// 2402:8100:226e:20bd:f574:778:a014:e2c4
// Generate the QR code
QRcode::png($qrUrl, 'qrcode.png');

// Display the QR code
echo '<img src="qrcode.png" />';
?>
