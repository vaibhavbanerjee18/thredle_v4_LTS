<?php
session_start();
if (!(isset($_SESSION['email'])))
{
  header("Location: login.php?info=Please Login First");
  exit();
}
else
{
  include 'header.php';
  include_once 'php/db.php';
  include_once 'php/function.php';


  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate post object
  $post = new Post($db);

  $customer_id = $_SESSION['customer_id'];
  $subtotal = 0;
  $discounted_subtotal = 0;

  $stmt = $post->read_cart($customer_id);

        $num = $stmt->rowCount();
        $arr_of_product = array();

        if($num > 0) {
        
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $product_id = $row['product_id'];
                $cart_id = $row['cart_id'];

                //check correct number of product
                array_push($arr_of_product,$product_id);

                $stmtp = $post->read_product_id($product_id);

                $product_row = $stmtp->fetch(PDO::FETCH_ASSOC);

                $discounted_price = $product_row['discounted_price'];
                $price = $product_row['price'];

                $discounted_subtotal += $discounted_price;
                $subtotal += $price;

            }
            $num_of_product = count($arr_of_product);
            $discount = $subtotal - $discounted_subtotal;
        }

?>



    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="order-box">
                            <hr class="mb-4">
                            <form action="php/order.inc.php" method="post">
                                <div class="title"> <span>Payment</span> </div>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="cod" type="radio" class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="credit">Chash on deleviry(COD)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="gpay" type="radio" class="custom-control-input">
                                        <label class="custom-control-label" for="debit">Gpay</label>
                                    </div>
                                </div>

                                <hr class="mb-1">
                                    <div class="title-left">
                                        <h3>Your order</h3>
                                    </div>
                                    <div class="d-flex">
                                        <h4>Sub Total</h4>
                                        <div class="ml-auto font-weight-bold"> ₹ <?php echo $subtotal ?> </div>
                                    </div>
                                    <div class="d-flex">
                                        <h4>Discount</h4>
                                        <div class="ml-auto font-weight-bold"> ₹ <?php echo $discount ?> </div>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex">
                                        <h4>Coupon Discount</h4>
                                        <div class="ml-auto font-weight-bold"> ₹ 0 </div>
                                    </div>
                                    <div class="d-flex">
                                        <h4>Tax</h4>
                                        <div class="ml-auto font-weight-bold"> ₹ 0 </div>
                                    </div>
                                    <div class="d-flex">
                                        <h4>Shipping Cost</h4>
                                        <div class="ml-auto font-weight-bold"> Free </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex gr-total">
                                        <h5>Grand Total</h5>
                                        <div class="ml-auto h5"> ₹ <?php echo $discounted_subtotal ?> </div>
                                    </div>
                                    <hr> 
                                    <input name="num_of_product" type="hidden" value="<?php echo $num_of_product ?>">
                                    <button class="btn hvr-hover" type="submit" name="place_order">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- End Cart -->



    
<?php

    include 'footer.php';
    }
?>
