<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="public/css/style.css" rel="stylesheet" />
  <title>Document</title>
</head>
<body>

<?php 
  
  
  $data = $post->fetch();
?>

  <h1>Mon super blog</h1>
  
  <p class="back_to_index_btn">
    <a class="input btn" href="index.php">retour à la liste des billets</a>
  </p>

  <div class="post">
    <p class="title_post"><?=$data["title"];?> ! <?= $data["date_creation"]?></p>
    <p><?= $data["content"];?></p>
  </div>

  <?php $post->closeCursor(); ?>

  
  
  
  <div class="comments">
  <p><strong>Ajouter un commentaire :</strong></p>
  <form action="index.php?action=addComment&id=<?= $data['id'] ?>" method="post">
    
        <input class="input" type="text" id="author" name="author" placeholder="auteur" />
   
        <input class="input"  type="comment" name="comment" placeholder="commentaire" />
    
        <input class="input btn" type="submit" value="envoyer" />
    
</form>
    <?php 
      while($comments_data = $comments->fetch()):
    ?>
    
    <p>
      id: <?= $comments_data["id"] ?> 
      <strong><?=$comments_data["author"]?> :</strong> 
      <em><?=$comments_data["date"]?></em>
    </p>

    <p class="a">
      <?=$comments_data["comment"]?>
    </p>

    <?php 
      endwhile;
      $comments->closeCursor();
    ?>
    
  </div>

</body>
</html>