<?php
session_start();
if ($_SESSION['souse'] !== "1") {
    $url = " ";
    header("Location:" . trim(CURRENT_DOMAIN, "/ ") . "/" . trim($url, "/ "));


}

?>
<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8"> 
    <meta name="robots" content="noindex">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="<?= asset('public/css-admin/styles.css')?>">  
    <title>داشبورد</title>  
</head>  
<body>  
    <div class="dashboard-container">  
        <aside class="sidebar">  
            <h2>منوی داشبورد</h2>  
            <ul>  
                <li><a href="index.html">خانه</a></li>  
                <li><a href="<?= url('dasebord/nazrat')?>">نظرات کاربران</a></li>  
                <li><a href="#">تنظیمات</a></li>  
                <li><a href="#">خروج</a></li>  
            </ul>  
        </aside>  
        <main class="main-content">  
            <h1>خوش آمدید به داشبورد</h1>  
            <div class="cards">  
                <div class="card">  
                    <h3>کارت ۱</h3>  
                    <p>محتوای کارت ۱...</p>  
                </div>  
                <div class="card">  
                    <h3>کارت ۲</h3>  
                    <p>محتوای کارت ۲...</p>  
                </div>  
                <div class="card">  
                    <h3>کارت ۳</h3>  
                    <p>محتوای کارت ۳...</p>  
                </div>  
                <div class="card">  
                    <h3>کارت ۴</h3>  
                    <p>محتوای کارت ۴...</p>  
                </div>  
            </div>  
        </main>  
    </div>  
</body>  
</html>