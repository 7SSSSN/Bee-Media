<?php

    include "connexion.php";
    include "header.php";

$id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<h2><?= $user['firstname'] ?> <?= $user['lastname'] ?></h2>

<p><?= $user['email'] ?></p>

<p><?= $user['gender'] ?></p>

<p><?= $user['birthday'] ?></p>


<h1> postes </h1>
<?php

$sql = "
SELECT *
FROM posts
WHERE user_id = ?
ORDER BY created_at DESC
";

$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$posts = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>


<?php foreach($posts as $post): ?>

<div class="postprofile">

    <p><?= $post['content'] ?></p>
    <p><?= $post['created_at'] ?></p>
</div>

<?php endforeach; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .postprofile {
            border : solid black 1px ;
            margin : 10px 20px ;
        }
    </style>
</head>
<body>
    
</body>
</html>