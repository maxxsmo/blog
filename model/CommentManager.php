<?php

namespace MaximeSmolis\Blog\Model;

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

  

}