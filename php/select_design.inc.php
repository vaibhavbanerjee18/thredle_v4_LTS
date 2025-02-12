<?php
session_start();
include_once 'db.php';
include_once 'function.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate post object
$post = new Post($db);

$select_design_table = 'select_design';
$product_id = $_POST["product_id"];
$front_neck_design   =    isset($_POST["front_neck_design"]) ? $_POST["front_neck_design"]:$post->upload_img($_FILES['front_neck_design_upload'],$product_id) ;
$front_neck_depth   =    $_POST["front_neck_depth"];
$back_neck_design   =    isset($_POST["back_neck_design"]) ? $_POST["back_neck_design"]:$post->upload_img($_FILES['back_neck_design_upload'],$product_id) ;
$back_neck_depth   =    $_POST["back_neck_depth"];
$sleeve_design = isset($_POST["sleeve_design"]) ? $_POST["sleeve_design"]:$post->upload_img($_FILES['sleeve_design_upload'],$product_id);
$sleeve_length   =    $_POST["sleeve_length"];
$fastening   =    isset($_POST["fastening"]) ? $_POST["fastening"]:$post->upload_img($_FILES['fastening_upload'],$product_id);
$addon = isset($_POST["addon"]) ? $_POST["addon"]:$post->upload_img($_FILES['addon_upload'],$product_id);
$bottom_type =  isset($_POST["bottom_type"]) ? $_POST["bottom_type"]:$post->upload_img($_FILES['bottom_type_upload'],$product_id);
$bottom_length   =    $_POST["bottom_length"];
$other_detail   =    $_POST["other_detail"];
$product_id = $_POST["product_id"];
$customer_id = $_SESSION['customer_id'];

$query = "INSERT INTO select_design (front_neck_design, front_neck_depth ,back_neck_design, back_neck_depth, sleeve_length,sleeve_design
            , fastening, addon, bottom_type,bottom_length, other_detail, product_id, customer_id) VALUES ('$front_neck_design','$front_neck_depth',
            '$back_neck_design', '$back_neck_depth', '$sleeve_length', '$sleeve_design','$fastening', '$addon', '$bottom_type', '$bottom_length', '$other_detail',
            '$product_id','$customer_id')";

$stmt = $db->prepare($query);



// if (isset($_POST["front_neck_design"])) {
//   $front_neck_design   =   $_POST["front_neck_design"];
// } else {

//   $file = $_FILES['front_neck_design_upload'];
//   // print_r($file);
//   $front_neck_design =$post->upload_img($file);

// }

// $query = 'INSERT INTO ' . $select_design_table . ' SET front_neck_design = :front_neck_design, front_neck_depth = :front_neck_depth
//           ,back_neck_design = :back_neck_design, back_neck_depth = :back_neck_depth, sleeve_length = :sleeve_length
//           , fastening = :fastening, addon = :addon, bottom_type = :bottom_type, other_detail: other_detail
//           , product_id: product_id, customer_id: customer_id';

// $stmt->bindParam(':front_neck_design', $front_neck_design);
// $stmt->bindParam(':front_neck_depth', $front_neck_depth);
// $stmt->bindParam(':back_neck_design', $back_neck_design);
// $stmt->bindParam(':back_neck_depth', $back_neck_depth);
// $stmt->bindParam(':sleeve_length', $sleeve_length);
// $stmt->bindParam(':fastening', $fastening);
// $stmt->bindParam(':addon', $addon);
// $stmt->bindParam(':bottom_type', $bottom_type);
// $stmt->bindParam(':other_detail', $other_detail);
// $stmt->bindParam(':product_id', $product_id);
// $stmt->bindParam(':customer_id', $customer_id);

if ($stmt->execute()) {

  $select_design_id = $db->lastInsertId();

  if ($add_cart = $post->add_cart($product_id, $customer_id, $select_design_id)) {

    header("Location: ../cart.php?message=item added");
  }
} else {
  header("Location: ../default_design.php?error=item not added");
}
