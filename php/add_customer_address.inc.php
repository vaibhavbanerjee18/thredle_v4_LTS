<?php
session_start();

if(isset($_POST['add_address'])){

    include_once 'db.php';
    include_once 'function.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate post object
  $post = new Post($db);

  $customer_address_table = 'customer_address';
  $customer_id = $_SESSION['customer_id'];

  $billing_name   =    $_POST["billing_name"];
  $address   =    $_POST["address"];
  $landmark   =    $_POST["landmark"];
  $city   =    $_POST["city"];
  $state   =    $_POST["state"];
  $zipcode   =    $_POST["zipcode"];
  $billing_phone_number   =    $_POST["billing_phone_number"];

  $query = 'INSERT INTO ' . $customer_address_table . ' SET billing_name = :billing_name, address = :address
            ,landmark = :landmark, city = :city, state = :state, billing_phone_number = :billing_phone_number
            , zipcode = :zipcode, customer_id = :customer_id';
  
          $stmt = $db->prepare($query);
        
        $stmt->bindParam(':billing_name', $billing_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':landmark', $landmark);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':zipcode', $zipcode);
        $stmt->bindParam(':billing_phone_number', $billing_phone_number);
        $stmt->bindParam(':customer_id', $customer_id);
        
        if($stmt->execute()) {

            $customer_address_id = $db->lastInsertId();
            $_SESSION['customer_address_id'] = $customer_address_id;
            header("Location: ../measurement.php");
        }
        else{
          header("Location: ../customer_address.php?error=notadded");
        }

}
elseif(isset($_POST['select_address_btn'])){

    $customer_address_id   =    $_POST["select_address"];
    $_SESSION['customer_address_id'] = $customer_address_id;
    header("Location: ../measurement.php");

}
elseif(isset($_POST['delete_address_btn'])){

  include_once 'db.php';
  include_once 'function.php';

// Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

// Instantiate post object
    $post = new Post($db);

    $customer_address_table = 'customer_address';
    $customer_address_id   =    $_POST["delete_address"];

    $query = 'DELETE FROM ' . $customer_address_table . ' WHERE customer_address_id = :customer_address_id';
  
          $stmt = $db->prepare($query);
        
        $stmt->bindParam(':customer_address_id', $customer_address_id);
        
        if($stmt->execute()) {

            header("Location: ../customer_address.php?message=Deleted");
        }
        else{
          header("Location: ../customer_address.php?error=notdeleted");
        }
}
else{
  header("Location: ../customer_address.php?error=accessdenied");
      exit();
}