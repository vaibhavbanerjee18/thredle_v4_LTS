<?php
if (isset($_POST['login-submit'])) {
  include_once 'db.php';
  include_once 'function.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  $email   =    $_POST["email"];
  $password   =    $_POST["password"];
  $product_id = $_POST['product_id'];

  $query = 'SELECT * FROM customer WHERE email = ? LIMIT 0,1';

  $stmt = $db->prepare($query);

  $stmt->bindParam(1, $email);

  if ($stmt->execute()) 
  {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $pwdcheck = password_verify($password, $row['password']);

    if ($pwdcheck == false) 
    {
      header("Location: ../login.php?error=wrrongpass");
    } 
    elseif ($pwdcheck == true) 
    {

      //valid user
      session_start();
      $_SESSION['customer_id'] = $row['customer_id'];
      $_SESSION['email'] = $row['email'];

      if(isset($product_id)){
        header("Location: ../default-design.php?product_id=$product_id&&message=login successfull");
        // echo $product_id;
      }
      else{
        header("Location: ../index.php?message=loggedin");
      }
    } 
    else 
    {
      header("Location: ../login.php?error=wrrongpass");
    }
  } 
  else
  {
    header("Location: ../login.php?error=error");
  }
} 
else 
{
  header("Location: ../index.php?error=accessdenied");
  exit();
}
