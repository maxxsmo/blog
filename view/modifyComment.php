<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Modifier le commentaire</h1>

  <a href="javascript:history.go(-1)">retour</a>

  <form action="index.php?action=modifyComment&amp;id=<?= $comment_data["id"]?>" method="post">
    <input type="comment" name="newComment" placeholder="commentaire" />
    <input type="submit" value="envoyer" />
  </form>

  <p><?= $comment_data["id"] ?> <?= $comment_data["author"]?></p>

</body>
</html>
