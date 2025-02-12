<?php
class Post
{
  private $conn;
  private $product_table = 'product';
  private $default_design_table = 'default_design';
  private $select_design_table = 'select_design';
  private $cart_table = 'cart';
  private $customer_address_table = 'customer_address';
  private $measurement_table = 'measurement';
  private $customer_order_table = 'customer_order';
  private $ordered_product_table = 'ordered_product';

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get Posts
  public function read_product($name)
  {

    // Create query
    $query = 'SELECT * FROM ' . $this->product_table . ' WHERE name = ? LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $name);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_product_id($product_id)
  {

    // Create query
    $query = 'SELECT * FROM ' . $this->product_table . ' WHERE product_id = ?';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $product_id);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_default_design($product_id)
  {

    // Create query
    $query = 'SELECT * FROM ' . $this->default_design_table . ' WHERE product_id = ?';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $product_id);

    // Execute query
    if ($stmt->execute()) {
      return $stmt;
    } else {
      echo 'error';
      die();
    }
  }

  public function add_cart($product_id, $customer_id, $select_design_id)
  {

    $query = 'INSERT INTO ' . $this->cart_table . ' SET product_id = :product_id, customer_id = :customer_id,select_design_id = :select_design_id';
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':select_design_id', $select_design_id);

    if ($stmt->execute()) {
      return true;
    } else {
      header("Location: ../index.php?error=item can't be added");
    }
  }

  public function read_cart($customer_id)
  {

    $query = 'SELECT * FROM ' . $this->cart_table . ' WHERE customer_id = ?';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $customer_id);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_customer_address($customer_id)
  {

    // Create query
    $query = 'SELECT * FROM ' . $this->customer_address_table . ' WHERE customer_id = ?';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $customer_id);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_address_id($customer_id)
  {
    // Create query
    $query = 'SELECT * FROM ' . $this->customer_address_table . ' WHERE customer_id = ? LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $customer_id);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_measurement($customer_id)
  {
    // Create query
    $query = 'SELECT * FROM ' . $this->measurement_table . ' WHERE customer_id = ?';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $customer_id);

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function insert_order($customer_id, $customer_address_id, $measurement_id, $num_of_product)
  {

    $query = 'INSERT INTO ' . $this->customer_order_table . ' SET customer_id = :customer_id, address_id = :customer_address_id
            ,measurement_id = :measurement_id, num_of_product = :num_of_product';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':customer_address_id', $customer_address_id);
    $stmt->bindParam(':measurement_id', $measurement_id);
    $stmt->bindParam(':num_of_product', $num_of_product);

    if ($stmt->execute()) {

      $order_id = $this->conn->lastInsertId();
      return $order_id;
    }
  }

  public function insert_ordered_product($order_id, $product_id, $select_design_id)
  {

    $query = 'INSERT INTO ' . $this->ordered_product_table . ' SET order_id = :order_id, product_id = :product_id
            ,select_design_id = :select_design_id';

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':order_id', $order_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':select_design_id', $select_design_id);

    if ($stmt->execute()) {
      return true;
    }
  }

  public function upload_img($file,$product_id)
  {
    // print_r($file);
    $file_name = $file['name'];
    $file_temp_name = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];

    $file_e = explode('.', $file_name);
    $file_ext = strtolower(end($file_e));

    $allowed_ext = array('jpg', 'jpeg', 'png');

    if (in_array($file_ext, $allowed_ext)) {
      if ($file_error === 0) {
        if ($file_size < 215161) {
          //upload
          $new_file_name = uniqid('', true) . "." . $file_ext;
          $file_dest = __DIR__."/../images/product/uploads/" . $new_file_name;
          // echo $file_dest;
          if(move_uploaded_file($file_temp_name, $file_dest)){
            return $file_dest;
          }
          else{
            header("Location: ../default-design.php?product_id=".$product_id."&&error=unable set DIR");
          }
          
        } else {
          header("Location: ../default-design.php?product_id=".$product_id."&&error=file to big");
        }
      } else {
        header("Location: ../default-design.php?product_id=".$product_id."&&error=error in uploading file");
      }
    } else {
      header("Location: ../default-design.php?product_id=".$product_id."&&error=wrong type of file");
    }
  }
}
