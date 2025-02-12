<?php
session_start();

if(isset($_POST['add_measurement'])){

    include_once 'db.php';
    include_once 'function.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate post object
  $post = new Post($db);

  $measurement_table = 'measurement';
  $customer_id = $_SESSION['customer_id'];

  $upper_arm   =    $_POST["upper_arm"];
  $bust   =    $_POST["bust"];
  $chest   =    $_POST["chest"];
  $waist   =    $_POST["waist"];
  $hip   =    $_POST["hip"];
  $upper_thigh   =    $_POST["upper_thigh"];
  $shoulder   =    $_POST["shoulder"];
  $leg_length   =    $_POST["leg_length"];
  $body_length   =    $_POST["body_length"];
  $comment   =    $_POST["comment"];

  $query = 'INSERT INTO ' . $measurement_table . ' SET upper_arm = :upper_arm, bust = :bust
            ,chest = :chest, waist = :waist, hip = :hip, shoulder = :shoulder
            ,leg_length = :leg_length, body_length = :body_length, comment = :comment
            , upper_thigh = :upper_thigh, customer_id = :customer_id';
  
          $stmt = $db->prepare($query);
        
        $stmt->bindParam(':upper_arm', $upper_arm);
        $stmt->bindParam(':bust', $bust);
        $stmt->bindParam(':chest', $chest);
        $stmt->bindParam(':waist', $waist);
        $stmt->bindParam(':hip', $hip);
        $stmt->bindParam(':leg_length', $leg_length);
        $stmt->bindParam(':body_length', $body_length);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':upper_thigh', $upper_thigh);
        $stmt->bindParam(':shoulder', $shoulder);
        $stmt->bindParam(':customer_id', $customer_id);
        
        if($stmt->execute()) {

            $measurement_id = $db->lastInsertId();
            $_SESSION['measurement_id'] = $measurement_id;
            header("Location: ../order.php");
        }
        else{
          header("Location: ../customer_address.php?error=notadded");
        }
}
elseif(isset($_POST['select_measurement_btn'])){

    $measurement_id   =    $_POST["select_measurement"];
    $_SESSION['measurement_id'] = $measurement_id;
    header("Location: ../order.php");

}
elseif(isset($_POST['delete_measurement_btn'])){

    include_once 'db.php';
  include_once 'function.php';

// Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

// Instantiate post object
    $post = new Post($db);

    $measurement_table = 'measurement';
    $measurement_id   =    $_POST["delete_measurement"];

    $query = 'DELETE FROM ' . $measurement_table . ' WHERE measurement_id = :measurement_id';
  
          $stmt = $db->prepare($query);
        
        $stmt->bindParam(':measurement_id', $measurement_id);
        
        if($stmt->execute()) {

            header("Location: ../measurement.php?message=Deleted");
        }
        else{
          header("Location: ../measurement_id.php?error=notdeleted");
        }
    
}
elseif(isset($_POST['provide_cloth_btn'])){

    $provide_cloth   =    $_POST["provide_cloth"];
    $_SESSION['measurement_id'] = $measurement_id;
    header("Location: ../order.php");
}
else{
  header("Location: ../customer_address.php?error=address not selected");
      exit();
}