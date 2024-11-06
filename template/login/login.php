<!DOCTYPE html>  
<html lang="fa">  
<head>  
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="<?= asset('template/login/style.css')?>">  
    <title>صفحه لاگین</title>  
</head>  
<body>  
    <div class="login-container">           

        <form method="POST" class="login-form" action="<?= url('/login_admin')?>"> 
            <p style="color: red ; background-color: white;"></p>
            <h1>ورود به حساب کاربری</h1>  
            <div class="input-group">  
                <label for="username">نام کاربری</label>  
                <input type="text" id="username" name="name" placeholder="نام کاربری خود را وارد کنید" required>  
            </div>  
            <div class="input-group">  
                <label for="password">رمز عبور</label>  
                <input type="password" id="password" name="pas" placeholder="رمز عبور خود را وارد کنید" required>  
            </div>  
            <button type="submit">ورود</button>  

        </form>  
    </div>  
</body>  
</html>