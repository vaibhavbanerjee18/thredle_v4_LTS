<?php
session_start();
if (!(isset($_SESSION['customer_id']))) {
  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
  }
  header("Location: login.php?product_id=$product_id&&info=Please login first");
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

  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
  }

  $stmt = $post->read_default_design($product_id);

  $num = $stmt->rowCount();

  if ($num > 0) {

    $result = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      array_push($result, $row);
    }

    //print_r($result);
    $arrlength = count($result);
    //print_r($result);

    $front = "<option value=\"\"></option>";
    $back = "<option value=\"\"></option>";
    $sleeve = "<option value=\"\"></option>";
    $fastening = "<option value=\"\"></option>";
    $addon = "<option value=\"\"></option>";

    for ($i = 0; $i < $arrlength; $i++) {

      $f = $result[$i]['front'];
      $front .= "<option data-img-src=\"$f\" value=\"$f\">  </option>";

      $b = $result[$i]['back'];
      $back .= "<option data-img-src=\"$b\" value=\"$b\">  </option>";

      $s = $result[$i]['sleeve'];
      $sleeve .= "<option data-img-src=\"$s\" value=\"$s\">  </option>";

      $fa = $result[$i]['fastening'];
      $fastening .= "<option data-img-src=\"$fa\" value=\"$fa\">  </option>";

      $a = $result[$i]['addon'];
      $addon .= "<option data-img-src=\"$a\" value=\"$a\">  </option>";
    }
  }
