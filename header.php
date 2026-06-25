<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    
    <title>Bee</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            list-style: none;
            text-decoration: none;
            

            
        }




        .header{
            
            background-color: #000000;
            color: #ffffff ;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 20px;
            margin-bottom :30px;
            margin :10px;
            border-radius: 50px;
            height: 70px;
            
            
        }

        .logo{
            margin-left: 30px;
            font-size: 30px;
            font-family: "Open Sans", sans-serif;
        }

        .logo a{
            color: #ffffff;
        }

        .ulmid,
        .ulright , .ulnotlog{
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .header .ulmid{
            gap : 40px;
            
        }

        .header .ulnotlog {
            margin-right :30px;
            
        }

        .ulright {
            margin-right :30px;
        }

        .material-symbols-outlined{
            font-size: 30px;
        }

        .header a {
            color: #ffffff ;
        }


    </style>
</head>
<body>

    <div class="header">

        <p class="logo">
            <a href="index.php">Bee</a>
        </p>

        <?php if (isset($_SESSION['user_id'])): ?>
            <ul class="ulmid">
                <li><span class="material-symbols-outlined">search</span></li>
                <li><span class="material-symbols-outlined">add_box</span></li>
                <li><span class="material-symbols-outlined">home</span></li>
                <li><span class="material-symbols-outlined">notifications</span></li>
                <li><span class="material-symbols-outlined">group</span></li>
            </ul>

            <ul class="ulright">
                <li><span class="material-symbols-outlined"><a href="profile.php">account_circle</a></span></li>
                <li><span class="material-symbols-outlined"><a href="settings.php">settings</a></span></li>
                <li><span class="material-symbols-outlined"><a href="logout.php">logout</a></span></li>
 
            </ul>

        <?php else: ?>
            <ul class="ulnotlog">
                <li><a href="signup.php">sign up</a></li>
                <li><a href="login.php"> log in</a></li>
            </ul>
        <?php endif ?>

        

    </div>

</body>
</html>