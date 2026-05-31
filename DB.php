<?php
// قراءة المتغيرات السحابية تلقائياً
$host     = getenv('MYSQLHOST')     ?: 'localhost';
$user     = getenv('MYSQLUSER')     ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';
$dbname   = 'water_system'; // 👈 قمنا بكتابة الاسم صراحة هنا لضمان عدم حدوث تعارض
$port     = getenv('MYSQLPORT')     ?: '3306';

// تفعيل ميزة إظهار الأخطاء صراحة لمنع حلقة التوجيه الصامتة
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    header_remove(); 
    die("<div style='text-align:center; padding:50px; font-family:sans-serif;'>
            <h2 style='color:red;'>❌ فشل الاتصال بقاعدة البيانات السحابية</h2>
            <p>السبب: " . htmlspecialchars($conn->connect_error) . "</p>
         </div>");
}

$conn->set_charset("utf8mb4");
?>
