<?php
namespace MaximeSmolis\Blog\Model;

require_once("model/Manager.php");



class PostManager extends Manager {


  public function getPosts() {

    $db = $this->dbConnect();
    $req = $db->query("SELECT * FROM posts");
    return $req;
  
  }
  
  
  public function getPost($id) {
  
    $db = $this->dbConnect();
    $post = $db->prepare("SELECT * FROM posts WHERE id = :id ");
    $post->execute(array("id" => $id));
    return $post;
  
  }

  


}