<?php
session_start();
if (isset($_SESSION['customer_id'])) {
  header("Location: index.php?message=loggedin");
} else {
  include 'header.php';
  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
  }

?>
  </body>
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-2 col-sm-2"></div>
      <div class="col-sm-8 col-lg-8 mb-8">
        <div class="title-left">
          <h3>Account Login</h3>
        </div>
        <form id="formLogin" method="post" action="php/login.inc.php">
          <div class="form-row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
              <label for="InputEmail" class="mb-0">Email Address</label>
              <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-2"></div>
            <div class="form-group col-md-8">
              <label for="InputPassword" class="mb-0">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
          </div>
          <?php
          if (isset($product_id)) {
            echo "<input type=\"hidden\" name=\"product_id\" value=" . $product_id . ">";
          }
          ?>
          <div class="text-center">
            <button type="submit" class="btn hvr-hover btn-lg" name="login-submit">Login</button>
          </div>
        </form>
        <br>
        <hr class="mb-1">
        <div class="text-center">
          <br>
          <?php
          if (isset($product_id)) {
            echo "<h2>Not a user? <a href=\"register.php?product_id=" . $product_id . "\"> Create account</a></h2>";
          } else {
            echo "<h2>Not a user? <a href=\"register.php\"> Create account</a></h2>";
          }

          ?>
        </div>
      </div>
    </div>
  </div>

<?php
  include 'footer.php';
}
?>