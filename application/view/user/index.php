<div class="container">
    <div class="row">
        <h1> 
            My Profile
        </h1>
        <div class="col-md-5">
            <img src="http://placehold.it/400x250/000/fff">
        </div>
        <div class="col-md-7">
        <br>
        <table style="width:50%">
            <tr>
                <th>USERNAME:</th> 
                <!-- <td>username</td> -->
                <td><?php echo "$user->firstName $user->lastName"; ?></td>
            </tr>
            <tr>
                <th>EMAIL:</th> 
                <!-- <td>username@mail.sfsu.edu</td> -->
                <td><?php echo "$user->email"; ?></td>
            </tr>
            <tr>
                <th>SALE RATING:</th>
                <td>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    (# of reviews)
                </td>
            </tr>
        </table>
    </div>    
</div>
<div class="container">
    <div class="row">
        <h2> 
            Your Products:
        </h2>
        <div class="col-sm-5 col-md-2 ">
            <a href="#"> 
                <img src="http://placehold.it/400x250/000/fff" alt="" style="width:100px;height:100px">
                    <p class="product-summary">
                        Name <br>
                        Price <br>
                    </p>  
                    <input type="submit" class="btn btn-info" value="Edit"> 
                    <input type="submit" class="btn btn-info" value="Remove">    
            </a>
            </div>
            <div class="col-sm-5 col-md-2">
                <a href="#" >
                    <img src="http://placehold.it/400x250/000/fff" alt="" style="width:100px;height:100px">
                    <p class="product-summary">
                        Name <br>
                        Price <br>
                    </p>  
                    <input type="submit" class="btn btn-info" value="Edit">  
                    <input type="submit" class="btn btn-info" value="Remove">  
                </a>
            </div>
            <div class="col-sm-5 col-md-2">
                <a href="#" >   
                    <img src="http://placehold.it/400x250/000/fff" alt="" style="width:100px;height:100px">
                    <p class="product-summary">
                        Name <br>
                        Price <br>
                    </p>  
                    <input type="submit" class="btn btn-info" value="Edit">  
                    <input type="submit" class="btn btn-info" value="Remove">  
                </a>
            </div>
            <div class="col-sm-5 col-md-2">
                <a href="#"> 
                    <img src="http://placehold.it/400x250/000/fff" alt="" style="width:100px;height:100px">
                    <p class="product-summary">
                        Name <br>
                        Price <br>
                    </p>  
                    <input type="submit" class="btn btn-info" value="Edit"> 
                    <input type="submit" class="btn btn-info" value="Remove">    
                </a>
            </div>
            <div class="col-sm-5 col-md-2">
                <a href="#">
                    <img src="http://placehold.it/400x250/000/fff" alt="" style="width:100px;height:100px">
                    <p class="product-summary">
                        Name <br>
                        Price <br>
                    </p>  
                    <input type="submit" class="btn btn-info" value="Edit"> 
                    <input type="submit" class="btn btn-info" value="Remove">  
                </a>
            </div>
            <div class="col-sm-5 col-md-2">
                <a href="#">     
                    <img src="http://placehold.it/400x250/000/fff" alt="" style="width:100px;height:100px">
                    <p class="product-summary">
                        Name <br>
                        Price <br>
                    </p> 
                    <input type="submit" class="btn btn-info" value="Edit">  
                    <input type="submit" class="btn btn-info" value="Remove">
                </a>
            </div>
        </div>
    </div>
</div>