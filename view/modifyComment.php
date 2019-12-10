<?php 
$title = "modifier";
ob_start();
?>
  <h1>Modifier le commentaire</h1>

  <a href="javascript:history.go(-1)">retour</a>

  <form action="index.php?action=modifyComment&amp;id=<?= $comment_data["id"]?>" method="post">
    <input type="comment" name="newComment" placeholder="commentaire" />
    <input type="hidden" name="post_id" value="<?= $comment_data["post_id"]; ?>">
    <input type="submit" value="envoyer" />
  </form>

 
<?php 
$content = ob_get_clean();
require("view/template.php");
?>
