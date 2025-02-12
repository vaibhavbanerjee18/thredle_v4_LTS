<?php
session_start();

if(isset($_POST['remove'])){

    include_once 'db.php';
    include_once 'function.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate post object
  $post = new Post($db);

  $cart_table = 'cart';
  $customer_id = $_SESSION['customer_id'];

  $cart_id   =    $_POST["cart_id"];
  
  $query = 'DELETE FROM ' . $cart_table . ' WHERE cart_id = :cart_id';
  
          $stmt = $db->prepare($query);
        
        $stmt->bindParam(':cart_id', $cart_id);
        
        if($stmt->execute()) {

            header("Location: ../cart.php?message=item deleted");
        }
        else{
          header("Location: ../cart.php?error=not deleted");
        }

}
else{
  header("Location: ../cart.php?error=accessdenied");
      exit();
}