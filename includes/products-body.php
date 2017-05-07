<?php
include "storescripts/connect_to_mysql.php";
$dynamicList = "";
$sql = mysql_query("SELECT * FROM products");
$productCount = mysql_num_rows($sql);
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
             $dynamicList .= '<div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" alt="" alt="">

                    <div class="caption">
                     <center> <h4><a href="product.php?id=' . $id . '">'. $product_name .'</a></center>
                        <div>
                            <h4 class="pull-left">
                                $'. $price .'&nbsp;
                            </h4>

                            <h4 class="pull-right">
                                <a href="product.php?id=' . $id . '" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></a>
                            </h4>
                        </div>
                    </div>

                </div>
            </div>';
    }
} else {
	$dynamicList = "We have no products listed in our store yet";
}
mysql_close();
?>

        <div class="row">

            <div class="col-md-12">

                <!-- <div class="row carousel-holder">
ORDER BY date_added
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div> -->

                <div class="row">
                    <?php echo $dynamicList ?>
                    <!--div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">

                                <h4 class="pull-right">
                                     $24.99 &nbsp;
                                    <a href="#" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></a>
                                </h4>

                                <h4><a href="#">First Product</a>

                                </h4>
                            </div>

                        </div>
                    </div-->

                </div>

            </div>

        </div>
