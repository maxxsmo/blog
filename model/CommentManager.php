<?php

namespace MaximeSmolis\Blog\Model;
require("public/errorDisplay.php");
require_once("model/Manager.php");



class CommentManager extends Manager {

  public function getComments($id) {

    $db = $this->dbConnect();
    $comment = $db->prepare("SELECT id, author, comment, DATE_FORMAT(comment_date, 'le %d/%m/%Y à %Hh %imin %ss') AS date FROM comments WHERE post_id = :id");
    $comment->execute(array("id" => $id));
    return $comment;
  
  }
  
  public function postComment($postId, $author, $comment) {
  
    $db = $this->dbConnect();
    $newComment = $db->prepare("INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())");
    $newComment->execute(array($postId, $author, $comment));
    return $newComment;
  
  }

  public function commentToDelete($id) {
    $db = $this->dbConnect();
    $toDelete = $db->prepare("DELETE FROM comments where id = :id");
    $toDelete->execute(array("id" => $id));
    return $toDelete;
  }

  public function getComment($id) { 
    $db= $this->dbConnect();
    $comment = $db->prepare("SELECT * FROM comments where id = ?");
    $comment->execute(array($id));
    return $comment;
  }

  public function newComment($id, $comment) {
    $db = $this->dbConnect();
    $update = $db->prepare("UPDATE comments SET comment = :comment, comment_date = NOW() WHERE id = :id");
    $update->execute(array("comment" => $comment, "id" => $id));
    return $update;
  }
  

}