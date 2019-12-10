

<?php 
  
  $title = $data["title"];
  
  ob_start();
  
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
  <form action="index.php?action=add&id=<?= $data['id'] ?>" method="post">
    
        <input class="input" type="text" id="author" name="author" placeholder="auteur" />
   
        <input class="input"  type="comment" name="comment" placeholder="commentaire" />
    
        <input class="input btn" type="submit" value="envoyer" />
    
</form>

    <?php 
      while($comments_data = $comments->fetch()):
    ?>
    
    <p> 
    
    
      <strong><?=$comments_data["author"]?> :</strong> 
      <em><?=$comments_data["date"]?></em>
      <a class="link" href="index.php?action=delete&id=<?= $comments_data['id']?>" >supprimer</a>
      <a class="link" href="index.php?action=comment&id=<?= $comments_data["id"]?>">modifier</a>
    </p>

    <p class="a">
      <?=$comments_data["comment"]?>
    </p>
    <p>
      <form id="modify" onsubmit="hideOnClick()" action="index.php?action=modifyComment&amp;id=<?= $comments_data["id"]?>" method="post">
      <input class="input" type="comment" name="newComment" placeholder="commentaire" />
      <input class="input btn" type="submit" value="envoyer" />
  </form>
</p>
  
    <?php 
      endwhile;
      $comments->closeCursor();
    ?>
    
  </div>


<?php 
$content = ob_get_clean();
require("view/template.php");

?>