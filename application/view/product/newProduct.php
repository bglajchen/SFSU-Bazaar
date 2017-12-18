<style>
	.centered {
		width:70%;
		margin: 0 auto;
	}
</style>

<script>
	$(function() {
	    $('#name, #name').on('keypress', function(e) {
	        if (e.which == 95 || e.which == 37)
	            return false;
	    });
	});
</script>

<div class="container-fluid">
	<br>
	<h2>Add a Post</h2>
	<br>
	<hr>

	<div class="row-fluid centered">
		<!-- is this a product or service -->
		<h4>Step 1: Product or Service</h4>
		<hr>
		<form class="form-horizontal" id='form-id'>
			<div class="form-group">
				<label class="control-label col-sm-2" for="name">Product or Service? <br> (check only one):</label>
				<input id='notService' name='isService' type='radio' checked="checked"/> Product
				<input id="isService" name='isService' type='radio' /> Service
			</div>
		</form>
		<br>

		<hr>

		<!-- Product -->
		<div class="box" id="product">

			<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo URL; ?>product/add" method="POST">

				<h4>Step 2: Product Detail</h4>
				<hr>
				<!-- Name *-->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Name:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name" value="" required id="name" placeholder="Enter Product Name"/>
						<p><font color="red">*** No special characters or else it wont be searchable.</font></p>
					</div>
				</div>

				<!-- Price *-->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Price:</label>
					<div class="col-sm-10">
						<input type="number" step="0.01" min="0.01" class="form-control" name="price" value="" required id="price" placeholder="Enter Product Price"/>
					</div>
				</div>

				<!-- Quantity *-->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Quantity:</label>
					<div class="col-sm-10">
						<input type="number" min="1" class="form-control" name="quantity" value="" required id="quantity" placeholder="Enter Product Quantity"/>
					</div>
				</div>

				<!-- Quality Dropdown *-->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Quality:</label>
					<div class="col-sm-10">        
						<select id="quality" name="quality" class="form-control product-type" required>
							<option value="">-Select One-</option>
							<option value="New">New</option>
							<option value="Refurbished">Refurbished</option>
							<option value="Used - Like New">Used - Like New</option>
							<option value="Used - Very Good">Used - Very Good</option>
							<option value="Used - Good">Used - Good</option>
							<option value="Used - Acceptable">Used - Acceptable</option>
							<option value="Used - Poor">Used - Poor</option>
							<option value="Used - Very Poor">Used - Very Poor</option>
							<option value="Used - Unusable">Used - Unusable</option>
						</select>
					</div>
				</div>

				<!-- Category Dropdown *-->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Category:</label>
					<div class="col-sm-10">        
						<select id="category" name="category" class="form-control product-type" required>
							<option value="">-Select One-</option>
							<?php 
							foreach ($categories as $category) 
							{   
								if ($category->name != "Services")
								{    
									echo '<option value="' . $category->name . '">' . $category->name . '</option>';
								}
							}
							?>
						</select>
					</div>
				</div>

				<!-- Image *-->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Image:</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="image" value="" id="image" required/>
					</div>
				</div>

				<!-- Video URL -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Video URL: <br> (optional) </label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="videoUrl" value="" id="videoUrl" placeholder="Enter URL"/>
						<p><font color="red">*** Only YouTube links are supported.</font></p>              
					</div>               
				</div>

				<!-- Description -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Description:</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" name="description" value="" id="description" rows="5" required=""></textarea> 
					</div>
				</div>

				<hr>
				<br>

				<!-- Add Product Button -->
				<input type="submit" class="btn btn-primary pull-right" name="addProduct" value="Add This Product"/>

			</form>
		</div>

		<!-- services -->
		<div class="box" id="service">

			<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo URL; ?>product/add" method="POST">

				<h4>Step 2: Service Detail</h4>
				<hr>
				<!-- Name *-->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Name:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name" value="" required id="name" placeholder="Enter Service Name"/>
						<p><font color="red">*** No special characters or else it wont be searchable.</font></p>
					</div>
				</div>

				<!-- Price *-->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Price Per Hour: </label>
					<div class="col-sm-10">
						<input type="number" step="0.01" min="0.01" class="form-control" name="price" value="" required id="price" placeholder="Enter Service Price Per Hour"/>
					</div>
				</div>

				<!-- Image -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Image: <br> (Optional)</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="image" value="" id="image"/>
					</div>
				</div>

				<!-- Video URL -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Video URL: <br> (Optional)</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="videoUrl" value="" id="videoUrl" placeholder="Enter URL"/>
						<p><font color="red">*** Only YouTube links are supported.</font></p>              
					</div>               
				</div>

				<!-- Description -->
				<div class="form-group">
					<label class="control-label col-sm-2" for="name">Description:</label>
					<div class="col-sm-10">
						<textarea type="text" class="form-control" name="description" value="" id="description" rows="5" required=""></textarea> 
					</div>
				</div>

				<hr>
				<br>

				<!-- isService is true -->
				<input type="hidden" name="isService" value="1"/>
				<input type="hidden" name="category" value="Services"/>

				<!-- Add Product Button -->
				<input type="submit" class="btn btn-primary pull-right" name="addProduct" value="Add This Service"/>

			</form>
		</div>
	</div>
</div>



