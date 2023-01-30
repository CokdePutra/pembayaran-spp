<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div id="wrapper">
    <div class="welcome">
        <h2>Halo Selamat Datang</h2>
        <div class="container">
            <div class="login-content">
                <div class="logo">
                    <img src="../image/logo.png">
                </div>
                <form action="proses_login.php" method="POST">
                    <div class="username">
                        <input type="text" name="username" placeholder="Username/NIS" required autocomplete="off" class="input-1">
                    </div>
                    <div class="password">
                        <input type="password" name="password" placeholder="******" required autocomplete="off" class="input-2">
                    </div>
                    <div>
                        <input type="submit" value="MASUK" class="btn">
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>