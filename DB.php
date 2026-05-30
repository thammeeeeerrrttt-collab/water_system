<?php
// قراءة المتغيرات السحابية من سيرفر Railway، وفي حال عدم وجودها يتم الاعتماد على السيرفر المحلي (XAMPP)
$host     = getenv('MYSQLHOST')     ?: 'localhost';
$user     = getenv('MYSQLUSER')     ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';

// التعديل هنا: إذا كنا أونلاين نستخدم قاعدة السيرفر "railway" وإذا كنا محلياً نستخدم "water_system"
$dbname   = getenv('MYSQLDATABASE') ?: 'water_system';
if (getenv('MYSQLHOST')) {
    $dbname = 'railway'; // السيرفر السحابي غالباً يطلق هذا الاسم الافتراضي على قاعدتك
}

$port     = getenv('MYSQLPORT')     ?: '3306';

// الاتصال بقاعدة البيانات
$conn = new mysqli($host, $user, $password, $dbname, $port);

// فحص الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// ضبط الترميز للغة العربية
$conn->set_charset("utf8mb4");
?>
