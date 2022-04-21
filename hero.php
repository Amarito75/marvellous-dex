<?php
    include './includes/config.php';
    include './includes/apiCall.php';
    

    //Call URL
    
    $characterUrl = 'http://gateway.marvel.com/v1/public/characters/'.$_GET['id'].$params.'';
    $jsonResult = apiCall($characterUrl);
    $comicsUrl = 'http://gateway.marvel.com/v1/public/characters/'.$_GET['id'].'/comics'.$params.'';
    $comicsResult = apiCall($comicsUrl);
    $eventsUrl = 'http://gateway.marvel.com/v1/public/characters/'.$_GET['id'].'/events'.$params.'';
    $eventsResult = apiCall($eventsUrl);
    $storiesUrl = 'http://gateway.marvel.com/v1/public/characters/'.$_GET['id'].'/stories'.$params.'';
    $storiesResult = apiCall($storiesUrl);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/style/heros.css" rel="stylesheet">
    <link href="./src/style/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="./static/favicon/favicon.svg"/>
    <title>Marvellous Dex</title>
</head>
<body>
<article class="data">
    <!-- Picture -->
  <div class="panel1">
    <p class="text top-left">
        <?php foreach($jsonResult->data->results as $hero) :?>
            <?=$hero->name?>
        <?php endforeach ?>  
    </p>
    <!-- id -->
    <?php foreach($jsonResult->data->results as $hero) :?>
        <img src="<?=$hero->thumbnail->path?>/portrait_uncanny.<?=$hero->thumbnail->extension?>">
    <?php endforeach ?>
    <p class="text bottom-right"># 
        <?php foreach($jsonResult->data->results as $hero) :?>
            <?=$hero->id?>
        <?php endforeach ?>      
    </p>
  </div>
  <div class="panel2">
    <p class="text top-left">
    <!-- Heroes appeared in comics-->
        <?php foreach($jsonResult->data->results as $hero) :?>
            <span><?=$hero->comics->available?> appearances in comics</span>
        <?php endforeach ?>
    </p><br><br>
        <?php foreach($comicsResult->data->results as $comic) :?>
            <img src="<?=$comic->thumbnail->path?>/portrait_uncanny.<?=$comic->thumbnail->extension?>">
            <?=$comic->title?>
        <?php endforeach ?>
  </div>
  <!-- Description -->
  <div class="panel3">
  <p class="text top-left">Description</p>
    <p class="speech">
        <?php foreach($jsonResult->data->results as $hero) :?>
            <?=$hero->description?>
            <?php if(empty($hero->description)) { echo 'No description available :/';}?>
        <?php endforeach ?> 
    </p>
  </div>
  <div class="panel4">
      <!-- Events -->
  <p class="text top-left">Events appeared</p><br><br>
    <?php foreach($eventsResult->data->results as $event) :?>
        <br><?=$event->title?><br>
        <img src="<?=$event->thumbnail->path?>/portrait_uncanny.<?=$comic->thumbnail->extension?>">
    <?php endforeach ?>
  </div>
  <div class="panel5">
      <!-- Creators -->
  <p class="text top-left">Creators</p><br><br>
    <?php foreach($eventsResult->data->results as $event) :?>
        <?php foreach($event->creators->items as $creators) :?>
            <?=$creators->name?><br>
            <?=ucfirst($creators->role)?><br><br>
        <?php endforeach ?>
    <?php endforeach ?>
  </div>
</article>
</body>
</html>