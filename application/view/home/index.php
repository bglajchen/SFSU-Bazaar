<br><br>
<!-- Featured Products -->
<div class="container-fluid well left-padding">  
    <div class="row-fluid">
        <h2>Featuring:</h2>     
        <?php for ($i = 0, $size = count($featuredProducts); ($i < 6 && $i < $size); $i++) { ?>
            <div class="col-sm-5 col-md-2 bottom-padding">
                <a href="product/index/<?php echo $featuredProducts[$i]->productID; ?>" > 
                    <?php if ($featuredProducts[$i]->imagePath != null) : ?>
                        <img src="<?php echo $featuredProducts[$i]->imagePath; ?>"  alt="Image Not Provided" style="width:100px;height:100px">

                    <?php else : ?>
                        <img src="http://www.rajmaaiconvention.com/images/ProfilePic/blank-profile.png"  alt="Image Not Provided" style="width:100px;height:100px">

                    <?php endif; ?>
                    <p class="txt-overflow-hidden">
                        <?php echo $featuredProducts[$i]->name; ?> <br>
    
                        <?php if ($featuredProducts[$i]->isService == 0) { 
                            echo "$" . number_format($featuredProducts[$i]->price, 2, '.', ''); 
                        }

                        else {
                            echo "$" . number_format($featuredProducts[$i]->price, 2, '.', '') . " /hr"; 
                        }
                        ?> <br>

                    </p>    
                    <a href="product/confirmation/<?php echo $featuredProducts[$i]->productID; ?>" class="btn btn-info sm-buy-btn">Buy It Now</a>  
                </a>
            </div>
        <?php } ?> <!-- end of product detail-->
    </div> <!-- end row -->
</div> <!-- end container -->

<hr>

<!-- Recently Posted Products -->
<div class="container-fluid well left-padding">  
    <div class="row-fluid">
        <h2>Recently Posted:</h2>     
        <?php for ($i = 0, $size = count($recentProducts); ($i < 6 && $i < $size); $i++) { ?>
            <div class="col-sm-5 col-md-2 bottom-padding">
                <a href="product/index/<?php echo $recentProducts[$i]->productID; ?>" > 
                        <?php if ($recentProducts[$i]->imagePath != null) : ?>
                            <img src="<?php echo $recentProducts[$i]->imagePath; ?>"  alt="Image Not Provided" style="width:100px;height:100px">

                        <?php else : ?>
                            <img src="http://www.rajmaaiconvention.com/images/ProfilePic/blank-profile.png"  alt="Image Not Provided" style="width:100px;height:100px">

                        <?php endif; ?>
                    <p class="txt-overflow-hidden">
                        <?php echo $recentProducts[$i]->name; ?> <br>
                            
                        <?php if ($recentProducts[$i]->isService == 0) { 
                            echo "$" . number_format($recentProducts[$i]->price, 2, '.', ''); 
                        }

                        else {
                            echo "$" . number_format($recentProducts[$i]->price, 2, '.', '') . " /hr"; 
                        }
                        ?> <br>
                        
                    </p>    
                    <a href="product/confirmation/<?php echo $recentProducts[$i]->productID; ?>" class="btn btn-info sm-buy-btn">Buy It Now</a>  
                </a>
            </div>
        <?php } ?> <!-- end of product detail-->
    </div> <!-- end row -->
</div> <!-- end container -->