<?php
include 'header.php';
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
}
  ?>
  
  <div class="container">
      <div class="row my-5">
        <div class="col-lg-2 col-sm-2"></div>
        <div class="col-sm-8 col-lg-8 mb-8">
          <div class="title-left">
            <h3>Create account</h3>
          </div>
          <form id="formLogin" method="post" action="php/register.inc.php">
            <div class="form-row">
              <div class="col-md-2"></div>
              <div class="form-group col-md-8">
                <label for="InputEmail" class="mb-0">Full name*</label>
                <input type="text" class="form-control" placeholder="Enter name" name="full_name" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-1"></div>
              <div class="form-group col-md-5">
                <label for="InputEmail" class="mb-0">Year of Birth*</label>
                <input type="text" class="form-control" placeholder="Enter year of birth" name="dob" required>
              </div>
              <div class="form-group col-md-5">
                <label for="InputEmail" class="mb-0">Gender*</label>
                <input type="text" class="form-control" placeholder="Enter gender" name="gender" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-2"></div>
              <div class="form-group col-md-8">
                <label for="InputEmail" class="mb-0">Phone Number*</label>
                <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-2"></div>
              <div class="form-group col-md-8">
                <label for="InputEmail" class="mb-0">Email Address*</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-2"></div>
              <div class="form-group col-md-8">
                <label for="InputPassword" class="mb-0">Password*</label>
                <input type="password" class="form-control" placeholder="Password" name="password" required>
              </div>
            </div>
            <?php
            if (isset($product_id)) {
              echo "<input type=\"hidden\" name=\"product_id\" value=\"$product_id\">";
            }
            ?>
            <div class="text-center">
              <button type="submit" class="btn hvr-hover btn-lg" name="register_btn">Login</button>
            </div>
          </form>
          <br>
          <hr class="mb-1">
          <div class="text-center">
            <br>
            <h2>Already a user? <a href="login.php"> Login</a></h2>
          </div>
        </div>
      </div>
    </div>


  <?php
include 'footer.php';
  ?>
  
