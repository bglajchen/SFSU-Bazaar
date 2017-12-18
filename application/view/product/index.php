<style>

    .product-img{
        width: 450px;
        height: 450px;
    }
    .btn-qty {
        width: 52px;
        height: 46px;
    }

    .btn { 
        border-radius: 0; 
    }



</style>

<div class="container-fluid">
    <h3><a href="#" onclick="goBack()">Go Back</a></h3>
    <br>
    <div class="row-fluid">
        <!-- product image -->
        <div class="col-lg-5">
            <?php if ($product->imagePath != null) : ?>
                <img class="image-responsive product-img" src="../../<?php echo $product->imagePath; ?>" alt="Image Not Provided">

            <?php else : ?>
                <img class="image-responsive product-img" src="http://www.rajmaaiconvention.com/images/ProfilePic/blank-profile.png"  alt="Image Not Provided">

            <?php endif; ?>
        </div>

        <!-- product data -->
        <div class="col-lg-7">
            <div class="row">

                <!-- product title -->
                <div class="row-fluid">
                    <h1><?php echo $product->name; ?></h1>
                </div>

                <!-- product seller -->
                <div class="row-fluid">
                    <div class="col-md-12">
                        <span>By: </span>
                        <span><?php echo User::get($product->sellerID)->email; ?></span>
                    </div>
                </div><!-- end row -->

                <!-- product price -->
                <div class="row-fluid">
                    <div class="col-md-7 bottom-rule">
                        <h2 class="product-price">  
                            <?php if ($product->isService == 0) { 
                                echo "$" . number_format($product->price, 2, '.', ''); 
                            }

                            else {
                                echo "$" . number_format($product->price, 2, '.', '') . " /hr"; 
                            }
                            ?>               
                        </h2>
                    </div>

                <?php if ($product->isService == 0) : ?>
                </div><!-- end row -->

                <!-- product condition -->
                <div class="row-fluid">
                    <div class="col-md-12 bottom-rule">
                        <h4 class="product-price">Condition: <?php echo $product->quality; ?></h4>
                        <br><br>
                        <br>
                        <h4>Quantity: <?php echo $product->quantity; ?> Left</h4>
                    </div>
                </div><!-- end row -->
                
                <!-- quantity, buy it now buttons -->
                <div class="row-fluid add-to-cart">


                    <!-- change quantity -->
                    <div class="col-md-4 product-qty">

                        <!-- minus button -->
                        <button type="button" class="btn btn-number btn-default btn-lg btn-qty" data-type="minus" data-field="quant[2]">
                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                        </button>

                        <!-- quantity input box -->
                        <input class="btn btn-default btn-lg btn-qty form-control input-number" type="text" name="quant[2]" value="1" min="1" max="<?php echo $product->quantity; ?>" />

                        <!-- plus button -->
                        <button type="button" class="btn btn-number btn-default btn-lg btn-qty" data-type="plus" data-field="quant[2]">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>

                    </div>

                    <!-- buy it now -->
                    <div class="col-md-4">
                        <a href="<?php echo URL . "product/confirmation/$product->productID"; ?>"" class="btn btn-info btn-size buy-btn ">Buy It Now</a>   
                    </div>
                </div><!-- end row -->


                <?php else : ?>
                    <!-- buy it now buttons -->
                    <div class="col-md-5 add-to-cart">
                        <!-- buy it now -->
                        <a href="<?php echo URL . "product/confirmation/$product->productID"; ?>" class="btn btn-info btn-size buy-btn ">Buy It Now</a>   
                    </div><!-- end row -->
                </div>

                <?php endif; ?> <!-- end if statement -->


            </div><!-- end row -->
            <hr>
            <div class="row">
                <h4><u>Description:</u></h4>
                <br>
                <!-- Tab panes -->
                <div id="description">
                    <p>
                        <?php echo $product->description; ?> 
                    </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <h4><u>Video:</u></h4>
                <br>
                <!-- Tab panes -->
                <div role="tabpanel" class="tab-pane active">
                    <p class="top-10">
                        <?php if (!empty($product->videoUrl) && strstr($product->videoUrl, 'youtube.com')) { ?>
                            <iframe width="420" height="345" src="<?php echo $product->videoUrl; ?> ">    
                            </iframe>
                        <?php } else { ?>
                            No video available.
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- end container -->
    <hr>
</div>