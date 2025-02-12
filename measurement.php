<?php
session_start();
if (!(isset($_SESSION['email']))) {
    header("Location: login.php");
    exit();
} else {
    require 'header.php';
    include_once 'php/db.php';
    include_once 'php/function.php';


    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate post object
    $post = new Post($db);
    $customer_id = $_SESSION['customer_id'];
    $previous_measurement = "";

    $stmt = $post->read_measurement($customer_id);

    $num = $stmt->rowCount();

    if ($num > 0) {

        $result = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($result, $row);
        }

        $arrlength = count($result);
        //print_r($result);

        for ($i = 0; $i < $arrlength; $i++) {

            $measurement_id = $result[$i]['measurement_id'];
            $upper_arm = $result[$i]['upper_arm'];
            $bust       = $result[$i]['bust'];
            $chest          = $result[$i]['chest'];
            $waist      = $result[$i]['waist'];
            $hip        = $result[$i]['hip'];
            $upper_thigh = $result[$i]['upper_thigh'];
            $shoulder       = $result[$i]['shoulder'];
            $leg_length     = $result[$i]['leg_length'];
            $body_length    = $result[$i]['body_length'];
            $comment        = $result[$i]['comment'];

            $previous_measurement .= "
            
            <div class=\"contact-info-left\">
                        <h2>Select from previous measurement</h2>
                        <p>upper_arm  : $upper_arm   </p>
                        <p>bust       : $bust        </p>
                        <p>chest      : $chest       </p>
                        <p>waist      : $waist       </p>
                        <p>hip        : $hip         </p>
                        <p>upper_thigh: $upper_thigh </p>
                        <p>shoulder   : $shoulder    </p>
                        <p>leg_length : $leg_length  </p>
                        <p>body_length: $body_length </p>
                        <p>comment    : $comment     </p>
                        
                        <div class=\"row\">
                                <div class=\"col-md-6 mb-3\">
                                <form action=\"php/add_measurement.inc.php\" method=\"post\">
                                    <input type=\"hidden\" name = \"select_measurement\" value=\" $measurement_id \">
                                    <button class=\"btn hvr-hover\" type=\"submit\" name=\"select_measurement_btn\">Select measurement</button>
                                </form>
                                </div>
                                <div class=\"col-md-6 mb-3\">
                                <form action=\"php/add_measurement.inc.php\" method=\"post\">
                                    <input type=\"hidden\" name = \"delete_measurement\" value=\" $measurement_id \">
                                    <button class=\"btn hvr-hover\" type=\"submit\" name=\"delete_measurement_btn\">Delete measurement</button>
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

            <div class="text-center">
                <div class="title-left">
                    <h2>Provide well fitted cloth for measurements</h2>
                    <br><br>
                    <form action="php/add_measurement.inc.php" method="post">
                        <input type="hidden" name="provide_cloth" value="0">
                        <button class="btn hvr-hover" type="submit" name="provide_cloth_btn">provide cloth</button>
                    </form>
                    <br><br>
                </div>
            </div>

            <div class="text-center title-left">
                <br>
                <h3>OR</h3>
                <br>
            </div>
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="checkout-address">
                        <div class="title-left">
                            <br>
                            <h2>Provide measurement</h2>
                            <br>
                        </div>
                        <form action="php/add_measurement.inc.php" method="post" class="needs-validation" novalidate>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">upper_arm *</label>
                                    <input type="text" class="form-control" name="upper_arm" required>
                                    <div class="invalid-feedback"> Please enter your city. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">bust *</label>
                                    <input type="text" class="form-control" name="bust" required>
                                    <div class="invalid-feedback"> Please enter your state. </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">chest *</label>
                                    <input type="text" class="form-control" name="chest" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">waist *</label>
                                    <input type="text" class="form-control" name="waist" required>
                                    <div class="invalid-feedback"> Please enter your city. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">hip *</label>
                                    <input type="text" class="form-control" name="hip" required>
                                    <div class="invalid-feedback"> Please enter your state. </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">upper_thigh *</label>
                                    <input type="text" class="form-control" name="upper_thigh" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">shoulder *</label>
                                    <input type="text" class="form-control" name="shoulder" required>
                                    <div class="invalid-feedback"> Please enter your city. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">leg length *</label>
                                    <input type="text" class="form-control" name="leg_length" required>
                                    <div class="invalid-feedback"> Please enter your state. </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">body length *</label>
                                    <input type="text" class="form-control" name="body_length" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Comments / specific instruction *</label>
                                <div class="input-group">
                                    <textarea class="form-control" rows="4" name="comment"></textarea>
                                    <div class="invalid-feedback" style="width: 100%;"> Your name is required. </div>
                                </div>
                            </div>
                            <button class="btn hvr-hover" type="submit" name="add_measurement">Select new measurement</button>
                        </form>
                        <hr class="mb-4">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">

                    <?php echo $previous_measurement; ?>
                    <?php
                    if ($previous_measurement == "") {
                        echo "
                            <div class=\"contact-info-left\">
                        <h2>Currently you do not have any saved measurement!</h2>
                                </div>
                        
                    ";
                    } else {
                        echo $previous_measurement;
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->





<?php
    include 'footer.php';
}
?>