?>


  <div class="shop-detail-box-main">
    <div class="container">

      <form action="php/select_design.inc.php" method="post" id="register_form" enctype="multipart/form-data">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active_tab1" id="list_blouse_front" style="border:1px solid #ccc">Step 1:</a>
          </li>
          <li class="nav-item">
            <a class="nav-link inactive_tab1" id="list_blouse_back" style="border:1px solid #ccc">Step 2:</a>
          </li>
          <li class="nav-item">
            <a class="nav-link inactive_tab1" id="list_blouse_sleeves" style="border:1px solid #ccc">Step 3:</a>
          </li>
          <li class="nav-item">
            <a class="nav-link inactive_tab1" id="list_blouse_fastening" style="border:1px solid #ccc">Step 4:</a>
          </li>
          <li class="nav-item">
            <a class="nav-link inactive_tab1" id="list_blouse_addons" style="border:1px solid #ccc">Step 5:</a>
          </li>
          <li class="nav-item">
            <a class="nav-link inactive_tab1" id="list_your_details" style="border:1px solid #ccc">Step 6:</a>
          </li>
        </ul>

        <div class="tab-content" style="margin-top:16px;">
          <div class="tab-pane active" id="blouse_front">
            <div class="panel panel-default">
              <div class="title-all text-center">
                <h1>choose design for Front Neck</h1>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <select name="front_neck_design" class="image-picker show-html">"

                    <?php echo $front; ?>

                    "</select>
                </div>
                <div class="text-center title-left">
                  <br>
                  <h3>OR upload your design...</h3>
                  <br>
                </div>
                <div class="form-group">
                  <label>Upload image in (*PNG, *JPEG, *JPG) ONLY</label>
                  <input type="file" name="front_neck_design_upload" id="name" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Depth of front neck* (Please specify unit also ex. 5 inch)</label>
                  <input type="text" name="front_neck_depth" id="name" class="form-control" />
                </div>
                <br />
                <div align="center">

                  <button type="button" id="btn_blouse_front" class="btn hvr-hover btn-lg">Next</button>
                </div>
                <br />
              </div>
            </div>
          </div>

          <div class="tab-pane" id="blouse_back">
            <div class="panel panel-default">
              <div class="title-all text-center">
                <h1>choose design for back Neck </h1>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <select name="back_neck_design" class="image-picker show-html">"

                    <?php echo $back; ?>

                    "</select>
                </div>
                <div class="text-center title-left">
                  <br>
                  <h3>OR upload your design...</h3>
                  <h6>We will try to fullfill it.</h6>
                  <br>
                </div>
                <div class="form-group">
                  <label>Upload image in (*PNG, *JPEG, *JPG) ONLY</label>
                  <input type="file" name="back_neck_design_upload" id="name" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Depth of back neck (Please specify unit also ex. 5 inch)</label>
                  <input type="text" name="back_neck_depth" id="name" class="form-control" />
                  <span id="error_name" class="text-danger"></span>
                </div>
                <br />
                <div align="center">
                  <button type="button" id="previous_btn_blouse_back" class="btn btn-default btn-lg">Previous</button>
                  <button type="button" id="btn_blouse_back" class="btn hvr-hover btn-lg">Next</button>
                </div>
                <br />
              </div>
            </div>
          </div>

          <div class="tab-pane" id="blouse_sleeves">
            <div class="panel panel-default">
              <div class="title-all text-center">
                <h1>Sleeves</h1>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <select name="sleeve_design" class="image-picker show-html">"

                    <?php echo $sleeve; ?>

                    "</select>
                </div>
                <div class="text-center title-left">
                  <br>
                  <h3>OR upload your design...</h3>
                  <h6>We will try to fullfill it.</h6>
                  <br>
                </div>
                <div class="form-group">
                  <label>Upload image in (*PNG, *JPEG, *JPG) ONLY</label>
                  <input type="file" name="sleeve_design_upload" id="name" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Length of sleeve (Please specify unit also ex. 5 inch or full arm)</label>
                  <input type="text" name="sleeve_length" id="name" class="form-control" />
                </div>
                <br />
                <div align="center">
                  <button type="button" id="previous_btn_blouse_sleeves" class="btn btn-default btn-lg">Previous</button>
                  <button type="button" id="btn_blouse_sleeves" class="btn hvr-hover btn-lg">Next</button>
                </div>
                <br />
              </div>
            </div>
          </div>

          <div class="tab-pane" id="blouse_fastening">
            <div class="panel panel-default">
              <div class="title-all text-center">
                <h1>Fastening</h1>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <select name="fastening" class="image-picker show-html">"

                    <?php echo $fastening; ?>

                    "</select>
                </div>
                <div class="text-center title-left">
                  <br>
                  <h3>OR upload your design...</h3>
                  <h6>We will try to fullfill it.</h6>
                  <br>
                </div>
                <div class="form-group">
                  <label>Upload image in (*PNG, *JPEG, *JPG) ONLY</label>
                  <input type="file" name="fastening_upload" id="name" class="form-control" />
                </div>
                <br />
                <div align="center">
                  <button type="button" id="previous_btn_blouse_fastening" class="btn btn-default btn-lg">Previous</button>
                  <button type="button" id="btn_blouse_fastening" class="btn hvr-hover btn-lg">Next</button>
                </div>
                <br />
              </div>
            </div>
          </div>

          <div class="tab-pane" id="blouse_addons">
            <div class="panel panel-default">
              <div class="title-all text-center">
                <h1>Addons</h1>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <select name="addon" multiple="multiple" class="image-picker show-html">"

                    <?php echo $addon; ?>

                    "</select>
                </div>
                <div class="text-center title-left">
                  <br>
                  <h3>OR upload your design...</h3>
                  <h6>We will try to fullfill it.</h6>
                  <br>
                </div>
                <div class="form-group">
                  <label>Upload image in (*PNG, *JPEG, *JPG) ONLY</label>
                  <input type="file" name="addon_upload" id="name" class="form-control" />
                </div>
                <br />
                <div align="center">
                  <button type="button" id="previous_btn_blouse_addons" class="btn btn-default btn-lg">Previous</button>
                  <button type="button" id="btn_blouse_addons" class="btn hvr-hover btn-lg">Next</button>
                </div>
                <br />
              </div>
            </div>
          </div>
          <div class="tab-pane" id="your_details">
            <div class="panel panel-default">

              <?php if (isset($_GET['type'])) {   ?>

                <div class="title-all text-center">
                  <h1>Bottom type and Comments</h1>
                </div>
                <div class="form-group">
                  <select name="buttom_type" multiple="multiple" class="image-picker show-html">"

                    <?php echo $buttom_type; ?>

                    "</select>
                </div>
                <div class="text-center title-left">
                  <br>
                  <h3>OR upload your design...</h3>
                  <h6>We will try to fullfill it.</h6>
                  <br>
                </div>
                <div class="form-group">
                  <label>Upload image in (*PNG, *JPEG, *JPG) ONLY</label>
                  <input type="file" name="buttom_type_upload" id="name" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Length of bottom (Please specify unit also ex. 5 inch or full arm)</label>
                  <input type="text" name="sleeve_length" id="name" class="form-control" />
                </div>

              <?php } else {  ?>

                <div class="title-all text-center">
                  <h1>Comments</h1>
                  <h5>Any specific prefrence while stitching</h5>
                </div>

              <?php }   ?>

              <div class="form-group">
                <label>Other specific comments please spicify</label>
                <textarea name="other_detail" id="address" class="form-control"></textarea>
                <span id="error_address" class="text-danger"></span>
              </div>
              <br />
              <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
              <div align="center">
                <button type="button" name="previous_btn_contact_details" id="previous_btn_your_details" class="btn btn-default btn-lg">Previous</button>
                <button type="submit" class="btn btn-success btn-lg">Add to cart</button>
              </div>
              <br />
            </div>
          </div>
        </div>

    </div>
    </form>
  </div>
  </div>


<?php
  include 'footer.php';
}
?>