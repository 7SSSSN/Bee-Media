
<?php 

    include "connexion.php";

    if (isset($_POST['subpost'])){

        $user_id = $_SESSION['user_id'];
        $content = $_POST['post'] ;

        $sql = "INSERT INTO posts(user_id, content)
            VALUES(:user_id, :content)";


        $stmt = $conn->prepare($sql);

    $stmt->execute([
        "user_id"=>$user_id,
        "content"=>$content
    ]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .createpost {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top : 20px ;
            margin-bottom : 20px ;
        }

        .createpost input {
            width: 800px;
            height: 30px;
            border-radius: 10px;
            border: 1px solid gray;
        }
        .createpost button {
            background-color: #3d4cd0;
            color: aliceblue;
            border-radius: 10px;
        }

        
    </style>
</head>
<body>







<?php if (isset($_SESSION['user_id'])): ?>

    <form class="createpost" method="POST">
        <input type="text" placeholder="your post" name="post">
        <button type="submit" name="subpost">post it</button>
    </div>
<?php endif ?>


</body>
</html>



    