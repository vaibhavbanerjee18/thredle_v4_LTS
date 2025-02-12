<?php
session_start();
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}

include_once 'php/db.php';
include_once 'php/function.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate post object
$post = new Post($db);

$stmt = $post->read_product($name);
$num = $stmt->rowCount();

if ($num > 0) {
    include 'header.php';
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $product_id =       $row['product_id'];
    $name_ =             $row['name'];
    $description =      $row['description'];
    $price =            $row['price'];
    $discounted_price = $row['discounted_price'];
    $pic1 =             $row['pic_one'];
    $pic2 =             $row['pic_two'];
    $pic3 =             $row['pic_three'];
    $gender =           $row['gender'];
    $type =             $row['type'];

    $name_arr = explode("_",$name_);
    $name = implode(" ",$name_arr);
?>

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="<?php echo $pic1 ?>" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="<?php echo $pic2 ?>" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="<?php echo $pic3 ?>" alt="Third slide"> </div>
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
                                <img class="d-block w-100 img-fluid" src="<?php echo $pic1 ?>" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="<?php echo $pic2 ?>" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="<?php echo $pic3 ?>" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $name ?></h2>
                        <h5> <del>₹<?php echo $discounted_price ?></del> ₹<?php echo $price ?></h5>
                        <h4>Short Description:</h4>
                        <p><?php echo $description ?></p>

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <?php if ($type == 'with_bottom'){ ?>
                                    <a class="btn hvr-hover" data-fancybox-close="" href="default-design.php?product_id=<?php echo $product_id ?>&&type=<?php echo $type ?>">Select Design</a>
                                <?php } else { ?>
                                    <a class="btn hvr-hover" data-fancybox-close="" href="default-design.php?product_id=<?php echo $product_id ?>">Select Design</a>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="add-to-btn">
                            <div class="add-comp">
                                <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>

                            </div>
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
            </div>

            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Featured Products</h1>
                        <p> </p>
                    </div>
                    <div class="featured-products-box owl-carousel owl-theme">
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/product/blouse/1.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop.php?name=blouse" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="shop.php?name=blouse" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop.php?name=blouse">View</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4> Blouse </h4>
                                    <h5>20% OFF* </h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/product/gown/1.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop.php?name=gown" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="shop.php?name=gown" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop.php?name=gown">View</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4> Gwon </h4>
                                    <h5> 20% OFF* </h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/product/kurti/1.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop.php?name=kurti" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="shop.php?name=kurti" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop.php?name=kurti">View</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4> Kurti</h4>
                                    <h5> 20% OFF* </h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/product/suit_plazo/1.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop.php?name=suit_plazo" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="shop.php?name=suit_plazo" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop.php?name=suit_plazo">View</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Suit With Plazo</h4>
                                    <h5> 20% OFF*</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/product/suit_pant/1.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop.php?name=suit_pant" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="shop.php?name=suit_pant" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop.php?name=suit_pant">View</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4> suit with pant</h4>
                                    <h5> 20% OFF*</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/product/shirt/1.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop.php?name=three_piece_suit" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="shop.php?name=three_piece_suit" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop.php?name=three_piece_suit">View</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Shirt</h4>
                                    <h5>20% OFF*</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/product/three_piece_suit/1.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop.php?name=three_piece_suit" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="shop.php?name=three_piece_suit" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop.php?name=three_piece_suit">View</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Three Piece suit</h4>
                                    <h5>20% OFF*</h5>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="images/product/couple_shirt/1.jpg" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="shop.php?name=couple_shirt" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li><a href="shop.php?name=couple_shirt" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                        </ul>
                                        <a class="cart" href="shop.php?name=couple_shirt">View</a>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4>Couple Shirt</h4>
                                    <h5>20% OFF*</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->

<?php
    include 'footer.php';
} else {
    header("Location: index.php?info=Sorry! the product in currently not available");
}
?>