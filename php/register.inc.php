<?php
if (isset($_POST['register_btn'])) {

  include_once 'db.php';
  include_once 'function.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $full_name = $_POST["full_name"];
  $dob   =    $_POST["dob"];
  $gender = $_POST["gender"];
  $phone_number   =    $_POST["phone_number"];
  $email   =    $_POST["email"];
  $password   =    $_POST["password"];

  $product_id = $_POST['product_id'];

  $query = 'SELECT email FROM customer WHERE email = :email';

  $stmt = $db->prepare($query);

  $email = htmlspecialchars(strip_tags($email));

  $stmt->bindParam(':email', $email);

  $stmt->execute();

  $count = $stmt->rowCount();

  if ($count > 0) 
  {
    header("Location: ../register.php?error=Email already Exisits");
  } 
  else 
  {

    $query = 'INSERT INTO customer SET full_name = :full_name, dob = :dob, gender = :gender, phone_number= :phone_number,
        email = :email, password = :password';
    $stmt = $db->prepare($query);
    // Clean data
    $full_name = htmlspecialchars(strip_tags($full_name));
    $dob = htmlspecialchars(strip_tags($dob));
    $gender = htmlspecialchars(strip_tags($gender));
    $phone_number = htmlspecialchars(strip_tags($phone_number));
    $email = htmlspecialchars(strip_tags($email));
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    // Bind data
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPwd);

    if ($stmt->execute()) {
      //valid user
      session_start();
      $customer_id = $db->lastInsertId();
      $_SESSION['customer_id'] = $customer_id;
      $_SESSION['email'] = $email;

      if(isset($product_id)){
        header("Location: ../default-design.php?product_id=$product_id&&message=login successfull");
      }
      else{
        header("Location: ../index.php?message=loggedin");
      }
    } 
    else 
    {
      printf("Error: %s.\n", $stmt->error);
      header("Location: ../register.php?error=error");
    }
  }
} 
else 
{
  header("Location: ../index.php");
}
