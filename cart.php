<?php
session_start();
if (!(isset($_SESSION['email']))) {
    header("Location: login.php?info=Please login first");
    exit();
} else {
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
    $discount = 0;
    $tr = "";


    $stmt = $post->read_cart($customer_id);

    $num = $stmt->rowCount();

    if ($num > 0) {
        $_SESSION['num_of_item'] = $num;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $select_design_id = $row['select_design_id'];
            $product_id = $row['product_id'];
            $cart_id = $row['cart_id'];
            $stmtp = $post->read_product_id($product_id);

            $product_row = $stmtp->fetch(PDO::FETCH_ASSOC);

            $name_ = $product_row['name'];
            $pic_one = $product_row['pic_one'];
            $discounted_price = $product_row['discounted_price'];
            $price = $product_row['price'];

            $name_arr = explode("_",$name_);
            $name = implode(" ",$name_arr);

            $discounted_subtotal += $discounted_price;
            $subtotal += $price;

            $tr .= "
                    <tr>
                        <td class=\"thumbnail-img\">
                            <a href=\"#\">
                                <img class=\"img-fluid\" src=\"$pic_one\" >
                            </a>
                        </td>
                        <td class=\"name-pr\">
                            <a href=\"#\">
                                $name
                            </a>
                        </td>
                        
                        <td class=\"total-pr\">
                            <p>₹ $price</p>
                        </td>
                        <td class=\"remove-pr\">
                            <form action=\"php/cart.inc.php\" method=\"post\">
                                <input type=\"hidden\" name=\"cart_id\" value=\"$cart_id\">
                                <button type=\"submit\" name=\"remove\"><i class=\"fas fa-times\"></i></button>
                            </form>
                        </td>
                    </tr>";
        }
        $discount = $subtotal - $discounted_subtotal;
    }

?>
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $tr ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
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
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="customer_address.php" class="ml-auto btn hvr-hover">Place Order</a> </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->


<?php

    include 'footer.php';
}
?>