<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "water_system";

// إنشاء الاتصال
$conn = new mysqli($host, $user, $pass, $db);

// تعيين ترميز اللغة العربية لضمان عدم ظهور رموز غريبة
$conn->set_charset("utf8");

// فحص الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
?>