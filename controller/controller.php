<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// use MaximeSmolis\Blog\Model;
// on peut utiliser le mot-clé  use  en début d'un fichier qui fait régulièrement appel à des classes d'un même namespace, pour éviter de se répéter à chaque instanciation d'objet.

function listPosts() {
  $obj = new MaximeSmolis\Blog\Model\PostManager();
  $posts = $obj->getPosts();
  require("view/listPostsView.php");
}

function post() {
  $obj = new MaximeSmolis\Blog\Model\PostManager();
  $post = $obj->getPost($_GET["id"]);
  $obj = new MaximeSmolis\Blog\Model\CommentManager();
  $comments = $obj->getComments($_GET["id"]);

  require('view/postView.php');
}

function addComment($postId, $author, $comment) {

  $obj = new MaximeSmolis\Blog\Model\CommentManager();
  $newComment = $obj->postComment($postId, $author, $comment);
  if($newComment == false) {
    throw new Exception("impossible d'ajouter un commentaire");
  }
  else {
    header("Location: index.php?action=post&id=".$postId);
  }

  
} 
  
