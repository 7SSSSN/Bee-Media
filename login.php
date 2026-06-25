<?php

    include "connexion.php";
    include "header.php";

        
    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user){

            if(password_verify($password, $user['password'])){

                $_SESSION['user_id'] = $user['id'];
                
                
                header("Location: index.php");
                exit();

            }else{
                echo "Password incorrect";
            }

        }
        else{
            echo "Email introuvable";
        }
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
    margin:0;
    padding:0;
    box-sizing:border-box;
        }

    body{
        height:100vh;
        
    }


    .container {
        display:flex;
        justify-content:center;
        align-items:center;
        background:#f5f5f5;
        font-family:Arial;
        }
    .box {
        width: 550px;
        margin-top: 50px;
        }

    label {
            font-size: 20px;
            font-weight: 500;
        }

        input , select {
            height: 60px;
            border-radius: 25px;
            border: 1px solid gray;
            margin-bottom: 20px;
            width: 98%;
            margin-top: 8px;

        }

        input::placeholder{
            color: gray;
            font-size: 18px;
            font-style: italic;
            margin-left: 20px;
        }

        .btnsubmit {
            height: 50px;
            background-color: #3d4cd0;
            color: aliceblue;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="container">

    <form class="box" method="POST">
        <h2>Login</h2>
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <input type="submit" value="login" class="btnsubmit" name="login">

        <p>
            Don't have an account?
            <a href="signup.php">Sign up</a>
        </p>

    </form>

</div>
</body>
</html>