<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">  
    <meta name="robots" content="noindex">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="<?= asset('public/css-admin/styles.css')?>">  
    <title>نظرات کاربران</title>  
</head>  
<body>  
    <div class="dashboard-container">  
        <aside class="sidebar">  
            <h2>منوی داشبورد</h2>  
            <ul>  
                <li><a href="dashboard.html">خانه</a></li>  
                <li><a href="comments.html">نظرات کاربران</a></li>  
                <li><a href="#">تنظیمات</a></li>  
                <li><a href="#">خروج</a></li>  
            </ul>  
        </aside>  
        <main class="main-content">  
            <h1>نظرات کاربران</h1>  
            <table>  
                <thead>  
                    <tr>  
                        <th>نام</th>  
                        <th>نام شرکت</th>  
                        <th>ایمیل</th>  
                        <th>شماره تماس</th>  
                        <th>نظر</th>  
                        <th>تاریخ</th>  
                    </tr>  
                </thead>  
                <tbody>  
                    <?php foreach ($messages as $message ) {
                     
                    ?>
                    <tr>  
                        <td><?= $message['user_name']?></td>  
                        <td><?= $message['company']?></td>  
                        <td><?= $message['email']?></td>  
                        <td><?= $message['tel']?></td>  
                        <td><?= $message['masseg']?></td>  
                        <td><?= jalaliData($message['created_at'])?></td>  
                    </tr>  <?php } ?>
                   
                   
                </tbody>  
            </table>  
        </main>  
    </div>  
</body>  
</html>