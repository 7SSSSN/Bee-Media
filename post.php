<?php 

    include "connexion.php";
    $sql = "
        SELECT posts.*, users.firstname
        FROM posts
        JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC
        ";

    $stmt = $conn->query($sql);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .postcontainer {
            border: 1px solid gray;
            border-radius: 25px;
            margin : 0 30px
            
        }
        .post {
            padding: 0;
            margin: 0;   
            font-family: "Open Sans", sans-serif;
        }

        .post h3 {
            margin: 10px;
        }
        .post p {
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .postreaction {
            border-top: 1px solid gray;
            display: flex;
            gap: 30px;
            margin: 10px;
        }

        .posts{
        display: flex;
        flex-direction: column;
        gap: 20px;
        }
    </style>
</head>
<body>
    <div class="posts">
<?php foreach($posts as $post): ?>

        <div class="postcontainer">
        <div class="post">
            <h3><?= $post['firstname'] ?></h3>
            <p><?= $post['content'] ?></p>
        </div>
        <div class="postreaction">
            <span>like</span>
            <span>commente</span>

        </div>
    </div>
    <?php endforeach; ?>
    </div>

</body>
</html>