<?php
    include './includes/config.php';
    include './includes/apiCall.php';
    
    // Pagination
    if(!empty($_GET['page']))
    {
        $page = (int)$_GET['page'];    
    }
    elseif(empty($page)) 
    {
        $page = 1;
    }

    $offset = ($page - 1) * 50;
    $charactersUrl = "http://gateway.marvel.com/v1/public/characters$params&limit=50&offset=$offset";
    $jsonResult = apiCall($charactersUrl);

    include './partials/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./static/favicon/favicon.svg"/>
    <title>Marvellous Dex</title>
</head>
<body>
    <div class="data-heroes">
        <!-- Hero card -->
        <?php foreach($jsonResult->data->results as $character) :?>
        <div class="heroes-list">
            <!-- character name -->
            <p class="text top-left"><?=$character->name?></p>
            <a href="hero.php?id=<?=$character->id?>">
            <!-- character picture -->
                <img src="<?=$character->thumbnail->path?>/portrait_incredible.<?=$character->thumbnail->extension?>">
            </a>  
            <p class="text bottom-right"># <?=$character->id?></p>           
        </div>
        <?php endforeach ?>
    </div>
    <!-- Pagination-->
    <div class="pagination">
        <div class="bubble bubble--highlight">
            <a href="?page=<?= $page - 1 ?>">Previous</a>
        </div>
        <div class="bubble bubble--highlight">
            <a href="?page=<?= $page + 1 ?>">Next</a>
        </div>   
    </div>
</body>
</html>
