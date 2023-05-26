<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uyeler</title>
</head>

<body>
    <h1>uyeler sayfası</h1>
    <form action="" method="post">
        <input type="text" name="username" placeholder="üyelerde ara...">
        <button type="submit"> GONDER</button>
    </form>
    <ul>
        <?php foreach ($users as $user) { ?>
            <li><?= $user['writer'] ?></li>
        <?php } ?>
    </ul>
</body>

</html>