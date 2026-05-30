<?php
// إعدادات الاتصال المباشر بسيرفر قاعدة البيانات السحابي في Railway
$host     = "zephyr.proxy.rlwy.net"; // الرابط الخارجي (الـ Private Host أو Endpoint) الخاص بـ MySQL في حسابك
$user     = "root";                 // اسم المستخدم الافتراضي في Railway
$password = "كلمة_مرور_قاعدة_البيانات_الخاصة_بك"; // 👈 ضع هنا كلمة المرور الطويلة المخصصة للـ MySQL في Railway
$dbname   = "railway";              // اسم قاعدة البيانات الافتراضية أونلاين في Railway
$port     = 3306;                   // المنفذ الافتراضي المخصص للاتصال

// الاتصال بقاعدة البيانات
$conn = new mysqli($host, $user, $password, $dbname, $port);

// فحص الاتصال وطباعة الخطأ الحقيقي أونلاين بدلاً من التحويل اللانهائي
if ($conn->connect_error) {
    die("<div style='color:red; font-weight:bold; text-align:center; margin-top:50px; font-family:sans-serif;'>
        ❌ فشل الاتصال بقاعدة البيانات السحابية!<br>
        السبب: " . $conn->connect_error . "<br>
        يرجى التأكد من كلمة المرور والرابط الخارجي من تبويب Variables في Railway.
        </div>");
}

// ضبط الترميز للغة العربية
$conn->set_charset("utf8mb4");
?>
