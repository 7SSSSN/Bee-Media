<?php
    include "connexion.php";
    include "header.php";

    if (isset($_POST['signup'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $birthday = $_POST['birth'];
        $gender = $_POST['genre'];
        $email = $_POST['email'];


        $password = password_hash($_POST['password'] , PASSWORD_DEFAULT);

        $sql = " INSERT INTO users(firstname , lastname ,birthday , gender , email,  password ) 
                VALUES (:firstname, :lastname, :birthday, :gender, :email, :password )";

        $stmt = $conn->prepare($sql);
        $stmt -> execute ([
            "firstname" => $firstname,
            "lastname" => $lastname,
            "birthday" => $birthday,
            "gender" => $gender,
            "email" => $email,
            "password" => $password
        ]);

        $user_id = $conn -> lastInsertId();
        $_SESSION['user_id'] = $user_id ;
        $_SESSION['firstname'] = $firstname ;

        header ("location: index.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        
        body{
            height:100vh; 
            text-decoration: none;
            list-style: none;
        }
        

        .allsignupcontent {
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial;
        }

        .formlogin h1 {
            margin-bottom :20px;
        }
        .formlogin {
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

        .nameinp {
            width: 48%;
            height: 60px;
            border-radius: 25px;
            border: 1px solid gray;
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
    <div class="allsignupcontent">
        <div class="formlogin">
        <h1>sign up to beebook</h1>
        <form action="" method="post">
            <label for="">Name</label><br>
            <input type="text" id="fname" name="fname" placeholder="first name" class="nameinp">
            <input type="text" id="lname" name="lname" placeholder="last name" class="nameinp"><br>

            <label for="">birth day</label><br>
            <input type="date" id="birth" name="birth"><br>

            <label for="">genre</label><br>
            <select name="genre" id="">
                <option value="">select your gender</option>
                <option value="male">male</option>
                <option value="female">female</option>
            </select><br>

            <label for="">Email</label><br>
            <input type="email" id="email" name="email" placeholder="email"><br>

            <label for="">Password</label><br>
            <input type="password" id="password" name="password" placeholder="password"><br>

            <input type="submit" value="sign up" class="btnsubmit" name="signup">
        </form>
        <p>
            i allraedy have an account
            <a href="login.php">Log in</a>
        </p>

    </div>
    </div>

    
</body>
</html>

