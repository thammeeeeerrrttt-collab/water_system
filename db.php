<?php
// قراءة المتغيرات السحابية تلقائياً من منصة Railway
$host     = getenv('MYSQLHOST')     ?: 'localhost';
$user     = getenv('MYSQLUSER')     ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';
$dbname   = getenv('MYSQLDATABASE') ?: 'water_system'; 
$port     = getenv('MYSQLPORT')     ?: '3306';

// الاتصال المباشر بالقاعدة بدون استخدام دالة mysqli_report المعطلة
$conn = @new mysqli($host, $user, $password, $dbname, $port);

// فحص الاتصال يدوياً وبأمان
if ($conn->connect_error) {
    die("❌ فشل الاتصال بقاعدة البيانات السحابية: " . $conn->connect_error);
}

// ضبط الترميز للغة العربية
$conn->set_charset("utf8mb4");
?>
