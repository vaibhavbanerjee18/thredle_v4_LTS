<?php
session_start();
if (!(isset($_SESSION['email']))) {
    header("Location: login.php");
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
    $previous_address = "";

    $stmt = $post->read_customer_address($customer_id);

    $num = $stmt->rowCount();

    if ($num > 0) {

        $result = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $row);
        }
        $arrlength = count($result);
        //print_r($result);

        for ($i = 0; $i < $arrlength; $i++) {

            $customer_address_id = $result[$i]['customer_address_id'];
            $billing_name = $result[$i]['billing_name'];
            $billing_phone_number = $result[$i]['billing_phone_number'];
            $address = $result[$i]['address'];
            $landmark = $result[$i]['landmark'];
            $city = $result[$i]['city'];
            $zipcode = $result[$i]['zipcode'];

            $previous_address .= "
            
            <div class=\"contact-info-left\">
                        <h2>Select from previous addresses</h2>
                        <p>Name: $billing_name </p>
                        <ul>
                            <li>
                                <p><i class=\"fas fa-map-marker-alt\"></i>Address: $address,<br> $city </p>
                            </li>
                            <li>
                                <p><i class=\"fas fa-phone-square\"></i>Phone: <a href=\"#\">$billing_phone_number</a></p>
                            </li>
                        </ul>
                        <div class=\"row\">
                                <div class=\"col-md-6 mb-3\">
                                <form action=\"php/add_customer_address.inc.php\" method=\"post\">
                                    <input type=\"hidden\" name = \"select_address\" value=\" $customer_address_id \">
                                    <button class=\"btn hvr-hover\" type=\"submit\" name=\"select_address_btn\">Select this address</button>
                                </form>
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                <form action=\"php/add_customer_address.inc.php\" method=\"post\">
                                    <input type=\"hidden\" name = \"delete_address\" value=\" $customer_address_id \">
                                    <button class=\"btn hvr-hover\" type=\"submit\" name=\"delete_address_btn\">Delete this address</button>
                                </form>
                                </div>
                        </div>
                    </div>
                    <br>
            
            ";
        }
    }
?>

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">

                    <?php
                    if ($previous_address == "") {
                        echo "
                            <div class=\"contact-info-left\">
                        <h2>Currently you do not have any saved address!</h2>
                                </div>
                        
                    ";
                    } else {
                        echo $previous_address;
                    }
                    ?>

                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Add new address</h3>
                        </div>
                        <form action="php/add_customer_address.inc.php" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="username">Full Name for Billing *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="billing_name" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your name is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Phone Number*</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="billing_phone_number" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your phone number is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" name="address" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Landmark</label>
                                <input type="text" class="form-control" name="landmark">
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">City *</label>
                                    <input type="text" class="form-control" name="city" required>
                                    <div class="invalid-feedback"> Please enter your city. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State *</label>
                                    <input type="text" class="form-control" name="state" required>
                                    <div class="invalid-feedback"> Please enter your state. </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip *</label>
                                    <input type="text" class="form-control" name="zipcode" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>
                            <button class="btn hvr-hover" type="submit" name="add_address">Select new address</button>
                        </form>
                        <hr class="mb-4">
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