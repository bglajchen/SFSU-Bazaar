<div class="container-fluid">
    <h3><a href="#" onclick="goBack()">Go Back</a></h3>
    <br>
    <h1>Confirm Purchase</h1>
    <table id="product" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:30%">Product</th>
                <th style="width:30%">Name</th>
                <th style="width:20%">Seller</th>
                <th style="width:20%">Price</th>
            </tr>
        </thead>

        <!-- Place Products Here -->
        <tbody>
            <tr>
                <!-- Product img -->
                <td data-th="Product">

                    <?php if ($product->imagePath != null) : ?>
                        <img class="xs-img" src="../../<?php echo $product->imagePath; ?>" alt="Image Not Provided">

                    <?php else : ?>
                        <img class="xs-img" src="http://www.rajmaaiconvention.com/images/ProfilePic/blank-profile.png"  alt="Image Not Provided">

                    <?php endif; ?>
                </td>
                <!-- product name -->
                <td data-th="Name"><h4><b><?php echo $product->name; ?></b></h4></td>
                <!-- Seller Username -->
                <td data-th="Seller"><h6><?php echo User::get($product->sellerID)->email; ?></h6></td>

                <!-- Product Price -->
                <td data-th="Price"><h5><b>
                    <?php if ($product->isService == 0) { 
                        echo "$" . number_format($product->price, 2, '.', ''); 
                    }

                    else {
                        echo "$" . number_format($product->price, 2, '.', '') . " /hr"; 
                    }
                    ?>
                        
                    </b></h5>
                </td>

            </tr>
        </tbody>

        <!-- Cancel/Confirm Purchase -->
        <tfoot>
            <!-- Cancel/Confirm Purchase Button -->
            <tr>
                <td colspan="2" class="hidden-xs"></td>
                <td><a href="#" class="btn btn-link" onclick="goBack()"><i class="fa fa-angle-left"></i> Cancel</a></td>
                <td><a href="<?php echo URL . 'product/delete/' . $product->productID; ?>" class="btn btn-success sm-buy-btn btn-block" onclick="msgSent()"> Confirm <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
    </table>
</div>