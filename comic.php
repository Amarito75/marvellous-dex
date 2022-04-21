<?php
    include './includes/config.php';
    include './includes/apiCall.php';
    
    // $comicsUrl = 'http://gateway.marvel.com/v1/public/comics/$params.'';
    $jsonResult = apiCall($comicsUrl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvellous Dex</title>
</head>
<body>
    <div class="comic">
        <?php foreach($jsonResult->data->results as $comic) :?>
            <?=$comic->id?>
        <?php endforeach ?>
    </div>
</body>
</html>