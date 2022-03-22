<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProPhoto</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <?php if(!isset($link)){ $link = '';}?>
    <?= $link; ?>
</head>
<body>
    <?php require('menu.php'); ?>
    <main>
        <?= $content;?>
    </main>
    <?php require('footer.php'); ?>
</body>
</html>