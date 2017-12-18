<style>

    .thumbnail
    {
        margin-bottom: 30px;
        padding: 0;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
    }

</style>

<script>
//    function sortByPrice(option)
//    {   
//        if (option !== ""){
//            
//            //category = $('#category').val();
//            //keyword = $('#search-term').val();   
//            
//            category = "<?php// echo $_GET['category']?>";
//            keyword =  "<?php// echo $_GET['search-term']?>";
//            
//            if (option === "low")
//            {    
//                url = "<?php// echo URL . 'listing/sortLowToHigh/' ?>";
//                url += category + '/' + keyword;
//                
//                window.location.href = url;
//                alert("category: " + category + " | keyword: " + keyword);
//            }
//            else
//            {
//                window.location.href = "<?php//echo URL . 'listing/sortHighToLow' ?>";
//            }
//        }
//    }
</script>

<div class="container-fluid">
    <div class="container-fluid">
        <div class="well">

            <!-- page title -->
            <font size="5">Search Results</font>
            <div class="row" style="float: right;">
                <!--
                <div class="col-md-2">
                    <label for="selectbasic"><small>Sort By:</small></label>
                </div>
            -->
            <!-- Sort By dropdown menu --> 
                <!--
                <div class="col-md-10">
                    <select id="sortBy" name="sortBy" class="form-control" onchange="sortByPrice(this.value)">
                        <option value="">---Select One---</option>
                        <option value="low">Price: Low To High</option>
                        <option value="high">Price: High To Low</option>
                    </select>
                </div>
            -->

        </div> <!-- end row -->
    </div>

    <!-- # of results found -->
    <p><big><strong class="text-danger"><?php echo count($products); ?> </strong> results found</big></p>

</div> <!-- end container -->

<!-- Product Listing -->
<div class="container-fluid">
    <div class="row-fluid">
        <!-- product here -->
        <?php foreach ($products as $product) { ?>
            <div class="col-sm-5 col-md-3">
                <div class="thumbnail">

                    <!-- Product Img -->
                    <a href="<?php echo URL . "product/index/$product->productID"; ?>">
                        <?php if ($product->imagePath != null) : ?>
                        <img src="../<?php echo $product->imagePath; ?>"  alt="Image Not Provided" style="width:250px;height:250px">

                    <?php else : ?>
                    <img src="http://www.rajmaaiconvention.com/images/ProfilePic/blank-profile.png"  alt="Image Not Provided" style="width:250px; height:250px">

                <?php endif; ?>
            </a>

            <!-- Product Detail -->
            <div class="container-fluid left-padding">
                <!-- Product Title -->
                <h4 class="txt-overflow-hidden">
                    <b><?php echo $product->name; ?></b>
                </h4>
                <p class="">
                    By: <?php echo User::get($product->sellerID)->email; ?>
                </p>

                <div class="row-fluid">

                    <!-- Seller and Product Price--> 
                    <h4><b>    
                        <?php if ($product->isService == 0) { 
                            echo "$" . number_format($product->price, 2, '.', ''); 
                        }

                        else {
                            echo "$" . number_format($product->price, 2, '.', '') . " /hr"; 
                        }
                        ?>
                    </b>
                    
                    <!-- Buy It Now button -->
                    <a href="<?php echo URL . "product/confirmation/$product->productID"; ?>" class="btn sm-buy-btn btn-info pull-right">Buy It Now</a> 
                    <br>
                    <br>
                    </h4>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> <!-- end thumbnail -->
    </div> <!-- end of product -->
<?php } ?> <!-- end php -->

<!-- if no results found -->
<?php
if (count($products) == 0) {
    echo "<h2><em>No results were found.</em></h2>";
}
?>

</div> <!-- end row -->
</div> <!-- end container -->
</div> <!-- end container -->