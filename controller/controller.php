<?php

require("public/errorDisplay.php");
require_once('model/PostManager.php');
require('model/CommentManager.php');

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

function comment() {
  $obj = new MaximeSmolis\Blog\Model\CommentManager();
  $comment = $obj->getComment($_GET["id"]);
  $comment_data = $comment->fetch();
  require("view/modifyComment.php");
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

function deleteComment() {
  $redirect_to = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
  $obj = new MaximeSmolis\Blog\Model\CommentManager();
  $selectComment = $obj->commentToDelete($_GET["id"]);
  if($selectComment == false) {
    throw new Exception("impossible d'ajouter un commentaire");
  }
  else {
    header("Location: ".$redirect_to);
  }

}
  
function update($id, $comment, $post_id) {
  $redirect_to = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
  $obj = new MaximeSmolis\Blog\Model\CommentManager();
  $update = $obj->newComment($id, $comment);
  if($update) {
    header("Location: index.php?action=post&id=".$post_id);
  }
  else {
    throw new Exception("erreur : impossible de modifier le commentaire (controller)");
  }
}
  

