<?php
// قراءة المتغيرات السحابية التي ربطناها في منصة Railway تلقائياً
$host     = getenv('MYSQLHOST')     ?: 'localhost';
$user     = getenv('MYSQLUSER')     ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';
$dbname   = getenv('MYSQLDATABASE') ?: 'water_system';
$port     = getenv('MYSQLPORT')     ?: '3306';

// الاتصال بقاعدة البيانات
$conn = new mysqli($host, $user, $password, $dbname, $port);

// فحص الاتصال بطريقة برمجية تمنع الـ Loop وتطبع المشكلة إن وجدت
if ($conn->connect_error) {
    echo "<h2 style='text-align:center; color:red; margin-top:50px;'>❌ خطأ في الاتصال بقاعدة البيانات السحابية!</h2>";
    echo "<p style='text-align:center;'>السبب: " . $conn->connect_error . "</p>";
    exit(); // يوقف الكود تماماً ويمنع إعادة التوجيه
}

// ضبط الترميز للغة العربية
$conn->set_charset("utf8mb4");
?>
