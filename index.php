
    <?php
    require("public/errorDisplay.php");
    require("controller/controller.php");
try 
{

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "listPosts") {
            listPosts();
        }
        elseif ($_GET["action"] == "post") {
            if(isset($_GET["id"]) && $_GET["id"] > 0) {
                post();
            }
            else {
                throw new Exception ("erreur 404".$_GET["id"]);
            }
        }
        
        elseif($_GET["action"] == "comment") {
            if(isset($_GET["id"]) && $_GET["id"] > 0 ) {
                comment();
            }
            else {
                throw new Exception ("impossible d'afficher, ce commentaire n'existe pas.");
            }
        }
        elseif ($_GET["action"] == "add") {
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET["id"], $_POST["author"], $_POST["comment"]); 
                }
                else {
                    throw new Exception("erreur :  tous les champs ne sont pas rempli");
                }
            }
            else {
                throw new Exception ("erreur");
            }
        }
        elseif($_GET["action"] == "modifyComment") {
            if(isset($_GET["id"]) && !empty($_POST["newComment"])) {
              update($_GET["id"], $_POST["newComment"]);
            }  
            else {
                throw new Exception("erreur index 12345");
            }
        }
        elseif($_GET["action"] == "delete") {
            
            deleteComment();
        }
        
    }
    else {
        listPosts();
    }

}
catch(Exception $e) 
{
    $errorMessage = $e->getMessage();
    require("view/errorView.php");
}
    
    


