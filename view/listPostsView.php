<?php $title = "mon blog"; ?>

<?php ob_start() ?>
<h1>Mon super blog</h1> 

 
    <?php
    while($data = $posts->fetch()): 
    ?>
    <div class="post">
        <p class="title_post"><?=$data['title'];?>! <?= $data["date_creation"];?></p>
        <p><?=$data['content'];?></p>
        <a class="input btn" href="index.php?action=post&id=<?=$data['id'];?>">commentaires</a> 
    </div> 
    <?php 
    endwhile;
    
    $posts->closeCursor();
    $content = ob_get_clean();
    ?>
<?php require("view/template.php"); ?>