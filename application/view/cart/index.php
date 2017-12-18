    <style>
        .table>tbody>tr>td, .table>tfoot>tr>td{
            vertical-align: middle;
        }

        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control{
                width:20%;
                display: inline !important;
            }
            .actions .btn{
                width:36%;
                margin:1.5em 0;
            }

            table#cart thead { 
                display: none; 
            }
            table#cart tbody td { 
                display: block; padding: .6rem; min-width:320px;
            }
            table#cart tbody tr td:first-child { 
                background: #333; color: #fff; 
            }
            table#cart tbody td:before {
                content: attr(data-th); font-weight: bold;
                display: inline-block; width: 8rem;
            }

            table#cart tfoot td{
                display:block; 
            }
            table#cart tfoot td .btn{
                display:block;
            }

        }
    </style>

    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:30%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:10%">Seller</th>
                    <th style="width:30%">Schedule</th>
                    <th style="width:20%" class="text-center">Subtotal</th>
                </tr>
            </thead>

            <!-- Place Products Here -->
            <tbody>
                <tr>
                    <!-- Product -->
                    <td data-th="Product">

                        <!-- Product img and title -->
                        <div class="row">
                            <div class="col-sm-4 hidden-xs"><img src="http://placehold.it/200x200" alt="" class="img-responsive"/></div>
                            <div class="col-sm-6">
                                <h4>Product Title</h4>
                            </div>
                        </div>

                        <!-- Delete Button -->
                        <div class="row">
                            <a href="#" style="padding: 0 15px">(delete)</a>
                        </div>
                        
                    </td>

                    <!-- Product Price -->
                    <td data-th="Price">$1.99</td>

                    <!-- Seller Username -->
                    <td data-th="Seller">Username</td>

                    <!-- Sellers Schedule -->
                    <td data-th="Schedule">
                        <p>Day: S M T W Th F Sa</p>
                        <p>Time: 0:00 to 0:00</p>
                        <p>Location: Add a Place </p>
                    </td>

                    <!-- Subtotal -->
                    <td data-th="Subtotal" class="text-center">1.99</td>
                </tr>
            </tbody>

            <!-- Total Price and Meetup/Continue Shopping Button -->
            <tfoot>
                <!-- Total Price -->
                <tr>
                    <td colspan="4" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                </tr>
                <!-- Continue Shopping/ MeetUp Button -->
                <tr>
                    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="3" class="hidden-xs"></td>
                    <td><a href="#" class="btn btn-success btn-block">MeetUp <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
        </table>
    </div>

