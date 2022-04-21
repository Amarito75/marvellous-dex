<?php 
    include './includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/style/style.css" rel="stylesheet">
    <link href="./src/style/heros.css" rel="stylesheet">
    <link href="./src/style/header.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b0f29e9bfe.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="./static/favicon/favicon.svg"/>
    <title>Marvellous Dex</title>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="./static/pictures/logo.png">
        <p class="text top-left"><?=$jsonResult->data->total?> characters available</p>
        <p class="text top-right"><?=$jsonResult->attributionText?></p>
    </div>
</body>
</html>