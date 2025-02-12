<?php
session_start();

if(isset($_POST['place_order'])){

    include_once 'db.php';
    include_once 'function.php';
      // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();
  
    // Instantiate post object
    $post = new Post($db);


    $customer_id = $_SESSION['customer_id'];
    $customer_address_id = $_SESSION['customer_address_id'];
    $measurement_id = $_SESSION['measurement_id'];
    $num_of_product = $_POST['num_of_product'];
    $discounted_total = 0;
    $order_id = $post->insert_order($customer_id,$customer_address_id,$measurement_id,$num_of_product);

    $stmt = $post->read_cart($customer_id);

        $num = $stmt->rowCount();

        if($num > 0) {
        
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $select_design_id = $row['select_design_id'];
                $product_id = $row['product_id'];
                $cart_id = $row['cart_id'];
                
                if($post->insert_ordered_product($order_id,$product_id,$select_design_id)){

                    $stmtp = $post->read_product_id($product_id);

                    $product_row = $stmtp->fetch(PDO::FETCH_ASSOC);

                    $discounted_price = $product_row['discounted_price'];

                    $discounted_total += $discounted_price;
                }
                else{
                    die();
                }
                
            
            }
        }

        $query = 'DELETE FROM cart WHERE customer_id = :customer_id';
  
          $stmtc = $db->prepare($query);
        
        $stmtc->bindParam(':customer_id', $customer_id);
        
        if($stmtc->execute()) {

          $_SESSION['num_of_item']=0;
            header("Location: ../index.php?message=order placed soon you will be contacted");
        }
        else{
          header("Location: ../order.php?error=notdeleted");
        }

}
else{
  header("Location: ../index.php?error=accessdenied");
      exit();
}