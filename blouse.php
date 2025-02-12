<?php
include 'includes/header.php';
?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Order Detail</h2>
                    <ul class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="#"></a></li> -->
                        <li class="breadcrumb-item active">Order Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="images/blouse/blouse-01.jpg" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/blouse/blouse-02.jpg" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/blouse/blouse-03.jpg" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="images/blouse/blouse-01.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="images/blouse/blouse-02.jpg" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="images/blouse/blouse-03.jpg" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>Blouse</h2>
                        <h5> <del>Rs 399</del>Rs 299</h5>
                            <p>
                                <h4>Short Description:</h4>
                                <p>Nam sagittis a augue eget scelerisque. Nullam lacinia consectetur sagittis. Nam sed neque id eros fermentum dignissim quis at tortor. Nullam ultricies urna quis sem sagittis pharetra. Nam erat turpis, cursus in ipsum at,
                                    tempor imperdiet metus. In interdum id nulla tristique accumsan. Ut semper in quam nec pretium. Donec egestas finibus suscipit. Curabitur tincidunt convallis arcu. </p>
                                
                                    
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                </div>
            </div>

            <br><br><br><br>
            <form action="php/stepform.php" method="post" id="register_form">
                    <ul class="nav nav-tabs">
                     <li class="nav-item">
                      <a class="nav-link active_tab1"   id="list_blouse_front" style="border:1px solid #ccc">Front Neck</a>
                     </li>
                     <li class="nav-item">
                      <a class="nav-link inactive_tab1" id="list_blouse_back" style="border:1px solid #ccc">Back Neck</a>
                     </li>
                     <li class="nav-item">
                      <a class="nav-link inactive_tab1" id="list_blouse_sleeves" style="border:1px solid #ccc">Sleeves</a>
                     </li>
                     <li class="nav-item">
                      <a class="nav-link inactive_tab1" id="list_blouse_fastening" style="border:1px solid #ccc">Fastening</a>
                     </li>
                     <li class="nav-item">
                      <a class="nav-link inactive_tab1" id="list_blouse_addons" style="border:1px solid #ccc">Addons</a>
                     </li>
                     <li class="nav-item">
                       <a class="nav-link inactive_tab1" id="list_your_details" style="border:1px solid #ccc">Your Details</a>
                      </li>
                    </ul>

                    <div class="tab-content" style="margin-top:16px;">
                     <div class="tab-pane active" id="blouse_front">
                      <div class="panel panel-default">
                        <div class="title-all text-center">
                            <h1>Front Neck Design</h1>
                        </div>
                       <div class="panel-body">
                        <div class="form-group">
                           <select name = "blouse_front" class="image-picker show-html">
                               <option value=""></option>
                               <option data-img-src="images/blouse/front/5.jpg" value="5">  </option>
                               <option data-img-src="images/blouse/front/7.jpg" value="7">  </option>
                               <option data-img-src="images/blouse/front/9.jpg" value="9">  </option>
                               <option data-img-src="images/blouse/front/13.jpg" value="13">  </option>
                               <option data-img-src="images/blouse/front/15.jpg" value="15">  </option>
                               <option data-img-src="images/blouse/front/17.jpg" value="17">  </option>
                               <option data-img-src="images/blouse/front/19.jpg" value="19">  </option>
                               <option data-img-src="images/blouse/front/21.jpg" value="21">  </option>
                               <option data-img-src="images/blouse/front/23.jpg" value="23">  </option>
                               <option data-img-src="images/blouse/front/25.jpg" value="25">  </option>
                               <option data-img-src="images/blouse/front/27.jpg" value="27">  </option>
                               <option data-img-src="images/blouse/front/29.jpg" value="29">  </option>
                               <option data-img-src="images/blouse/front/31.jpg" value="31">  </option>
                               <option data-img-src="images/blouse/front/33.jpg" value="33">  </option>
                               <option data-img-src="images/blouse/front/35.jpg" value="35">  </option>
                           </select>
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
                            <h1>back Neck Design</h1>
                        </div>
                       <div class="panel-body">
                        <div class="form-group">
                           <select name = "blouse_back" class="image-picker show-html">
                               <option value=""></option>
                               <option data-img-src="images/blouse/back/6.jpg" value="6">  </option>
                               <option data-img-src="images/blouse/back/8.jpg" value="8">  </option>
                               <option data-img-src="images/blouse/back/10.jpg" value="10">  </option>
                               <option data-img-src="images/blouse/back/14.jpg" value="14">  </option>
                               <option data-img-src="images/blouse/back/18.jpg" value="18">  </option>
                               <option data-img-src="images/blouse/back/20.jpg" value="20">  </option>
                               <option data-img-src="images/blouse/back/22.jpg" value="22">  </option>
                               <option data-img-src="images/blouse/back/24.jpg" value="24">  </option>
                               <option data-img-src="images/blouse/back/26.jpg" value="26">  </option>
                               <option data-img-src="images/blouse/back/28.jpg" value="28">  </option>
                               <option data-img-src="images/blouse/back/30.jpg" value="30">  </option>
                               <option data-img-src="images/blouse/back/32.jpg" value="32">  </option>
                               <option data-img-src="images/blouse/back/34.jpg" value="34">  </option>
                               <option data-img-src="images/blouse/back/36.jpg" value="36">  </option>
                               <option data-img-src="images/blouse/back/38.jpg" value="38">  </option>
                           </select>          
                         </div>
                        <br />
                        <div align="center">
                         <button type="button"  id="previous_btn_blouse_back" class="btn btn-default btn-lg">Previous</button>
                         <button type="button"  id="btn_blouse_back" class="btn hvr-hover btn-lg">Next</button>
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
                           <select name = "blouse_sleeves" class="image-picker show-html">
                               <option value=""></option>
                               <option data-img-src="images/blouse/sleeves/1.png" value="1">  </option>
                               <option data-img-src="images/blouse/sleeves/2.png" value="2">  </option>
                               <option data-img-src="images/blouse/sleeves/3.png" value="3">  </option>
                               <option data-img-src="images/blouse/sleeves/4.png" value="4">  </option>
                               <option data-img-src="images/blouse/sleeves/5.png" value="5">  </option>
                               <option data-img-src="images/blouse/sleeves/6.png" value="6">  </option>
                               <option data-img-src="images/blouse/sleeves/7.png" value="7">  </option>
                               <option data-img-src="images/blouse/sleeves/8.png" value="8">  </option>
                               <option data-img-src="images/blouse/sleeves/9.png" value="9">  </option>
                           </select>   
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
                            <select name = "blouse_fastening" class="image-picker show-html">
                                <option value=""></option>
                                <option data-img-src="images/blouse/fastening/1.jpg" value="1">  </option>
                                <option data-img-src="images/blouse/fastening/2.jpg" value="2">  </option>
                                <option data-img-src="images/blouse/fastening/3.jpg" value="3">  </option>
                                <option data-img-src="images/blouse/fastening/4.jpg" value="4">  </option>
                            </select>          
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
                            <select name = "blouse_addons" multiple="multiple" class="image-picker show-html">
                                <option value=""></option>
                                <option data-img-src="images/blouse/back/6.jpg" value="6">  </option>
                                <option data-img-src="images/blouse/back/8.jpg" value="8">  </option>
                                <option data-img-src="images/blouse/back/10.jpg" value="10">  </option>
                                <option data-img-src="images/blouse/back/14.jpg" value="14">  </option>
                            </select>          
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
                        <div class="title-all text-center">
                            <h1>Your Details</h1>
                        </div>
                        <div class="panel-body">
                           <div class="form-group">
                               <label>Name</label>
                               <input type="text" name="name" id="name" class="form-control" />
                               <span id="error_name" class="text-danger"></span>
                           </div>
                           <div class="form-group">
                               <label>Enter Mobile No.</label>
                               <input type="text" name="mobile_no" id="mobile_no" class="form-control" />
                               <span id="error_mobile_no" class="text-danger"></span>
                           </div>
                          <div class="form-group">
                           <label>Enter Email Address</label>
                           <input type="text" name="email" id="email" class="form-control" />
                           <span id="error_email" class="text-danger"></span>
                          </div>
                          <div class="form-group">
                           <label>Full Address</label>
                           <textarea name="address" id="address" class="form-control"></textarea>
                           <span id="error_address" class="text-danger"></span>
                          </div>
                          <div class="form-group">
                           <label>Land Mark</label>
                           <textarea name="land_mark" id="land_mark" class="form-control"></textarea>
                           <span id="error_land_mark" class="text-danger"></span>
                          </div>
                          <div class="form-group">
                           <label>Pin Code</label>
                           <textarea name="pin_code" id="pin_code" class="form-control"></textarea>
                           <span id="error_pin_code" class="text-danger"></span>
                          </div>
                          <div class="form-group">
                           <label>City</label>
                           <textarea name="city" id="city" class="form-control"></textarea>
                           <span id="error_city" class="text-danger"></span>
                          </div>
                         <br />
                         <div align="center">
                           <button type="button" name="previous_btn_contact_details" id="previous_btn_your_details" class="btn btn-default btn-lg">Previous</button>
                           <button type="submit" name="btn_contact_details" id="btn_your_details" class="btn btn-success btn-lg">Order Now</button>
                         </div>
                         <br />
                        </div>
                       </div>
                      </div>
   
                    </div>
            </form>

            
            </div>
                   
            </div>

        </div>

    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->

    <?php
include 'includes/footer.php';
?>