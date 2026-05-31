<?php
// قراءة بيانات المربع المربوط بالنجوم في Railway تلقائياً
$host     = getenv('MYSQLHOST')     ?: 'localhost';
$user     = getenv('MYSQLUSER')     ?: 'root';
$password = getenv('MYSQLPASSWORD') ?: '';
$dbname   = getenv('MYSQLDATABASE') ?: 'water_system'; 
$port     = getenv('MYSQLPORT')     ?: '3306';

// تفعيل ميزة إظهار الأخطاء صراحة لمنع حلقة التوجيه الصامتة
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    // تعطيل كامل للـ Headers لمنع المتصفح من التحويل تلقائياً
    header_remove(); 
    die("<div style='text-align:center; padding:50px; font-family:sans-serif;'>
            <h2 style='color:red;'>❌ فشل الاتصال بقاعدة البيانات السحابية</h2>
            <p>السبب: " . htmlspecialchars($conn->connect_error) . "</p>
            <p style='color:#666;'>تأكد أن اسم قاعدة البيانات المرفوعة في الـ Workbench هو فعلاً <b>water_system</b> وليس <b>railway</b></p>
         </div>");
}

$conn->set_charset("utf8mb4");
?>
